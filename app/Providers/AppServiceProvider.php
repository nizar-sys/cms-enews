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
                    'url' => route('project-category', ['locale' => session('locale', 'en'), 'slugCategory' => $category->slug]),
                ];
            })->toArray();

            $subsItemDocumentCategories = DocumentCategory::select('id', 'name', 'slug')->get()->map(function ($category) {
                return [
                    'label' => __('app.' . $category->name),
                    'url' => route('document-category', ['locale' => session('locale', 'en'), 'slugCategory' => $category->slug]),
                ];
            })->toArray();

            $menuItems = [
                [
                    'label' => __('app.home'),
                    'url' => url('/'),
                    'route' => 'home',
                ],
                [
                    'label' => __('app.mca_nepal'),
                    'url' => '#',
                    'route' => ['mca_nepal', 'mca-nepal.board-of-director', 'mca-nepal.executive-team', 'mca-nepal.organizational-chart'],
                    'subItems' => [
                        ['label' => __('app.board_of_directors'), 'url' => route('mca-nepal.board-of-director', ['locale' => session('locale', 'en')])],
                        ['label' => __('app.executive_team'), 'url' => route('mca-nepal.executive-team', ['locale' => session('locale', 'en')])],
                        ['label' => __('app.organizational_chart'), 'url' => route('mca-nepal.organizational-chart', ['locale' => session('locale', 'en')])]
                    ]
                ],
                [
                    'label' => __('app.projects'),
                    'url' => '#',
                    'route' => ['projects', 'project-category'],
                    'subItems' => $subsItemProjectCategories,
                ],
                [
                    'label' => __('app.documents_reports'),
                    'url' => '#',
                    'route' => ['documents_reports', 'document-category'],
                    'subItems' => $subsItemDocumentCategories,
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
                    'route' => ['procurement', 'procurement-notice', 'guidelines', 'procurement-bid-challenge-systems', 'procurement-contract-award-notices'],
                    'subItems' => [
                        ['label' => __('app.Procurement Notices'), 'url' => route('procurement-notice', ['locale' => session('locale', 'en')])],
                        ['label' => __('app.Procurement Guidelines'), 'url' => route('guidelines', ['locale' => session('locale', 'en')])],
                        ['label' => __('app.Bid Challenge System'), 'url' => route('procurement-bid-challenge-systems', ['locale' => session('locale', 'en')])],
                        ['label' => __('app.Contract Award Notice'), 'url' => route('procurement-contract-award-notices', ['locale' => session('locale', 'en')])]
                    ]
                ],
                [
                    'label' => __('app.jobs'),
                    'url' => route('jobs.index', ['locale' => session('locale', 'en')]),
                    'route' => 'jobs.index',
                ],
                [
                    'label' => __('app.faqs'),
                    'url' => route('faq.index', ['locale' => session('locale', 'en')]),
                    'route' => 'faq.index',
                ],
                [
                    'label' => __('app.contact'),
                    'url' => route('contact.index', ['locale' => session('locale', 'en')]),
                    'route' => 'contact.index',
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
