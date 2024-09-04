<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\DocumentCategory;
use App\Models\FooterInfo;
use App\Models\FooterSetting;
use App\Models\FooterSocialLink;
use App\Models\FooterUsefulLink;
use App\Models\GeneralSetting;
use App\Models\Hero;
use App\Models\ProjectCategory;
use App\Models\SeoSetting;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $locale = session('locale', config('app.locale'));

            $sliders = Hero::select('id', 'title', 'description', 'image')->get();

            $menuItems = [
                [
                    'label' => GoogleTranslate::trans('Home', app()->getLocale()),
                    'url' => url('/'),
                    'route' => 'home',
                ],
                [
                    'label' => GoogleTranslate::trans('About', app()->getLocale()),
                    'url' => '#',
                    'route' => ['mca_nepal', 'mca-nepal.board-of-director', 'mca-nepal.executive-team', 'mca-nepal.organizational-chart'],
                    'subItems' => [

                        ['label' => GoogleTranslate::trans('Board Of Directors', app()->getLocale()), 'url' => route('mca-nepal.board-of-director', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Executive Team', app()->getLocale()), 'url' => route('mca-nepal.executive-team', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Organizational Chart', app()->getLocale()), 'url' => route('mca-nepal.organizational-chart', ['locale' => $locale])]
                    ]
                ],

                [
                    'label' => GoogleTranslate::trans('What do we do', app()->getLocale()),
                    'url' => '#',
                    'route' => ['what-we-do.water-sanitations', 'what-we-do.water-sanitations-detail', 'what-we-do.teaching-leadings', 'what-we-do.teaching-leadings-detail', 'what-we-do.administrative', 'what-we-do.administrative-detail', 'what-we-do.documents'],
                    'subItems' => [
                        ['label' => GoogleTranslate::trans('Water & Sanitation', app()->getLocale()), 'url' => route('what-we-do.water-sanitations', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Teaching & Leading', app()->getLocale()), 'url' => route('what-we-do.teaching-leadings', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Administrative', app()->getLocale()), 'url' => route('what-we-do.administrative', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Documents', app()->getLocale()), 'url' => route('what-we-do.documents', ['locale' => $locale])],
                    ],
                ],

                [
                    'label' => GoogleTranslate::trans('projects', app()->getLocale()),
                    'url' => '#',
                    'route' => ['projects.posts', 'projects.articles-interviews', 'projects.video-projects', 'projects.photo-projects', 'posts-detail'],
                    'subItems' => [
                        ['label' => GoogleTranslate::trans('Posts', app()->getLocale()), 'url' => route('projects.posts', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Publications', app()->getLocale()), 'url' => route('projects.articles-interviews', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Video Project', app()->getLocale()), 'url' => route('projects.video-projects', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Photo Project', app()->getLocale()), 'url' => route('projects.photo-projects', ['locale' => $locale])],
                    ]
                ],
                [
                    'label' => GoogleTranslate::trans('Public Outreach', app()->getLocale()),
                    'url' => '#',
                    'route' => ['media_notices', 'media-notices.news', 'media-notices.community-voices', 'media-notices.articles-interviews', 'media-notices.notices', 'media-notices.press-releases', 'media-notices.photo-gallery', 'media-notices.video-gallery', 'media-notices.news-detail', 'media-notices.community-voice-detail'],
                    'subItems' => [
                        ['label' => GoogleTranslate::trans('Press Releases', app()->getLocale()), 'url' => route('media-notices.press-releases', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('News', app()->getLocale()), 'url' => route('media-notices.news', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Events Announcements', app()->getLocale()), 'url' => route('media-notices.community-voices', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Photo Events', app()->getLocale()), 'url' => route('media-notices.photo-gallery', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Video Events', app()->getLocale()), 'url' => route('media-notices.video-gallery', ['locale' => $locale])]
                    ]
                ],
                [
                    'label' => GoogleTranslate::trans('Work with Us', app()->getLocale()),
                    'url' => '#',
                    'route' => ['procurement', 'procurement-notice', 'guidelines', 'jobs.index', 'procurement-notice-files'],
                    'subItems' => [
                        ['label' => GoogleTranslate::trans('Procurement Notices', app()->getLocale()), 'url' => route('procurement-notice', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Procurement Guidelines', app()->getLocale()), 'url' => route('guidelines', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Bid Challenge System', app()->getLocale()), 'url' => route('procurement-bid-challenge-systems', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('Contract Award Notice', app()->getLocale()), 'url' => route('procurement-contract-award-notices', ['locale' => $locale])],
                        ['label' => GoogleTranslate::trans('HR Vacancies', app()->getLocale()), 'url' => route('jobs.index', ['locale' => $locale])],
                    ]
                ],
                [
                    'label' => GoogleTranslate::trans('Faqs', app()->getLocale()),
                    'url' => route('faq.index', ['locale' => $locale]),
                    'route' => 'faq.index',
                ],
                [
                    'label' => GoogleTranslate::trans('Contact', app()->getLocale()),
                    'url' => route('contact.index', ['locale' => $locale]),
                    'route' => 'contact.index',
                ]
            ];

            $today = Carbon::today()->toDateString();
            $yesterday = Carbon::yesterday()->toDateString();
            $thisWeekStart = Carbon::now()->startOfWeek()->toDateString();
            $thisWeekEnd = Carbon::now()->endOfWeek()->toDateString();
            $lastWeekStart = Carbon::now()->subWeek()->startOfWeek()->toDateString();
            $lastWeekEnd = Carbon::now()->subWeek()->endOfWeek()->toDateString();
            $thisMonth = Carbon::now()->month;
            $lastMonth = Carbon::now()->subMonth()->month;

            $visitorCounts = Visitor::select(
                DB::raw("
        COUNT(*) as all_visitors,
        SUM(CASE WHEN DATE(created_at) = '$today' THEN 1 ELSE 0 END) as today,
        SUM(CASE WHEN DATE(created_at) = '$yesterday' THEN 1 ELSE 0 END) as yesterday,
        SUM(CASE WHEN DATE(created_at) BETWEEN '$thisWeekStart' AND '$thisWeekEnd' THEN 1 ELSE 0 END) as this_week,
        SUM(CASE WHEN DATE(created_at) BETWEEN '$lastWeekStart' AND '$lastWeekEnd' THEN 1 ELSE 0 END) as last_week,
        SUM(CASE WHEN MONTH(created_at) = $thisMonth THEN 1 ELSE 0 END) as this_month,
        SUM(CASE WHEN MONTH(created_at) = $lastMonth THEN 1 ELSE 0 END) as last_month
    ")
            )->first();

            $visitorCounts = [
                'today' => $visitorCounts->today,
                'yesterday' => $visitorCounts->yesterday,
                'this_week' => $visitorCounts->this_week,
                'last_week' => $visitorCounts->last_week,
                'this_month' => $visitorCounts->this_month,
                'last_month' => $visitorCounts->last_month,
                'all' => $visitorCounts->all_visitors,
            ];


            $view->with('generalSetting', GeneralSetting::first());
            $view->with('footerSettings', FooterSetting::all());
            $view->with('contactSetting', Contact::first());
            $view->with('footerSocialLink', FooterSocialLink::get());
            $view->with('seoSetting', SeoSetting::first());
            $view->with('menuItems', $menuItems);
            $view->with('footerInfo', FooterInfo::first());
            $view->with('footerUsefulLinks', FooterUsefulLink::all());
            $view->with('sliders', $sliders);
            $view->with('visitorCounts', $visitorCounts);
        });

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('F d, Y'); ?>";
        });
    }
}
