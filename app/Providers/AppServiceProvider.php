<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\DocumentCategory;
use App\Models\FooterSetting;
use App\Models\FooterSocialLink;
use App\Models\GeneralSetting;
use App\Models\ProjectCategory;
use App\Models\SeoSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
            $subsItemProjectCategories = ProjectCategory::select('id', 'name', 'slug')->get()->map(function ($category) {
                return [
                    'label' => __('app.' . $category->name),
                    'url' => route('project-category', ['locale' => session('locale'), 'slugCategory' => $category->slug]),
                ];
            })->toArray();

            $menuItems = [
                [
                    'label' => __('app.home'),
                    'url' => url('/'),
                    'route' => 'home', // Define a route name or path
                ],
                [
                    'label' => __('app.mca_nepal'),
                    'url' => '#',
                    'route' => ['mca_nepal'],
                    'subItems' => [
                        ['label' => __('app.board_of_directors'), 'url' => route('mca-nepal.board-of-director', ['locale' => session('locale')])],
                        ['label' => __('app.executive_team'), 'url' => route('mca-nepal.executive-team', ['locale' => session('locale')])],
                        ['label' => __('app.organizational_chart'), 'url' => route('mca-nepal.organizational-chart', ['locale' => session('locale')])]
                    ]
                ],
                [
                    'label' => __('app.projects'),
                    'url' => '#',
                    'route' => ['projects'],
                    'subItems' => $subsItemProjectCategories
                ],
                [
                    'label' => __('app.documents_reports'),
                    'url' => '#',
                    'route' => ['documents_reports'],
                    'subItems' => [
                        ['label' => __('app.Main Agreements'), 'url' => '#'],
                        ['label' => __('app.Publications & Resources'), 'url' => '#'],
                        ['label' => __('app.Feasibility Studies Reports'), 'url' => '#'],
                        ['label' => __('app.Board Meeting Minutes'), 'url' => '#'],
                        ['label' => __('app.Annual Reports'), 'url' => '#'],
                        ['label' => __('app.EIA Report'), 'url' => '#'],
                        ['label' => __('app.Newsletter'), 'url' => '#']
                    ]
                ],
                [
                    'label' => __('app.media_notices'),
                    'url' => '#',
                    'route' => ['media_notices'],
                    'subItems' => [
                        ['label' => __('app.News'), 'url' => '#'],
                        ['label' => __('app.Community Voice'), 'url' => '#'],
                        ['label' => __('app.Articles/Interviews'), 'url' => '#'],
                        ['label' => __('app.Notice'), 'url' => '#'],
                        ['label' => __('app.Press Releases'), 'url' => '#'],
                        ['label' => __('app.Photo Gallery'), 'url' => '#'],
                        ['label' => __('app.Video Gallery'), 'url' => '#']
                    ]
                ],
                [
                    'label' => __('app.procurement'),
                    'url' => '#',
                    'route' => ['procurement'],
                    'subItems' => [
                        ['label' => __('app.Procurement Notices'), 'url' => '#'],
                        ['label' => __('app.Procurement Guidelines'), 'url' => '#'],
                        ['label' => __('app.Bid Challenge System'), 'url' => '#'],
                        ['label' => __('app.Contract Award Notice'), 'url' => '#']
                    ]
                ],
                [
                    'label' => __('app.jobs'),
                    'url' => url('/jobs'),
                    'route' => 'jobs'
                ],
                [
                    'label' => __('app.faqs'),
                    'url' => url('/faqs'),
                    'route' => 'faqs'
                ],
                [
                    'label' => __('app.contact'),
                    'url' => url('/contact'),
                    'route' => 'contact'
                ]
            ];
            // $view->with('documentsReportsCategories', DocumentCategory::select(['name', 'slug'])->get());
            $view->with('generalSetting', GeneralSetting::first());
            $view->with('footerSettings', FooterSetting::all());
            $view->with('contactSetting', Contact::first());
            $view->with('footerSocialLink', FooterSocialLink::get());
            $view->with('seoSetting', SeoSetting::first());
            $view->with('menuItems', $menuItems);
        });

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('F d, Y'); ?>";
        });
    }
}
