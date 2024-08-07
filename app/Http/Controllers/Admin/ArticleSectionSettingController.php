<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleSectionSetting;
use Illuminate\Http\Request;

class ArticleSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = ArticleSectionSetting::first();
        return view('admin.article.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        ArticleSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Publication Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
