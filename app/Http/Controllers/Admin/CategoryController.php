<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreCategory;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.posts.category.index');
    }

    public function create()
    {
        return view('admin.posts.category.create');
    }

    public function store(RequestStoreCategory $request)
    {
        Category::create($request->validated());

        toastr()->success('Post category created successfully');
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.posts.category.edit', compact('category'));
    }

    public function update(RequestStoreCategory $request, Category $category)
    {
        $category->update($request->validated());

        toastr()->success('Post category updated successfully');
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        toastr()->success('Post category deleted successfully');
        return redirect()->route('admin.categories.index');
    }
}
