<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\GeneralProcurementDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestGenenralProcurement;
use App\Models\GeneralProcurement;
use Illuminate\Http\Request;

class GeneralProcurementController extends Controller
{
    public function index(GeneralProcurementDataTable $dataTable)
    {
        return $dataTable->render('admin.procurements.general.index');
    }

    public function create()
    {
        return view('admin.procurements.general.create');
    }

    public function store(RequestGenenralProcurement $request)
    {
        $payloadGeneralProcurement = $request->validated();
        $payloadGeneralProcurement['file_path'] = handleUpload('file');

        GeneralProcurement::create($payloadGeneralProcurement);

        toastr()->success('General Procurement Created Successfully');
        return redirect()->route('admin.general-procurements-notices.index');
    }

    public function edit(GeneralProcurement $generalProcurementsNotice)
    {
        return view('admin.procurements.general.edit', compact('generalProcurementsNotice'));
    }

    public function update(RequestGenenralProcurement $request, GeneralProcurement $generalProcurementsNotice)
    {
        $payloadGeneralProcurement = $request->validated();

        $payloadGeneralProcurement['file_path'] = $generalProcurementsNotice->file_path;

        if ($request->hasFile('file')) {
            deleteFileIfExist($generalProcurementsNotice->file_path);
            $payloadGeneralProcurement['file_path'] = handleUpload('file');
        }

        $generalProcurementsNotice->update($payloadGeneralProcurement);

        toastr()->success('General Procurement Updated Successfully');
        return redirect()->route('admin.general-procurements-notices.index');
    }

    public function destroy(GeneralProcurement $generalProcurementsNotice)
    {
        deleteFileIfExist($generalProcurementsNotice->file_path);
        $generalProcurementsNotice->delete();

        toastr()->success('General Procurement Deleted Successfully');
        return redirect()->route('admin.general-procurements-notices.index');
    }
}
