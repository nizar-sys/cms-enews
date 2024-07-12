<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DocumentCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestDocumentsReportsCategories;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;

class DocumentCategoryController extends Controller
{
    public function index(DocumentCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.documents_reports.categories.index');
    }

    public function create()
    {
        return view('admin.documents_reports.categories.create');
    }

    public function store(RequestDocumentsReportsCategories $request)
    {
        DocumentCategory::create($request->validated());

        toastr()->success('Document Category created successfully');
        return redirect()->route('admin.documents-reports-categories.index');
    }

    public function edit(DocumentCategory $documentsReportsCategory)
    {
        return view('admin.documents_reports.categories.edit', compact('documentsReportsCategory'));
    }

    public function update(RequestDocumentsReportsCategories $request, DocumentCategory $documentsReportsCategory)
    {
        $documentsReportsCategory->update($request->validated());

        toastr()->success('Document Category updated successfully');
        return redirect()->route('admin.documents-reports-categories.index');
    }

    public function destroy(DocumentCategory $documentsReportsCategory)
    {
        $documentsReportsCategory->delete();

        toastr()->success('Document Category deleted successfully');
        return redirect()->route('admin.documents-reports-categories.index');
    }
}
