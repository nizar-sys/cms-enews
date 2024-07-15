<?php

namespace App\Http\Controllers;

use App\Models\JobList;
use App\Models\JobSectionSetting;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $sectionSetting = JobSectionSetting::first();
        $jobLists = JobList::all();

        return view('frontends.jobs', compact('projectCategories', 'sectionSetting', 'jobLists'));
    }
}
