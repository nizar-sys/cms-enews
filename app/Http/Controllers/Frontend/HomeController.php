<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Administrative;
use App\Models\AdministrativeSectionSetting;
use App\Models\Article;
use App\Models\ArticleSectionSetting;
use App\Models\CommunityVoice;

use App\Models\BidChallengeSystem;
use App\Models\CommunityVoiceSectionSetting;
use App\Models\ContractAwardNotice;

use App\Models\DocumentCategory;
use App\Models\DocumentFile;
use App\Models\DocumentSectionSetting;
use App\Models\ExecutiveSectionSetting;
use App\Models\ExecutiveTeam;
use App\Models\Faq;
use App\Models\GeneralProcurement;
use App\Models\GuidelineProcurement;
use App\Models\GeneralSetting;
use App\Models\GuidelineSectionSetting;
use App\Models\Hero;
use App\Models\News;
use App\Models\NewsSectionSetting;
use App\Models\Notice;
use App\Models\NoticesSectionSetting;
use App\Models\PhotoGallery;
use App\Models\PhotoGallerySectionSetting;
use App\Models\PhotoProject;
use App\Models\PhotoSectionSetting;
use App\Models\Post;
use App\Models\PostSectionSetting;
use App\Models\PressRelease;
use App\Models\PressReleaseSectionSetting;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceSectionSetting;
use App\Models\SpesificProcurement;
use App\Models\SpesificProcurementFile;
use App\Models\TeachingLeading;
use App\Models\TeachingLeadingSectionSetting;
use App\Models\VideoGallery;
use App\Models\VideoGallerySectionSetting;
use App\Models\VideoProject;
use App\Models\VideoSectionSetting;
use App\Models\WaterSanitation;
use App\Models\WaterSanitationSectionSetting;
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

        $projectCategory = ProjectCategory::where('slug', $slugCategory)->firstOrFail();

        $latestProjectsUpdate = null;

        if ($projectCategory->slug == 'latest-project-updates') {
            $latestProjectsUpdate = ProjectCategory::orderBy('updated_at', 'desc')->take(2)->get();
        }

        return view('frontends.project_category', compact('projectCategory',  'latestProjectsUpdate'));
    }

    public function projectDetail($locale, $slugCategory, $slugProject)
    {

        $project = Project::where('slug', $slugProject)->firstOrFail();

        $projects = Project::where('category_id', $project->category_id)->get();

        $prevProject = $projects->where('id', '<', $project->id)->sortByDesc('id')->first();
        $nextProject = $projects->where('id', '>', $project->id)->sortBy('id')->first();

        $latestNews = News::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();

        return view('frontends.project_detail', compact('project',  'prevProject', 'nextProject', 'latestNews'));
    }

    public function documentCategory($locale, $slugCategoryDocumentReport)
    {

        $documentsReportsCategory = DocumentCategory::with('documentFiles')->where('slug', $slugCategoryDocumentReport)->firstOrFail();

        return view('frontends.document_category', compact('documentsReportsCategory', 'projectCategories'));
    }

    public function procurementNotice($locale)
    {

        $spesificProcurements = SpesificProcurement::with('files')->get();
        $generalProcurements = GeneralProcurement::get();
        $sectionSetting = NoticesSectionSetting::first();

        return view('frontends.procurement_notice', compact('spesificProcurements', 'generalProcurements', 'sectionSetting'));
    }

    public function procurementNoticeFile($locale, $spesificProcurementId)
    {

        $spesificProcurement = SpesificProcurement::with('files')->where('id', $spesificProcurementId)->firstOrFail();

        return view('frontends.procurement_notice_file', compact('spesificProcurement'));
    }

    public function procurementGuideline($locale)
    {
        $guidelinesProcurement = GuidelineProcurement::get();
        $sectionSetting = GuidelineSectionSetting::first();

        return view('frontends.procurement_guideline', compact('guidelinesProcurement', 'sectionSetting'));
    }

    public function bidChallengeSystem($locale)
    {

        $bidChallengeSystem = BidChallengeSystem::get();

        return view('frontends.bid_challenge_system', compact('bidChallengeSystem'));
    }

    public function contractAwardNotice($locale)
    {

        $contractAwardNotice = ContractAwardNotice::get();

        return view('frontends.contract_award_notice', compact('contractAwardNotice'));
    }

    public function photoGallery($locale)
    {
        $photoGalleries = PhotoGallery::with('photoGalleryAlbum')->get()->groupBy('album_id');
        $sectionSetting = PhotoGallerySectionSetting::first();

        return view('frontends.photo_gallery', compact('photoGalleries', 'sectionSetting'));
    }

    public function photoProject($locale)
    {
        $photoProjects = PhotoProject::with('photoProjectAlbum')->get()->groupBy('album_id');
        $sectionSetting = PhotoSectionSetting::first();

        return view('frontends.photo_project', compact('photoProjects', 'sectionSetting'));
    }

    public function videoGallery($locale)
    {
        $videoGalleries = VideoGallery::get();
        $sectionSetting = VideoGallerySectionSetting::first();

        return view('frontends.video_gallery', compact('videoGalleries', 'sectionSetting'));
    }

    public function videoProject($locale)
    {
        $videoProjects = VideoProject::get();
        $sectionSetting = VideoSectionSetting::first();

        return view('frontends.video_project', compact('videoProjects', 'sectionSetting'));
    }

    public function notices($locale)
    {
        $noticeFiles = Notice::get();

        return view('frontends.notices', compact('noticeFiles'));
    }

    public function pressReleases($locale)
    {
        $pressReleases = PressRelease::get();
        $sectionSetting = PressReleaseSectionSetting::first();

        return view('frontends.press_releases', compact('pressReleases', 'sectionSetting'));
    }

    public function articlesInterviews($locale)
    {
        $articlesInterviews = Article::with('category')->get()->groupBy('category_id');
        $sectionSetting = ArticleSectionSetting::first();

        return view('frontends.articles_interviews', compact('articlesInterviews', 'sectionSetting'));
    }

    public function communityVoices($locale)
    {
        $communityVoices = CommunityVoice::get();
        $sectionSetting = CommunityVoiceSectionSetting::first();

        return view('frontends.community_voices', compact('communityVoices', 'sectionSetting'));
    }

    public function communityVoiceDetail($locale, $slugCommunityVoice)
    {
        $communityVoice = CommunityVoice::where('slug', $slugCommunityVoice)->firstOrFail();
        $sectionSetting = CommunityVoiceSectionSetting::first();

        return view('frontends.community_voice_detail', compact('communityVoice', 'sectionSetting'));
    }

    public function newsList($locale)
    {
        $news = News::query()->orderBy('created_at', 'desc')->paginate(10);
        $sectionSetting = NewsSectionSetting::first();

        return view('frontends.news', compact('news', 'sectionSetting'));
    }

    public function newsDetail($locale, $newsId)
    {
        $news = News::where('id', $newsId)->firstOrFail();

        $nextNews = News::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        $prevNews = News::where('id', '<', $news->id)->orderBy('id', 'desc')->first();

        $latestNews = News::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        $sectionSetting = NewsSectionSetting::first();

        return view('frontends.news_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function postDetail($locale, $postSlug)
    {
        $post = Post::where('slug', $postSlug)->firstOrFail();

        $nextPost = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        $prevPost = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        $latestPost = Post::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();

        $sectionSetting = PostSectionSetting::first();

        return view('frontends.post_detail', compact('post', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting'));
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

    public function waterSanitationList($locale)
    {
        $news = WaterSanitation::query()->orderBy('created_at', 'desc')->paginate(10);
        $sectionSetting = WaterSanitationSectionSetting::first();

        return view('frontends.water_sanitation', compact('news', 'sectionSetting'));
    }

    public function waterSanitationDetail($locale, $newsId)
    {
        $news = WaterSanitation::where('id', $newsId)->firstOrFail();

        $nextNews = WaterSanitation::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        $prevNews = WaterSanitation::where('id', '<', $news->id)->orderBy('id', 'desc')->first();

        $latestNews = WaterSanitation::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        $sectionSetting = WaterSanitationSectionSetting::first();

        return view('frontends.water_sanitation_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function teachingLeadingList($locale)
    {
        $news = TeachingLeading::query()->orderBy('created_at', 'desc')->paginate(10);
        $sectionSetting = TeachingLeadingSectionSetting::first();

        return view('frontends.teaching_leading', compact('news', 'sectionSetting'));
    }

    public function teachingLeadingDetail($locale, $newsId)
    {
        $news = TeachingLeading::where('id', $newsId)->firstOrFail();

        $nextNews = TeachingLeading::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        $prevNews = TeachingLeading::where('id', '<', $news->id)->orderBy('id', 'desc')->first();

        $latestNews = TeachingLeading::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        $sectionSetting = TeachingLeadingSectionSetting::first();

        return view('frontends.teaching_leading_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function administrativeList($locale)
    {
        $news = Administrative::query()->orderBy('created_at', 'desc')->paginate(10);
        $sectionSetting = AdministrativeSectionSetting::first();

        return view('frontends.administrative', compact('news', 'sectionSetting'));
    }

    public function administrativeDetail($locale, $newsId)
    {
        $news = Administrative::where('id', $newsId)->firstOrFail();

        $nextNews = Administrative::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        $prevNews = Administrative::where('id', '<', $news->id)->orderBy('id', 'desc')->first();

        $latestNews = Administrative::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        $sectionSetting = AdministrativeSectionSetting::first();

        return view('frontends.administrative_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function documentList($locale)
    {
        $sectionSetting = DocumentSectionSetting::first();

        $documents = collect();

        $documents = $documents->merge(
            WaterSanitation::whereNotNull('file')->get()
                ->map(fn ($item) => [
                    'file_name' => $item->title,
                    'file_path' => $item->file,
                ])
        );

        $documents = $documents->merge(
            TeachingLeading::whereNotNull('file')->get()
                ->map(fn ($item) => [
                    'file_name' => $item->title,
                    'file_path' => $item->file,
                ])
        );

        $documents = $documents->merge(
            Administrative::whereNotNull('file')->get()
                ->map(fn ($item) => [
                    'file_name' => $item->title,
                    'file_path' => $item->file,
                ])
        );


        return view('frontends.documents', compact('sectionSetting', 'documents'));
    }
}
