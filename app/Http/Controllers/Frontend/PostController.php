<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostSectionSetting;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($locale)
    {
        // Fetch and translate the section setting
        $sectionSetting = PostSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        // Fetch and translate published posts
        $posts = Post::published()->with('author')->orderBy('created_at', 'desc')->get();

        foreach ($posts as $post) {
            if ($post) {
                // Translate the title of each post
                $post->title = translate($post->title, $locale);
                $post->content = translate($post->content, $locale); // Optionally translate content if needed
            }
        }

        return view('frontends.projects.blogs', compact('posts', 'sectionSetting'));
    }

}
