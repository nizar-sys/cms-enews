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
    @include('_partials.styles.main')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
                                <div class="smalltext">{{ __('app.year') }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="month" id="month">0</span>
                                <div class="smalltext">{{ __('app.month') }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="days" id="days">24</span>
                                <div class="smalltext">{{ __('app.days') }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="hours" id="hour">14</span>
                                <div class="smalltext">{{ __('app.hours') }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="minutes" id="minute">38</span>
                                <div class="smalltext">{{ __('app.minutes') }}</div>
                            </div>
                            <div class="clockrow">
                                <span class="seconds" id="second">6</span>
                                <div class="smalltext">{{ __('app.seconds') }}</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="d-flex align-items-center text-white">
                    <div class="social-links d-flex align-items-center me-3">
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
                    <div class="locale-switcher d-inline-block me-3">
                        <span>
                            <a href="{{ url(app()->getLocale() === 'pt' ? '/en' : '/pt') }}">
                                <div class="smalltext">{{ app()->getLocale() === 'pt' ? 'EN' : 'PT' }}</div>
                            </a>
                        </span>
                    </div>
                    <div class="user-profile d-inline-block">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary"
                                style="background-color: #2c4666; color: #ffffff; padding: 10px 20px; border-radius: 5px;
                                       transition: background-color 0.3s ease, transform 0.3s ease;"
                                onmouseover="this.style.backgroundColor='#345c88'; this.style.transform='scale(1.05)';"
                                onmouseout="this.style.backgroundColor='#2c4666'; this.style.transform='scale(1)';">
                                {{ __('app.Login') }}
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
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#logoutModal">{{ __('app.Logout') }}</a></li>
                                    @if (Auth::user()->role == 'admin')
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard') }}">{{ __('app.Dashboard') }}</a></li>
                                    @endif
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
                                <h5 class="modal-title" id="logoutModalLabel">{{ __('app.Logout') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ __('app.Are you sure you want to logout?') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ __('app.Cancel') }}</button>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">{{ __('app.Logout') }}</button>
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
                                <h5 class="modal-title" id="searchModalLabel">{{ __('app.Search') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Search Form -->
                                <form method="get" action="#" class="mb-4">
                                    <input type="text" name="search" id="searchInput" class="form-control"
                                        placeholder="{{ __('app.Enter search term') }}"
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
                        alt="{{ __('app.Millennium Challenge Account Nepal') }}">
                </a>
                <a href="{{ url('/') }}" class="d-flex align-items-center logo-link">
                    <img src="{{ $generalSetting ? asset($generalSetting->right_icon) : 'http://mcanp.org/wp-content/uploads/2020/06/Nepal-Government-logo.png' }}"
                        alt="Nepal Government" width="100">
                </a>
            </div>
        </nav>

        <nav class="navbar navbar-expand-xl navbar-light bg-transparent">
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
                                    <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                        @foreach ($item['subItems'] as $subItem)
                                            <li>
                                                <a class="dropdown-item {{ setSubNavbarActiveNew($item['route'], $subItem['url']) }}"
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

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    @if ($footerInfo)
                        <div>
                            © {!! $footerInfo->copy_right !!}
                        </div>
                    @else
                        <div>
                            © {{ __('app.copyright') }}
                            <strong><span>{{ $seoSetting ? $seoSetting->title : __('app.app_name') }}</span></strong>.
                            {{ __('app.all_rights_reserved') }}
                        </div>
                    @endif

                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    @foreach ($footerSocialLink as $link)
                        <a href="{{ $link->url }}" target="_blank"><i class="{{ $link->icon }}"></i></a>
                    @endforeach
                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/ac') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('/ac') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    @include('_partials.scripts.main')
    @stack('script')
</body>

</html>
