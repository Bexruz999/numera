<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Frame;
use App\Models\History;
use App\Models\Question;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Article;

class HomeController extends Controller
{
    public function __construct()
    {
        $settings = [];

        $locale = app()->getLocale();
        foreach (Setting::all() as $setting) {
            $settings["$setting->group.$setting->name"] = $setting->translate($locale) ? $setting->translate($locale)->value : null;
        }

        view()->share('settings', $settings);
        view()->share('locale', $locale);
    }

    // В HomeController
    public function index()
    {

        $histories = History::all();
        $questions = Question::all();

        return view('pages.index', ['histories' => $histories, 'questions' => $questions]);
    }

    public function about()
    {
        return view('pages.about', ['headerClass' => 'about-header']);
    }

    public function services()
    {
        $articles = Article::all();
        $frames = Frame::all();

        return view('pages.services', [
            'headerClass' => 'about-header',
            'articles' => $articles,
            'frames' => $frames,
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
        })->pluck('type', 'type');

        return view('pages.blog', ['articles' => $articles, 'article_filters' => $article_filters]);
    }
}
