<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\faq;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Fetch project categories
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        // Fetch FAQs and translate question & answer
        $faqs = FAQ::all()->map(function ($faq) {
            $faq->question = translate($faq->question, app()->getLocale()); // Translate question
            $faq->answer = translate($faq->answer, app()->getLocale()); // Translate answer
            return $faq;
        });

        return view('frontends.faq', compact('projectCategories', 'faqs'));
    }

}
