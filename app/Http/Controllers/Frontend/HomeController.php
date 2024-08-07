<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\CommunityVoice;

use App\Models\BidChallengeSystem;
use App\Models\ContractAwardNotice;

use App\Models\DocumentCategory;
use App\Models\DocumentFile;
use App\Models\ExecutiveSectionSetting;
use App\Models\ExecutiveTeam;
use App\Models\Faq;
use App\Models\GeneralProcurement;
use App\Models\GuidelineProcurement;
use App\Models\GeneralSetting;
use App\Models\Hero;
use App\Models\News;
use App\Models\Notice;
use App\Models\PhotoGallery;
use App\Models\PhotoProject;
use App\Models\Post;
use App\Models\PressRelease;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceSectionSetting;
use App\Models\SpesificProcurement;
use App\Models\SpesificProcurementFile;
use App\Models\VideoGallery;
use App\Models\VideoProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Hero::select('id', 'title', 'description', 'image')->get();
        $teamSectionSetting = ExecutiveSectionSetting::first();
        $teams = ExecutiveTeam::with('designation')->get();
        $posts = Post::published()->with('author')->orderBy('created_at', 'desc')->get();
        $about = About::first();
        $serviceSection = ServiceSectionSetting::first();
        $services = Service::get();
        $user = Auth::user();

        return view('frontends.home', compact('sliders', 'teamSectionSetting', 'teams', 'posts', 'about', 'serviceSection', 'services', 'user'));
    }

    public function projectCategory($locale, $slugCategory)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $projectCategory = ProjectCategory::where('slug', $slugCategory)->firstOrFail();

        $latestProjectsUpdate = null;

        if ($projectCategory->slug == 'latest-project-updates') {
            $latestProjectsUpdate = ProjectCategory::orderBy('updated_at', 'desc')->take(2)->get();
        }

        return view('frontends.project_category', compact('projectCategory', 'projectCategories', 'latestProjectsUpdate'));
    }

    public function projectDetail($locale, $slugCategory, $slugProject)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();

        $project = Project::where('slug', $slugProject)->firstOrFail();

        $projects = Project::where('category_id', $project->category_id)->get();

        $prevProject = $projects->where('id', '<', $project->id)->sortByDesc('id')->first();
        $nextProject = $projects->where('id', '>', $project->id)->sortBy('id')->first();

        $latestNews = News::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();

        return view('frontends.project_detail', compact('project', 'projectCategories', 'prevProject', 'nextProject', 'latestNews'));
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

    public function photoGallery($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $photoGalleries = PhotoGallery::with('photoGalleryAlbum')->get()->groupBy('album_id');


        return view('frontends.photo_gallery', compact('projectCategories', 'photoGalleries'));
    }

    public function photoProject($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $photoProjects = PhotoProject::with('photoProjectAlbum')->get()->groupBy('album_id');


        return view('frontends.photo_project', compact('projectCategories', 'photoProjects'));
    }

    public function videoGallery($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $videoGalleries = VideoGallery::get();

        return view('frontends.video_gallery', compact('projectCategories', 'videoGalleries'));
    }

    public function videoProject($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $videoProjects = VideoProject::get();

        return view('frontends.video_project', compact('projectCategories', 'videoProjects'));
    }

    public function notices($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $noticeFiles = Notice::get();

        return view('frontends.notices', compact('projectCategories', 'noticeFiles'));
    }

    public function pressReleases($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $pressReleases = PressRelease::get();

        return view('frontends.press_releases', compact('projectCategories', 'pressReleases'));
    }

    public function articlesInterviews($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $articlesInterviews = Article::with('category')->get()->groupBy('category_id');

        return view('frontends.articles_interviews', compact('projectCategories', 'articlesInterviews'));
    }

    public function communityVoices($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $communityVoices = CommunityVoice::get();

        return view('frontends.community_voices', compact('projectCategories', 'communityVoices'));
    }

    public function communityVoiceDetail($locale, $slugCommunityVoice)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $communityVoice = CommunityVoice::where('slug', $slugCommunityVoice)->firstOrFail();

        return view('frontends.community_voice_detail', compact('projectCategories', 'communityVoice'));
    }

    public function newsList($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $news = News::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('frontends.news', compact('projectCategories', 'news'));
    }

    public function newsDetail($locale, $newsId)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $news = News::where('id', $newsId)->firstOrFail();

        $nextNews = News::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        $prevNews = News::where('id', '<', $news->id)->orderBy('id', 'desc')->first();

        $latestNews = News::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();

        return view('frontends.news_detail', compact('projectCategories', 'news', 'nextNews', 'prevNews', 'latestNews'));
    }

    public function postDetail($locale, $postSlug)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $post = Post::where('slug', $postSlug)->firstOrFail();

        $nextPost = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        $prevPost = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        $latestPost = Post::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();

        return view('frontends.post_detail', compact('projectCategories', 'post', 'nextPost', 'prevPost', 'latestPost'));
    }

    public function downloadMultiple(Request $request)
    {
        $files = $request->input('files', []);

        if (empty($files)) {
            return back()->with('error', __('app.No files selected'));
        }

        $zip = new ZipArchive;
        $zipFileName = 'downloads/' . 'files-' . time() . '.zip';
        $zipFilePath = public_path($zipFileName);

        try {
            if (!File::exists(public_path('downloads'))) {
                File::makeDirectory(public_path('downloads'), 0755, true);
            }

            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                foreach ($files as $file) {
                    $filePath = public_path($file);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    }
                }
                $zip->close();
            } else {
                throw new \Exception(__('app.Failed to create zip file'));
            }

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to create zip file: ' . $e->getMessage());
            return back()->with('error', __('app.Failed to create zip file'));
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $results = collect();

        if ($query) {
            $results = $results->merge(
                BidChallengeSystem::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => explode('/uploads/', $item->file_path)[1],
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Bid Challenge System'
                    ])
            );

            $results = $results->merge(
                ContractAwardNotice::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => explode('/uploads/', $item->file_path)[1],
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Contract Award Notice'
                    ])
            );

            $results = $results->merge(
                DocumentFile::where('filename', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => explode('/uploads/', $item->file_path)[1],
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Document File'
                    ])
            );

            $results = $results->merge(
                GuidelineProcurement::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => explode('/uploads/', $item->file_path)[1],
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Guideline Procurement'
                    ])
            );

            $results = $results->merge(
                News::where('title', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => $item->title,
                        'detail' => route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $item->id]),
                        'isFile' => false,
                        'type' => 'News'
                    ])
            );

            $results = $results->merge(
                Notice::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' =>  explode('/uploads/', $item->file_path)[1],
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Notice'
                    ])
            );

            $results = $results->merge(
                Post::where('title', 'like', "%$query%")
                    ->orWhere('slug', 'like', "%$query%")
                    ->orWhere('content', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => $item->title,
                        'detail' => route('posts-detail', ['locale' => session('locale', 'en'), 'post' => $item->slug]),
                        'isFile' => false,
                        'type' => 'Post'
                    ])
            );

            $results = $results->merge(
                PressRelease::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => explode('/uploads/', $item->file_path)[1],
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Press Release'
                    ])
            );

            $results = $results->merge(
                SpesificProcurementFile::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn ($item) => [
                        'title' => explode('/uploads/', $item->file_path)[1],
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Spesific Procurement File'
                    ])
            );
        }

        return response()->json($results);
    }
}
