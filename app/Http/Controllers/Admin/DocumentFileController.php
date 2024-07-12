<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DocumentfileDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestDocumentFile;
use App\Models\DocumentCategory;
use App\Models\DocumentFile;
use Illuminate\Http\Request;

class DocumentFileController extends Controller
{
    public function index(DocumentfileDataTable $dataTable)
    {
        return $dataTable->render('admin.documents_reports.index');
    }

    public function create()
    {
        $documentCategories = DocumentCategory::select('id', 'name')->get();

        return view('admin.documents_reports.create', compact('documentCategories'));
    }

    public function store(RequestDocumentFile $request)
    {
        $validated = $request->validated();

        $file = $validated['file'];
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filePath = handleUpload('file');

        DocumentFile::create([
            'document_category_id' => $validated['document_category_id'],
            'filename' => $fileName,
            'file_path' => $filePath,
        ]);

        toastr()->success('Document file created successfully');
        return redirect()->route('admin.documents-reports-files.index');
    }

    public function edit(DocumentFile $documentsReportsFile)
    {
        $documentCategories = DocumentCategory::select('id', 'name')->get();

        return view('admin.documents_reports.edit', compact('documentsReportsFile', 'documentCategories'));
    }

    public function update(RequestDocumentFile $request, DocumentFile $documentsReportsFile)
    {
        $validated = $request->validated();

        $fileName = $documentsReportsFile->filename;
        $filePath = $documentsReportsFile->file_path;

        if ($request->hasFile('file')) {
            deleteFileIfExist($documentsReportsFile->file_path);
            $file = $validated['file'];
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filePath = handleUpload('file');
        }

        $documentsReportsFile->update([
            'document_category_id' => $validated['document_category_id'],
            'filename' => $fileName,
            'file_path' => $filePath,
        ]);

        toastr()->success('Document file updated successfully');
        return redirect()->route('admin.documents-reports-files.index');
    }

    public function destroy(DocumentFile $documentsReportsFile)
    {
        deleteFileIfExist($documentsReportsFile->file_path);
        $documentsReportsFile->delete();

        toastr()->success('Document file deleted successfully');
        return redirect()->route('admin.documents-reports-files.index');
    }
}
