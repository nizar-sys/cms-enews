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
        // Fetch and translate the GenderInclusion posts
        $genderInclusions = GenderInclusion::published()->with('author')->orderBy('created_at', 'desc')->get();

        // Translate the title column for each genderInclusion post
        foreach ($genderInclusions as $inclusion) {
            $inclusion->title = translate($inclusion->title, $locale); // Translate the title
        }

        // Fetch and translate the section setting
        $sectionSetting = GenderInclusionSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale); // Translate section setting title
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.gender-inclusions.index', compact('genderInclusions', 'sectionSetting'));
    }

    public function show($locale, $id)
    {
        // Fetch and translate the selected GenderInclusion post
        $genderInclusion = GenderInclusion::where('id', $id)->firstOrFail();
        $genderInclusion->title = translate($genderInclusion->title, $locale); // Translate title
        $genderInclusion->content = translate($genderInclusion->content, $locale); // Translate content

        // Fetch and translate the next GenderInclusion post
        $nextPost = GenderInclusion::where('id', '>', $genderInclusion->id)->orderBy('id', 'asc')->first();
        if ($nextPost) {
            $nextPost->title = translate($nextPost->title, $locale); // Translate next post title
        }

        // Fetch and translate the previous GenderInclusion post
        $prevPost = GenderInclusion::where('id', '<', $genderInclusion->id)->orderBy('id', 'desc')->first();
        if ($prevPost) {
            $prevPost->title = translate($prevPost->title, $locale); // Translate previous post title
        }

        // Fetch and translate the latest GenderInclusion posts (for the sidebar or related posts section)
        $latestPost = GenderInclusion::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestPost as $post) {
            $post->title = translate($post->title, $locale); // Translate each latest post title
        }

        // Fetch and translate section setting
        $sectionSetting = GenderInclusionSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale); // Translate section setting title
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.gender-inclusions.show', compact('genderInclusion', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting'));
    }

}
