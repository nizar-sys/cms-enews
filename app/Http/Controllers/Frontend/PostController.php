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
        $posts = Post::published()->with('author')->orderBy('created_at', 'desc')->get();
        $sectionSetting = PostSectionSetting::first();

        return view('frontends.projects.blogs', compact('posts', 'sectionSetting'));
    }
}
