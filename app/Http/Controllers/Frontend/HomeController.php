<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use App\Models\GeneralProcurement;
use App\Models\PhotoGallery;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\SpesificProcurement;
use App\Models\VideoGallery;

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

    public function photoGallery($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $photoGalleries = PhotoGallery::with('photoGalleryAlbum')->get()->groupBy('album_id');


        return view('frontends.photo_gallery', compact('projectCategories', 'photoGalleries'));
    }

    public function videoGallery($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $videoGalleries = VideoGallery::get();

        return view('frontends.video_gallery', compact('projectCategories', 'videoGalleries'));
    }
}
