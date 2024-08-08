<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdministrativeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Administrative;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{
    public function index(AdministrativeDataTable $dataTable)
    {
        return $dataTable->render('admin.administrative.index');
    }

    public function create()
    {
        return view('admin.administrative.create');
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

        Administrative::create($payload);

        toastr()->success('Teaching & Leading Created Successfully', 'Congrats');
        return redirect()->route('admin.administrative.index');
    }

    public function edit($id)
    {
        $administrative = Administrative::findOrFail($id);
        return view('admin.administrative.edit', compact('administrative'));
    }

    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'image' => ['nullable', 'image'],
            'file' => ['nullable', 'file'],
        ]);

        $administrative = Administrative::findOrFail($id);

        $payload['image'] = $administrative->image;
        $payload['file'] = $administrative->file;

        if ($request->hasFile('image')) {
            deleteFileIfExist($administrative->image);
            $payload['image'] = handleUpload('image');
        }

        if ($request->hasFile('file')) {
            deleteFileIfExist($administrative->file);
            $payload['file'] = handleUpload('file');
        }

        $administrative->update($payload);

        toastr()->success('Teaching & Leading Updated Successfully', 'Congrats');
        return redirect()->route('admin.administrative.index');
    }

    public function destroy($id)
    {
        $administrative = Administrative::findOrFail($id);
        deleteFileIfExist($administrative->image);
        deleteFileIfExist($administrative->file);
        $administrative->delete();
    }
}
