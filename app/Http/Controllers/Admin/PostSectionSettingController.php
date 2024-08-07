<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostSectionSetting;
use Illuminate\Http\Request;

class PostSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = PostSectionSetting::first();
        return view('admin.posts.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        PostSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Posts Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
