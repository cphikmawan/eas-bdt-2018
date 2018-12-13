<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 3)
        {
            return view('frontpage.index');
        }
        elseif(Auth::user()->role_id == 2)
        {
            return view('frontpage.index');
        }
        elseif(Auth::user()->role_id == 1)
        {
            return view('dashboard.index');
        }
        else
        {
            return view('frontpage.index');
        }
    }
}
