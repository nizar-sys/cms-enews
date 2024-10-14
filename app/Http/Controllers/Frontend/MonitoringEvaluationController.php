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
        // Fetch and translate the MonitoringEvaluation posts
        $monitoringEvaluations = MonitoringEvaluation::published()->with('author')->orderBy('created_at', 'desc')->get();
        foreach ($monitoringEvaluations as $evaluation) {
            $evaluation->title = translate($evaluation->title, $locale); // Translate title column
        }

        // Fetch and translate section setting
        $sectionSetting = MonitoringEvaluationSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale); // Translate section setting title

            // Handle HTML in the description: extract, translate, and reconstruct
            $descriptionText = strip_tags($sectionSetting->description); // Strip HTML tags to get plain text
            $translatedText = translate($descriptionText, $locale); // Translate the plain text
            $sectionSetting->description = str_replace($descriptionText, $translatedText, $sectionSetting->description); // Re-insert translated text into the HTML
        }

        return view('frontends.monitoring-evaluations.index', compact('monitoringEvaluations', 'sectionSetting'));
    }

    public function show($locale, $id)
    {
        // Fetch the specific MonitoringEvaluation post
        $monitoringEvaluation = MonitoringEvaluation::where('id', $id)->firstOrFail();

        // Translate the title column
        $monitoringEvaluation->title = translate($monitoringEvaluation->title, $locale);

        // Handle HTML in the content: extract, translate, and reconstruct
        $contentText = strip_tags($monitoringEvaluation->content); // Strip HTML tags to get plain text
        $translatedContent = translate($contentText, $locale); // Translate the plain text
        $monitoringEvaluation->content = str_replace($contentText, $translatedContent, $monitoringEvaluation->content); // Re-insert translated text into the HTML

        // Translate the next and previous post titles
        $nextPost = MonitoringEvaluation::where('id', '>', $monitoringEvaluation->id)->orderBy('id', 'asc')->first();
        if ($nextPost) {
            $nextPost->title = translate($nextPost->title, $locale);
        }

        $prevPost = MonitoringEvaluation::where('id', '<', $monitoringEvaluation->id)->orderBy('id', 'desc')->first();
        if ($prevPost) {
            $prevPost->title = translate($prevPost->title, $locale);
        }

        // Translate the latest post titles
        $latestPost = MonitoringEvaluation::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestPost as $post) {
            $post->title = translate($post->title, $locale);
        }

        // Fetch and translate section setting
        $sectionSetting = MonitoringEvaluationSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale); // Translate section setting title

            // Handle HTML in the description: extract, translate, and reconstruct
            $descriptionText = strip_tags($sectionSetting->description); // Strip HTML tags to get plain text
            $translatedDescription = translate($descriptionText, $locale); // Translate the plain text
            $sectionSetting->description = str_replace($descriptionText, $translatedDescription, $sectionSetting->description); // Re-insert translated text into the HTML
        }

        return view('frontends.monitoring-evaluations.show', compact('monitoringEvaluation', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting'));
    }

}
