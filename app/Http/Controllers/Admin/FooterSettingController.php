<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function index()
    {
        $setting = FooterSetting::first();
        return view('admin.setting.footer-setting.index', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'information_officer_name' => ['required'],
            'media_query_name' => ['required'],
            'information_officer_picture' => ['max:5000', 'image'],
            'media_query_picture' => ['max:5000', 'image'],
        ]);

        // dd($request->all());

        $setting = FooterSetting::first();
        $informationOfficerPicture = handleUpload('information_officer_picture', $setting);
        $mediaQueryPicture = handleUpload('media_query_picture', $setting);


        // create or update general setting 
        FooterSetting::updateOrCreate(
            ['id' => $id],
            [
                'information_officer_name' => $request->information_officer_name,
                'media_query_name' => $request->media_query_name,
                'information_officer_picture' => $informationOfficerPicture,
                'media_query_picture' => $mediaQueryPicture,
            ]
        );

        toastr('Footer Setting Updated Successfully', 'success');

        return redirect()->back();
    }
}
