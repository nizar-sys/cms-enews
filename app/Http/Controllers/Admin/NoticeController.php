<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NoticeDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestNotice;
use App\Models\Notice;
use Yoeunes\Toastr\Facades\Toastr;

class NoticeController extends Controller
{
    public function index(NoticeDataTable $dataTable)
    {
        return $dataTable->render('admin.notice.index');
        
    }
    public function create()
    {
        return view('admin.notice.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);


        $file = $request->file('file');
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filePath = handleUpload('file');

        Notice::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        toastr()->success('Notice created successfully', 'Success');
        return redirect()->route('admin.notice.index');
    }

    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notice.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
        ]);

        $notice = Notice::findOrFail($id);
        deleteFileIfExist($notice->file_path);

        $file = $request->file('file');
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filePath = handleUpload('file');

        $notice->update([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        $notice->save();

        toastr()->success('Notice updated successfully', 'Success');
        return redirect()->route('admin.notice.index');
    }

    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        deleteFileIfExist($notice->file_path);
        $notice->delete();
    }
}   
