<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Frame;
use App\Models\History;
use App\Models\Question;
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
        $questions = Question::all();

        return view('pages.index', ['histories' => $histories, 'locale' => $locale, 'questions' => $questions]);
    }

    public function about()
    {
        return view('pages.about', ['headerClass' => 'about-header']);
    }

    public function services()
    {

        $locale = app()->getLocale();
        $articles = Article::all();
        $frames = Frame::all();

        return view('pages.services', [
            'headerClass' => 'about-header',
            'articles' => $articles,
            'frames' => $frames,
            'locale' => $locale,
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function cases()
    {
        $histories = History::all();
        return view('pages.cases', ['headerClass' => 'about-header', 'histories' => $histories, 'locale' => app()->getLocale()]);
    }

    public function blog()
    {
        $locale = app()->getLocale();
        $articles = Article::get();
        $article_filters = $articles->map(function ($article) use ($locale) {
            return $article->translate($locale);
        })->pluck('type', 'type');

        return view('pages.blog', ['articles' => $articles, 'article_filters' => $article_filters, 'locale' => $locale]);
    }
}
