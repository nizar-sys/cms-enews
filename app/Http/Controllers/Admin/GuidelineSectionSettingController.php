<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuidelineSectionSetting;
use Illuminate\Http\Request;

class GuidelineSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = GuidelineSectionSetting::first();
        return view('admin.procurements.guidelines.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        GuidelineSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Procurement Guideline Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
