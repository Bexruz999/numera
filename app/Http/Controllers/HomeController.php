<?php

namespace App\Http\Controllers;

use App\Models\Advise;
use App\Models\Consultation;
use App\Models\Consultation;
use App\Models\Faq;
use App\Models\Frame;
use App\Models\History;
use App\Models\Question;
use App\Models\Setting;
use App\Models\Article;
use App\Models\Slide;
use App\Models\Benefit;

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
        $benefits = Benefit::all();

        return view('pages.index', ['histories' => $histories, 'questions' => $questions, 'benefits' => $benefits]);
    }

    public function about()
    {
        return view('pages.about', ['headerClass' => 'about-header']);
    }

    public function services()
    {
        $articles = Article::all();
        $frames = Frame::all();
        $consultations = Consultation::all();
        $advices = Advise::take(4)->get();
        $questions = Question::all();

        $consultations = Consultation::all();

        return view('pages.services', [
            'headerClass' => 'about-header',
            'articles' => $articles,
            'frames' => $frames,
            'consultations' => $consultations,
            'advices' => $advices,
            'questions' => $questions,
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function cases()
    {
        $histories = History::all();
        $slides = Slide::all();
        return view('pages.cases', ['headerClass' => 'about-header', 'histories' => $histories, 'slides' => $slides]);
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
