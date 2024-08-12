<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DownloadLogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\DownloadLog;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(DownloadLogDataTable $dataTable)
    {
        $data = [
            'count_post' => Post::count(),
            'count_news' => News::count(),
            'count_article' => Article::count(),
            'count_user' => User::count(),
            'count_visitor' => Visitor::count(),
        ];

        return $dataTable->render('admin.dashboard', compact('data'));
    }
}
