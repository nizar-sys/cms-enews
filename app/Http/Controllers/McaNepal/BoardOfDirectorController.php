<?php

namespace App\Http\Controllers\McaNepal;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\DirectorSectionSetting;
use App\Models\DocumentCategory;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class BoardOfDirectorController extends Controller
{
    public function index($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $sectionSetting = DirectorSectionSetting::first();
        $directors = Director::all();

        $documentCategory = DocumentCategory::with('documentFiles')->withCount('documentFiles')->where('slug', 'board-meeting-minutes')->first();

        return view('frontends.mca-nepal.board-of-directors', compact('projectCategories', 'sectionSetting', 'directors', 'documentCategory'));
    }
}
