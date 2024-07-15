<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PressReleaseDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PressRelease;

class PressReleaseController extends Controller
{
    public function index(PressReleaseDataTable $datatable) {
        return $datatable->render('admin.press-release.index');
    }

    public function create() {
        return view('admin.press-release.create');
    }

    public function store(Request $request) {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
        ]);


        $file = $request->file('file');
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filePath = handleUpload('file');

        PressRelease::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);


        toastr()->success('Press Release created successfully', 'Success');
        return redirect()->route('admin.press-release.index');
    }

    public function edit($id) {
        $pressRelease = PressRelease::findOrFail($id);
        return view('admin.press-release.edit', compact('pressRelease'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
        ]);

        $pressRelease = PressRelease::findOrFail($id);
        $file = $request->file('file');
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filePath = handleUpload('file');

        $pressRelease->update([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        toastr()->success('Press Release updated successfully', 'Success');
        return redirect()->route('admin.press-release.index');
    }

    public function destroy($id) {
        $pressRelease = PressRelease::findOrFail($id);
        deleteFileIfExist($pressRelease->file_path);
        $pressRelease->delete();
    }
}
