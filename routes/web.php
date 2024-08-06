<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentCategoryController;
use App\Http\Controllers\Admin\DocumentFileController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommunityVoiceController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\DirectorSectionSettingController;
use App\Http\Controllers\Admin\ExecutiveController;
use App\Http\Controllers\Admin\ExecutiveSectionSettingController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\KrfSectionController;
use App\Http\Controllers\Admin\KrfImageController;
use App\Http\Controllers\Admin\GalleryAlbumController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GallerySectionSettingController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GeneralProcurementController;
use App\Http\Controllers\Admin\JobListController;
use App\Http\Controllers\Admin\JobSectionSettingController;
use App\Http\Controllers\Admin\JobsSectionController;
use App\Http\Controllers\Admin\OrganizationalChartSectionSettingController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BidChallengeSystemController;
use App\Http\Controllers\Admin\ContractAwardNoticeController;
use App\Http\Controllers\Admin\GuidelineProcurementController;
use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\NoticeController;

use App\Http\Controllers\Admin\SpesificProcurementController;
use App\Http\Controllers\Admin\SpesificProcurementFileController;

use App\Http\Controllers\Admin\PressReleaseController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\SpesificProcurement;
use App\Http\Controllers\Admin\PhotoGalleryAlbumController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\FaqController as FrontendFaqController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\McaNepal\BoardOfDirectorController;
use App\Http\Controllers\McaNepal\ExecutiveTeamController;
use App\Http\Controllers\McaNepal\OrganizationalChartController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Route;

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return 'Optimize Clear';
});

Route::get('/', [HomeController::class, 'index'])->name('home');

/** Admin Routes */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

