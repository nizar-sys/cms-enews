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
        // Fetch and translate project categories
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        foreach ($projectCategories as $projectCategory) {
            $projectCategory->name = translate($projectCategory->name, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = ExecutiveSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale);
        }

        // Fetch and translate executive teams
        $executives = ExecutiveTeam::with('designation')->get();
        foreach ($executives as $executive) {
            if ($executive) {
                $executive->description = translate($executive->description, $locale);

                // Translate executive's designation
                if ($executive->designation && $executive->designation->designation) {
                    $executive->designation->designation = translate($executive->designation->designation, $locale);
                }
            }
        }

        return view('frontends.mca-nepal.executive-teams', compact('projectCategories', 'sectionSetting', 'executives'));
    }

}
