<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSectionSetting;
use Illuminate\Http\Request;

class ServiceSectionSettingController extends Controller
{
    public function index()
    {
        $service = ServiceSectionSetting::first();
        return view('admin.service-setting.index', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:1000']
        ]);

        ServiceSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]
        );

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
