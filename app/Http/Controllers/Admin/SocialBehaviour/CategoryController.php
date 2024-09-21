<?php

namespace App\Http\Controllers\Admin\SocialBehaviour;

use App\DataTables\SocialBehaviourCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreSocialCategory;
use App\Models\SocialBehaviour;
use App\Models\SocialBehaviourCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(SocialBehaviourCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.social-behaviour.category.index');
    }

    public function create()
    {
        return view('admin.social-behaviour.category.create');
    }

    public function store(RequestStoreSocialCategory $request)
    {
        SocialBehaviourCategory::create($request->validated());

        toastr()->success('Social Behaviour Category created successfully');
        return redirect()->route('admin.social-behaviour-category.index');
    }

    public function edit(SocialBehaviourCategory $category)
    {
        return view('admin.social-behaviour.category.edit', compact('category'));
    }

    public function update(RequestStoreSocialCategory $request, SocialBehaviourCategory $category)
    {
        $category->update($request->validated());

        toastr()->success('Social Behaviour Category created successfully');
        return redirect()->route('admin.social-behaviour-category.index');
    }

    public function destroy(SocialBehaviourCategory $category)
    {
        $category->delete();

        toastr()->success('Social Behaviour Category created successfully');
        return redirect()->route('admin.social-behaviour-category.index');
    }
}
