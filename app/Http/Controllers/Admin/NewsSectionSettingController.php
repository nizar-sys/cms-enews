<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsSectionSetting;
use Illuminate\Http\Request;

class NewsSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = NewsSectionSetting::first();
        return view('admin.news.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        NewsSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('News Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
