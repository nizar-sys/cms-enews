<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\CommunityVoice;

use App\Models\BidChallengeSystem;
use App\Models\ContractAwardNotice;

use App\Models\DocumentCategory;
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
use App\Models\Post;
use App\Models\PressRelease;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\SpesificProcurement;
use App\Models\VideoGallery;

class HomeController extends Controller
{
    public function index()
    {
        // $projectCategories = ProjectCategory::select('name', 'slug')->get();
        // $generalSetting = GeneralSetting::first();
        // $faqs = Faq::select('question', 'answer')->get();
        // $news = News::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(2)->get();
        // $communityVoices = CommunityVoice::select('title', 'created_at', 'slug')->orderBy('created_at', 'desc')->take(2)->get();
        // $procurementNotices = SpesificProcurement::with('files')->select('title', 'created_at', 'date_of_publication', 'updated_at')->orderBy('created_at', 'desc')->take(3)->get();
        // $boardMeetingMinutes = DocumentCategory::with('documentFiles')->where('slug', 'board-meeting-minutes')->first();
        // $videoGalleries = VideoGallery::orderBy('created_at', 'desc')->take(1)->get();
        // $heroes = Hero::get();

        // $latestProjectsUpdate = ProjectCategory::orderBy('updated_at', 'desc')->take(2)->get();
        // $firstVideo = VideoGallery::orderBy('created_at', 'desc')->first();

        // return view('frontends.home', compact('projectCategories', 'generalSetting', 'faqs', 'news', 'communityVoices', 'procurementNotices', 'boardMeetingMinutes', 'heroes', 'videoGalleries', 'latestProjectsUpdate', 'firstVideo'));

        $sliders = Hero::select('id', 'title', 'description', 'image')->get();
        $teamSectionSetting = ExecutiveSectionSetting::first();
        $teams = ExecutiveTeam::with('designation')->get();
        $posts = Post::published()->with('author')->orderBy('created_at', 'desc')->get();

        return view('frontends.home', compact('sliders', 'teamSectionSetting', 'teams', 'posts'));
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

    public function videoGallery($locale)
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $videoGalleries = VideoGallery::get();

        return view('frontends.video_gallery', compact('projectCategories', 'videoGalleries'));
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
}
