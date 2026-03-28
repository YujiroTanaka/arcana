<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Item;
use App\Models\Blog;
use Google_Client;
use Google_Service_YouTube;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    private static function fallbackVideos(int $max = 4): array
    {
        $fallback = [
            (object) ['videoId' => '-fkXjXa126U', 'title' => 'その訳は⁉︎優しい価格で革ジャンオーダーできたラッキージェルドルマン！シンプルな漢のカスタマイズ！'],
            (object) ['videoId' => 'ocv5rVT7gHk', 'title' => '漆黒のbarbour⁉︎見えないアクセントで色気を出したお客様オーダー'],
            (object) ['videoId' => 'jQJ05l6Y1fY', 'title' => '遂に明日！周年イベントで打ち出されるARCANA馬鹿革アイテム紹介！！'],
            (object) ['videoId' => 'XqM_0S1D2Ts', 'title' => '藍染ARCANAleather2色使い⁉︎デニムやシルバーとも相性がいいレザーベスト出来上がりました！【お客様オーダーアイテム紹介】'],
        ];
        return array_slice($fallback, 0, $max);
    }

    private function getYoutubeSnippets(int $max = 4): array
    {
        $cacheKey = 'youtube_snippets_' . $max;

        return Cache::remember($cacheKey, now()->addHours(12), function () use ($max) {
            try {
                $client = new Google_Client();
                $client->setDeveloperKey(env('GOOGLE_API_KEY'));
                $youtube = new Google_Service_YouTube($client);
                $items = $youtube->search->listSearch('snippet', [
                    'channelId'  => 'UCSOVOu_5JyhtFkTVxMzedDA',
                    'order'      => 'date',
                    'maxResults' => $max,
                ]);
                $ids = collect($items->getItems())->pluck('id')->all();
                $snippets = collect($items->getItems())->pluck('snippet')->all();
                foreach ($snippets as $key => $snippet) {
                    $snippet->videoId = $ids[$key]->videoId;
                }
                return $snippets;
            } catch (\Throwable $e) {
                return self::fallbackVideos($max);
            }
        }) ?? self::fallbackVideos($max);
    }

    private function getItems(): \Illuminate\Database\Eloquent\Collection
    {
        $items = Item::orderBy('id')->get();
        foreach ($items as $item) {
            $item['price'] = number_format($item['price']);
        }
        return $items;
    }

    public function index()
    {
        $snippets = $this->getYoutubeSnippets(4);
        $items = $this->getItems();
        $pickups = Blog::where('status', 1)->orderByDesc('id')->limit(3)->get();

        return view('index', compact('snippets', 'items', 'pickups'));
    }

    public function about()
    {
        return view('about');
    }

    public function order()
    {
        $items = $this->getItems();
        return view('order', compact('items'));
    }

    public function repair()
    {
        $samples = Blog::where('status', 1)
            ->where('category', 'order_repair')
            ->orderByDesc('id')
            ->limit(3)
            ->get();
        return view('repair', compact('samples'));
    }

    public function theEnd()
    {
        $snippets = $this->getYoutubeSnippets(4);
        return view('the-end', compact('snippets'));
    }

    public function products()
    {
        $items = $this->getItems();
        return view('products', compact('items'));
    }

    public function pickup(Request $request)
    {
        $category = $request->query('category', 'all');

        $query = Blog::where('status', 1)->orderByDesc('id');

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $blogs = $query->paginate(9)->appends(['category' => $category]);

        $currentCategory = $category ?: 'all';

        return view('pickup', compact('blogs', 'currentCategory'));
    }

    public function pickupDetail($id)
    {
        $blog = Blog::where('status', 1)->findOrFail($id);

        $prev = Blog::where('status', 1)->where('id', '<', $id)->orderByDesc('id')->first();
        $next = Blog::where('status', 1)->where('id', '>', $id)->orderBy('id')->first();

        return view('pickup_detail', compact('blog', 'prev', 'next'));
    }

    public function contactPage()
    {
        return view('contact');
    }

    public function contact(Request $request)
    {
        if ($request->honeypot) {
            abort(404);
        }

        if ($request->type && !in_array($request->type, ['リペア', 'リメイク', 'オーダー', 'その他'])) {
            abort(404);
        }

        Contact::create([
            'type'  => $request->type,
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg'   => $request->msg,
        ]);

        Mail::send(new ContactMail($request->type, $request->name, $request->email, $request->phone, $request->msg));

        return redirect()->route('contact')->with('contact', true);
    }
}
