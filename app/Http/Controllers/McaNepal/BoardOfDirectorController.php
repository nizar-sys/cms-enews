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
        // Fetch and translate project categories
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        foreach ($projectCategories as $projectCategory) {
            $projectCategory->name = translate($projectCategory->name, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = DirectorSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale);
        }

        // Fetch and translate directors
        $directors = Director::all();
        foreach ($directors as $director) {
            if ($director) {
                $director->description = translate($director->description, $locale);

                // Translate director's designation
                if ($director->designation && $director->designation->designation) {
                    $director->designation->designation = translate($director->designation->designation, $locale);
                }
            }
        }

        // Fetch and translate document category and related files
        $documentCategory = DocumentCategory::with('documentFiles')
            ->withCount('documentFiles')
            ->where('slug', 'board-meeting-minutes')
            ->first();

        if ($documentCategory) {
            $documentCategory->name = translate($documentCategory->name, $locale);

            // Translate document file names
            foreach ($documentCategory->documentFiles as $file) {
                $file->file_name = translate($file->file_name, $locale);
            }
        }

        return view('frontends.mca-nepal.board-of-directors', compact('projectCategories', 'sectionSetting', 'directors', 'documentCategory'));
    }

}
