<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BidChallengeSystemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestBidChallengeSystem;
use App\Models\BidChallengeSystem;
use Illuminate\Http\Request;

class BidChallengeSystemController extends Controller
{
    public function index(BidChallengeSystemDataTable $dataTable)
    {
        return $dataTable->render('admin.procurements.bid_challenge_systems.index');
    }

    public function create()
    {
        return view('admin.procurements.bid_challenge_systems.create');
    }

    public function store(RequestBidChallengeSystem $request)
    {
        BidChallengeSystem::create([
            'file_name' => $request->filled('file_name') ? $request->file_name : pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME),
            'file_path' => handleUpload('file'),
        ]);

        toastr()->success('Bid Challenge System created successfully');
        return redirect()->route('admin.procurements-bid-challenge-systems.index');
    }

    public function edit(BidChallengeSystem $bidChallengeSystem)
    {
        return view('admin.procurements.bid_challenge_systems.edit', compact('bidChallengeSystem'));
    }

    public function update(RequestBidChallengeSystem $request, BidChallengeSystem $bidChallengeSystem)
    {
        $filePath = $bidChallengeSystem->file_path;
        $fileName = $request->filled('file_name') ? $request->file_name : pathinfo(asset($bidChallengeSystem->file_path), PATHINFO_FILENAME);

        if ($request->hasFile('file')) {
            deleteFileIfExist($filePath);
            $filePath = handleUpload('file');
            $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
        }

        $bidChallengeSystem->update([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        toastr()->success('Bid Challenge System updated successfully');
        return redirect()->route('admin.procurements-bid-challenge-systems.index');
    }

    public function destroy(BidChallengeSystem $bidChallengeSystem)
    {
        deleteFileIfExist($bidChallengeSystem->file_path);
        $bidChallengeSystem->delete();

        toastr()->success('Bid Challenge System deleted successfully');
        return redirect()->route('admin.procurements-bid-challenge-systems.index');
    }
}
