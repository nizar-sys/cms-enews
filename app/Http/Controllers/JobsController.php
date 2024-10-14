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
        // Fetch project categories
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        // Fetch section setting and translate title & description
        $sectionSetting = JobSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale); // Translate section setting title
            $sectionSetting->description = translate($sectionSetting->description, $locale); // Translate section setting description
        }

        // Fetch job lists and translate position, vacancy_deadline, & current_status
        $jobLists = JobList::all()->map(function ($job) use ($locale) {
            $job->position = translate($job->position, $locale); // Translate position
            $job->vacancy_deadline = translate($job->vacancy_deadline, $locale); // Translate vacancy_deadline
            $job->current_status = translate($job->current_status, $locale); // Translate current_status
            return $job;
        });

        return view('frontends.jobs', compact('projectCategories', 'sectionSetting', 'jobLists'));
    }

}
