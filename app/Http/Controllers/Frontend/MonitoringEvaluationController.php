<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MonitoringEvaluation;
use App\Models\MonitoringEvaluationSectionSetting;
use Illuminate\Http\Request;

class MonitoringEvaluationController extends Controller
{
    public function index($locale)
    {
        $monitoringEvaluations = MonitoringEvaluation::published()->with('author')->orderBy('created_at', 'desc')->get();
        $sectionSetting = MonitoringEvaluationSectionSetting::first();

        return view('frontends.monitoring-evaluations.index', compact('monitoringEvaluations', 'sectionSetting'));
    }

    public function show($locale, $id)
    {
        $monitoringEvaluation = MonitoringEvaluation::where('id', $id)->firstOrFail();

        $nextPost = MonitoringEvaluation::where('id', '>', $monitoringEvaluation->id)->orderBy('id', 'asc')->first();
        $prevPost = MonitoringEvaluation::where('id', '<', $monitoringEvaluation->id)->orderBy('id', 'desc')->first();
        $latestPost = MonitoringEvaluation::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();
        $sectionSetting = MonitoringEvaluationSectionSetting::first();
        return view('frontends.monitoring-evaluations.show', compact('monitoringEvaluation', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting'));
    }
}
