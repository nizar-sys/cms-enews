<?php

namespace App\Http\Controllers\Admin\MonitoringEvaluation;

use App\Http\Controllers\Controller;
use App\Models\MonitoringEvaluationSectionSetting;
use Illuminate\Http\Request;

class MonitoringEvaluationSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = MonitoringEvaluationSectionSetting::first();
        return view('admin.monitoring-evaluation.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        MonitoringEvaluationSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Monitoring Evaluation Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
