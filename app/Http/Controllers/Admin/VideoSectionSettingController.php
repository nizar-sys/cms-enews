<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoSectionSetting;
use Illuminate\Http\Request;

class VideoSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = VideoSectionSetting::first();
        return view('admin.video-project.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        VideoSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Video Project Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
