<?php

namespace App\Http\Controllers;

use App\Article; //Model

class ArticlesController extends Controller
{
    public function index() {
        $articles = Article::where('state','yat')->get();
        $articles0 = Article::where('state','done')->get();
        return view('articles.index', compact('articles','articles0'));
    }
     
    public function show($id) {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}