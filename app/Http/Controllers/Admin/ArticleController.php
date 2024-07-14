<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DataTables\ArticleDataTable;
use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function index(ArticleDataTable $datatable) {
        return $datatable->render('admin.article.index');
    }

    public function create() {
        $categories = ArticleCategory::all(['id', 'category_name']);
        return view('admin.article.create', compact('categories'));
    }

    public function store(Request $request) {
        
        $request->validate([
            'title' => ['required', 'max:200'],
            'article_url' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
        ]);

        Article::create($request->only('title', 'description', 'category_id', 'article_url'));

        toastr()->success('Article Created Successfully', 'Congrats');
        return redirect()->route('admin.article.index');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        $categories = ArticleCategory::all(['id', 'category_name']);
        return view('admin.article.edit', compact(['article', 'categories']));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'category_id' => ['required'],
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->only('title', 'description', 'category_id'));

        toastr()->success('Article Updated Successfully', 'Congrats');
        return redirect()->route('admin.article.index');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
    }
}
