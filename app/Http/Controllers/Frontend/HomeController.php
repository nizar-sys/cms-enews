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
use App\Models\BidChallengeSystemSectionSetting;
use App\Models\Comment;
use App\Models\CommunityVoiceSectionSetting;
use App\Models\ContractAwardNotice;
use App\Models\ContractAwardNoticeSectionSetting;
use App\Models\Director;
use App\Models\DirectorSectionSetting;
use App\Models\DocumentCategory;
use App\Models\DocumentFile;
use App\Models\DocumentSectionSetting;
use App\Models\DownloadLog;
use App\Models\ExecutiveSectionSetting;
use App\Models\ExecutiveTeam;
use App\Models\Faq;
use App\Models\GenderInclusion;
use App\Models\GeneralProcurement;
use App\Models\GuidelineProcurement;
use App\Models\GeneralSetting;
use App\Models\GuidelineSectionSetting;
use App\Models\Hero;
use App\Models\MonitoringEvaluation;
use App\Models\MovingText;
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
use App\Models\SocialBehaviour;
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
        // Fetch section settings and check if they exist
        $teamSectionSetting = ExecutiveSectionSetting::first();
        if ($teamSectionSetting) {
            $teamSectionSetting->title = translate($teamSectionSetting->title, app()->getLocale());
            $teamSectionSetting->sub_title = translate($teamSectionSetting->sub_title, app()->getLocale());
        }

        // Fetch and translate team designations
        $teams = ExecutiveTeam::with('designation')->get();
        foreach ($teams as $team) {
            if ($team->designation) {
                $team->designation->designation = translate($team->designation->designation, app()->getLocale());
            }
        }

        // Fetch posts and check if they exist
        $posts = Post::published()->with('author')->orderBy('created_at', 'desc')->get();
        foreach ($posts as $post) {
            if ($post) {
                $post->title = translate($post->title, app()->getLocale());
                $post->content = translate($post->content, app()->getLocale());
            }
        }

        // Fetch and check if about section exists
        $about = About::first();
        if ($about) {
            $about->title = translate($about->title, app()->getLocale());
            $about->description = translate($about->description, app()->getLocale());
        }

        // Fetch service section settings and check if they exist
        $serviceSection = ServiceSectionSetting::first();
        if ($serviceSection) {
            $serviceSection->title = translate($serviceSection->title, app()->getLocale());
            $serviceSection->sub_title = translate($serviceSection->sub_title, app()->getLocale());
        }

        // Fetch and translate services
        $services = Service::get();
        foreach ($services as $service) {
            if ($service) {
                $service->name = translate($service->name, app()->getLocale());
                $service->description = translate($service->description, app()->getLocale());
            }
        }

        // Get user information
        $user = Auth::user();

        // Fetch and translate directors
        $directors = Director::all();
        foreach ($directors as $director) {
            if ($director) {
                // Translate director description
                $director->description = translate($director->description, app()->getLocale());

                // Check if director has a designation and translate it
                if ($director->designation && $director->designation->designation) {
                    $director->designation->designation = translate($director->designation->designation, app()->getLocale());
                }
            }
        }

        // Fetch director section settings and check if they exist
        $directorSectionSetting = DirectorSectionSetting::first();
        if ($directorSectionSetting) {
            $directorSectionSetting->title = translate($directorSectionSetting->title, app()->getLocale());
            $directorSectionSetting->sub_title = translate($directorSectionSetting->sub_title, app()->getLocale());
        }

        // Fetch video events and translate titles
        $videoEvents = VideoGallery::get();
        foreach ($videoEvents as $videoEvent) {
            if ($videoEvent) {
                $videoEvent->title = translate($videoEvent->title, app()->getLocale());
            }
        }

        // Fetch photo projects and translate section settings if they exist
        $photoProjects = PhotoProject::all();
        $photoProjectSectionSetting = PhotoGallerySectionSetting::first();
        if ($photoProjectSectionSetting) {
            $photoProjectSectionSetting->title = translate($photoProjectSectionSetting->title, app()->getLocale());
            $photoProjectSectionSetting->description = translate($photoProjectSectionSetting->description, app()->getLocale());
        }

        // Translate moving text
        $movingText = MovingText::first();
        if ($movingText) {
            $movingText->moving_text = translate($movingText->moving_text, app()->getLocale());
        }

        return view('frontends.home', compact(
            'teamSectionSetting',
            'teams',
            'posts',
            'about',
            'serviceSection',
            'services',
            'user',
            'directors',
            'directorSectionSetting',
            'videoEvents',
            'photoProjects',
            'photoProjectSectionSetting',
            'movingText'
        ));
    }

    public function projectCategory($locale, $slugCategory)
    {

        $projectCategory = ProjectCategory::where('slug', $slugCategory)->firstOrFail();

        $latestProjectsUpdate = null;

        if ($projectCategory->slug == 'latest-project-updates') {
            $latestProjectsUpdate = ProjectCategory::orderBy('updated_at', 'desc')->take(2)->get();
        }

        return view('frontends.project_category', compact('projectCategory', 'latestProjectsUpdate'));
    }

    public function projectDetail($locale, $slugCategory, $slugProject)
    {

        $project = Project::where('slug', $slugProject)->firstOrFail();

        $projects = Project::where('category_id', $project->category_id)->get();

        $prevProject = $projects->where('id', '<', $project->id)->sortByDesc('id')->first();
        $nextProject = $projects->where('id', '>', $project->id)->sortBy('id')->first();

        $latestNews = News::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();

        return view('frontends.project_detail', compact('project', 'prevProject', 'nextProject', 'latestNews'));
    }

    public function documentCategory($locale, $slugCategoryDocumentReport)
    {

        $documentsReportsCategory = DocumentCategory::with('documentFiles')->where('slug', $slugCategoryDocumentReport)->firstOrFail();

        return view('frontends.document_category', compact('documentsReportsCategory'));
    }

    public function procurementNotice($locale)
    {
        // Fetch specific procurements and translate title and file_name columns
        $spesificProcurements = SpesificProcurement::with('files')->get();
        foreach ($spesificProcurements as $procurement) {
            $procurement->title = translate($procurement->title, $locale);

            // Translate file_name for associated files
            foreach ($procurement->files as $file) {
                $file->file_name = translate($file->file_name, $locale);
            }
        }

        // Fetch general procurements and translate title and duration columns
        $generalProcurements = GeneralProcurement::get();
        foreach ($generalProcurements as $procurement) {
            $procurement->title = translate($procurement->title, $locale);
            $procurement->duration = translate($procurement->duration, $locale);
        }

        // Fetch and translate section setting
        $sectionSetting = NoticesSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        // Fetch the latest procurement date
        $latestProcurementDate = GeneralProcurement::max('created_at');

        return view('frontends.procurement_notice', compact('spesificProcurements', 'generalProcurements', 'sectionSetting', 'latestProcurementDate'));
    }

    public function procurementNoticeFile($locale, $spesificProcurementId)
    {
        // Fetch specific procurement along with associated files and translate relevant fields
        $spesificProcurement = SpesificProcurement::with('files')->where('id', $spesificProcurementId)->firstOrFail();

        // Translate specific procurement fields and associated file fields
        $spesificProcurement->title = translate($spesificProcurement->title, $locale);

        foreach ($spesificProcurement->files as $file) {
            $file->file_name = translate($file->file_name, $locale);
            $file->category = translate($file->category, $locale);
        }

        // Get the latest procurement files date
        $latestProcurementFilesDate = SpesificProcurementFile::max('created_at');

        return view('frontends.procurement_notice_file', compact('spesificProcurement', 'latestProcurementFilesDate'));
    }

    public function procurementGuideline($locale)
    {
        // Fetch guidelines procurement and translate the category field
        $guidelinesProcurement = GuidelineProcurement::get();

        // Translate the category column for each procurement guideline
        foreach ($guidelinesProcurement as $guideline) {
            $guideline->category = translate($guideline->category, $locale);
        }

        // Fetch section setting and latest procurement date
        $sectionSetting = GuidelineSectionSetting::first();
        $latestProcurementDate = GuidelineProcurement::max('created_at');

        return view('frontends.procurement_guideline', compact('guidelinesProcurement', 'sectionSetting', 'latestProcurementDate'));
    }

    public function bidChallengeSystem($locale)
    {
        // Fetch bid challenge system data and translate the file_name field
        $bidChallengeSystem = BidChallengeSystem::get();

        // Translate the file_name column for each bid challenge system entry
        foreach ($bidChallengeSystem as $bidChallenge) {
            $bidChallenge->file_name = translate($bidChallenge->file_name, $locale);
        }

        // Fetch section setting and latest bid challenge date
        $sectionSetting = BidChallengeSystemSectionSetting::first();
        $latestBidChallengeDate = BidChallengeSystem::max('created_at');

        return view('frontends.bid_challenge_system', compact('bidChallengeSystem', 'sectionSetting', 'latestBidChallengeDate'));
    }

    public function contractAwardNotice($locale)
    {
        // Fetch contract award notice data and translate the file_name field
        $contractAwardNotice = ContractAwardNotice::get();

        // Translate the file_name column for each contract award notice entry
        foreach ($contractAwardNotice as $notice) {
            $notice->file_name = translate($notice->file_name, $locale);
        }

        // Fetch section setting and latest contract award date
        $sectionSetting = ContractAwardNoticeSectionSetting::first();
        $latestContractAwardDate = ContractAwardNotice::max('created_at');

        return view('frontends.contract_award_notice', compact('contractAwardNotice', 'sectionSetting', 'latestContractAwardDate'));
    }

    public function photoGallery($locale)
    {
        // Fetch and translate photo galleries and their album names
        $photoGalleries = PhotoGallery::with('photoGalleryAlbum')->get()->groupBy('album_id');

        $photoGalleries->each(function ($galleryGroup) use ($locale) {
            foreach ($galleryGroup as $gallery) {
                if ($gallery->photoGalleryAlbum) {
                    $gallery->photoGalleryAlbum->name = translate($gallery->photoGalleryAlbum->name, $locale);
                }
            }
        });

        // Fetch and translate the section settings
        $sectionSetting = PhotoGallerySectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
        }

        return view('frontends.photo_gallery', compact('photoGalleries', 'sectionSetting'));
    }

    public function photoProject($locale)
    {
        // Fetch and translate photo projects and their album names
        $photoProjects = PhotoProject::with('photoProjectAlbum')->get()->groupBy('album_id');

        foreach ($photoProjects as $albumId => $projects) {
            foreach ($projects as $project) {
                if ($project->photoProjectAlbum) {
                    // Translate the album name
                    $project->photoProjectAlbum->name = translate($project->photoProjectAlbum->name, $locale);
                }
            }
        }

        // Fetch and translate section settings
        $sectionSetting = PhotoSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale); // Assuming there's a sub_title field
        }

        return view('frontends.photo_project', compact('photoProjects', 'sectionSetting'));
    }

    public function videoGallery($locale)
    {
        // Fetch and translate video galleries
        $videoGalleries = VideoGallery::get();

        // Fetch and translate the section settings
        $sectionSetting = VideoGallerySectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale); // Assuming there's a sub_title field
        }

        return view('frontends.video_gallery', compact('videoGalleries', 'sectionSetting'));
    }

    public function videoProject($locale)
    {
        // Fetch video projects and translate title field
        $videoProjects = VideoProject::get();

        foreach ($videoProjects as $videoProject) {
            $videoProject->title = translate($videoProject->title, $locale);
            // Add any other fields that require translation
        }

        // Fetch and translate section setting
        $sectionSetting = VideoSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale); // Assuming there's a sub_title field
        }

        return view('frontends.video_project', compact('videoProjects', 'sectionSetting'));
    }

    public function notices($locale)
    {
        $noticeFiles = Notice::get();

        return view('frontends.notices', compact('noticeFiles'));
    }

    public function pressReleases($locale)
    {
        // Fetch and translate press releases
        $pressReleases = PressRelease::get();

        foreach ($pressReleases as $pressRelease) {
            // Translate the file_name column
            $pressRelease->file_name = translate($pressRelease->file_name, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = PressReleaseSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale); // Assuming there's a sub_title field
        }

        return view('frontends.press_releases', compact('pressReleases', 'sectionSetting'));
    }

    public function articlesInterviews($locale)
    {
        // Fetch articles and interviews and translate necessary fields
        $articlesInterviews = Article::with('category')->get()->groupBy('category_id');

        foreach ($articlesInterviews as $categoryId => $articles) {
            foreach ($articles as $article) {
                $article->title = translate($article->title, $locale);
                $article->description = translate($article->description, $locale);

                if ($article->category) {
                    $article->category->category_name = translate($article->category->category_name, $locale);
                }
            }
        }

        // Fetch and translate section setting
        $sectionSetting = ArticleSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.articles_interviews', compact('articlesInterviews', 'sectionSetting'));
    }

    public function communityVoices($locale)
    {
        // Fetch and translate community voices
        $communityVoices = CommunityVoice::get();
        foreach ($communityVoices as $voice) {
            $voice->title = translate($voice->title, $locale);
            $voice->description = translate($voice->description, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = CommunityVoiceSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale); // Assuming there's a sub_title field
        }

        return view('frontends.community_voices', compact('communityVoices', 'sectionSetting'));
    }

    public function communityVoiceDetail($locale, $slugCommunityVoice)
    {
        // Fetch and translate the community voice
        $communityVoice = CommunityVoice::where('slug', $slugCommunityVoice)->firstOrFail();
        $communityVoice->title = translate($communityVoice->title, $locale);
        $communityVoice->description = translate($communityVoice->description, $locale);

        // Fetch and translate the section settings
        $sectionSetting = CommunityVoiceSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale); // Assuming there's a sub_title field
        }

        return view('frontends.community_voice_detail', compact('communityVoice', 'sectionSetting'));
    }

    public function newsList($locale)
    {
        // Fetch and translate news list
        $news = News::query()->orderBy('created_at', 'desc')->paginate(10);

        foreach ($news as $item) {
            // Translate title and description columns
            $item->title = translate($item->title, $locale);
            $item->description = translate($item->description, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = NewsSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.news', compact('news', 'sectionSetting'));
    }

    public function newsDetail($locale, $newsId)
    {
        // Fetch and translate the specific news item
        $news = News::where('id', $newsId)->firstOrFail();
        $news->title = translate($news->title, $locale);
        $news->description = translate($news->description, $locale);

        // Fetch and translate the next news item
        $nextNews = News::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        if ($nextNews) {
            $nextNews->title = translate($nextNews->title, $locale);
        }

        // Fetch and translate the previous news item
        $prevNews = News::where('id', '<', $news->id)->orderBy('id', 'desc')->first();
        if ($prevNews) {
            $prevNews->title = translate($prevNews->title, $locale);
        }

        // Fetch and translate the latest news items
        $latestNews = News::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestNews as $latest) {
            $latest->title = translate($latest->title, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = NewsSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->sub_title = translate($sectionSetting->sub_title, $locale); // Assuming a sub_title field
        }

        return view('frontends.news_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function postDetail($locale, $id)
    {
        // Fetch the post and translate its title and content
        $post = Post::where('id', $id)->firstOrFail();
        $post->title = translate($post->title, $locale);
        $post->content = translate($post->content, $locale);

        // Fetch next and previous posts and translate their titles
        $nextPost = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        if ($nextPost) {
            $nextPost->title = translate($nextPost->title, $locale);
        }

        $prevPost = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        if ($prevPost) {
            $prevPost->title = translate($prevPost->title, $locale);
        }

        // Fetch latest posts and translate their titles
        $latestPost = Post::select('title', 'created_at', 'id', 'slug')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestPost as $latest) {
            $latest->title = translate($latest->title, $locale);
        }

        // Fetch and translate section setting
        $sectionSetting = PostSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        // Fetch comments and translate comment content
        $comments = Comment::all();
        foreach ($comments as $comment) {
            $comment->comment = translate($comment->comment, $locale);
        }

        return view('frontends.post_detail', compact('post', 'nextPost', 'prevPost', 'latestPost', 'sectionSetting', 'comments'));
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
        $locale = session('locale', 'en');
        $query = $request->input('search');

        $results = collect();

        if ($query) {
            $results = $results->merge(
                BidChallengeSystem::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => route('download.uploads', [
                            'file' => $item->file_path,
                            'model' => get_class($item),
                            'id' => $item->id
                        ]),
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Bid Challenge System'
                    ])
            );

            $results = $results->merge(
                ContractAwardNotice::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => route('download.uploads', [
                            'file' => $item->file_path,
                            'model' => get_class($item),
                            'id' => $item->id
                        ]),
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Contract Award Notice'
                    ])
            );

            $results = $results->merge(
                DocumentFile::where('filename', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => route('download.uploads', [
                            'file' => $item->file_path,
                            'model' => get_class($item),
                            'id' => $item->id
                        ]),
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Document File'
                    ])
            );

            $results = $results->merge(
                GuidelineProcurement::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => route('download.uploads', [
                            'file' => $item->file_path,
                            'model' => get_class($item),
                            'id' => $item->id
                        ]),
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Guideline Procurement'
                    ])
            );

            $results = $results->merge(
                News::where('title', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $item->id]),
                        'isFile' => false,
                        'type' => 'News'
                    ])
            );

            $results = $results->merge(
                Notice::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => route('download.uploads', [
                            'file' => $item->file_path,
                            'model' => get_class($item),
                            'id' => $item->id
                        ]),
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
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => route('posts-detail', ['locale' => session('locale', 'en'), 'post' => $item->slug]),
                        'isFile' => false,
                        'type' => 'Post'
                    ])
            );

            $results = $results->merge(
                PressRelease::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => route('download.uploads', [
                            'file' => $item->file_path,
                            'model' => get_class($item),
                            'id' => $item->id
                        ]),
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => __('app.press_releases')
                    ])
            );

            $results = $results->merge(
                SpesificProcurementFile::where('file_name', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => route('download.uploads', [
                            'file' => $item->file_path,
                            'model' => get_class($item),
                            'id' => $item->id
                        ]),
                        'detail' => $item->file_path,
                        'isFile' => true,
                        'type' => 'Spesific Procurement File'
                    ])
            );

            $results = $results->merge(
                Director::with('designation')->where('name', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->orWhereHas('designation', function ($q) use ($query) {
                        $q->where('designation', 'like', "%$query%");
                    })
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->name,
                        'detail' => route('mca-tl.board-of-director', ['locale' => $locale]),
                        'isFile' => false,
                        'type' => __('app.board_of_directors')
                    ])
            );

            $results = $results->merge(
                ExecutiveTeam::where('name', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->orWhereHas('designation', function ($q) use ($query) {
                        $q->where('designation', 'like', "%$query%");
                    })
                    ->with('designation')
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->name,
                        'detail' => route('mca-tl.executive-team', ['locale' => $locale]),
                        'isFile' => false,
                        'type' => __('app.executive_team')
                    ])
            );

            $results = $results->merge(
                WaterSanitation::where('title', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => route('what-we-do.water-sanitations-detail', [
                            'locale' => $locale,
                            'id' => $item->id
                        ]),
                        'isFile' => false,
                        'type' => __('app.Water & Sanitation')
                    ])
            );

            $results = $results->merge(
                TeachingLeading::where('title', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => route('what-we-do.teaching-leadings-detail', [
                            'locale' => $locale,
                            'id' => $item->id
                        ]),
                        'isFile' => false,
                        'type' => __('app.Teaching & Leading')
                    ])
            );

            $results = $results->merge(
                Administrative::where('title', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => route('what-we-do.administrative-detail', [
                            'locale' => $locale,
                            'id' => $item->id
                        ]),
                        'isFile' => false,
                        'type' => __('app.Administrative')
                    ])
            );

            $results = $results->merge(
                WaterSanitation::whereNotNull('file')->get()
                    ->filter(fn($item) => str_contains($item->file, $query))
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => $item->file,
                        'isFile' => true,
                        'type' => __('app.Water & Sanitation')
                    ]),

                TeachingLeading::whereNotNull('file')->get()
                    ->filter(fn($item) => str_contains($item->file, $query))
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => $item->file,
                        'isFile' => true,
                        'type' => __('app.Teaching & Leading')
                    ]),

                Administrative::whereNotNull('file')->get()
                    ->filter(fn($item) => str_contains($item->file, $query))
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => $item->file,
                        'isFile' => true,
                        'type' => __('app.Administrative')
                    ])
            );

            $results = $results->merge(
                Article::where('title', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => route('projects.articles-interviews', [
                            'locale' => $locale,
                        ]),
                        'isFile' => false,
                        'type' => __('app.Articles & Interviews')
                    ])
            );

            $results = $results->merge(
                CommunityVoice::where('title', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->orWhere('slug', 'like', "%$query%")
                    ->get()
                    ->map(fn($item) => [
                        'title' => $item->title,
                        'detail' => route('media-notices.community-voice-detail', [
                            'locale' => $locale,
                            'slug' => $item->slug
                        ]),
                        'isFile' => false,
                        'type' => __('app.Community Voices')
                    ])
            );
        }

        return response()->json($results);
    }

    public function waterSanitationList($locale)
    {
        // Fetch and translate news items
        $news = WaterSanitation::query()->orderBy('created_at', 'desc')->paginate(10);
        foreach ($news as $item) {
            $item->title = translate($item->title, $locale);
            $item->description = translate($item->description, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = WaterSanitationSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.water_sanitation', compact('news', 'sectionSetting'));
    }

    public function waterSanitationDetail($locale, $newsId)
    {
        // Fetch and translate the main news item
        $news = WaterSanitation::where('id', $newsId)->firstOrFail();
        $news->title = translate($news->title, $locale);
        $news->description = translate($news->description, $locale);

        // Fetch and translate the next news item
        $nextNews = WaterSanitation::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        if ($nextNews) {
            $nextNews->title = translate($nextNews->title, $locale);
        }

        // Fetch and translate the previous news item
        $prevNews = WaterSanitation::where('id', '<', $news->id)->orderBy('id', 'desc')->first();
        if ($prevNews) {
            $prevNews->title = translate($prevNews->title, $locale);
        }

        // Fetch and translate the latest news items
        $latestNews = WaterSanitation::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestNews as $item) {
            $item->title = translate($item->title, $locale);
        }

        // Fetch and translate section settings
        $sectionSetting = WaterSanitationSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.water_sanitation_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function teachingLeadingList($locale)
    {
        // Fetch and translate the news items
        $news = TeachingLeading::query()->orderBy('created_at', 'desc')->paginate(10);
        foreach ($news as $item) {
            $item->title = translate($item->title, $locale);
        }

        // Fetch and translate the section settings
        $sectionSetting = TeachingLeadingSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.teaching_leading', compact('news', 'sectionSetting'));
    }

    public function teachingLeadingDetail($locale, $newsId)
    {
        // Fetch and translate the current news
        $news = TeachingLeading::where('id', $newsId)->firstOrFail();
        $news->title = translate($news->title, $locale);
        $news->description = translate($news->description, $locale);

        // Fetch and translate the next news item
        $nextNews = TeachingLeading::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        if ($nextNews) {
            $nextNews->title = translate($nextNews->title, $locale);
        }

        // Fetch and translate the previous news item
        $prevNews = TeachingLeading::where('id', '<', $news->id)->orderBy('id', 'desc')->first();
        if ($prevNews) {
            $prevNews->title = translate($prevNews->title, $locale);
        }

        // Fetch and translate the latest news items
        $latestNews = TeachingLeading::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestNews as $item) {
            $item->title = translate($item->title, $locale);
        }

        // Translate the section setting (title and description)
        $sectionSetting = TeachingLeadingSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.teaching_leading_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function administrativeList($locale)
    {
        // Fetch and translate the news items
        $news = Administrative::query()->orderBy('created_at', 'desc')->paginate(10);
        foreach ($news as $item) {
            $item->title = translate($item->title, $locale);
            $item->description = translate($item->description, $locale);
        }

        // Translate the section setting (title and description)
        $sectionSetting = AdministrativeSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.administrative', compact('news', 'sectionSetting'));
    }

    public function administrativeDetail($locale, $newsId)
    {
        // Fetch and translate the news item
        $news = Administrative::where('id', $newsId)->firstOrFail();
        $news->title = translate($news->title, $locale);
        $news->description = translate($news->description, $locale);

        // Fetch and translate the next news item
        $nextNews = Administrative::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        if ($nextNews) {
            $nextNews->title = translate($nextNews->title, $locale);
        }

        // Fetch and translate the previous news item
        $prevNews = Administrative::where('id', '<', $news->id)->orderBy('id', 'desc')->first();
        if ($prevNews) {
            $prevNews->title = translate($prevNews->title, $locale);
        }

        // Fetch and translate the latest news items
        $latestNews = Administrative::select('title', 'created_at', 'id')->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($latestNews as $item) {
            $item->title = translate($item->title, $locale);
        }

        // Translate the section setting (if it exists)
        $sectionSetting = AdministrativeSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        return view('frontends.administrative_detail', compact('news', 'nextNews', 'prevNews', 'latestNews', 'sectionSetting'));
    }

    public function documentList($locale)
    {
        // Fetch and translate the section setting
        $sectionSetting = DocumentSectionSetting::first();
        if ($sectionSetting) {
            $sectionSetting->title = translate($sectionSetting->title, $locale);
            $sectionSetting->description = translate($sectionSetting->description, $locale);
        }

        $documents = collect(); // Create an empty collection

        // Merge documents from WaterSanitation and translate their titles
        $documents = $documents->merge(
            WaterSanitation::whereNotNull('file')->get()
                ->map(fn($item) => [
                    'file_name' => translate($item->title, $locale), // Translate title
                    'file_path' => $item->file,
                    'model' => $item,
                    'id' => $item->id,
                    'pageName' => translate('Water Sanitation', $locale), // Translate page name
                ])
        );

        // Merge documents from TeachingLeading and translate their titles
        $documents = $documents->merge(
            TeachingLeading::whereNotNull('file')->get()
                ->map(fn($item) => [
                    'file_name' => translate($item->title, $locale), // Translate title
                    'file_path' => $item->file,
                    'model' => $item,
                    'id' => $item->id,
                    'pageName' => translate('Teaching and Leading', $locale), // Translate page name
                ])
        );

        // Merge documents from Administrative and translate their titles
        $documents = $documents->merge(
            Administrative::whereNotNull('file')->get()
                ->map(fn($item) => [
                    'file_name' => translate($item->title, $locale), // Translate title
                    'file_path' => $item->file,
                    'model' => $item,
                    'id' => $item->id,
                    'pageName' => translate('Administrative', $locale), // Translate page name
                ])
        );

        return view('frontends.documents', compact('sectionSetting', 'documents'));
    }

    public function aboutmeDetail($locale)
    {
        $about = About::first();
        return view('frontends.aboutme-detail', compact('about'));
    }

    public function downloadFile(Request $request, $file)
    {
        $model = $request->query('model');
        $id = $request->query('id');
        $userId = Auth::id();

        if ($model && $id && $userId) {
            $alreadyDownloaded = DownloadLog::where('user_id', $userId)
                ->where('downloadable_type', $model)
                ->where('downloadable_id', $id)
                ->exists();

            if (!$alreadyDownloaded) {
                $modelInstance = app($model)->find($id);
                if ($modelInstance) {
                    $modelInstance->increment('file_downloaded');
                    DownloadLog::create([
                        'user_id' => $userId,
                        'downloadable_type' => $model,
                        'downloadable_id' => $id,
                    ]);
                }
            }
        }

        return redirect(asset($file));
    }

    public function socialBehaviourChanges()
    {
        $socialBehaviour = SocialBehaviour::first();
        return view('frontends.social-behaviour', compact('socialBehaviour'));
    }

    public function genderSocialInclusion()
    {
        $genderInclusion = GenderInclusion::first();
        return view('frontends.gender-inclusion', compact('genderInclusion'));
    }

    public function monitoringEvaluation()
    {
        $monitoringEvaluation = MonitoringEvaluation::first();
        return view('frontends.monitoring-evaluation', compact('monitoringEvaluation'));
    }
}
