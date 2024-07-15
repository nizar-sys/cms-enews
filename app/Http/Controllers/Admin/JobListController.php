<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\JobListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobListRequest;
use App\Models\JobList;
use Illuminate\Http\Request;

class JobListController extends Controller
{
    public function index(JobListDataTable $dataTable)
    {
        return $dataTable->render('admin.job.index');
    }

    public function create()
    {
        return view('admin.job.create');
    }

    public function store(JobListRequest $request)
    {
        $validated = $request->validated();

        $file = $validated['file'];
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filePath = handleUpload('file');

        JobList::create([
            'position' => $request['position'],
            'filename' => $fileName,
            'filepath' => $filePath,
            'vacancy_deadline' => $request['vacancy_deadline'],
            'current_status' => $request['current_status']
        ]);

        toastr()->success('Job created successfully');
        return redirect()->route('admin.job-lists.index');
    }

    public function edit($id)
    {
        $joblist = JobList::find($id);
        return view('admin.job.edit', compact('joblist'));
    }

    public function update(JobListRequest $request, JobList $job_list)
    {
        $validated = $request->validated();

        $fileName = $job_list->filename;
        $filePath = $job_list->filepath;

        if ($request->hasFile('file')) {
            deleteFileIfExist($job_list->filepath);
            $file = $validated['file'];
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filePath = handleUpload('file');
        }

        $job_list->update([
            'position' => $request['position'],
            'filename' => $fileName,
            'filepath' => $filePath,
            'vacancy_deadline' => $request['vacancy_deadline'],
            'current_status' => $request['current_status']

        ]);

        toastr()->success('Job updated successfully');
        return redirect()->route('admin.job-lists.index');
    }
}
