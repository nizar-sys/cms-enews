<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrativeSectionSetting;
use Illuminate\Http\Request;

class AdministrativeSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = AdministrativeSectionSetting::first();
        return view('admin.administrative.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        AdministrativeSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Teaching & Leading Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
