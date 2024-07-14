<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\ArticleCategoryDataTable;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    
    public function index(ArticleCategoryDataTable $dataTable)
    {   
        return $dataTable->render('admin.article.category.index');
    }

    public function create()
    {
        return view('admin.article.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required', 'max:200'],
        ]);

        ArticleCategory::create($request->only('category_name'));

        toastr()->success('Article Category Created Successfully', 'Congrats');
        return redirect()->route('admin.article.category.index');
    }

    public function edit($id)
    {
        $article_category = ArticleCategory::findOrFail($id);
        return view('admin.article.category.edit', compact('article_category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['required', 'max:200'],
        ]);

        $articleCategory = ArticleCategory::findOrFail($id);
        $articleCategory->update($request->only('category_name'));

        toastr()->success('Article Category Updated Successfully', 'Congrats');
        return redirect()->route('admin.article.category.index');
    }

    public function destroy($id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        $articleCategory->delete();
    }
}
