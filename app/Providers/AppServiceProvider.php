<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\DocumentCategory;
use App\Models\FooterSetting;
use App\Models\FooterSocialLink;
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
            $view->with('generalSetting', GeneralSetting::first());
            $view->with('footerSetting', FooterSetting::first());
            $view->with('contactSetting', Contact::first());
            $view->with('footerSocialLink', FooterSocialLink::get());
        });
    }
}
