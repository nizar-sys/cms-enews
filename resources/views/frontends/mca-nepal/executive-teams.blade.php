@extends('frontends.frontend')

@section('title', __('app.executive_team'))

@push('style')
    <style>
        .spacer {
            height: 30px;
        }

        .executive-image {
            border: 7px solid #ccc;
            width: 127px;
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

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $sectionSetting?->title }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->sub_title !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.executive_team') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">
                        <div class="container">
                            <article id="post-22" class="post-22 page type-page status-publish hentry">
                                <div class="entry-content">
                                    <h2>{{ $sectionSetting?->title }}</h2>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <p>{!! $sectionSetting?->sub_title !!}</p>
                                        </div>
                                    </div>

                                    <div class="spacer"></div>

                                    <div class="row">
                                        @if ($executives->isEmpty())
                                            <div class="col-12 text-center">
                                                <h4>{{ __('app.No data') }}</h4>
                                            </div>
                                        @else
                                            @foreach ($executives as $executive)
                                                @php
                                                    $colSize =
                                                        $executives->count() == 1
                                                            ? 'col-12'
                                                            : ($executives->count() == 2
                                                                ? 'col-lg-6 col-md-6'
                                                                : 'col-lg-4 col-md-4');
                                                @endphp
                                                <div class="{{ $colSize }}">
                                                    <h4 class="text-center">{{ $executive->designation->designation }}</h4>
                                                    <h5 class="text-center">{{ $executive->name }}</h5>
                                                    <div class="wp-block-image text-center">
                                                        <figure>
                                                            <img decoding="async" src="{{ $executive->image }}"
                                                                width="127" class="executive-image"
                                                                alt="{{ $executive->name }}">
                                                        </figure>
                                                    </div>
                                                </div>
                                                @if ($loop->iteration % 2 == 0 && $executives->count() > 3 && !$loop->last)
                                    </div>
                                    <div class="row">
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>
                    </main>
                </section>
            </div>
        </div>
    </main>
@endsection
