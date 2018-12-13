<?php

namespace App\Http\Controllers;

use App\Books;
use App\Category;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Support\Facades\Cache;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class BooksController extends Controller
{
    public function index()
    {
        $category = Cache::rememberForever('category', function() {
            return Category::all();
        });

        $book = Cache::rememberForever('books', function() {
            return Books::all();
        });
        
        return view('dashboard.book', compact('book', 'category'));
    }

    public function store(request $request)
    {
        $category = Category::all();
        $rules = array(
            'book_id' => 'required|unique:books',
            'book_name' => 'required',
            'book_publisher' => 'required',
            'book_author' => 'required',
            'book_published' => 'required',
            'book_price' => 'required',
            'book_stock' => 'required',
            'category_id' => 'required',
        );

        $validation = Validator::make(Input::all(), $rules);

        if($validation->fails())
        {
            Alert::error('Error Message', 'ID Already Taken!');
            return redirect('/books');
        }
        else
        {
            $book = new Books;
            Books::create($request->all());
            Cache::flush();
            Alert::success('Success Message', 'Success Add Book');
            return redirect('/books');
        }
    }

    public function update(request $request, $id)
    {
        $book = Books::findOrFail($id);

        $rules = array(
            'book_name' => 'required',
            'book_publisher' => 'required',
            'book_author' => 'required',
            'book_published' => 'required',
            'book_price' => 'required',
            'book_stock' => 'required',
            'category_id' => 'required',
        );

        $validation = Validator::make(Input::all(), $rules);

        if($validation->fails())
        {
            Alert::error('Error Message', 'Please Fill The Form Correctly!');
            return redirect('/books');
        }
        else
        {
            $book->update($request->all());
            Cache::flush();
            Alert::success('Success Message', 'Success Edit Book');
            return redirect('/books');
        }
    }

    public function softDelete($id)
    {
        $book = Books::where('book_id',$id);
        $book->delete();
        Cache::flush();
        Alert::success('Success Message', 'Success Delete Book');
        return redirect('books');
    }

    public function userView()
    {
        $category = Cache::rememberForever('category', function() {
            return Category::onlyTrashed()->get();
        });

        $book = Cache::rememberForever('books', function() {
            return Books::onlyTrashed()->get();
        });
        
        return view('frontpage.book', compact('book', 'category'));
    }
}
