<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Item;
use Google_Client;
use Google_Service_YouTube;

class IndexController extends Controller
{
    public function index()
    {
        $client = new Google_Client();
        $client->setDeveloperKey(env('GOOGLE_API_KEY'));
        $youtube = new Google_Service_YouTube($client);
        $items = $youtube->search->listSearch('snippet', [
            'channelId'  => 'UCSOVOu_5JyhtFkTVxMzedDA',
            'order'      => 'date',
            'maxResults' => 4,
        ]);
        
        $ids = collect($items->getItems())->pluck('id')->all();
        $snippets = collect($items->getItems())->pluck('snippet')->all();
        foreach ($snippets as $key => $snippet) {
            $snippet->videoId = $ids[$key]->videoId;
        }

        $items = Item::orderBy('id')->get();
        foreach ($items as $item) {
            $item['price'] = number_format($item['price']);
        }

        return view('index', compact('snippets', 'items'));
    }

    public function contact(Request $request)
    {
        Contact::create([
            'type' => $request->type,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg,
        ]);
        Mail::send(new ContactMail($request->type, $request->name, $request->email, $request->phone, $request->msg));
        $contact = true;
        return redirect()->route('index')->with(compact('contact'));
    }
}
