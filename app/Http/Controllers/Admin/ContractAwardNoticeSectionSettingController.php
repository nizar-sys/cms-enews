<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContractAwardNoticeSectionSetting;
use Illuminate\Http\Request;

class ContractAwardNoticeSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = ContractAwardNoticeSectionSetting::first();
        return view('admin.procurements.contract_award_notice.section', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:1000']
        ]);

        ContractAwardNoticeSectionSetting::updateOrCreate(
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
