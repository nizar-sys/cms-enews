<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallerySectionSetting;
use Illuminate\Http\Request;

class PhotoGallerySectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = PhotoGallerySectionSetting::first();
        return view('admin.photo-gallery.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        PhotoGallerySectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Photo Gallery Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
