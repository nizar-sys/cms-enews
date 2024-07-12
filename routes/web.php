<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\CategoryController;
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
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\OrganizationalChartSectionSettingController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceSectionSettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\TeacherController;
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
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {


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
});
