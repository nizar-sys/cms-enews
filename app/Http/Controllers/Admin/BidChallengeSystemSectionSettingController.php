<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidChallengeSystemSectionSetting;
use Illuminate\Http\Request;

class BidChallengeSystemSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = BidChallengeSystemSectionSetting::first();
        return view('admin.procurements.bid_challenge_systems.section', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:1000']
        ]);

        BidChallengeSystemSectionSetting::updateOrCreate(
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
