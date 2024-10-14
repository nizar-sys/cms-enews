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
        // Fetch and translate social behaviors
        $socialBehaviours = SocialBehaviour::published()->with('author')->orderBy('created_at', 'desc')->get();
        foreach ($socialBehaviours as $socialBehaviour) {
            $socialBehaviour->title = translate($socialBehaviour->title, $locale); // Translate the title
            // Add translation for other fields if needed
        }

        // Fetch and translate the section settings
        $sectionSetting = SocialBehaviourSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.social-behaviours.index', compact('socialBehaviours', 'sectionSetting'));
    }

    public function show($locale, $id)
    {
        // Fetch and translate the social behaviour
        $socialBehaviour = SocialBehaviour::where('id', $id)->firstOrFail();
        $socialBehaviour->title = translate($socialBehaviour->title, $locale); // Translate the title
        $socialBehaviour->content = translate($socialBehaviour->content, $locale); // Translate the content

        // Fetch and translate the next and previous posts
        $nextPost = SocialBehaviour::where('id', '>', $socialBehaviour->id)->orderBy('id', 'asc')->first();
        if ($nextPost) {
            $nextPost->title = translate($nextPost->title, $locale); // Translate the title of the next post
        }

        $prevPost = SocialBehaviour::where('id', '<', $socialBehaviour->id)->orderBy('id', 'desc')->first();
        if ($prevPost) {
            $prevPost->title = translate($prevPost->title, $locale); // Translate the title of the previous post
        }

        // Fetch and translate the latest posts
        $latestPost = SocialBehaviour::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestPost as $post) {
            $post->title = translate($post->title, $locale); // Translate the title of the latest posts
        }

        // Fetch and translate the section setting
        $sectionSetting = SocialBehaviourSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale); // Assuming there's a sub_title field
        }

        return view('frontends.social-behaviours.show', compact('socialBehaviour', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting'));
    }

}
