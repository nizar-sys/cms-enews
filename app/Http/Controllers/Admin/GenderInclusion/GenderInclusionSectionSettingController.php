<?php

namespace App\Http\Controllers\Admin\GenderInclusion;

use App\Http\Controllers\Controller;
use App\Models\GenderInclusionSectionSetting;
use Illuminate\Http\Request;

class GenderInclusionSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = GenderInclusionSectionSetting::first();
        return view('admin.gender-inclusion.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        GenderInclusionSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Social Behaviour Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
