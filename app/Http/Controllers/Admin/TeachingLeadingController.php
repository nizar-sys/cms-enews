<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TeachingLeadingDataTable;
use App\Http\Controllers\Controller;
use App\Models\TeachingLeading;
use Illuminate\Http\Request;

class TeachingLeadingController extends Controller
{
    public function index(TeachingLeadingDataTable $dataTable)
    {
        return $dataTable->render('admin.teaching-leading.index');
    }

    public function create()
    {
        return view('admin.teaching-leading.create');
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'image' => ['nullable', 'image'],
            'file' => ['nullable', 'file'],
        ]);

        if ($request->hasFile('image')) {
            $payload['image'] = handleUpload('image');
        }

        if ($request->hasFile('file')) {
            $payload['file'] = handleUpload('file');
        }

        TeachingLeading::create($payload);

        toastr()->success('Teaching & Leading Created Successfully', 'Congrats');
        return redirect()->route('admin.teaching-leading.index');
    }

    public function edit($id)
    {
        $teachingLeading = TeachingLeading::findOrFail($id);
        return view('admin.teaching-leading.edit', compact('teachingLeading'));
    }

    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'image' => ['nullable', 'image'],
            'file' => ['nullable', 'file'],
        ]);

        $teachingLeading = TeachingLeading::findOrFail($id);

        $payload['image'] = $teachingLeading->image;
        $payload['file'] = $teachingLeading->file;

        if ($request->hasFile('image')) {
            deleteFileIfExist($teachingLeading->image);
            $payload['image'] = handleUpload('image');
        }

        if ($request->hasFile('file')) {
            deleteFileIfExist($teachingLeading->file);
            $payload['file'] = handleUpload('file');
        }

        $teachingLeading->update($payload);

        toastr()->success('Teaching & Leading Updated Successfully', 'Congrats');
        return redirect()->route('admin.teaching-leading.index');
    }

    public function destroy($id)
    {
        $teachingLeading = TeachingLeading::findOrFail($id);
        deleteFileIfExist($teachingLeading->image);
        deleteFileIfExist($teachingLeading->file);
        $teachingLeading->delete();
    }
}
