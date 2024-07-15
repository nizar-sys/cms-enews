<?php

namespace App\Http\Controllers\McaNepal;

use App\Http\Controllers\Admin\ExecutiveSectionSettingController;
use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\DirectorSectionSetting;
use App\Models\ExecutiveSectionSetting;
use App\Models\ExecutiveTeam;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ExecutiveTeamController extends Controller
{
    public function index($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $sectionSetting = ExecutiveSectionSetting::first();

        $executives = ExecutiveTeam::with('designation')->get();

        return view('frontends.mca-nepal.executive-teams', compact('projectCategories', 'sectionSetting', 'executives'));
    }
}
