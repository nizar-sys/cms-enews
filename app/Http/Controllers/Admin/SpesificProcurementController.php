<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SpesificProcurementDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSpesificProcurement;
use App\Models\SpesificProcurement;
use Illuminate\Http\Request;

class SpesificProcurementController extends Controller
{
    public function index(SpesificProcurementDataTable $dataTable)
    {
        return $dataTable->render('admin.procurements.spesific.index');
    }

    public function create()
    {
        return view('admin.procurements.spesific.create');
    }

    public function store(RequestSpesificProcurement $request)
    {
        SpesificProcurement::create($request->validated());

        toastr()->success('Spesific Procurement created successfully');
        return redirect()->route('admin.spesific-procurements-notices.index');
    }

    public function edit(SpesificProcurement $spesificProcurementsNotice)
    {
        return view('admin.procurements.spesific.edit', compact('spesificProcurementsNotice'));
    }

    public function show(SpesificProcurement $spesificProcurementsNotice)
    {
        return view('admin.procurements.spesific.show', compact('spesificProcurementsNotice'));
    }

    public function update(RequestSpesificProcurement $request, SpesificProcurement $spesificProcurementsNotice)
    {
        $spesificProcurementsNotice->update($request->validated() + [
            'updated_at' => now(),
        ]);

        toastr()->success('Spesific Procurement updated successfully');
        return redirect()->route('admin.spesific-procurements-notices.index');
    }

    public function destroy(SpesificProcurement $spesificProcurementsNotice)
    {
        $spesificProcurementsNotice->delete();

        toastr()->success('Spesific Procurement deleted successfully');
        return redirect()->route('admin.spesific-procurements-notices.index');
    }
}
