<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.general-setting.index', compact('setting'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => ['max:5000', 'image'],
            'footer_logo' => ['max:5000', 'image'],
            'left_icon' => ['max:5000', 'image'],
            'center_icon' => ['max:5000', 'image'],
            'right_icon' => ['max:5000', 'image'],
            'favicon' => ['max:5000', 'image'],
        ]);

        $setting = GeneralSetting::first();

        if (!$setting->favicon && !$request->hasFile('favicon')) {
            return back()->withErrors(['favicon' => 'The favicon field is required.']);
        }

        $favicon = $request->file('favicon') ? handleUpload('favicon', $setting) : $setting->favicon;
        $left_icon = $request->file('left_icon') ? handleUpload('left_icon', $setting) : $setting->left_icon;
        $center_icon = $request->file('center_icon') ? handleUpload('center_icon', $setting) : $setting->center_icon;
        $right_icon = $request->file('right_icon') ? handleUpload('right_icon', $setting) : $setting->right_icon;
        $app_logo = $request->file('logo') ? handleUpload('logo', $setting) : $setting->logo;


        // create or update general setting 
        GeneralSetting::updateOrCreate(
            ['id' => $id],
            [
                'logo' => $app_logo,
                'footer_logo' => $app_logo,
                'left_icon' => $left_icon,
                'center_icon' => $center_icon,
                'right_icon' => $right_icon,
                'favicon' => $favicon,
            ]
        );

        toastr('Updated Successfully', 'success');

        return back();
    }
}
