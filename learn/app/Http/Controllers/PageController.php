<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pages;
use GuzzleHttp\Client;

class PageController extends Controller
{
    public function index()
    {
        $pages = Pages::all();
        return view('pageviews.index',compact('pages', 'res'));
    }

    public function create()
    {
        return view('pageviews.create');
    }

    public function store(Request $request)
    {
        // save to mongo
        $page = new Pages();
        $page->key = $request->get('key');
        $page->name = $request->get('name');
        $page->count = 0;
        $page->save();

        $client = new Client();
        $increment = $client->post('http://localhost:5000/api/page/zadd/'.$page->id);
        
        return redirect('/pagelist')->with('success', 'New Page Added');
    }

    public function ranking()
    {
        // $pages = Pages::orderBy('count', 'desc')->get();
        $client = new Client();
        $res = $client->get('http://localhost:5000/api/page/get_rank/')->getBody();
        $res = json_decode($res);
        // dd($res);
    
        return view('pageviews.ranking',compact('res'));
    }

    public function rankingMongo()
    {
        $pages = Pages::orderBy('count', 'desc')->get();
    
        return view('pageviews.rankingmongo',compact('pages'));
    }

    public function pages($id)
    {
        // save to mongo
        $page = Pages::find($id);
        $page->increment('count');

        // redis
        $client = new Client();
        $increment = $client->post('http://localhost:5000/api/page/incr/'.$page->id);
        $res = $client->get('http://localhost:5000/api/page/get_incr/'.$page->id)->getBody();
        $res = json_decode($res);

        return view('pageviews.page',compact('page', 'res'));        
    }
}