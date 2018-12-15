<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function()
{
    return view('frontpage.index');
});

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => ['web','auth']],function()
{
	Route::get('/home', function()
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
	});
});

Route::group(['middleware' => ['web', 'auth', 'admin']], function()
{
    Route::get('/books','BooksController@index');
    Route::post('/books/{id}/update', 'BooksController@update');
    Route::post('/books/{id}', 'BooksController@softDelete');
    Route::resource('books','BooksController')->only([
        'store'
    ]);

    Route::get('/category','CategoryController@index');
    Route::post('/category/{id}/update', 'CategoryController@update');
    Route::post('/category/{id}', 'CategoryController@softDelete');
    Route::resource('category','CategoryController')->only([
        'store'
    ]);

    Route::get('/trash','TrashController@index');
    Route::post('/bookrestore/{id}','TrashController@bookRestore');
    Route::post('/categoryrestore/{id}','TrashController@categoryRestore');
    
});

Route::get('/viewbook','BooksController@userView');

// mongodb
Route::get('/pagelist','PageController@index');
Route::get('/createpage','PageController@create');
Route::post('/savepage','PageController@store');
Route::get('/pagerank','PageController@ranking');
Route::get('/thepages/{id}','PageController@pages');