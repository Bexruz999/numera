<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    // В HomeController
    public function index()
    {
        $recentPosts = Post::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();
        
        return view('pages.index', compact('recentPosts'));
    }

    public function about()
    {
        return view('pages.about', ['headerClass' => 'about-header']);
    }

    public function services()
    {
        return view('pages.services', ['headerClass' => 'about-header']);
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
        return view('pages.blog');
    }
}
