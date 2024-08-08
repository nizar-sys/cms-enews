<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalChartSectionSetting;
use Illuminate\Http\Request;

class OrganizationalChartSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = OrganizationalChartSectionSetting::first();
        return view('admin.organizational-chart.index', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:5000'],
            'image' => ['image', 'max:5000'],
        ]);

        $organization = OrganizationalChartSectionSetting::first();
        $imagePath = handleUpload('image', $organization);

        OrganizationalChartSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => (!empty($imagePath) ? $imagePath : $organization->image),
            ]
        );
        toastr()->success('Organizational Updated Succesfully', 'Congrats');
        return redirect()->back();
    }
}
