<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SocialBehaviour;
use App\Models\SocialBehaviourSectionSetting;
use Illuminate\Http\Request;

class SocialBehaviourController extends Controller
{
    public function index($locale)
    {
        $socialBehaviours = SocialBehaviour::published()->with('author')->orderBy('created_at', 'desc')->get();
        $sectionSetting = SocialBehaviourSectionSetting::first();

        return view('frontends.social-behaviours.index', compact('socialBehaviours', 'sectionSetting'));
    }

    public function show($locale, $id)
    {
        $socialBehaviour = SocialBehaviour::where('id', $id)->firstOrFail();


        $nextPost = SocialBehaviour::where('id', '>', $socialBehaviour->id)->orderBy('id', 'asc')->first();
        $prevPost = SocialBehaviour::where('id', '<', $socialBehaviour->id)->orderBy('id', 'desc')->first();
        $latestPost = SocialBehaviour::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();
        $sectionSetting = SocialBehaviourSectionSetting::first();
        return view('frontends.social-behaviours.show', compact('socialBehaviour', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting'));
    }
}
