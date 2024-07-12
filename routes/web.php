<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Frontend\HomeController;
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
    /**Setting Route**/
    Route::get('settings', SettingController::class)->name('setting.index');

    /**General Setting Route **/
    Route::resource('general-setting', GeneralSettingController::class);

    /**Seo Setting Route **/
    Route::resource('seo-setting', SeoSettingController::class);

    /**Projects Route**/
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::resource('projects', ProjectController::class);
});

Route::prefix('{locale}')->group(function () {
    Route::get('/projects/{slugCategory}/{slugProject}', [HomeController::class, 'projectDetail'])->name('project-detail');
    Route::get('/projects/{slugCategory}', [HomeController::class, 'projectCategory'])->name('project-category');
});
