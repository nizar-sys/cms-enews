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
                    'label' => __('app.home'),
                    'url' => url('/'),
                    'route' => 'home',
                ],
                [
                    'label' => __('app.About'),
                    'url' => '#',
                    'route' => ['mca_nepal', 'mca-nepal.board-of-director', 'mca-nepal.executive-team', 'mca-nepal.organizational-chart'],
                    'subItems' => [

                        ['label' => __('app.board_of_directors'), 'url' => route('mca-nepal.board-of-director', ['locale' => $locale])],
                        ['label' => __('app.executive_team'), 'url' => route('mca-nepal.executive-team', ['locale' => $locale])],
                        ['label' => __('app.organizational_chart'), 'url' => route('mca-nepal.organizational-chart', ['locale' => $locale])]
                    ]
                ],

                [
                    'label' => __('app.What do we do'),
                    'url' => '#',
                    'route' => ['what-we-do.water-sanitations', 'what-we-do.water-sanitations-detail', 'what-we-do.teaching-leadings', 'what-we-do.teaching-leadings-detail', 'what-we-do.administrative', 'what-we-do.administrative-detail', 'what-we-do.documents'],
                    'subItems' => [
                        ['label' => __('app.Water & Sanitation'), 'url' => route('what-we-do.water-sanitations', ['locale' => $locale])],
                        ['label' => __('app.Teaching & Leading'), 'url' => route('what-we-do.teaching-leadings', ['locale' => $locale])],
                        ['label' => __('app.Administrative'), 'url' => route('what-we-do.administrative', ['locale' => $locale])],
                        ['label' => __('app.Documents'), 'url' => route('what-we-do.documents', ['locale' => $locale])],
                    ],
                ],

                [
                    'label' => __('app.projects'),
                    'url' => '#',
                    'route' => ['projects.posts', 'projects.articles-interviews', 'projects.video-projects', 'projects.photo-projects', 'posts-detail'],
                    'subItems' => [
                        ['label' => __('app.Posts'), 'url' => route('projects.posts', ['locale' => $locale])],
                        ['label' => __('app.Publications'), 'url' => route('projects.articles-interviews', ['locale' => $locale])],
                        ['label' => __('app.Video Project'), 'url' => route('projects.video-projects', ['locale' => $locale])],
                        ['label' => __('app.Photo Project'), 'url' => route('projects.photo-projects', ['locale' => $locale])],
                    ]
                ],
                [
                    'label' => __('app.Public Outreach'),
                    'url' => '#',
                    'route' => ['media_notices', 'media-notices.news', 'media-notices.community-voices', 'media-notices.articles-interviews', 'media-notices.notices', 'media-notices.press-releases', 'media-notices.photo-gallery', 'media-notices.video-gallery', 'media-notices.news-detail', 'media-notices.community-voice-detail'],
                    'subItems' => [
                        ['label' => __('app.Press Releases'), 'url' => route('media-notices.press-releases', ['locale' => $locale])],
                        ['label' => __('app.News'), 'url' => route('media-notices.news', ['locale' => $locale])],
                        ['label' => __('Events Announcements'), 'url' => route('media-notices.community-voices', ['locale' => $locale])],
                        ['label' => __('app.Photo Events'), 'url' => route('media-notices.photo-gallery', ['locale' => $locale])],
                        ['label' => __('app.Video Events'), 'url' => route('media-notices.video-gallery', ['locale' => $locale])]
                    ]
                ],
                [
                    'label' => __('app.Work with Us'),
                    'url' => '#',
                    'route' => ['procurement', 'procurement-notice', 'guidelines', 'jobs.index', 'procurement-notice-files'],
                    'subItems' => [
                        ['label' => __('app.Procurement Notices'), 'url' => route('procurement-notice', ['locale' => $locale])],
                        ['label' => __('app.Procurement Guidelines'), 'url' => route('guidelines', ['locale' => $locale])],
                        ['label' => __('app.bid_challenge_system'), 'url' => route('procurement-bid-challenge-systems', ['locale' => $locale])],
                        ['label' => __('app.contract_award_notice'), 'url' => route('procurement-contract-award-notices', ['locale' => $locale])],
                        ['label' => __('app.HR Vacancies'), 'url' => route('jobs.index', ['locale' => $locale])],
                    ]
                ],
                [
                    'label' => __('app.faqs'),
                    'url' => route('faq.index', ['locale' => $locale]),
                    'route' => 'faq.index',
                ],
                [
                    'label' => __('app.contact'),
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
