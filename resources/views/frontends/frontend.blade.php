<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ __('app.app_name') }} - @yield('title')</title>
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
    {{-- <link href="{{ asset('/ac') }}/assets/css/main.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        .navbar-nav .nav-link.active {
            color: #2c4666;
        }

        .navbar-nav .nav-item.dropdown .dropdown-menu.active {
            display: block;
        }

        .navbar-nav .nav-item.dropdown .dropdown-menu .dropdown-item.active {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>

    @stack('style')
</head>

<body class="index-page">

    <header id="header" class="site-header navbar-static-top navbar-light" role="banner">
        <nav class="navbar top-navigation bg-light py-2">
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
                <div class="d-flex align-items-center">
                    <div class="social-links d-flex align-items-center me-3">
                        @foreach ($footerSocialLink as $navLink)
                            <a href="{{ $navLink->url }}" target="_blank" class="{{ $navLink->icon }} me-2"></a>
                        @endforeach
                    </div>
                    <div id="wrap" class="d-inline-block me-3">
                        <form method="get" role="search" action="" class="d-flex">
                            <input id="search" name="s" type="text" class="form-control me-2"
                                placeholder="{{ __('app.what_are_you_looking_for') }}" autocomplete="off">
                            <button id="search_submit" class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="locale-switcher d-inline-block">
                        <span>
                            <a href="{{ url(app()->getLocale() === 'pt' ? '/en' : '/pt') }}">
                                {{ app()->getLocale() === 'pt' ? 'EN' : 'PT' }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </nav>

        <nav class="navbar bg-white py-3">
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
                    <i class="mobile-nav-toggle d-xl-none bi bi-list text-dark"></i>
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

    <footer id="footer" class="footer dark-background">

        <div class="footer-top mb-2">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                            <span class="sitename">{{ __('app.app_name') }}</span>
                        </a>
                        <div class="footer-contact pt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quasi ex excepturi vero
                            dolorem molestias dolor est aut debitis obcaecati amet ratione facere illum, nesciunt
                            explicabo neque aliquid modi? Necessitatibus.
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
                            <li><a href="#">{{ __('app.home') }}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>{{ __('app.Newsletter') }}</h4>
                        <p>{{ __('app.Subscribe To Our Newsletter') }}</p>

                        <form action="" method="post">
                            <input type="email" class="form-control" name="email"> <br>
                            <input type="submit" class="btn btn-secondary btn-sm" value="{{ __('app.Subscribe') }}">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © {{ __('app.copyright') }} <strong><span>{{ __('app.app_name') }}</span></strong>.
                        {{ __('app.all_rights_reserved') }}
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        {{ __('app.designed_by') }} <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
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
    <script src="{{ asset('/ac') }}/assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            // Set the countdown target date (example: December 31, 2024 23:59:59)
            const targetDate = new Date('2024-12-31T23:59:59Z').getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const timeDiff = targetDate - now;

                if (timeDiff <= 0) {
                    // Time's up
                    $('#year').text('0');
                    $('#month').text('0');
                    $('#days').text('0');
                    $('#hour').text('0');
                    $('#minute').text('0');
                    $('#second').text('0');
                    clearInterval(intervalId);
                    return;
                }

                const years = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 365));
                const months = Math.floor(timeDiff % (1000 * 60 * 60 * 24 * 365) / (1000 * 60 * 60 * 24 * 30));
                const days = Math.floor(timeDiff % (1000 * 60 * 60 * 24 * 30) / (1000 * 60 * 60 * 24));
                const hours = Math.floor(timeDiff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                const minutes = Math.floor(timeDiff % (1000 * 60 * 60) / (1000 * 60));
                const seconds = Math.floor(timeDiff % (1000 * 60) / 1000);

                $('#year').text(years);
                $('#month').text(months);
                $('#days').text(days);
                $('#hour').text(hours);
                $('#minute').text(minutes);
                $('#second').text(seconds);
            }

            // Update countdown every second
            const intervalId = setInterval(updateCountdown, 1000);

            // Initial call to display countdown immediately
            updateCountdown();
        });
    </script>
    @stack('script')
</body>

</html>
