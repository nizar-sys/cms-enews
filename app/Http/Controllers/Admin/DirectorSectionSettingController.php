<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DirectorSectionSetting;
use Illuminate\Http\Request;

class DirectorSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = DirectorSectionSetting::first();
        return view('admin.directors.section', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:1000']
        ]);

        DirectorSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]
        );

        toastr()->success('Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
