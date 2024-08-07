<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallerySectionSetting;
use Illuminate\Http\Request;

class VideoGallerySectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = VideoGallerySectionSetting::first();
        return view('admin.video-gallery.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        VideoGallerySectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Video Gallery Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
