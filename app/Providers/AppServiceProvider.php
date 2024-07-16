<?php

namespace App\Providers;

use App\Models\DocumentCategory;
use App\Models\FooterSetting;
use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();

        View::composer('*', function ($view) {
            $view->with('documentsReportsCategories', DocumentCategory::select(['name', 'slug'])->get());
        });

        View::composer('*', function ($view) {
            $view->with('generalSetting', GeneralSetting::first());
        });

        View::composer('*', function ($view) {
            $view->with('footerSettings', FooterSetting::all());
        });
    }
}
