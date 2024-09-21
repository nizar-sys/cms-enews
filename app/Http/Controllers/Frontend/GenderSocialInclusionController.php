<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GenderInclusion;
use App\Models\GenderInclusionSectionSetting;
use Illuminate\Http\Request;

class GenderSocialInclusionController extends Controller
{
    public function index($locale)
    {
        $genderInclusions = GenderInclusion::published()->with('author')->orderBy('created_at', 'desc')->get();
        $sectionSetting = GenderInclusionSectionSetting::first();

        return view('frontends.gender-inclusions.index', compact('genderInclusions', 'sectionSetting'));
    }

    public function show($locale, $id)
    {
        $genderInclusion = GenderInclusion::where('id', $id)->firstOrFail();

        $nextPost = GenderInclusion::where('id', '>', $genderInclusion->id)->orderBy('id', 'asc')->first();
        $prevPost = GenderInclusion::where('id', '<', $genderInclusion->id)->orderBy('id', 'desc')->first();
        $latestPost = GenderInclusion::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();
        $sectionSetting = GenderInclusionSectionSetting::first();
        return view('frontends.gender-inclusions.show', compact('genderInclusion', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting'));
    }
}
