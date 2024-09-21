<?php

namespace App\Http\Controllers\Admin\SocialBehaviour;

use App\Http\Controllers\Controller;
use App\Models\SocialBehaviourSectionSetting;
use Illuminate\Http\Request;

class SocialBehaviourSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = SocialBehaviourSectionSetting::first();
        return view('admin.social-behaviour.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        SocialBehaviourSectionSetting::updateOrCreate(
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
