<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    public function index()
    {
        $footerinfo = FooterInfo::first();
        return view('admin.footer-info.index', compact('footerinfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'info' => ['max:200'],
            'copy_right' => ['max:200'],
            'powered_by' => ['max:200'],
        ]);

        FooterInfo::updateOrCreate(
            ['id' => $id],
            [
                'info' => $request->info,
                'copy_right' => $request->copy_right,
                'powered_by' => $request->powered_by
            ]
        );

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
