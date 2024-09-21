<?php

namespace App\Http\Controllers\Admin\MonitoringEvaluation;

use App\DataTables\MonitoringEvaluationCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreMonitoringCategory;
use App\Models\MonitoringEvaluationCategory;
use Illuminate\Http\Request;

class MonitoringEvaluationCategoryController extends Controller
{
    public function index(MonitoringEvaluationCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.monitoring-evaluation.category.index');
    }

    public function create()
    {
        return view('admin.monitoring-evaluation.category.create');
    }

    public function store(RequestStoreMonitoringCategory $request)
    {
        MonitoringEvaluationCategory::create($request->validated());

        toastr()->success('Monitoring Evaluation Category created successfully');
        return redirect()->route('admin.monitoring-evaluation-category.index');
    }

    public function edit(MonitoringEvaluationCategory $category)
    {
        return view('admin.monitoring-evaluation.category.edit', compact('category'));
    }

    public function update(RequestStoreMonitoringCategory $request, MonitoringEvaluationCategory $category)
    {
        $category->update($request->validated());

        toastr()->success('Monitoring Evaluation Category created successfully');
        return redirect()->route('admin.monitoring-evaluation-category.index');
    }

    public function destroy(MonitoringEvaluationCategory $category)
    {
        $category->delete();

        toastr()->success('Monitoring Evaluation Category created successfully');
        return redirect()->route('admin.monitoring-evaluation-category.index');
    }
}
