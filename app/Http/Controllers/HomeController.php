<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Article;

class HomeController extends Controller
{
    // В HomeController
    public function index()
    {

        $locale = app()->getLocale();
        $histories = History::all();

        return view('pages.index', ['histories' => $histories, 'locale' => $locale]);
    }

    public function about()
    {
        return view('pages.about', ['headerClass' => 'about-header']);
    }

    public function services()
    {
        app()->setlocale('uz');

        $articles = Article::all();

        return view('pages.services', [
            'headerClass' => 'about-header',
            'articles' => $articles
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function cases()
    {
        return view('pages.cases', ['headerClass' => 'about-header']);
    }

    public function blog()
    {
        $locale = app()->getLocale();
        $articles = Article::get();
        $article_filters = $articles->map(function ($article) use ($locale) {
            return $article->translate($locale);
        })->pluck('type');

        return view('pages.blog', ['articles' => $articles, 'article_filters' => $article_filters, 'locale' => $locale]);
    }
}
