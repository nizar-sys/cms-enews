<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityVoiceSectionSetting;
use Illuminate\Http\Request;

class CommunityVoiceSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = CommunityVoiceSectionSetting::first();
        return view('admin.community-voice.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        CommunityVoiceSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Community Voice Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