/** Admin Route**/
Route::group(['middleware' => ['auth'], 'prefix' => 'console', 'as' => 'admin.'], function () {


    Route::prefix('board-of-directors')->name('bod.')->group(function () {
        // Director Section Setting
        Route::get('/director-section-setting', [DirectorSectionSettingController::class, 'index'])->name('director-section-setting');
        Route::put('/{director}/update', [DirectorSectionSettingController::class, 'update'])->name('director-section-setting.update');

        // Designation
        Route::get('/designation', [DesignationController::class, 'index'])->name('designation');
        Route::get('/designation/create', [DesignationController::class, 'create'])->name('designation.create');
        Route::post('/designation/store', [DesignationController::class, 'store'])->name('designation.store');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::put('/designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update');
        Route::delete('/designation/{id}', [DesignationController::class, 'destroy'])->name('designation.destroy');

        // Director
        Route::get('/directors', [DirectorController::class, 'index'])->name('director');
        Route::get('/director/create', [DirectorController::class, 'create'])->name('director.create');
        Route::post('/director/store', [DirectorController::class, 'store'])->name('director.store');
        Route::get('/director/edit/{id}', [DirectorController::class, 'edit'])->name('director.edit');
        Route::put('/director/update/{id}', [DirectorController::class, 'update'])->name('director.update');
        Route::delete('/director/{id}', [DirectorController::class, 'destroy'])->name('director.destroy');

        // Executive Teams
        Route::resource('executive-section-setting', ExecutiveSectionSettingController::class)->only(['index', 'update']);
        Route::resource('executive-teams', ExecutiveController::class)->except('show');

        // Organizational Chart
        Route::resource('organizational-chart-settings', OrganizationalChartSectionSettingController::class);
    });



    /**Setting Route**/
    Route::get('settings', SettingController::class)->name('setting.index');

    /**General Setting Route **/
    Route::resource('general-setting', GeneralSettingController::class);

    /**Seo Setting Route **/
    Route::resource('seo-setting', SeoSettingController::class);

    // Footer Setting
    Route::resource('footer-setting', FooterSettingController::class);

    /**Projects Route**/
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::resource('projects', ProjectController::class);

    /**Documents & Reports Route**/
    Route::resource('documents-reports-categories', DocumentCategoryController::class);
    Route::resource('documents-reports-files', DocumentFileController::class);


    /** Media / Notices Route */
    // News Route
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/store', [NewsController::class, 'store'])->name('news.store');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/update/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    });

    // CommunityVoice Route
    Route::prefix('community-voice')->group(function () {
        Route::get('/', [CommunityVoiceController::class, 'index'])->name('community-voice.index');
        Route::get('/create', [CommunityVoiceController::class, 'create'])->name('community-voice.create');
        Route::post('/store', [CommunityVoiceController::class, 'store'])->name('community-voice.store');
        Route::get('/edit/{id}', [CommunityVoiceController::class, 'edit'])->name('community-voice.edit');
        Route::put('/update/{id}', [CommunityVoiceController::class, 'update'])->name('community-voice.update');
        Route::delete('/{id}', [CommunityVoiceController::class, 'destroy'])->name('community-voice.destroy');
    });

    // Articles Route
    Route::prefix('articles')->group(function () {
        Route::get('/category', [ArticleCategoryController::class, 'index'])->name('article.category.index');
        Route::get('/category/create', [ArticleCategoryController::class, 'create'])->name('article.category.create');
        Route::post('/category/store', [ArticleCategoryController::class, 'store'])->name('article.category.store');
        Route::get('/category/edit/{id}', [ArticleCategoryController::class, 'edit'])->name('article.category.edit');
        Route::put('/category/update/{id}', [ArticleCategoryController::class, 'update'])->name('article.category.update');
        Route::delete('/category/{id}', [ArticleCategoryController::class, 'destroy'])->name('article.category.destroy');

        Route::get('/', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
        Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    });

    // Notice Route
    Route::prefix('notice')->group(function () {
        Route::get('/', [NoticeController::class, 'index'])->name('notice.index');
        Route::get('/create', [NoticeController::class, 'create'])->name('notice.create');
        Route::post('/store', [NoticeController::class, 'store'])->name('notice.store');
        Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
        Route::put('/update/{id}', [NoticeController::class, 'update'])->name('notice.update');
        Route::delete('/{id}', [NoticeController::class, 'destroy'])->name('notice.destroy');
    });

    Route::prefix('press-release')->group(function () {
        Route::get('/', [PressReleaseController::class, 'index'])->name('press-release.index');
        Route::get('/create', [PressReleaseController::class, 'create'])->name('press-release.create');
        Route::post('/store', [PressReleaseController::class, 'store'])->name('press-release.store');
        Route::get('/edit/{id}', [PressReleaseController::class, 'edit'])->name('press-release.edit');
        Route::put('/update/{id}', [PressReleaseController::class, 'update'])->name('press-release.update');
        Route::delete('/{id}', [PressReleaseController::class, 'destroy'])->name('press-release.destroy');
    });

    // Photo Gallery Route
    Route::prefix('photo-gallery')->group(function () {
        Route::get('/albums', [PhotoGalleryAlbumController::class, 'index'])->name('photo-gallery.album.index');
        Route::get('/albums/create', [PhotoGalleryAlbumController::class, 'create'])->name('photo-gallery.album.create');
        Route::post('/albums/store', [PhotoGalleryAlbumController::class, 'store'])->name('photo-gallery.album.store');
        Route::get('/albums/edit/{id}', [PhotoGalleryAlbumController::class, 'edit'])->name('photo-gallery.album.edit');
        Route::put('/albums/update/{id}', [PhotoGalleryAlbumController::class, 'update'])->name('photo-gallery.album.update');
        Route::delete('/albums/{id}', [PhotoGalleryAlbumController::class, 'destroy'])->name('photo-gallery.album.destroy');

        Route::get('/', [PhotoGalleryController::class, 'index'])->name('photo-gallery.index');
        Route::get('/create', [PhotoGalleryController::class, 'create'])->name('photo-gallery.create');
        Route::post('/store', [PhotoGalleryController::class, 'store'])->name('photo-gallery.store');
        Route::get('/edit/{id}', [PhotoGalleryController::class, 'edit'])->name('photo-gallery.edit');
        Route::put('/update/{id}', [PhotoGalleryController::class, 'update'])->name('photo-gallery.update');
        Route::delete('/{id}', [PhotoGalleryController::class, 'destroy'])->name('photo-gallery.destroy');

        // Route::resource('gallery-section-setting', GallerySectionSettingController::class);
    });

    // Video Gallery Route
    Route::prefix('video-gallery')->group(function () {
        Route::get('/', [VideoGalleryController::class, 'index'])->name('video-gallery.index');
        Route::get('/create', [VideoGalleryController::class, 'create'])->name('video-gallery.create');
        Route::post('/store', [VideoGalleryController::class, 'store'])->name('video-gallery.store');
        Route::get('/edit/{id}', [VideoGalleryController::class, 'edit'])->name('video-gallery.edit');
        Route::put('/update/{id}', [VideoGalleryController::class, 'update'])->name('video-gallery.update');
        Route::delete('/{id}', [VideoGalleryController::class, 'destroy'])->name('video-gallery.destroy');
    });

    /**Spesific Procurements Route**/
    Route::prefix('spesific-procurements-notices/{spesificProcurementsNotice}')->name('spesific-procurements-notices.')->group(function () {
        Route::resource('files', SpesificProcurementFileController::class)->except('index');
    });
    Route::resource('spesific-procurements-notices', SpesificProcurementController::class);

    /**General Procurements Route**/
    Route::prefix('general-procurements-notices/{spesificProcurementsNotice}')->name('general-procurements-notices.')->group(function () {
        Route::resource('files', GeneralProcurementController::class)->except('index');
    });
    Route::resource('general-procurements-notices', GeneralProcurementController::class);

    /**Guideline Procurements Route**/
    Route::resource('procurements-guidelines', GuidelineProcurementController::class);

    /**Bid Challenge System Procurements Route**/
    Route::resource('procurements-bid-challenge-systems', BidChallengeSystemController::class)->parameter('procurements-bid-challenge-systems', 'bidChallengeSystem');
    Route::resource('procurements-contract-award-notices', ContractAwardNoticeController::class)->parameter('procurements-contract-award-notices', 'contractAwardNotice');
    // Job Section Setting
    Route::resource('job-section-setting', JobSectionSettingController::class)->only(['index', 'update']);

    // Job List
    Route::resource('job-lists', JobListController::class);

    // Faqs
    Route::resource('faqs', FaqController::class);

    // Contact
    Route::resource('contacts', ContactController::class)->only(['index', 'update']);

    Route::resource('footer-social', FooterSocialLinkController::class);

    Route::resource('hero', HeroController::class);

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});

Route::prefix('{locale}')->group(function () {

    Route::get('/', function ($locale) {
        if (!in_array($locale, ['en', 'pt'])) {
            abort(404);
        }
        session(['locale' => $locale]);
        App::setLocale($locale);

        // history url
        $url = url()->previous();
        // regex change segment 1 en or pt to $locale
        $url = preg_replace('/\/(en|pt)\//', '/' . $locale . '/', $url, 1);
        return redirect($url);
    });

    // MCA-NEPAL
    Route::prefix('mca-nepal')->name('mca-nepal.')->group(function () {
        // Board Of Directors
        Route::get('board-of-directors', [BoardOfDirectorController::class, 'index'])->name('board-of-director');

        // Executive Teams
        Route::get('executive-teams', [ExecutiveTeamController::class, 'index'])->name('executive-team');

        // Organizational Chart
        Route::get('organizational-charts', [OrganizationalChartController::class, 'index'])->name('organizational-chart');
    });

    Route::get('/projects/{slugCategory}/{slugProject}', [HomeController::class, 'projectDetail'])->name('project-detail');
    Route::get('/projects/{slugCategory}', [HomeController::class, 'projectCategory'])->name('project-category');
    Route::get('/documents-reports/{slugCategory}', [HomeController::class, 'documentCategory'])->name('document-category');
    Route::get('/procurements/procurement-notice/{spesificProcurementId}/files', [HomeController::class, 'procurementNoticeFile'])->name('procurement-notice-files');
    Route::get('/procurements/procurement-notice', [HomeController::class, 'procurementNotice'])->name('procurement-notice');
    Route::get('/procurements/guidelines', [HomeController::class, 'procurementGuideline'])->name('guidelines');
    Route::get('/procurements/bid-challenge-systems', [HomeController::class, 'bidChallengeSystem'])->name('procurement-bid-challenge-systems');
    Route::get('/procurements/contract-award-notices', [HomeController::class, 'contractAwardNotice'])->name('procurement-contract-award-notices');

    Route::prefix('media-notices')->name('media-notices.')->group(function () {
        Route::get('/photo-gallery', [HomeController::class, 'photoGallery'])->name('photo-gallery');
        Route::get('/video-gallery', [HomeController::class, 'videoGallery'])->name('video-gallery');
        Route::get('/notices', [HomeController::class, 'notices'])->name('notices');
        Route::get('/press-releases', [HomeController::class, 'pressReleases'])->name('press-releases');
        Route::get('/articles-interviews', [HomeController::class, 'articlesInterviews'])->name('articles-interviews');
        Route::get('/community-voices', [HomeController::class, 'communityVoices'])->name('community-voices');
        Route::get('/community-voices/{slug}', [HomeController::class, 'communityVoiceDetail'])->name('community-voice-detail');
        Route::get('/news', [HomeController::class, 'newsList'])->name('news');
        Route::get('/news/{new}', [HomeController::class, 'newsDetail'])->name('news-detail');
    });


    // JOBS
    Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.index');

    Route::get('/faqs', [FrontendFaqController::class, 'index'])->name('faq.index');
    Route::get('/contacts', [FrontendContactController::class, 'index'])->name('contact.index');

    Route::get('/posts/{post}', [HomeController::class, 'postDetail'])->name('posts-detail');

});
