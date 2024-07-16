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
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $faqs = faq::all();

        return view('frontends.faq', compact('projectCategories', 'faqs'));
    }
}
