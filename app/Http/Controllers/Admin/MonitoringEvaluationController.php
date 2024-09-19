<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonitoringEvaluation;
use Illuminate\Http\Request;

class MonitoringEvaluationController extends Controller
{
    public function index()
    {
        $monitoringEvaluation = MonitoringEvaluation::first();
        return view('admin.monitoring-evaluation.index', compact('monitoringEvaluation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500000'],
            'image' => ['image', 'max:5000'],
            'document' => ['mimes:pdf,csv,txt', 'max:10000'],
            'video_url' => ['nullable', 'url']
        ]);

        $monitoringEvaluation = MonitoringEvaluation::first();
        $imagePath = handleUpload('image', $monitoringEvaluation);
        $documentPath = handleUpload('document', $monitoringEvaluation);

        MonitoringEvaluation::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => ($imagePath ? $imagePath : $monitoringEvaluation?->image ?? null),
                'document' => ($documentPath ? $documentPath : $monitoringEvaluation?->document ?? null),
                'video_url' => $request->video_url
            ]
        );
        toastr()->success('Updated Successfully !', 'Congrats');
        return redirect()->back();
    }
}
