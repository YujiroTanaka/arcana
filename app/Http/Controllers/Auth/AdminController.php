<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\AdminInformation;
use App\Models\Contact;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
}
