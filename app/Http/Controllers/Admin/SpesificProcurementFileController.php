<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSpesificProcurementFile;
use App\Models\SpesificProcurement;
use App\Models\SpesificProcurementFile;
use Illuminate\Http\Request;

class SpesificProcurementFileController extends Controller
{
    public function create(SpesificProcurement $spesificProcurementsNotice)
    {
        return view('admin.procurements.spesific.files.create', compact('spesificProcurementsNotice'));
    }

    public function store(RequestSpesificProcurementFile $request, SpesificProcurement $spesificProcurementsNotice)
    {
        $validated = $request->validated();

        $file = $validated['file'];
        $fileName = $request->filled('file_name') ? $validated['file_name'] : pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filePath = handleUpload('file');

        $spesificProcurementsNotice->files()->create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        toastr()->success('Spesific procurement file created successfully');
        return redirect()->route('admin.spesific-procurements-notices.show', $spesificProcurementsNotice->id);
    }

    public function edit(SpesificProcurement $spesificProcurementsNotice, SpesificProcurementFile $file)
    {
        return view('admin.procurements.spesific.files.edit', compact('spesificProcurementsNotice', 'file'));
    }

    public function update(RequestSpesificProcurementFile $request, SpesificProcurement $spesificProcurementsNotice, SpesificProcurementFile $file)
    {
        $validated = $request->validated();

        $fileName = $request->filled('file_name') ? $validated['file_name'] : $file->file_name;
        $filePath = $file->file_path;

        if ($request->hasFile('file')) {
            deleteFileIfExist($file->file_path);
            $file = $validated['file'];
            $fileName = $request->filled('file_name') ? $validated['file_name'] : pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filePath = handleUpload('file');
        }

        $file->update([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        $file->spesificProcurement->update([
            'updated_at' => now(),
        ]);

        toastr()->success('Spesific procurement file updated successfully');
        return redirect()->route('admin.spesific-procurements-notices.show', $spesificProcurementsNotice->id);
    }

    public function destroy(SpesificProcurement $spesificProcurementsNotice, SpesificProcurementFile $file)
    {
        deleteFileIfExist($file->file_path);
        $file->delete();

        toastr()->success('Spesific procurement file deleted successfully');
        return redirect()->route('admin.spesific-procurements-notices.show', $spesificProcurementsNotice->id);
    }
}
