<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveSectionSetting;
use Illuminate\Http\Request;

class ExecutiveSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = ExecutiveSectionSetting::first();
        return view('admin.executive.section.index', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:1000']
        ]);

        ExecutiveSectionSetting::updateOrCreate(
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
