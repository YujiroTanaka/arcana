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
        $data = $request->all();
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
        $data = $request->all();
        $blog = Blog::create($data);
        return redirect('admin/blog/detail/' . $blog->id);
    }
}
