<?php

namespace App\Http\Controllers\Admin\MonitoringEvaluation;

use App\DataTables\MonitoringEvaluationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreMonitoringEvaluation;
use App\Models\MonitoringEvaluation;
use App\Models\MonitoringEvaluationCategory;
use Illuminate\Http\Request;

class MonitoringEvaluationController extends Controller
{
    public function index(MonitoringEvaluationDataTable $dataTable)
    {
        return $dataTable->render('admin.monitoring-evaluation.index');
    }

    public function create()
    {
        $categories = MonitoringEvaluationCategory::latest()->get(['id', 'name']);

        return view('admin.monitoring-evaluation.create', compact('categories'));
    }

    public function store(RequestStoreMonitoringEvaluation $request)
    {
        $payloadInclusion = $request->validated();
        $payloadInclusion['thumbnail'] = handleUpload('thumbnail');

        MonitoringEvaluation::create($payloadInclusion);

        toastr()->success('Monitoring Evaluation created successfully!');
        return redirect()->route('admin.monitoring-evaluation.index');
    }

    public function edit(MonitoringEvaluation $evaluation)
    {
        $categories = MonitoringEvaluationCategory::latest()->get(['id', 'name']);

        return view('admin.monitoring-evaluation.edit', compact('evaluation', 'categories'));
    }

    public function update(RequestStoreMonitoringEvaluation $request, MonitoringEvaluation $evaluation)
    {
        $payloadEvaluation = $request->validated();

        if ($request->hasFile('thumbnail')) {
            deleteFileIfExist($evaluation->thumbnail);
            $payloadEvaluation['thumbnail'] = handleUpload('thumbnail');
        }

        if ($request->filled('status')) {
            $payloadEvaluation['status'] = $request->status;
        }

        $evaluation->update($payloadEvaluation);

        toastr()->success('Monitoring Evaluation updated successfully!');
        return redirect()->route('admin.monitoring-evaluation.index');
    }

    public function destroy(MonitoringEvaluation $evaluation)
    {
        deleteFileIfExist($evaluation->thumbnail);
        $evaluation->delete();

        toastr()->success('Monitoring Evaluation updated successfully!');
        return redirect()->route('admin.monitoring-evaluation.index');
    }
}
