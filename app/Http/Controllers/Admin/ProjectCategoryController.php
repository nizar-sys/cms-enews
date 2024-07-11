<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProjectCategory;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index(ProjectCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.projects.categories.index');
    }

    public function create()
    {
        return view('admin.projects.categories.create');
    }

    public function store(RequestProjectCategory $request)
    {
        ProjectCategory::create($request->validated());

        toastr()->success('Project category created successfully');
        return redirect()->route('admin.project-categories.index');
    }

    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.projects.categories.edit', compact('projectCategory'));
    }

    public function update(RequestProjectCategory $request, ProjectCategory $projectCategory)
    {
        $projectCategory->update($request->validated());

        toastr()->success('Project category updated successfully');
        return redirect()->route('admin.project-categories.index');
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();

        toastr()->success('Project category deleted successfully');
        return redirect()->route('admin.project-categories.index');
    }
}
