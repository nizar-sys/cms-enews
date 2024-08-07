<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoSectionSetting;
use Illuminate\Http\Request;

class PhotoSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = PhotoSectionSetting::first();
        return view('admin.photo-project.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        PhotoSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Photo Project Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
