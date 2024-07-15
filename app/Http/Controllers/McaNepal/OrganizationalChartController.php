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
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $sectionSetting = OrganizationalChartSectionSetting::first();

        return view('frontends.mca-nepal.organizational-chart', compact('projectCategories', 'sectionSetting'));
    }
}
