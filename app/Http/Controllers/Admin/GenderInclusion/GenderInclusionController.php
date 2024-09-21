<?php

namespace App\Http\Controllers\Admin\GenderInclusion;

use App\DataTables\GenderInclusionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreGenderInclusion;
use App\Models\GenderInclusion;
use App\Models\GenderInclusionCategory;
use Illuminate\Http\Request;

class GenderInclusionController extends Controller
{
    public function index(GenderInclusionDataTable $dataTable)
    {
        return $dataTable->render('admin.gender-inclusion.index');
    }

    public function create()
    {
        $categories = GenderInclusionCategory::latest()->get(['id', 'name']);

        return view('admin.gender-inclusion.create', compact('categories'));
    }

    public function store(RequestStoreGenderInclusion $request)
    {
        $payloadInclusion = $request->validated();
        $payloadInclusion['thumbnail'] = handleUpload('thumbnail');

        GenderInclusion::create($payloadInclusion);

        toastr()->success('Gender Inclusion created successfully!');
        return redirect()->route('admin.gender-inclusion.index');
    }

    public function edit(GenderInclusion $inclusion)
    {
        $categories = GenderInclusionCategory::latest()->get(['id', 'name']);

        return view('admin.gender-inclusion.edit', compact('inclusion', 'categories'));
    }

    public function update(RequestStoreGenderInclusion $request, GenderInclusion $inclusion)
    {
        $payloadInclusion = $request->validated();

        if ($request->hasFile('thumbnail')) {
            deleteFileIfExist($inclusion->thumbnail);
            $payloadInclusion['thumbnail'] = handleUpload('thumbnail');
        }

        if ($request->filled('status')) {
            $payloadInclusion['status'] = $request->status;
        }

        $inclusion->update($payloadInclusion);

        toastr()->success('Gender Inclusion updated successfully!');
        return redirect()->route('admin.gender-inclusion.index');
    }

    public function destroy(GenderInclusion $inclusion)
    {
        deleteFileIfExist($inclusion->thumbnail);
        $inclusion->delete();

        toastr()->success('Gender Inclusion updated successfully!');
        return redirect()->route('admin.gender-inclusion.index');
    }
}
