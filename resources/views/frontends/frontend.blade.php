@php
    $locale = session('locale', config('app.locale'));
    $menuItems = [
        [
            'label' => GoogleTranslate::trans('Home', app()->getLocale()),
            'url' => url('/'),
            'route' => 'home',
        ],
        [
            'label' => GoogleTranslate::trans('About', app()->getLocale()),
            'url' => '#',
            'route' => ['mca_tl', 'mca-tl.board-of-director', 'mca-tl.executive-team', 'mca-tl.organizational-chart'],
            'subItems' => [
                [
                    'label' => GoogleTranslate::trans('Board Of Directors', app()->getLocale()),
                    'url' => route('mca-tl.board-of-director', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Executive Team', app()->getLocale()),
                    'url' => route('mca-tl.executive-team', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Organizational Chart', app()->getLocale()),
                    'url' => route('mca-tl.organizational-chart', ['locale' => $locale]),
                ],
            ],
        ],

        [
            'label' => GoogleTranslate::trans('What do we do', app()->getLocale()),
            'url' => '#',
            'route' => [
                'what-we-do.water-sanitations',
                'what-we-do.water-sanitations-detail',
                'what-we-do.teaching-leadings',
                'what-we-do.teaching-leadings-detail',
                'what-we-do.administrative',
                'what-we-do.administrative-detail',
                'what-we-do.documents',
            ],
            'subItems' => [
                [
                    'label' => GoogleTranslate::trans('Water & Sanitation', app()->getLocale()),
                    'url' => route('what-we-do.water-sanitations', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Teaching & Leading', app()->getLocale()),
                    'url' => route('what-we-do.teaching-leadings', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Administrative', app()->getLocale()),
                    'url' => route('what-we-do.administrative', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Documents', app()->getLocale()),
                    'url' => route('what-we-do.documents', ['locale' => $locale]),
                ],
            ],
        ],

        [
            'label' => GoogleTranslate::trans('Projects', app()->getLocale()),
            'url' => '#',
            'route' => [
                'projects.posts',
                'projects.articles-interviews',
                'projects.video-projects',
                'projects.photo-projects',
                'posts-detail',
            ],
            'subItems' => [
                [
                    'label' => GoogleTranslate::trans('Posts', app()->getLocale()),
                    'url' => route('projects.posts', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Publications', app()->getLocale()),
                    'url' => route('projects.articles-interviews', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Video Project', app()->getLocale()),
                    'url' => route('projects.video-projects', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Photo Project', app()->getLocale()),
                    'url' => route('projects.photo-projects', ['locale' => $locale]),
                ],
            ],
        ],
        [
            'label' => GoogleTranslate::trans('Public Outreach', app()->getLocale()),
            'url' => '#',
            'route' => [
                'media_notices',
                'media-notices.news',
                'media-notices.community-voices',
                'media-notices.articles-interviews',
                'media-notices.notices',
                'media-notices.press-releases',
                'media-notices.photo-gallery',
                'media-notices.video-gallery',
                'media-notices.news-detail',
                'media-notices.community-voice-detail',
                'social-behaviour-changes',
                'gender-social-inclusion',
            ],
            'subItems' => [
                [
                    'label' => GoogleTranslate::trans('Press Releases', app()->getLocale()),
                    'url' => route('media-notices.press-releases', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('News', app()->getLocale()),
                    'url' => route('media-notices.news', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Events Announcements', app()->getLocale()),
                    'url' => route('media-notices.community-voices', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Photo Events', app()->getLocale()),
                    'url' => route('media-notices.photo-gallery', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Video Events', app()->getLocale()),
                    'url' => route('media-notices.video-gallery', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Social Behaviour Changes', app()->getLocale()),
                    'url' => route('social-behaviour-changes', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Gender & Social Inclusion', app()->getLocale()),
                    'url' => route('gender-social-inclusion', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Monitoring Evaluation', app()->getLocale()),
                    'url' => route('monitoring-evaluation', ['locale' => $locale]),
                ],
            ],
        ],
        [
            'label' => GoogleTranslate::trans('Procurement', app()->getLocale()),
            'url' => '#',
            'route' => ['procurement', 'procurement-notice', 'guidelines', 'jobs.index', 'procurement-notice-files'],
            'subItems' => [
                [
                    'label' => GoogleTranslate::trans('Procurement Notices', app()->getLocale()),
                    'url' => route('procurement-notice', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Procurement Guidelines', app()->getLocale()),
                    'url' => route('guidelines', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Bid Challenge System', app()->getLocale()),
                    'url' => route('procurement-bid-challenge-systems', ['locale' => $locale]),
                ],
                [
                    'label' => GoogleTranslate::trans('Contract Award Notice', app()->getLocale()),
                    'url' => route('procurement-contract-award-notices', ['locale' => $locale]),
                ],
            ],
        ],
        [
            'label' => GoogleTranslate::trans('HR Vacancies', app()->getLocale()),
            'url' => route('jobs.index', ['locale' => $locale]),
            'route' => 'jobs.index',
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
        ],
    ];

    $today = \Carbon\Carbon::today()->toDateString();
    $yesterday = \Carbon\Carbon::yesterday()->toDateString();
    $thisWeekStart = \Carbon\Carbon::now()->startOfWeek()->toDateString();
    $thisWeekEnd = \Carbon\Carbon::now()->endOfWeek()->toDateString();
    $lastWeekStart = \Carbon\Carbon::now()->subWeek()->startOfWeek()->toDateString();
    $lastWeekEnd = \Carbon\Carbon::now()->subWeek()->endOfWeek()->toDateString();
    $thisMonth = \Carbon\Carbon::now()->month;
    $lastMonth = \Carbon\Carbon::now()->subMonth()->month;

    $visitorCounts = \App\Models\Visitor::select(
        DB::raw("
                    COUNT(*) as all_visitors,
                    SUM(CASE WHEN DATE(created_at) = '$today' THEN 1 ELSE 0 END) as today,
                    SUM(CASE WHEN DATE(created_at) = '$yesterday' THEN 1 ELSE 0 END) as yesterday,
                    SUM(CASE WHEN DATE(created_at) BETWEEN '$thisWeekStart' AND '$thisWeekEnd' THEN 1 ELSE 0 END) as this_week,
                    SUM(CASE WHEN DATE(created_at) BETWEEN '$lastWeekStart' AND '$lastWeekEnd' THEN 1 ELSE 0 END) as last_week,
                    SUM(CASE WHEN MONTH(created_at) = $thisMonth THEN 1 ELSE 0 END) as this_month,
                    SUM(CASE WHEN MONTH(created_at) = $lastMonth THEN 1 ELSE 0 END) as last_month
                "),
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

    $generalSetting = \App\Models\GeneralSetting::first();
    $footerSettings = \App\Models\FooterSetting::all();
    $contactSetting = \App\Models\Contact::first();
    $footerSocialLink = \App\Models\FooterSocialLink::get();
    $seoSetting = \App\Models\SeoSetting::first();
    $footerInfo = \App\Models\FooterInfo::first();
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title') - {{ $seoSetting ? $seoSetting->title : __('app.app_name') }}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta content="{{ $seoSetting?->description }}" name="description">
    <meta content="{{ $seoSetting?->keywords }}" name="keywords">
    <meta content="{{ csrf_token() }}" name="csrf_token">
    <!-- Favicons -->
    <link href="{{ asset($generalSetting?->favicon ?? '/ac/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset($generalSetting?->favicon ?? '/ac/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/ac') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/ac') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/ac') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('/ac') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ asset('/ac') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    {{-- @include('_partials.styles.main') --}}
    @vite('resources/css/main_custom.css')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />


    @stack('style')
</head>

<body class="index-page">

    <header id="header" class="site-header navbar-static-top navbar-dark" role="banner"
        style="background-color: #FEFAF6">
        <nav class="navbar top-navigation py-2">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <a href="{{ url('/', []) }}" target="_blank" class="d-flex align-items-center">
                        <div id="clockdiv" class="d-flex">
                            <div class="clockrow">
                                <span class="year" id="year">4</span>
                                <div class="smalltext">{{ GoogleTranslate::trans('Year', app()->getLocale()) }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="month" id="month">0</span>
                                <div class="smalltext">{{ GoogleTranslate::trans('Month', app()->getLocale()) }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="days" id="days">24</span>
                                <div class="smalltext">{{ GoogleTranslate::trans('Days', app()->getLocale()) }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="hours" id="hour">14</span>
                                <div class="smalltext">{{ GoogleTranslate::trans('Hours', app()->getLocale()) }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="minutes" id="minute">38</span>
                                <div class="smalltext">{{ GoogleTranslate::trans('Minutes', app()->getLocale()) }}
                                </div>
                            </div>
                            <div class="clockrow">
                                <span class="seconds" id="second">6</span>
                                <div class="smalltext">{{ GoogleTranslate::trans('Seconds', app()->getLocale()) }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="d-flex align-items-center text-white">
                    <div class="social-links d-flex align-items-center me-3">
                        <div class="locale-switcher d-inline-block me-3">
                            <a href="{{ url('/en') }}"
                                class="{{ app()->getLocale() === 'en' ? 'font-weight-bold text-danger' : '' }}">
                                EN
                            </a>
                            <span style="color: black"> | </span>
                            <a href="{{ url('/pt') }}"
                                class="{{ app()->getLocale() === 'pt' ? 'font-weight-bold text-danger' : '' }}">
                                PT
                            </a>
                        </div>
                        @foreach ($footerSocialLink as $navLink)
                            <a href="{{ $navLink->url }}" target="_blank" class="{{ $navLink->icon }} me-2"></a>
                        @endforeach
                    </div>
                    <div id="wrap" class="d-inline-block me-3">
                        <button id="searchButton" class="btn btn-outline-secondary" data-bs-target="#searchModal"
                            data-bs-toggle="modal">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div class="user-profile d-inline-block">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary"
                                style="background-color: #2c4666; color: #ffffff; padding: 10px 20px; border-radius: 5px;
                                       transition: background-color 0.3s ease, transform 0.3s ease;"
                                onmouseover="this.style.backgroundColor='#345c88'; this.style.transform='scale(1.05)';"
                                onmouseout="this.style.backgroundColor='#2c4666'; this.style.transform='scale(1)';">
                                {{ GoogleTranslate::trans('Login', app()->getLocale()) }}
                            </a>
                        @else
                            <div class="dropdown">
                                <button class="btn btn-transparent dropdown-toggle" type="button" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="color: #ffffff; background-color: #2c4666; padding: 10px 20px; border-radius: 5px;
                                           transition: background-color 0.3s ease, transform 0.3s ease;"
                                    onmouseover="this.style.backgroundColor='#345c88'; this.style.transform='scale(1.05)';"
                                    onmouseout="this.style.backgroundColor='#2c4666'; this.style.transform='scale(1)';">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    @if (Auth::user()->role == 'admin')
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard') }}">{{ GoogleTranslate::trans('Dashboard', app()->getLocale()) }}</a>
                                        </li>
                                    @endif
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#logoutModal">{{ GoogleTranslate::trans('Logout', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>

                </div>


                <!-- Logout Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="logoutModalLabel">
                                    {{ GoogleTranslate::trans('Logout', app()->getLocale()) }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ GoogleTranslate::trans('Are you sure you want to logout?', app()->getLocale()) }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ GoogleTranslate::trans('Cancel', app()->getLocale()) }}</button>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-danger">{{ GoogleTranslate::trans('Logout', app()->getLocale()) }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="searchModalLabel">
                                    {{ GoogleTranslate::trans('Search', app()->getLocale()) }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Search Form -->
                                <form method="get" action="#" class="mb-4">
                                    <input type="text" name="search" id="searchInput" class="form-control"
                                        placeholder="{{ GoogleTranslate::trans('Enter search term', app()->getLocale()) }}"
                                        style="border: 1px solid #2c4666;" autocomplete="off" autofocus>
                                </form>

                                <!-- Search Results -->
                                <div id="searchResults" class="d-none">
                                    <div class="row" id="resultsContainer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    #searchResults {
                        max-height: calc(100vh - 210px);
                        overflow-y: auto;
                        overflow-x: hidden;
                    }
                </style>

            </div>
        </nav>

        <nav class="navbar bg-red py-3">
            <div class="container d-flex justify-content-between align-items-center">
                <a href="{{ url('/') }}" class="d-flex align-items-center logo-link">
                    <img width="100"
                        src="{{ $generalSetting ? asset($generalSetting->left_icon) : 'https://mcanp.org/en/wp-content/uploads/sites/2/2021/08/mca-nepal-logo@2x-e1630344272397.png' }}"
                        alt="{{ GoogleTranslate::trans('Millennium Challenge Account TL', app()->getLocale()) }}">
                </a>
                <a href="{{ url('/') }}" class="d-flex align-items-center logo-link">
                    <img width="100"
                        src="{{ $generalSetting ? asset($generalSetting->center_icon) : 'https://mcanp.org/en/wp-content/uploads/sites/2/2021/08/mca-nepal-logo@2x-e1630344272397.png' }}"
                        alt="{{ GoogleTranslate::trans('Millennium Challenge Account TL', app()->getLocale()) }}">
                </a>
                <a href="{{ url('/') }}" class="d-flex align-items-center logo-link">
                    <img src="{{ $generalSetting ? asset($generalSetting->right_icon) : 'http://mcanp.org/wp-content/uploads/2020/06/Nepal-Government-logo.png' }}"
                        alt="{{ GoogleTranslate::trans('TL Government', app()->getLocale()) }}" width="100">
                </a>
            </div>
        </nav>

        <nav class="navbar navbar-expand-xl navbar-light bg-transparent" style="background-color: #005ca8 !important">
            <div class="container">
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="mobile-nav-toggle d-xl-none bi bi-list text-white"></i>
                </button>
                <div id="main-nav" class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        @foreach ($menuItems as $item)
                            <li class="nav-item {{ isset($item['subItems']) ? 'dropdown' : '' }}">
                                <a href="{{ $item['url'] }}"
                                    class="nav-link {{ setNavbarActiveNew($item['route']) }} {{ isset($item['subItems']) ? 'dropdown-toggle' : '' }}"
                                    id="dropdownMenuButton"
                                    data-bs-toggle="{{ isset($item['subItems']) ? 'dropdown' : '' }}"
                                    aria-expanded="{{ isset($item['subItems']) ? 'false' : '' }}">
                                    {{ $item['label'] }}
                                </a>
                                @if (isset($item['subItems']))
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                        style="background-color: #005ca8 !important;">
                                        @foreach ($item['subItems'] as $subItem)
                                            <li>
                                                <a class="dropdown-item submenu-font-rule {{ setSubNavbarActiveNew($item['route'], $subItem['url']) }}"
                                                    href="{{ $subItem['url'] }}">
                                                    {{ $subItem['label'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer id="footer" class="footer light-background">

        <div class="footer-top mb-2">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                            <span class="sitename">{{ $seoSetting ? $seoSetting->title : __('app.app_name') }}</span>
                        </a>
                        <div class="footer-contact pt-3">
                            {!! __('app.footer_info') !!}
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>{{ __('app.contact_us') }}</h4>
                        <p>{{ $contactSetting?->address }}</p>
                        <p class="mt-3"><strong>{{ __('app.phone') }}:</strong>
                            <span>{{ $contactSetting?->phone }}</span>
                        </p>
                        <p><strong>{{ __('app.email') }}:</strong> <span>{{ $contactSetting?->email }}</span></p>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>{{ __('app.useful_links') }}</h4>
                        <ul>
                            @foreach ($footerUsefulLinks as $link)
                                <li>
                                    <a href="{{ $link->url }}"
                                        @if (preg_match('/^https?:\/\//', $link->url)) target="_blank" @endif>
                                        {{ $link->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-3 footer-links">
                        <h4>{{ __('app.visitor_counter') }}</h4>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li>
                                        <i class="fas fa-calendar-day"></i>
                                        {{ __('app.Today') }} {{ $visitorCounts['today'] }}
                                    </li>
                                    <li>
                                        <i class="fas fa-calendar-minus"></i>
                                        {{ __('app.Yesterday') }} {{ $visitorCounts['yesterday'] }}
                                    </li>
                                    <li>
                                        <i class="fas fa-calendar-week"></i>
                                        {{ __('app.This Week') }} {{ $visitorCounts['this_week'] }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <li>
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ __('app.Last Week') }} {{ $visitorCounts['last_week'] }}
                                    </li>
                                    <li>
                                        <i class="fas fa-calendar"></i>
                                        {{ __('app.This Month') }} {{ $visitorCounts['this_month'] }}
                                    </li>
                                    <li>
                                        <i class="fas fa-calendar-times"></i>
                                        {{ __('app.Last Month') }} {{ $visitorCounts['last_month'] }}
                                    </li>
                                    <li>
                                        <i class="fas fa-users"></i>
                                        {{ __('app.All') }} {{ $visitorCounts['all'] }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <hr>

                        <div class="visitor-details">
                            <ul>
                                <li><i class="fas fa-ip"></i> {{ __('app.Your IP Address') }}:
                                    {{ request()->ip() }}</li>
                                <li><i class="fas fa-browser"></i>
                                    {{ request()->header('User-Agent') }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright text-center" style="background-color: red; padding: 20px;">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    @if ($footerInfo)
                        <div style="color: white;">
                            © {!! $footerInfo->copy_right !!}
                        </div>
                    @else
                        <div style="color: white; background-color: white">
                            © {{ __('app.copyright') }}
                            <strong><span
                                    style="color: yellow;">{{ $seoSetting ? $seoSetting->title : __('app.app_name') }}</span></strong>.
                            {{ __('app.all_rights_reserved') }}
                        </div>
                    @endif
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    @foreach ($footerSocialLink as $link)
                        <a href="{{ $link->url }}" target="_blank" style="color: white; margin: 0 10px;">
                            <i class="{{ $link->icon }}"></i>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top"
        class="scroll-top d-flex align-items-center justify-content-center mb-4 bottom-5"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/ac') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

    <!-- Main JS File -->
    {{-- @include('_partials.scripts.main') --}}
    @vite('resources/js/main_custom.js')
    @stack('script')
</body>

</html>
