<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Article;
use App\Category;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
      $articles = Article::latest()->paginate(3);
      return view("articles.index",compact('articles'));
    }

    public function add()
    {
      $categories = Category::all();
      return view("articles.add",compact('categories'));
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        Article::add($request,$user_id);
        return redirect()->route("articles.index")->with("success","Your Article is successfully posted !");
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view("articles.detail",compact("article"));
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if( Gate::allows('article-delete', $article) ) {
          $article->delete();
          return back()->with('success','Your Article is successfully deleted !');
        } else {
          return back()->with('error', 'Unauthorize');
        }
    }
}
