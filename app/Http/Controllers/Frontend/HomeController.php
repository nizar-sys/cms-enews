<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BidChallengeSystem;
use App\Models\ContractAwardNotice;
use App\Models\DocumentCategory;
use App\Models\GeneralProcurement;
use App\Models\GuidelineProcurement;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\SpesificProcurement;

class HomeController extends Controller
{
    public function index()
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        return view('frontends.home', compact('projectCategories'));
    }

    public function projectCategory($locale, $slugCategory)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $projectCategory = ProjectCategory::where('slug', $slugCategory)->firstOrFail();

        return view('frontends.project_category', compact('projectCategory', 'projectCategories'));
    }

    public function projectDetail($locale, $slugCategory, $slugProject)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $project = Project::where('slug', $slugProject)->firstOrFail();

        $projects = Project::where('category_id', $project->category_id)->get();

        $prevProject = $projects->where('id', '<', $project->id)->sortByDesc('id')->first();
        $nextProject = $projects->where('id', '>', $project->id)->sortBy('id')->first();

        return view('frontends.project_detail', compact('project', 'projectCategories', 'prevProject', 'nextProject'));
    }

    public function documentCategory($locale, $slugCategoryDocumentReport)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $documentsReportsCategory = DocumentCategory::with('documentFiles')->where('slug', $slugCategoryDocumentReport)->firstOrFail();

        return view('frontends.document_category', compact('documentsReportsCategory', 'projectCategories'));
    }

    public function procurementNotice($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $spesificProcurements = SpesificProcurement::with('files')->get();
        $generalProcurements = GeneralProcurement::get();

        return view('frontends.procurement_notice', compact('projectCategories', 'spesificProcurements', 'generalProcurements'));
    }

    public function procurementNoticeFile($locale, $spesificProcurementId)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $spesificProcurement = SpesificProcurement::with('files')->where('id', $spesificProcurementId)->firstOrFail();

        return view('frontends.procurement_notice_file', compact('spesificProcurement', 'projectCategories'));
    }

    public function procurementGuideline($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $guidelinesProcurement = GuidelineProcurement::get();

        return view('frontends.procurement_guideline', compact('projectCategories', 'guidelinesProcurement'));
    }

    public function bidChallengeSystem($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $bidChallengeSystem = BidChallengeSystem::get();

        return view('frontends.bid_challenge_system', compact('projectCategories', 'bidChallengeSystem'));
    }

    public function contractAwardNotice($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $contractAwardNotice = ContractAwardNotice::get();

        return view('frontends.contract_award_notice', compact('projectCategories', 'contractAwardNotice'));
    }
}
