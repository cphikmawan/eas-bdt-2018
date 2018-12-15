<?php

namespace App\Http\Controllers;

use App\Category;
use App\Books;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Support\Facades\Cache;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TrashController extends Controller
{
    public function index()
    {
        $category = Category::onlyTrashed()->get();
        $book = Books::onlyTrashed()->get();
        return view('dashboard.trash', compact('book','category'));
    }

    public function bookRestore($id)
    {
        Books::withTrashed()->where('book_id', $id)->restore();
        Alert::success('Success Message', 'Success Restore Book');
        return redirect('/trash');
    }

    public function categoryRestore($id)
    {
        Category::withTrashed()->where('category_id', $id)->restore();
        Alert::success('Success Message', 'Success Restore Category');
        return redirect('/trash');
    }
}
