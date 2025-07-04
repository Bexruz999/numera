<?php

namespace App\Http\Controllers;


use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::active()->ordered()->get();
        return view('faqs.index', compact('faqs'));
    }

    public function admin()
    {
        $faqs = Faq::ordered()->get();
        return view('faqs.admin', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string|max:1000',
        ]);

        $maxOrder = Faq::max('order') ?? 0;

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $maxOrder + 1,
            'is_active' => true
        ]);

        return redirect()->back()->with('success', 'FAQ добавлен успешно!');
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string|max:1000',
        ]);

        $faq->update($request->only(['question', 'answer']));

        return redirect()->back()->with('success', 'FAQ обновлен успешно!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('success', 'FAQ удален успешно!');
    }

    public function toggle(Faq $faq)
    {
        $faq->update(['is_active' => !$faq->is_active]);
        return redirect()->back()->with('success', 'Статус FAQ изменен!');
    }
}
