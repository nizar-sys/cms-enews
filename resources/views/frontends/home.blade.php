@extends('frontends.frontend')

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            overflow-x: hidden;
            /* Prevent horizontal scroll on the body */
        }

        .swiper-container {
            width: 100%;
            height: 100vh;
            /* Full viewport height */
            overflow: hidden;
            /* Hide overflow in the swiper container */
        }

        .swiper-wrapper {
            display: flex;
            transition: transform 0.3s ease;
            /* Smooth transition for sliding */
        }

        .swiper-slide {
            flex: 1 0 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .slide-content {
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .slide-background {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            overflow: hidden;
        }

        .slide-background picture,
        .slide-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensure the image covers the container without being cut off */
            display: block;
        }

        .slide-description {
            position: relative;
            z-index: 2;
            color: white;
            padding: 20px;
            /* Optional: Add a semi-transparent background for better text readability */
            max-width: 80%;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="n2-section-smartslider fitvidsignore" data-ssid="2" tabindex="0" role="region" aria-label="Slider">
        <div id="n2-ss-2-align" class="n2-ss-align n2-ss-align-visible">
            <div class="n2-padding">

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($heroes as $hero)
                            <div class="swiper-slide" data-id="{{ $hero->id }}">
                                <div class="slide-content">
                                    <div class="slide-background">
                                        <picture class="skip-lazy" data-skip-lazy="1">
                                            <img src="{{ asset($hero->image) }}" alt="{{ $hero->title }}"
                                                title="{{ $hero->title }}" class="skip-lazy" data-skip-lazy="1">
                                        </picture>
                                    </div>
                                    <div class="slide-description">
                                        <h2>{{ $hero->title }}</h2>
                                        {!! $hero->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </div>
        <div class="n2_clear"></div>
    </div>
    <div id="content" class="site-content" style="margin-top: 1rem">
        <div class="container">
            <div class="row">

                <div class="container">
                    <section id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <div class="site-content">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <div id="accordions-2158" class="accordions-2158 accordions"
                                            data-accordions="{&quot;lazyLoad&quot;:true,&quot;id&quot;:&quot;2158&quot;,&quot;event&quot;:&quot;click&quot;,&quot;collapsible&quot;:&quot;true&quot;,&quot;heightStyle&quot;:&quot;content&quot;,&quot;animateStyle&quot;:&quot;swing&quot;,&quot;animateDelay&quot;:1000,&quot;navigation&quot;:true,&quot;active&quot;:999,&quot;expandedOther&quot;:&quot;no&quot;}">
                                            <div id="accordions-lazy-2158" class="accordions-lazy" accordionsid="2158"
                                                style="display: none;">
                                            </div>

                                            <div class="items ui-accordion ui-widget ui-helper-reset"
                                                style="display: block;" role="tablist">

                                                @foreach ($faqs as $faq)
                                                    <div post_id="2158" itemcount="0" header_id="header-1630390919098"
                                                        id="header-1630390919098" style=""
                                                        class="accordions-head head1630390919098 border-none ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons"
                                                        toggle-text="" main-text="{{ $faq->question }}" role="tab"
                                                        aria-controls="ui-id-1" aria-selected="false" aria-expanded="false"
                                                        tabindex="0"><span
                                                            class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
                                                        <span id="accordion-icons-1630390919098" class="accordion-icons">
                                                            <span class="accordion-icon-active accordion-plus"><i
                                                                    class="fas fa-chevron-up"></i></span>
                                                            <span class="accordion-icon-inactive accordion-minus"><i
                                                                    class="fas fa-chevron-right"></i></span>
                                                        </span>
                                                        <span id="header-text-1630390919098"
                                                            class="accordions-head-title">{{ $faq->question }}</span>
                                                    </div>
                                                    <div class="accordion-content content1630390919098 ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
                                                        id="ui-id-1" aria-labelledby="header-1630390919098"
                                                        role="tabpanel" aria-hidden="true" style="display: none;">
                                                        {!! $faq->answer !!}
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <h2 class="widget-text">
                                            {{ __('app.Video Gallery') }}
                                            <a href="{{ route('video-gallery', ['locale' => session('locale', 'en')]) }}"
                                                class="btn btn-danger">{{ __('app.View More') }}</a>
                                        </h2>
                                        @if ($firstVideo)
                                            <div class="paoc-image-popup">
                                                <a class="paoc-popup-click paoc-popup-cust-2682 paoc-popup-image paoc-popup-image"
                                                    href="javascript:void(0);"><video width="320" height="240" controls
                                                        class="popupaoc-img">
                                                        <source src="{{ $firstVideo->url }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-md-4 col-lg-4">
                                        <h2 class="widget-text">{{ __('app.Latest Project Updates') }} <a
                                                href="{{ route('project-category', ['locale' => session('locale', 'en'), 'slugCategory' => 'latest-project-updates']) }}"
                                                class="btn btn-danger">{{ __('app.View More') }}</a></h2>

                                        <ul style="list-style:none; padding-left:0;">
                                            @foreach ($latestProjectsUpdate as $latest)
                                                <li style="padding-bottom:15px;"><a
                                                        href="{{ route('project-category', ['locale' => session('locale', 'en'), 'slugCategory' => $latest->slug]) }}"
                                                        title="{{ $latest->name }}">{{ $latest->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>

                                    </div>
                                </div>

                            </div>
                        </main><!-- #main -->
                    </section><!-- #primary -->

                    <section class="mncap_notices">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 mncap_news">
                                <h2 class="widget-text">{{ __('app.News/Notices') }} <a
                                        href="{{ route('news', ['locale' => session('locale', 'en')]) }}"
                                        class="btn btn-danger">{{ __('app.View More') }}</a></h2>
                                <div class="frontPage-jobs">
                                    <div class="wpnawfree-plugin news-clearfix " id="wpnw-news-1">

                                        @foreach ($news as $post)
                                            <div id="post-2798"
                                                class="news type-news wpnaw-blog-class has-date news-col-list wpnaw-first">
                                                <div class="news-inner-wrap-view news-clearfix wpnaw-news-no-image">


                                                    <div class="news-content">
                                                        <div class="grid-date-post">
                                                            {{ $post->created_at->format('Y-m-d') }} </div>

                                                        <div class="post-content-text">
                                                            <h3 class="news-title"><a
                                                                    href="{{ route('news-detail', ['locale' => session('locale', 'en'), 'new' => $post->id]) }}"
                                                                    rel="bookmark">{{ $post->title }}</a></h3>
                                                        </div>
                                                    </div>
                                                </div><!-- #post-## -->
                                            </div>
                                        @endforeach


                                    </div>

                                </div>
                                <br>
                                <h2 class="widget-text">{{ __('app.Community Voice') }} <a
                                        href="{{ route('community-voices', ['locale' => session('locale', 'en')]) }}"
                                        class="btn btn-danger">{{ __('app.View More') }}</a></h2>
                                <div class="frontPage-jobs">
                                    @foreach ($communityVoices as $voice)
                                        <h2 class="widget-title"><a
                                                href="{{ route('community-voice-detail', ['locale' => session('locale', 'en'), 'slug' => $voice->slug]) }}">{{ $voice->title }}</a>
                                        </h2>
                                    @endforeach

                                </div> <!--Community voice  -->
                            </div><!-- #news -->

                            <div class="col-md-4 col-lg-4 mncap_procurement">
                                <h2 class="widget-text">{{ __('app.Procurement Notices') }} <a
                                        href="{{ route('procurement-notice', ['locale' => session('locale', 'en')]) }}"
                                        class="btn btn-danger">{{ __('app.View More') }}</a></h2>
                                <div class="procurement">
                                    @foreach ($procurementNotices as $notice)
                                        <div class="procurement_single">
                                            <div class="widget-title">
                                                {!! $notice->title !!}
                                            </div>

                                            <div class="procument_dates">
                                                <ul>
                                                    <li class="dates posted">
                                                        {{ __('app.Publication Date') }}: <strong>
                                                            {{ $notice->date_of_publication }} </strong>
                                                    </li>
                                                    <li class="dates expires">
                                                        {{ __('app.Last Submission Date/Time') }}:
                                                        <strong>{{ $notice->updated_at }}</strong>
                                                    </li>
                                                </ul>
                                                <strong>{{ __('app.Status') }}</strong>
                                                @if ($notice->status == 'open')
                                                    <span class="badge badge-success">
                                                        {{ __('app.Open') }} </span>
                                                @elseif ($notice->status == 'close')
                                                    <span class="badge badge-danger">
                                                        {{ __('app.Close') }} </span>
                                                @else
                                                    <span class="badge badge-warning">
                                                        {{ __('app.Draft') }} </span>
                                                @endif

                                            </div>
                                            <ol>
                                                @foreach ($notice->files as $file)
                                                    <li><a href="{{ asset($file->file_path) }}"
                                                            target="_blank">{{ $file->file_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    @endforeach
                                </div>

                            </div><!-- #procurement -->

                            <div class="col-md-4 col-lg-4 mcanp_minutes">
                                <h2 class="widget-text">{{ __('app.Board Meeting Minutes') }} <a
                                        href="{{ route('document-category', ['locale' => session('locale', 'en'), 'slugCategory' => $boardMeetingMinutes?->slug ?? 'board-meeting-minutes']) }}"
                                        class="btn btn-danger">{{ __('app.View More') }}</a></h2>
                                <div class="minutes_lists">
                                    @foreach ($boardMeetingMinutes->documentFiles as $file)
                                        <div class="minutes_single">
                                            <p class="widget-title">{{ $file->filename }}</p>
                                            <p><a href="{{ asset($file->file_path) }}" title="" target="_blank"
                                                    class="btn btn-danger"><i class="far fa-file-pdf"></i>
                                                    {{ __('app.View PDF') }}</a>
                                            </p>
                                        </div>
                                    @endforeach

                                </div><!-- #meeting minutes lists -->

                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div>

    @if ($firstVideo)
        <div class="paoc-cb-popup-body paoc-wrap paoc-popup paoc-modal-popup paoc-popup-2682 paoc-popup-image paoc-popup-announcement paoc-popup-announcement-design-1 paoc-design-1 paoc-popup-js"
            id="paoc-popup-2682-2"
            data-popup-conf="{&quot;content&quot;:{&quot;target&quot;:&quot;#paoc-popup-2682-2&quot;,&quot;effect&quot;:&quot;fadein&quot;,&quot;positionX&quot;:&quot;center&quot;,&quot;positionY&quot;:&quot;center&quot;,&quot;fullscreen&quot;:false,&quot;speedIn&quot;:500,&quot;speedOut&quot;:250,&quot;close&quot;:false,&quot;animateFrom&quot;:&quot;top&quot;,&quot;animateTo&quot;:&quot;top&quot;},&quot;loader&quot;:{&quot;active&quot;:false,&quot;color&quot;:&quot;#000000&quot;,&quot;speed&quot;:1000},&quot;overlay&quot;:{&quot;active&quot;:true,&quot;color&quot;:&quot;rgba(0, 0, 0, 0.5)&quot;,&quot;close&quot;:false,&quot;opacity&quot;:1}}"
            data-conf="{&quot;id&quot;:2682,&quot;popup_type&quot;:&quot;image&quot;,&quot;display_type&quot;:&quot;modal&quot;,&quot;disappear&quot;:0,&quot;disappear_mode&quot;:&quot;normal&quot;,&quot;open_delay&quot;:0.299999999999999988897769753748434595763683319091796875,&quot;cookie_prefix&quot;:&quot;paoc_popup&quot;,&quot;cookie_expire&quot;:&quot;&quot;,&quot;cookie_unit&quot;:&quot;day&quot;}"
            data-id="paoc-popup-2682">
            <div class="paoc-popup-inr-wrap">
                <div class="paoc-padding-20 paoc-popup-con-bg">
                    <div class="paoc-popup-inr">
                        <div class="paoc-popup-margin paoc-popup-content">
                            <p>
                                <iframe loading="lazy" width="560" height="315"
                                    src="{{ $firstVideo->url }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen=""></iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="javascript:void(0);" class="paoc-close-popup paoc-popup-close">
                <svg viewBox="0 0 1792 1792">
                    <path
                        d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z">
                    </path>
                </svg>
            </a>
        </div>
    @endif
@endsection

@push('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                // autoplay: {
                //     delay: 5000,
                // },
            });
        });
    </script>
@endpush
