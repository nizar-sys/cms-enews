<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;

class HomeController extends Controller
{
    public function index()
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        return view('frontends.home', compact('projectCategories'));
    }

    public function projectCategory($locale, $slug)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $projectCategory = ProjectCategory::where('slug', $slug)->firstOrFail();

        return view('frontends.project_category', compact('projectCategory', 'projectCategories'));
    }
}
