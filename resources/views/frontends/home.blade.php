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

        .btn-more {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #2c4666;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-more:hover {
            background-color: red;
            color: white !important;
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
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

        <section style="background-color: red; padding: 20px;">
            <div class="container">
                <marquee style="color: white; font-size: 18px;" behavior="scroll" direction="left">
                    {{ $movingText->moving_text }}
                </marquee>
            </div>
        </section>

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
                                {!! str_word_count($about->description, 0) > 50
                                    ? implode(' ', array_slice(explode(' ', $about->description), 0, 50)) . '...'
                                    : $about->description !!}
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
                        <p style="display: flex; align-items: center;">
                            <a href="{{ $about ? asset($about->resume) : '#services' }}"
                                {{ $about ? 'target="_blank"' : '' }} class="btn-cta"
                                style="background-color: #2c4666; color: #ffffff; padding: 10px 20px; border-radius: 5px;
                                       transition: background-color 0.3s ease, transform 0.3s ease; margin-right: 15px;"
                                onmouseover="this.style.backgroundColor='#345c88'; this.style.transform='scale(1.05)';"
                                onmouseout="this.style.backgroundColor='#2c4666'; this.style.transform='scale(1)';">
                                {{ __('app.What We Do') }}
                            </a>

                            <span style="width: 1px; height: 40px; background-color: #373A40; margin-right: 15px;"></span>

                            <a href="{{ route('aboutme-detail', ['locale' => session('locale', 'en')]) }}" class="btn-cta"
                                style="background-color: #4a76a8; color: #ffffff; padding: 10px 20px; border-radius: 5px;
                                       transition: background-color 0.3s ease, transform 0.3s ease;"
                                onmouseover="this.style.backgroundColor='red'; this.style.transform='scale(1.05)';"
                                onmouseout="this.style.backgroundColor='#4a76a8'; this.style.transform='scale(1)';">
                                {{ __('app.Read More') }}
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
                    <div class="slick-slider">
                        @foreach ($services as $service)
                            <div class="service-item"
                                style="
                                    background: #fff;
                                    border-radius: 8px;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    padding: 20px;
                                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                                    text-align: center;
                                    position: relative;
                                    overflow: hidden;
                                    cursor: pointer;
                                "
                                onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 8px 16px rgba(0, 0, 0, 0.2)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.1)';">
                                <div class="service-item-icon" style="margin-bottom: 15px;">
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                                        style="
                                            max-width: 200px;
                                            height: auto;
                                            width: 100%;
                                            object-fit: contain;
                                            cursor: pointer;
                                        ">
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading"
                                        style="
                                            margin-top: 0;
                                            margin-bottom: 10px;
                                        ">
                                        {{ $service->title }}
                                    </h3>
                                    <p style="margin: 0;">
                                        {!! \Illuminate\Support\Str::words(strip_tags($service->description), 10, '...') !!}
                                    </p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn-more" data-bs-toggle="modal" data-bs-target="#serviceModal"
                                        data-service-title="{{ $service->title }}"
                                        data-service-description="{!! strip_tags($service->description) !!}"
                                        data-service-image="{{ asset($service->image) }}">
                                        {{ __('app.Read More') }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>

        <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel">Service Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="" class="img-fluid mb-3 mx-auto d-block">
                        <hr> <!-- Pembatas -->
                        <p id="modalDescription"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- Modal Image --}}

        <div id="imageModal"
            style="
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    ">
            <span onclick="closeModal()"
                style="
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: #fff;
            cursor: pointer;
        ">&times;</span>
            <img id="modalImage" src="" alt="Service Image"
                style="
            max-width: 90%;
            max-height: 80%;
            margin: auto;
        ">
        </div>
        {{-- End Modal Image --}}


        {{-- Board Of Directors --}}
        <section id="services-2" class="services-2 section background-section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 style="color: white;">
                    {{ $directorSectionSetting ? $directorSectionSetting->title : __('app.board_of_directors') }}
                </h2>
                @if ($directorSectionSetting)
                    <div style="color: white;">
                        {!! $directorSectionSetting->sub_title !!}
                    </div>
                @else
                    <p style="color: white;">
                        {{ __('app.board_of_directors') }}
                    </p>
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
                                        "spaceBetween": 20
                                    },
                                    "768": {
                                        "slidesPerView": 2,
                                        "spaceBetween": 30
                                    },
                                    "1200": {
                                        "slidesPerView": 3,
                                        "spaceBetween": 30
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
                        <div class="swiper-wrapper" style="display: flex;">
                            @foreach ($directors as $director)
                                <div class="swiper-slide">
                                    <div class="service-item"
                                        style="
                                        display: flex;
                                        flex-direction: column;
                                        align-items: center;
                                        background: #fff;
                                        border-radius: 8px;
                                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                        padding: 20px;
                                        text-align: center;
                                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                                        cursor: pointer;
                                        position: relative;
                                        overflow: hidden;
                                        width: 250px; /* Set a fixed width for the cards */
                                        /* height: 350px; Set a fixed height for the cards */
                                        margin: 0 auto; /* Center the card */
                                    ">
                                        <img src="{{ asset($director->image) }}" alt="{{ $director->name }}"
                                            class="img-fluid"
                                            style="
                                            max-width: 100px;
                                            height: auto;
                                            border-radius: 50%;
                                            margin-bottom: 15px;
                                        ">
                                        <p class="service-item-designation"
                                            style="
                                            margin: 0;
                                            font-size: 16px;
                                            color: #555;
                                        ">
                                            <b>{{ $director->designation->designation }}</b>
                                            <br>
                                            {{ $director->name }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        {{-- END Board Of Directors --}}


        <!-- END Executive Teams -->
        <section id="services-2" class="services-2 section background-section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 style="color: white;">{{ $teamSectionSetting ? $teamSectionSetting->title : __('app.Our Team') }}</h2>
                @if ($teamSectionSetting)
                    <div style="color: white;">
                        {!! $teamSectionSetting->sub_title !!}
                    </div>
                @else
                    <p style="color: white;">{{ __('app.Meet Our Executive Teams') }}</p>
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
                            @foreach ($teams as $team)
                                <div class="swiper-slide">
                                    <div class="service-item"
                                        style="
                                        display: flex;
                                        flex-direction: column;
                                        align-items: center;
                                        background: #fff;
                                        border-radius: 8px;
                                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                        padding: 20px;
                                        text-align: center;
                                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                                        cursor: pointer;
                                        position: relative;
                                        overflow: hidden;
                                    ">
                                        <img src="{{ asset($team->image) }}" alt="{{ $team->name }}"
                                            class="img-fluid"
                                            style="
                                            max-width: 100px;
                                            height: auto;
                                            border-radius: 50%;
                                            margin-bottom: 15px;
                                        ">
                                        <p class="service-item-designation"
                                            style="
                                            margin: 0;
                                            font-size: 16px;
                                            color: #555;
                                        ">
                                            <b>{{ $team->designation->designation }}</b>
                                            <br>
                                            {{ $team->name }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /END Executive Teams -->

        {{-- Video Events --}}
        <section id="latest-videos" class="latest-videos section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('app.Video Events') }}</h2>
                <p>{{ __('app.Latest Video Update') }}</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row">
                    <section id="primary" class="w-full">
                        <main id="main" class="site-main" role="main">
                            @if ($videoEvents->isEmpty())
                                <div class="no-galleries">
                                    <div>
                                        <h2>{{ __('app.No Video Available') }}</h2>
                                    </div>
                                </div>
                            @else
                                <div class="video-gallery">
                                    @foreach ($videoEvents as $video)
                                        <div class="video-item">
                                            <div class="video-embed">
                                                <iframe width="560" height="315" src="{{ $video->url }}"
                                                    frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center mt-4">
                                    <a href="{{ route('media-notices.video-gallery', ['locale' => session('locale', 'en')]) }}"
                                        class="btn-more">{{ __('app.View More') }}</a>
                                </div>
                            @endif
                        </main>
                    </section>
                </div>
            </div>

        </section>
        {{-- END Video Events --}}


        {{-- Photo Projects --}}
        <section id="latest-photo-projects" class="latest-photo-projects section"
            style="padding: 50px 0; background-color: #f9f9f9;">
            <!-- Section Title -->
            <div class="container section-title" style="text-align: center; margin-bottom: 40px;" data-aos="fade-up">
                <h2 style="font-size: 36px; color: #333;">{{ __('app.Photo Project') }}</h2>
                <p style="font-size: 18px; color: #777;">{{ __('app.Latest Photo Update') }}</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row" style="display: flex; justify-content: center;">
                    <section id="primary" class="w-full">
                        <main id="main" class="site-main" role="main">
                            @if ($photoProjects->isEmpty())
                                <div class="no-galleries" style="text-align: center; padding: 50px;">
                                    <h2 style="font-size: 24px; color: #999;">{{ __('app.No Photo Project Available') }}
                                    </h2>
                                </div>
                            @else
                                <div class="photo-gallery"
                                    style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                                    @foreach ($photoProjects as $photo)
                                        <div class="photo-item"
                                            style="width: 300px; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); position: relative;">
                                            <img src="{{ $photo->photo }}" alt="{{ $photo->title }}"
                                                style="width: 100%; height: auto; transition: transform 0.3s ease;">
                                            <div class="photo-caption"
                                                style="position: absolute; bottom: 0; background: rgba(0,0,0,0.5); width: 100%; text-align: center; padding: 10px; color: #fff; font-size: 18px; transition: background 0.3s ease;">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center mt-4">
                                    <a href="{{ route('projects.photo-projects', ['locale' => session('locale', 'en')]) }}"
                                        class="btn-more">{{ __('app.View More') }}</a>
                                </div>
                            @endif
                        </main>
                    </section>
                </div>
            </div>
        </section>

        {{-- END Photo Projects --}}

        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('app.Latest Posts') }}</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row slick-slider">
                    @foreach ($posts as $post)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset($post->thumbnail) }}" class="img-fluid"
                                        alt="{{ $post->title }}">
                                    <span class="post-date">@datetime($post->created_at)</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title"> {!! \Illuminate\Support\Str::words(strip_tags($post->title), 10, '...') !!}</h3>

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

                                    <a href="{{ route('posts-detail', ['locale' => session('locale', 'en'), 'post' => $post->id]) }}"
                                        class="readmore stretched-link"><span>{{ __('app.Read More') }}</span><i
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

@push('script')
    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }
    </script>
@endpush
