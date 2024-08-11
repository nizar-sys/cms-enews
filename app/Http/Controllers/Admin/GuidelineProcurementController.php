<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\GuidelineProcurementDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestGuidelineProcurement;
use App\Models\GuidelineProcurement;
use Illuminate\Http\Request;

class GuidelineProcurementController extends Controller
{
    public function index(GuidelineProcurementDataTable $dataTable)
    {
        return $dataTable->render('admin.procurements.guidelines.index');
    }

    public function create()
    {
        return view('admin.procurements.guidelines.create');
    }

    public function store(RequestGuidelineProcurement $request)
    {
        GuidelineProcurement::create([
            'file_name' => $request->filled('file_name') ? $request->file_name : pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME),
            'file_path' => handleUpload('file'),
            'category' => $request->category,
        ]);

        toastr()->success('Guideline Procurement created successfully');
        return redirect()->route('admin.procurements-guidelines.index');
    }

    public function edit(GuidelineProcurement $procurementsGuideline)
    {
        return view('admin.procurements.guidelines.edit', compact('procurementsGuideline'));
    }

    public function update(RequestGuidelineProcurement $request, GuidelineProcurement $procurementsGuideline)
    {
        $filePath = $procurementsGuideline->file_path;
        $fileName = $request->filled('file_name') ? $request->file_name : pathinfo(asset($procurementsGuideline->file_path), PATHINFO_FILENAME);

        if ($request->hasFile('file')) {
            deleteFileIfExist($filePath);
            $filePath = handleUpload('file');
            $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
        }

        $procurementsGuideline->update([
            'file_name' => $fileName,
            'file_path' => $filePath,
            'category' => $request->category,
        ]);

        toastr()->success('Guideline Procurement updated successfully');
        return redirect()->route('admin.procurements-guidelines.index');
    }

    public function destroy(GuidelineProcurement $procurementsGuideline)
    {
        deleteFileIfExist($procurementsGuideline->file_path);
        $procurementsGuideline->delete();

        toastr()->success('Guideline Procurement deleted successfully');
        return redirect()->route('admin.procurements-guidelines.index');
    }
}
