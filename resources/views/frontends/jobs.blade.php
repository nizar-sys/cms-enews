@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.jobs'))

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ translate($slider->title ?? '', app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ translate($slider->title ?? '', app()->getLocale()) }}</h2>
                            {!! translate($slider->description ?? '', app()->getLocale()) !!}
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
                <h1>{{ $sectionSetting?->title ?? translate('No Data', app()->getLocale()) }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->description ?? translate('No Data', app()->getLocale()) !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.jobs') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-126" class="post-126 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">
                                    {{ $sectionSetting?->title ?? translate('No Data', app()->getLocale()) }}
                                </h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                {!! $sectionSetting?->description ?? translate('No Data', app()->getLocale()) !!}
                                <p>&nbsp;</p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ translate('Position', app()->getLocale()) }}</th>
                                            <th>{{ translate('Vacancy Deadline', app()->getLocale()) }}</th>
                                            <th>{{ translate('Current Status', app()->getLocale()) }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobLists as $job)
                                            <tr>
                                                <td><a href="{{ $job->filepath }}" target="_blank"
                                                        rel="noopener">{{ $job->position }}</a>
                                                </td>
                                                <td>{{ $job->vacancy_deadline }}
                                                </td>
                                                <td>{{ $job->current_status }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </main>
@endsection
