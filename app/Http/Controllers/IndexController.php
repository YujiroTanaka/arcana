<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class IndexController extends Controller
{
    public function index()
    {
        //$url = 'https://api.thebase.in/1/oauth/token?grant_type=authorization_code&client_id=0ba8ef67ef642272c55f8faef1369068&client_secret=719dcbd2ea94d4dcb3776958221cb5ca&code=92a108af9b4dbe1562915f940fba3b06&redirect_uri=https://theend0304.base.shop/';
        //$result = file_get_contents($url, false, null);
        //dd($result);
        return view('index');
    }

    public function contact(Request $request)
    {
        Mail::send(new ContactMail($request->type, $request->name, $request->email, $request->phone, $request->msg));
        $contact = true;
        return redirect()->route('index')->with(compact('contact'));
    }
}
