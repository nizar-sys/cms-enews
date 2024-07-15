<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContractAwardNoticeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestContractAwardNotice;
use App\Models\ContractAwardNotice;
use Illuminate\Http\Request;

class ContractAwardNoticeController extends Controller
{
    public function index(ContractAwardNoticeDataTable $dataTable)
    {
        return $dataTable->render('admin.procurements.contract_award_notice.index');
    }

    public function create()
    {
        return view('admin.procurements.contract_award_notice.create');
    }

    public function store(RequestContractAwardNotice $request)
    {
        ContractAwardNotice::create([
            'file_name' => $request->filled('file_name') ? $request->file_name : pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME),
            'file_path' => handleUpload('file'),
            'posted_on' => $request->posted_on,
        ]);

        toastr()->success('Contract award notice created successfully');
        return redirect()->route('admin.procurements-contract-award-notices.index');
    }

    public function edit(ContractAwardNotice $contractAwardNotice)
    {
        return view('admin.procurements.contract_award_notice.edit', compact('contractAwardNotice'));
    }

    public function update(RequestContractAwardNotice $request, ContractAwardNotice $contractAwardNotice)
    {
        $filePath = $contractAwardNotice->file_path;
        $fileName = $request->filled('file_name') ? $request->file_name : pathinfo(asset($contractAwardNotice->file_path), PATHINFO_FILENAME);

        if ($request->hasFile('file')) {
            deleteFileIfExist($filePath);
            $filePath = handleUpload('file');
            $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
        }

        $contractAwardNotice->update([
            'file_name' => $fileName,
            'file_path' => $filePath,
            'posted_on' => $request->posted_on,
        ]);

        toastr()->success('Contract award notice updated successfully');
        return redirect()->route('admin.procurements-contract-award-notices.index');
    }

    public function destroy(ContractAwardNotice $contractAwardNotice)
    {
        deleteFileIfExist($contractAwardNotice->file_path);
        $contractAwardNotice->delete();

        toastr()->success('Contract award notice deleted successfully');
        return redirect()->route('admin.procurements-contract-award-notices.index');
    }
}
