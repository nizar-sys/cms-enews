<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressReleaseSectionSetting;
use Illuminate\Http\Request;

class PressReleaseSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = PressReleaseSectionSetting::first();
        return view('admin.press-release.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        PressReleaseSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Press Release Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
