<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\AdminInformation;
use App\Models\Contact;
use App\Models\Item;
use App\Models\Blog;
use App\Models\BaseModel;
use App\Models\OrderExample;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('itemRegister');
    }
    /**
     * ダッシュボード
     *
     */
    public function index()
    {
        $information_histories = AdminInformation::select('id', 'information_date', 'detail')->where('status', 1)->orderByDesc('information_date')->get();
        $information_todos = AdminInformation::select('id', 'information_date', 'detail')->where('status', 0)->orderBy('id')->get();
        return view('auth.dashboard', compact('information_histories', 'information_todos'));
    }

    /**
     * お問い合わせ
     *
     */
    public function contact()
    {
        $contacts = Contact::orderByDesc('id')->get();
        return view('auth.contact', compact('contacts'));
    }

    /**
     * お問い合わせ詳細
     *
     */
    public function contactDetail($id)
    {
        $contact = Contact::find($id);
        $max = Contact::max('id');
        $min = 1;
        return view('auth.contact_detail', compact('contact', 'max', 'min'));
    }

    /**
     * お知らせ一覧
     *
     */
    public function information()
    {
        $informations = AdminInformation::orderByDesc('id')->get();
        return view('auth.information', compact('informations'));
    }

    /**
     * お知らせ編集画面
     *
     */
    public function informationEdit($id)
    {
        $information = AdminInformation::find($id);
        return view('auth.information_edit', compact('information'));
    }

    /**
     * お知らせ編集処理
     *
     */
    public function informationEditExec(Request $request, $id)
    {
        $data = $request->all();
        $information = AdminInformation::find($id);
        $information->update($data);
        return redirect('admin/information/edit/' . $id);
    }

    /**
     * お知らせ追加画面
     *
     */
    public function informationRegister()
    {
        return view('auth.information_register');
    }

    /**
     * お知らせ追加処理
     *
     */
    public function informationRegisterExec(Request $request)
    {
        $data = $request->all();
        $information = AdminInformation::create($data);
        return redirect('admin/information/edit/' . $information->id);
    }

    /**
     * お知らせ削除
     *
     */
    public function informationDelete($id)
    {
        AdminInformation::find($id)->delete();
        return redirect('admin/information');
    }

    /**
     * 商品一覧
     *
     */
    public function item()
    {
        $items = Item::orderBy('id')->get();
        return view('auth.item', compact('items'));
    }

    /**
     * 商品更新
     *
     */
    public function itemRegister()
    {
        $client_id = '0ba8ef67ef642272c55f8faef1369068';
        $client_secret = '719dcbd2ea94d4dcb3776958221cb5ca';
        $redirect_uri = 'https://theend0304.base.shop/';
        $code = 'fc6e9aefd154ce8635983ad6cd341fee';
        if ($code) {
            $code = 'fc6e9aefd154ce8635983ad6cd341fee';
        } elseif (isset($_GET['code']) && !empty($_GET['code'])) {
            $code = $_GET['code'];
        } else {
            // 認可コードが無ければBASE側のログイン画面にリダイレクト
            $auth_url = '';
            $auth_url .= 'https://api.thebase.in/1/oauth/authorize';
            $auth_url .= '?response_type=code';
            $auth_url .= '&client_id='.$client_id;
            $auth_url .= '&redirect_uri='.$redirect_uri;
            $auth_url .= '&scope=read_items';
            header('Location:'.$auth_url);
            exit;
        }
        $params = array(
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
            'code'          => $code,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $redirect_uri,
        );
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
        );
        $request_options = array(
            'http' => array(
                'ignore_errors' => true,
                'method'  => 'POST',
                'content' => http_build_query($params),
                'header'  => implode("\r\n", $headers),
            ),
        );
        $context = stream_context_create($request_options);
        $response = file_get_contents('https://api.thebase.in/1/oauth/token', false, $context);
        $response_array = json_decode($response, true);
        $headers = array(
            'Authorization: Bearer ' . $response_array['access_token'],
        );
        $request_options = array(
            'http' => array(
                'ignore_errors' => true,
                'method' => 'GET',
                'header' => implode("\r\n", $headers),
            ),
        );
        $context = stream_context_create($request_options);
        $response = file_get_contents('https://api.thebase.in/1/items?limit=6&offset=0', false, $context);
        $response_array = json_decode($response, true);
        Item::query()->delete();
        foreach ($response_array['items'] as $item) {
            Item::create([
                'item_id' => $item['item_id'],
                'title' => $item['title'],
                'price' => $item['price'],
                'image_url' => $item['img1_origin'],
            ]);
        }
        return redirect('admin/item');
    }

    /**
     * ベースモデル一覧
     */
    public function baseModel()
    {
        $models = BaseModel::orderBy('sort_order')->get();
        return view('auth.base_model', compact('models'));
    }

    /**
     * ベースモデル追加画面
     */
    public function baseModelRegister()
    {
        return view('auth.base_model_register');
    }

    /**
     * ベースモデル追加処理
     */
    public function baseModelRegisterExec(Request $request)
    {
        $data = $request->only(['title', 'url', 'price', 'sort_order']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('base_models', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $model = BaseModel::create($data);
        return redirect('admin/base-model')->with('success', '登録しました');
    }

    /**
     * ベースモデル編集画面
     */
    public function baseModelEdit($id)
    {
        $model = BaseModel::findOrFail($id);
        return view('auth.base_model_edit', compact('model'));
    }

    /**
     * ベースモデル編集処理
     */
    public function baseModelEditExec(Request $request, $id)
    {
        $model = BaseModel::findOrFail($id);
        $data = $request->only(['title', 'url', 'price', 'sort_order']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('base_models', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $model->update($data);
        return redirect('admin/base-model/edit/' . $id)->with('success', '更新しました');
    }

    /**
     * ベースモデル削除
     */
    public function baseModelDelete($id)
    {
        BaseModel::findOrFail($id)->delete();
        return redirect('admin/base-model')->with('success', '削除しました');
    }

    /**
     * オーダー事例一覧
     */
    public function orderExample()
    {
        $examples = OrderExample::orderBy('sort_order')->get();
        return view('auth.order_example', compact('examples'));
    }

    /**
     * オーダー事例追加画面
     */
    public function orderExampleRegister()
    {
        return view('auth.order_example_register');
    }

    /**
     * オーダー事例追加処理
     */
    public function orderExampleRegisterExec(Request $request)
    {
        $data = $request->only(['title', 'url', 'price', 'sort_order']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('order_examples', 'public');
            $data['image'] = '/storage/' . $path;
        }

        OrderExample::create($data);
        return redirect('admin/order-example')->with('success', '登録しました');
    }

    /**
     * オーダー事例編集画面
     */
    public function orderExampleEdit($id)
    {
        $example = OrderExample::findOrFail($id);
        return view('auth.order_example_edit', compact('example'));
    }

    /**
     * オーダー事例編集処理
     */
    public function orderExampleEditExec(Request $request, $id)
    {
        $example = OrderExample::findOrFail($id);
        $data = $request->only(['title', 'url', 'price', 'sort_order']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('order_examples', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $example->update($data);
        return redirect('admin/order-example/edit/' . $id)->with('success', '更新しました');
    }

    /**
     * オーダー事例削除
     */
    public function orderExampleDelete($id)
    {
        OrderExample::findOrFail($id)->delete();
        return redirect('admin/order-example')->with('success', '削除しました');
    }

    /**
     * ブログ一覧
     *
     */
    public function blog()
    {
        $blogs = Blog::orderByDesc('id')->get();
        return view('auth.blog', compact('blogs'));
    }

    /**
     * ブログ詳細
     *
     */
    public function blogDetail($id)
    {
        $blog = Blog::find($id);
        return view('auth.blog_detail', compact('blog'));
    }

    /**
     * ブログ編集画面
     *
     */
    public function blogEdit($id)
    {
        $blog = Blog::find($id);
        return view('auth.blog_edit', compact('blog'));
    }

    /**
     * ブログ編集処理
     *
     */
    public function blogEditExec(Request $request, $id)
    {
        $data = $request->except(['_token', 'thumbnail']);
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('blog', 'public');
            $data['thumbnail_url'] = '/storage/' . $path;
        }
        $blog = Blog::find($id);
        $blog->update($data);
        return redirect('admin/blog/edit/' . $id);
    }

    /**
     * ブログ追加画面
     *
     */
    public function blogRegister()
    {
        return view('auth.blog_register');
    }

    /**
     * ブログ追加処理
     *
     */
    public function blogRegisterExec(Request $request)
    {
        $data = $request->except(['_token', 'thumbnail']);
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('blog', 'public');
            $data['thumbnail_url'] = '/storage/' . $path;
        }
        $blog = Blog::create($data);
        return redirect('admin/blog/detail/' . $blog->id);
    }

    /**
     * ブログTOP表示位置の更新
     */
    public function blogTopPosition(Request $request)
    {
        // 全てリセット
        Blog::whereNotNull('top_position')->update(['top_position' => null]);

        // 選択されたものをセット
        if ($request->has('positions')) {
            foreach ($request->input('positions') as $blogId => $position) {
                if ($position) {
                    Blog::where('id', $blogId)->update(['top_position' => $position]);
                }
            }
        }

        return redirect('admin/blog');
    }
}
