@extends('frontends.frontend')

@section('title', 'Home')

@push('style')
    <style>
        .btn-approach {
            text-transform: uppercase;
            font-size: 14px;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 30px;
            color: black;
            border-radius: 6px;
        }
    </style>
@endpush

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                        <div class="carousel-container">
                            <h2>{{ $slider->title }}</h2>
                            {!! $slider->description !!}
                        </div>
                    </div>
                @endforeach

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <section id="about-3" class="about-3 section">
            <div class="container">
                <div class="row gy-4 justify-content-between align-items-center">
                    <div class="col-lg-6 position-relative" data-aos="zoom-out">
                        <img src="{{ $about ? asset($about->image) : asset('/ac/assets/img/img_sq_1.jpg') }}" alt="Image"
                            class="img-fluid">
                        <a href="{{ $about ? $about->video_url : 'https://www.youtube.com/watch?v=LXb3EKWsInQ' }}"
                            class="glightbox pulsating-play-btn">
                            <span class="play"><i class="bi bi-play-fill"></i></span>
                        </a>
                    </div>
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-4">{{ $about->title ?? __('app.Who We Are') }}</h2>
                        @if ($about)
                            <div class="mb-4">
                                {!! $about->description !!}
                            </div>
                        @else
                            <p class="mb-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim
                                necessitatibus placeat, atque qui voluptatem velit explicabo vitae
                                repellendus architecto provident nisi ullam minus asperiores commodi!
                                Tenetur, repellat aliquam nihil illo.
                            </p>

                            @if ($services)
                                @foreach ($services as $service)
                                    <ul class="list-unstyled list-check">
                                        <li>{{ $service->name }}</li>
                                    </ul>
                                @endforeach
                            @endif
                        @endif
                        <p>
                            <a href="{{ $about ? asset($about->resume) : '#services' }}"
                                {{ $about ? 'target="_blank"' : '' }} class="btn-cta">
                                {{ __('app.What We Do') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $serviceSection ? $serviceSection->title : __('app.Our Services') }}</h2>
                @if ($serviceSection)
                    {!! $serviceSection->sub_title !!}
                @else
                    <p>We work with you to achieve your goals</p>
                @endif
            </div><!-- End Section Title -->
            <div class="content" data-aos="fade-up">
                <div class="container">
                    <div class="row g-0">
                        @foreach ($services as $service)
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item">
                                    <div class="service-item-icon">
                                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}">
                                    </div>
                                    <div class="service-item-content">
                                        <h3 class="service-heading">{{ $service->title }}</h3>
                                        <p>{!! $service->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- /Services Section -->

        <!-- About Section -->
        {{-- <section id="about" class="about section">

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="content-title mb-4">{{ $about->title ?? __('app.Who We Are') }}</h2>
                            @if ($about)
                                <div class="mb-4">
                                    {!! $about->description !!}
                                </div>
                            @else
                                <p class="mb-4">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim
                                    necessitatibus placeat, atque qui voluptatem velit explicabo vitae
                                    repellendus architecto provident nisi ullam minus asperiores commodi!
                                    Tenetur, repellat aliquam nihil illo.
                                </p>
                                <ul class="list-unstyled list-check">
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Velit explicabo vitae repellendu</li>
                                    <li>Repellat aliquam nihil illo</li>
                                </ul>
                            @endif
                        </div>
                        <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                            <div class="row my-5">
                                @foreach ($services as $serv)
                                    <div class="col-lg-12 d-flex align-items-start mb-4">
                                        <i class="bi bi-bullseye me-4 display-6"></i>
                                        <div>
                                            <h4 class="m-0 h5 text-white">{{ $serv->name }}</h4>
                                            <div class="text-white opacity-50">
                                                {{ $serv->description }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section --> --}}

        <!-- Services 2 Section -->
        <section id="services-2" class="services-2 section dark-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $teamSectionSetting ? $teamSectionSetting->title : __('app.Our Team') }}</h2>
                @if ($teamSectionSetting)
                    {!! $teamSectionSetting->sub_title !!}
                @else
                    <p>{{ __('app.Meet Our Executive Teams') }}</p>
                @endif
            </div><!-- End Section Title -->

            <div class="services-carousel-wrap">
                <div class="container">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                            {
                                "loop": true,
                                "speed": 600,
                                "autoplay": {
                                "delay": 5000
                                },
                                "slidesPerView": "auto",
                                "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                                },
                                "navigation": {
                                "nextEl": ".js-custom-next",
                                "prevEl": ".js-custom-prev"
                                },
                                "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 40
                                },
                                "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 40
                                }
                                }
                            }
                        </script>
                        <button class="navigation-prev js-custom-prev">
                            <i class="bi bi-arrow-left-short"></i>
                        </button>
                        <button class="navigation-next js-custom-next">
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                        <div class="swiper-wrapper">
                            @foreach ($teams as $exeTeam)
                                <div class="swiper-slide">
                                    <div class="service-item">
                                        <div class="service-item-contents">
                                            <a href="#">
                                                <h2 class="service-item-title">{{ $exeTeam->name }}</h2>
                                            </a>
                                        </div>
                                        <img src="{{ asset($exeTeam->image) }}" alt="Image" class="img-fluid">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section><!-- /Services 2 Section -->

        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('app.Latest Posts') }}</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-5">
                    @foreach ($posts as $post)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset($post->thumbnail) }}" class="img-fluid" alt="{{ $post->title }}">
                                    <span class="post-date">@datetime($post->created_at)</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $post->title }}</h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span
                                                class="ps-2">{{ $post->author->name }}</span>
                                        </div>
                                        <span class="px-3 text-black-50"></span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar"></i> <span class="ps-2">@datetime($post->created_at)</span>
                                        </div>
                                    </div>

                                    <hr>

                                    <a href="{{ route('posts-detail', ['locale' => session('locale', 'en'), 'post' => $post->slug]) }}"
                                        class="readmore stretched-link"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section><!-- /Recent Posts Section -->
    </main>
@endsection
