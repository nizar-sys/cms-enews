<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WaterSanitationDataTable;
use App\Http\Controllers\Controller;
use App\Models\WaterSanitation;
use Illuminate\Http\Request;

class WaterSanitationController extends Controller
{
    public function index(WaterSanitationDataTable $dataTable)
    {
        return $dataTable->render('admin.water-sanitation.index');
    }

    public function create()
    {
        return view('admin.water-sanitation.create');
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

        WaterSanitation::create($payload);

        toastr()->success('Water Sanitation Created Successfully', 'Congrats');
        return redirect()->route('admin.water-sanitation.index');
    }

    public function edit($id)
    {
        $waterSanitation = WaterSanitation::findOrFail($id);
        return view('admin.water-sanitation.edit', compact('waterSanitation'));
    }

    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'image' => ['nullable', 'image'],
            'file' => ['nullable', 'file'],
        ]);

        $waterSanitation = WaterSanitation::findOrFail($id);

        $payload['image'] = $waterSanitation->image;
        $payload['file'] = $waterSanitation->file;

        if ($request->hasFile('image')) {
            deleteFileIfExist($waterSanitation->image);
            $payload['image'] = handleUpload('image');
        }

        if ($request->hasFile('file')) {
            deleteFileIfExist($waterSanitation->file);
            $payload['file'] = handleUpload('file');
        }

        $waterSanitation->update($payload);

        toastr()->success('Water Sanitation Updated Successfully', 'Congrats');
        return redirect()->route('admin.water-sanitation.index');
    }

    public function destroy($id)
    {
        $waterSanitation = WaterSanitation::findOrFail($id);
        deleteFileIfExist($waterSanitation->image);
        deleteFileIfExist($waterSanitation->file);
        $waterSanitation->delete();
    }
}
