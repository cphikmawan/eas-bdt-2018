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

class CategoryController extends Controller
{
    public function index()
    {
        $category = Cache::rememberForever('category', function() {
            return Category::all();
        });
        return view('dashboard.category', compact('category'));
    }

    public function store(request $request)
    {
        $category = Category::all();
        $rules = array(
            'category_id' => 'required|unique:category',
            'category_name' => 'required',
        );

        $validation = Validator::make(Input::all(), $rules);

        if($validation->fails())
        {
            Alert::error('Error Message', 'ID Already Taken!');
            return redirect('/category');
        }
        else
        {
            $category = new Category;
            Category::create($request->all());
            Cache::flush();
            Alert::success('Success Message', 'Success Add Category');
            return redirect('/category');
        }
    }

    public function update(request $request, $id)
    {
        $category = Category::findOrFail($id);

        $rules = array(
            'category_name' => 'required',
        );

        $validation = Validator::make(Input::all(), $rules);

        if($validation->fails())
        {
            Alert::error('Error Message', 'Please Fill The Form Correctly!');
            return redirect('/category');
        }
        else
        {
            $category->update($request->all());
            Cache::flush();
            Alert::success('Success Message', 'Success Edit Category');
            return redirect('/category')->with('success', 'Success Edit Category');
        }
    }

    public function softDelete($id)
    {
        $category = Category::where('category_id',$id);
        $category->delete();
        Cache::flush();
        Alert::success('Success Message', 'Success Delete Category');
        return redirect('category');
    }
}
