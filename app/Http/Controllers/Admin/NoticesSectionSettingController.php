<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NoticesSectionSetting;
use Illuminate\Http\Request;

class NoticesSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = NoticesSectionSetting::first();
        return view('admin.procurements.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        NoticesSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Procurement Notices Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
