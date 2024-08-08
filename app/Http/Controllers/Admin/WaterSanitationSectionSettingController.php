<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaterSanitationSectionSetting;
use Illuminate\Http\Request;

class WaterSanitationSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = WaterSanitationSectionSetting::first();
        return view('admin.water-sanitation.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        WaterSanitationSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Water Sanitation Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
