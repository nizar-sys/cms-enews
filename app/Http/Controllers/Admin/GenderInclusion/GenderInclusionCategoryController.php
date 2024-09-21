<?php

namespace App\Http\Controllers\Admin\GenderInclusion;

use App\DataTables\GenderInclusionCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreGenderCategory;
use App\Models\GenderInclusion;
use App\Models\GenderInclusionCategory;
use Illuminate\Http\Request;

class GenderInclusionCategoryController extends Controller
{
    public function index(GenderInclusionCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.gender-inclusion.category.index');
    }

    public function create()
    {
        return view('admin.gender-inclusion.category.create');
    }

    public function store(RequestStoreGenderCategory $request)
    {
        GenderInclusionCategory::create($request->validated());

        toastr()->success('Gender Inclusion Category created successfully');
        return redirect()->route('admin.gender-inclusion-category.index');
    }

    public function edit(GenderInclusionCategory $category)
    {
        return view('admin.gender-inclusion.category.edit', compact('category'));
    }

    public function update(RequestStoreGenderCategory $request, GenderInclusionCategory $category)
    {
        $category->update($request->validated());

        toastr()->success('Gender Inclusion Category created successfully');
        return redirect()->route('admin.gender-inclusion-category.index');
    }

    public function destroy(GenderInclusionCategory $category)
    {
        $category->delete();

        toastr()->success('Gender Inclusion Category created successfully');
        return redirect()->route('admin.gender-inclusion-category.index');
    }
}
