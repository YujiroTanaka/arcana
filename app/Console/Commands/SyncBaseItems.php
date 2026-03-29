<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;

class SyncBaseItems extends Command
{
    protected $signature = 'base:sync-items';
    protected $description = 'BASEショップから商品を取得してDBに同期';

    private $shopUrl = 'https://theend0304.base.shop';
    private $loadPath = '/load_items/{page}/market_oktown-base-shop_5c1653465b771/0';

    public function handle()
    {
        $this->info('BASE商品の同期を開始...');

        $items = $this->fetchAllItems();

        if (empty($items)) {
            $this->warn('商品が取得できませんでした');
            return 1;
        }

        $syncedIds = [];

        foreach ($items as $data) {
            $item = Item::updateOrCreate(
                ['item_id' => $data['item_id']],
                [
                    'title'     => $data['title'],
                    'image_url' => $data['image_url'],
                    'price'     => $data['price'],
                ]
            );
            $syncedIds[] = $item->id;
        }

        // BASEに存在しなくなった商品を削除
        Item::whereNotIn('id', $syncedIds)->delete();

        $this->info(count($items) . '件の商品を同期しました');
        return 0;
    }

    private function fetchAllItems(): array
    {
        $allItems = [];

        // 1ページ目: トップページから取得
        $html = $this->fetchHtml($this->shopUrl);
        if ($html) {
            $allItems = array_merge($allItems, $this->parseItems($html));
        }

        // 2ページ目以降: load_items エンドポイント
        for ($page = 1; $page <= 20; $page++) {
            $url = $this->shopUrl . str_replace('{page}', $page, $this->loadPath);
            $html = $this->fetchHtml($url);

            if (!$html || trim($html) === '') {
                break;
            }

            $parsed = $this->parseItems($html);
            if (empty($parsed)) {
                break;
            }

            $allItems = array_merge($allItems, $parsed);
            usleep(500000); // 0.5秒待機
        }

        // item_id で重複排除
        $unique = [];
        foreach ($allItems as $item) {
            $unique[$item['item_id']] = $item;
        }

        return array_values($unique);
    }

    private function fetchHtml(string $url): ?string
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; ArcanaBot/1.0)',
        ]);
        $html = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($code === 200 && $html) ? $html : null;
    }

    private function parseItems(string $html): array
    {
        $items = [];

        // 商品リンクのパターン: /items/{id}
        preg_match_all(
            '/<a[^>]+href=["\'](?:https?:\/\/theend0304\.base\.shop)?\/items\/(\d+)["\'][^>]*>(.*?)<\/a>/si',
            $html,
            $matches,
            PREG_SET_ORDER
        );

        foreach ($matches as $match) {
            $itemId = (int) $match[1];
            $inner  = $match[2];

            // 画像URL
            $imageUrl = '';
            if (preg_match('/src=["\']([^"\']*akamaized[^"\']*)["\']/', $inner, $img)) {
                $imageUrl = $img[1];
                if (strpos($imageUrl, '//') === 0) {
                    $imageUrl = 'https:' . $imageUrl;
                }
            }

            // 商品名: imgのalt属性 or テキスト
            $title = '';
            if (preg_match('/alt=["\']([^"\']+)["\']/', $inner, $alt)) {
                $title = $alt[1];
            }
            if (!$title) {
                $title = trim(strip_tags($inner));
            }

            // 価格
            $price = 0;
            if (preg_match('/[¥￥][\s]?([0-9,]+)/', $inner, $priceMatch)) {
                $price = (int) str_replace(',', '', $priceMatch[1]);
            }

            if ($itemId && $title && $price > 0) {
                $items[] = [
                    'item_id'   => $itemId,
                    'title'     => html_entity_decode($title, ENT_QUOTES, 'UTF-8'),
                    'image_url' => $imageUrl,
                    'price'     => $price,
                ];
            }
        }

        return $items;
    }
}
