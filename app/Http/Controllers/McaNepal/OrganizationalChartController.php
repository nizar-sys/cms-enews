<?php

namespace App\Http\Controllers\McaNepal;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalChartSectionSetting;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class OrganizationalChartController extends Controller
{
    public function index($locale)
    {
        // Fetch and translate project categories
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        foreach ($projectCategories as $projectCategory) {
            $projectCategory->name = translate($projectCategory->name, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = OrganizationalChartSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.mca-nepal.organizational-chart', compact('projectCategories', 'sectionSetting'));
    }

}
