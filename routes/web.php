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

use Illuminate\Http\Request;

/*  GET  */

Route::get('/', function () {
    return redirect('/articles');
});

Route::get('articles', 'ArticlesController@index');

Route::get('articles/{id}', 'ArticlesController@show');

Route::get('/info',function(){ return view('info'); });

/* Route::post('/del') is Error, The page has expired due to inactivity. */

Route::get('/del', function(Request $request){
    $validator = Validator::make($request->all(), [
        'id' => 'required',
    ]);
    if ($validator->fails()) {
        return back()
            ->withInput()
            ->withErrors($validator);
    }
    App\Article::where('id', $request->id)->delete();
    return redirect('/articles');
});

Route::get('/done', function(Request $request){
    $validator = Validator::make($request->all(), [
        'id' => 'required',
    ]);
    if ($validator->fails()) {
        return back()
            ->withInput()
            ->withErrors($validator);
    }
    $article = App\Article::where('id', $request->id)->first();
    $article->state === 'yat' ? $article->state = 'done' : $article->state = 'yat';
    $article->save(); 
    return redirect('/articles');
});

/*  POST  */

Route::post('/submit', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return back()
            ->withInput()
            ->withErrors($validator);
    }
    $article = new App\Article;
    $article->name = $request->name;
    $article->state = 'yat';
    $article->save();
    return redirect('/articles');
});