<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSettingDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function index(FooterSettingDataTable $dataTable)
    {
        $footerSettingCount = FooterSetting::count();
        return $dataTable->render('admin.setting.footer-setting.index', compact('footerSettingCount'));
    }

    public function create()
    {
        $footerSettingsCount = FooterSetting::count();

        if ($footerSettingsCount >= 2) {
            abort(403, 'You cannot create more than 2 footer settings.');
        }

        return view('admin.setting.footer-setting.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50048',
            'title' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'email' => ['required', 'max:200', 'email'],
            'phone' => 'required',
            'call' => 'required',
        ]);

        $imagePath = handleUpload('images');

        $setting = new FooterSetting();
        $setting->images = $imagePath;
        $setting->title = $request->title;
        $setting->name = $request->name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->call = $request->call;
        $setting->save();

        toastr()->success('Setting Created Successfully', 'Congrats');
        return redirect()->route('admin.footer-setting.index');
    }

    public function edit($id)
    {
        $footerSetting = FooterSetting::findOrFail($id);
        return view('admin.setting.footer-setting.edit', compact('footerSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50048',
            'title' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'email' => ['required', 'max:200', 'email'],
            'phone' => 'required',
            'call' => 'required',
        ]);


        $setting = FooterSetting::findOrFail($id);

        $imagePath = handleUpload('images', $setting);

        $setting->images = (!empty($imagePath) ? $imagePath : $setting->images);
        $setting->title = $request->title;
        $setting->name = $request->name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->call = $request->call;
        $setting->save();
        toastr()->success('Footer Info Updated Successfully', 'Congrats');

        return redirect()->route('admin.footer-setting.index');
    }

    public function destroy($id)
    {
        $setting = FooterSetting::findOrFail($id);
        deleteFileIfExist($setting->images);
        $setting->delete();
    }
}
