<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProject;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('admin.projects.index');
    }

    public function create()
    {
        $categories = ProjectCategory::all(['id', 'name']);

        return view('admin.projects.create', compact('categories'));
    }

    public function store(RequestProject $request)
    {
        $data = $request->validated();
        $imagePath = handleUpload('image');

        $data['image'] = $imagePath;

        Project::create($data);

        toastr()->success('Project created successfully!');
        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::all(['id', 'name']);

        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(RequestProject $request, Project $project)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            deleteFileIfExist($project->image);
            $imagePath = handleUpload('image');
            $data['image'] = $imagePath;
        }

        $project->update($data);

        toastr()->success('Project updated successfully!');
        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project)
    {
        deleteFileIfExist($project->image);
        $project->delete();

        toastr()->success('Project deleted successfully!');
        return redirect()->route('admin.projects.index');
    }
}
