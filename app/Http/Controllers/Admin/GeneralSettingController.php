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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => ['max:5000', 'image'],
            'footer_logo' => ['max:5000', 'image'],
            'left_icon' => ['max:5000', 'image'],
            'app_logo' => ['max:5000', 'image'],
            'right_icon' => ['max:5000', 'image'],
            'favicon' => ['max:5000', 'image'],
        ]);

        $setting = GeneralSetting::first();

        if (!$setting->favicon && !$request->hasFile('favicon')) {
            return back()->withErrors(['favicon' => 'The favicon field is required.']);
        }

        $favicon = $request->file('favicon') ? handleUpload('favicon', $setting) : $setting->favicon;
        $left_icon = $request->file('left_icon') ? handleUpload('left_icon', $setting) : $setting->left_icon;
        $app_logo = $request->file('app_logo') ? handleUpload('app_logo', $setting) : $setting->center_icon;
        $right_icon = $request->file('right_icon') ? handleUpload('right_icon', $setting) : $setting->right_icon;


        // create or update general setting 
        GeneralSetting::updateOrCreate(
            ['id' => $id],
            [
                'logo' => $app_logo,
                'footer_logo' => $app_logo,
                'left_icon' => $left_icon,
                'center_icon' => $app_logo,
                'right_icon' => $right_icon,
                'favicon' => $favicon,
            ]
        );

        toastr('Updated Successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
