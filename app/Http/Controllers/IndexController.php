<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Item;
use App\Models\BaseModel;
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
                $items = $youtube->playlistItems->listPlaylistItems('snippet', [
                    'playlistId' => 'UUSOVOu_5JyhtFkTVxMzedDA',
                    'maxResults' => 50,
                ]);
                $videoIds = [];
                $snippetMap = [];
                foreach ($items->getItems() as $item) {
                    $snippet = $item->getSnippet();
                    $videoId = $snippet->getResourceId()->getVideoId();
                    $snippet->videoId = $videoId;
                    $videoIds[] = $videoId;
                    $snippetMap[$videoId] = $snippet;
                }
                // videos APIでdurationを取得しShortsを除外（+1クォータ）
                $videoDetails = $youtube->videos->listVideos('contentDetails,liveStreamingDetails', [
                    'id' => implode(',', $videoIds),
                ]);
                $snippets = [];
                foreach ($videoDetails->getItems() as $video) {
                    $duration = new \DateInterval($video->getContentDetails()->getDuration());
                    $seconds = $duration->h * 3600 + $duration->i * 60 + $duration->s;
                    $isLive = $video->getLiveStreamingDetails() !== null;
                    if ($seconds >= 120 && !$isLive && isset($snippetMap[$video->getId()])) {
                        $snippets[] = $snippetMap[$video->getId()];
                        if (count($snippets) >= $max) break;
                    }
                }
                return $snippets;
            } catch (\Throwable $e) {
                logger()->error('YouTube API error: ' . $e->getMessage());
                return self::fallbackVideos($max);
            }
        }) ?? self::fallbackVideos($max);
    }

    private function getItems(): \Illuminate\Database\Eloquent\Collection
    {
        $items = BaseModel::orderBy('id')->get();
        foreach ($items as $item) {
            $item['price'] = number_format($item['price']);
        }
        return $items;
    }

    public function index()
    {
        $snippets = $this->getYoutubeSnippets(4);
        $items = $this->getItems();
        $baseModels = BaseModel::orderBy('sort_order')->limit(3)->get();
        $pickups = Blog::where('status', 1)->whereNotNull('top_position')->orderBy('top_position')->limit(3)->get();

        return view('index', compact('snippets', 'items', 'baseModels', 'pickups'));
    }

    public function about()
    {
        return view('about');
    }

    public function leather()
    {
        return view('leather');
    }

    public function purpose()
    {
        return view('purpose');
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

        $query = Blog::where('status', 1)->orderByDesc('display_date');

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $blogs = $query->paginate(12)->appends(['category' => $category]);

        $currentCategory = $category ?: 'all';

        return view('pickup', compact('blogs', 'currentCategory'));
    }

    public function pickupDetail($id)
    {
        $blog = Blog::where('status', 1)->findOrFail($id);

        $next = Blog::where('status', 1)->where('display_date', '<', $blog->display_date)->orderByDesc('display_date')->first();
        $prev = Blog::where('status', 1)->where('display_date', '>', $blog->display_date)->orderBy('display_date')->first();

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
