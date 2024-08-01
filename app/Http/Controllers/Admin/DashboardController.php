<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'count_post' => Post::count(),
            'count_news' => News::count(),
            'count_article' => Article::count(),
            'count_user' => User::count(),
        ];

        return view('admin.dashboard', compact('data'));
    }
}