@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.organizational_chart'))

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
                        <li class="current">{{ __('app.organizational_chart') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-245" class="post-245 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ $sectionSetting?->title ?? __('app.organizational_chart') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>{!! $sectionSetting?->sub_title ?? 'No Data' !!}</p>


                                <div>
                                    <figure class="aligncenter is-resized"><img decoding="async"
                                            src="{{ $sectionSetting?->image }}" alt="" class="wp-image-1114"
                                            width="100%" height="auto" />
                                        <figcaption>{{ __('app.update_program') }} :
                                            {{ $sectionSetting?->updated_at->format('Y-m-d H:i') ?? 'No Data' }}
                                        </figcaption>

                                    </figure>
                                </div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </main>
@endsection
