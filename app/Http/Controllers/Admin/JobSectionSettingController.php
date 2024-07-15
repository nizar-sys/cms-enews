<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobSectionSetting;
use Illuminate\Http\Request;

class JobSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = JobSectionSetting::first();
        return view('admin.job.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        JobSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Job Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
