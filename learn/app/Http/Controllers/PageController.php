<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pages;

class PageController extends Controller
{
    public function index()
    {
        $pages = Pages::all();
        return view('pageviews.index',compact('pages'));
    }

    public function create()
    {
        return view('pageviews.create');
    }

    public function store(Request $request)
    {
        $page = new Pages();
        $page->key = $request->get('key');
        $page->name = $request->get('name');
        $page->count = 0;
        $page->save();
        return redirect('/pagelist')->with('success', 'New Page Added');
    }

    public function ranking()
    {
        $pages = Pages::orderBy('count', 'desc')->get();
        return view('pageviews.ranking',compact('pages'));
    }

    public function pages($id)
    {
        $page = Pages::find($id);
        $page->increment('count');
        return view('pageviews.page',compact('page'));        
    }
}