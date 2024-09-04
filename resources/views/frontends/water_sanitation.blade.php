@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.Water & Sanitation'), app()->getLocale()))

@push('style')
    <style>
        .news_pagination.wpnw-numeric {
            display: flex;
            justify-content: center;
            margin: 20px 0;
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
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}</h2>
                            {!! GoogleTranslate::trans($slider->description, app()->getLocale()) !!}
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
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Water & Sanitation'), app()->getLocale()) }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->description !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Water & Sanitation'), app()->getLocale()) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        <h1 class="entry-title mb-5">{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Water & Sanitation'), app()->getLocale()) }}</h1>
                        <div class="row gx-5">
                            @foreach ($news as $post)
                                <div class="project_single col-md-4">
                                    @if ($post->image)
                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset($post->image) }}" class="img-fluid"
                                                alt="{{ GoogleTranslate::trans($post->title, app()->getLocale()) }}" width="200">
                                        </div>
                                    @endif
                                    <h3><a
                                            href="{{ route('what-we-do.water-sanitations-detail', ['locale' => session('locale', 'en'), 'id' => $post->id]) }}">{{ GoogleTranslate::trans($post->title, app()->getLocale()) }}</a>
                                    </h3>
                                    <p class="dates"><i class="far fa-calendar-alt"
                                            style="margin-right: 7px"></i>{{ $post->created_at->format('Y-m-d') }}
                                    </p>
                                    <p></p>
                                    <p>
                                        {!! GoogleTranslate::trans(str($post->description)->limit(50), app()->getLocale()) !!}
                                    </p>
                                    <p></p>
                                    <!-- <p></p> -->

                                    <a href="{{ route('what-we-do.water-sanitations-detail', ['locale' => session('locale', 'en'), 'id' => $post->id]) }}"
                                        class="btn btn-danger btn btn-sm text-white">{{ __('app.Read More') }}</a>
                                </div>
                            @endforeach
                        </div>

                        <div class="news_pagination wpnw-numeric">
                            {{ $news->links('pagination::bootstrap-4') }}
                        </div>

                    </main>
                </section>

            </div>
        </div>
    </main>
@endsection
