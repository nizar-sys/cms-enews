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
            $locale = session('locale', config('app.locale'));
            $subsItemProjectCategories = ProjectCategory::select('id', 'name', 'slug')->get()->map(function ($category) use ($locale) {
                return [
                    'label' => __('app.' . $category->name),
                    'url' => route('project-category', ['locale' => $locale, 'slugCategory' => $category->slug]),
                ];
            })->toArray();

            $subsItemDocumentCategories = DocumentCategory::select('id', 'name', 'slug')->get()->map(function ($category) use ($locale) {
                return [
                    'label' => __('app.' . $category->name),
                    'url' => route('document-category', ['locale' => $locale, 'slugCategory' => $category->slug]),

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

                        ['label' => __('app.board_of_directors'), 'url' => route('mca-nepal.board-of-director', ['locale' => $locale])],
                        ['label' => __('app.executive_team'), 'url' => route('mca-nepal.executive-team', ['locale' => $locale])],
                        ['label' => __('app.organizational_chart'), 'url' => route('mca-nepal.organizational-chart', ['locale' => $locale])]
                    ]
                ],
                [
                    'label' => __('app.projects'),
                    'url' => '#',
                    'route' => ['projects', 'project-category', 'project-detail'],
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
                    'route' => ['media_notices', 'media-notices.news', 'media-notices.community-voices', 'media-notices.articles-interviews', 'media-notices.notices', 'media-notices.press-releases', 'media-notices.photo-gallery', 'media-notices.video-gallery', 'media-notices.news-detail'],
                    'subItems' => [
                        ['label' => __('app.News'), 'url' => route('media-notices.news', ['locale' => $locale])],
                        ['label' => __('app.Community Voice'), 'url' => route('media-notices.community-voices', ['locale' => $locale])],
                        ['label' => __('app.Articles & Interviews'), 'url' => route('media-notices.articles-interviews', ['locale' => $locale])],
                        ['label' => __('app.Notices'), 'url' => route('media-notices.notices', ['locale' => $locale])],
                        ['label' => __('app.Press Releases'), 'url' => route('media-notices.press-releases', ['locale' => $locale])],
                        ['label' => __('app.Photo Gallery'), 'url' => route('media-notices.photo-gallery', ['locale' => $locale])],
                        ['label' => __('app.Video Gallery'), 'url' => route('media-notices.video-gallery', ['locale' => $locale])]
                    ]
                ],
                [
                    'label' => __('app.procurement'),
                    'url' => '#',
                    'route' => ['procurement', 'procurement-notice', 'guidelines', 'procurement-bid-challenge-systems', 'procurement-contract-award-notices', 'procurement-notice-files'],
                    'subItems' => [
                        ['label' => __('app.Procurement Notices'), 'url' => route('procurement-notice', ['locale' => $locale])],
                        ['label' => __('app.Procurement Guidelines'), 'url' => route('guidelines', ['locale' => $locale])],
                        ['label' => __('app.Bid Challenge System'), 'url' => route('procurement-bid-challenge-systems', ['locale' => $locale])],
                        ['label' => __('app.Contract Award Notice'), 'url' => route('procurement-contract-award-notices', ['locale' => $locale])]
                    ]
                ],
                [
                    'label' => __('app.jobs'),
                    'url' => route('jobs.index', ['locale' => $locale]),
                    'route' => 'jobs.index',
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
