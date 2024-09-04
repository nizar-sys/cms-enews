@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.Publications'), app()->getLocale()))

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
                <h1>{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Publications'), app()->getLocale()) }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->description !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">
                            {{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Publications'), app()->getLocale()) }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <h1 class="entry-title">
                                    {{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Publications'), app()->getLocale()) }}
                                </h1>

                                @if ($articlesInterviews->isEmpty())
                                    <p>{{ GoogleTranslate::trans('There is no published data', app()->getLocale()) }}</p>
                                @else
                                    <div class="row"
                                        style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                                        @foreach ($articlesInterviews as $articles)
                                            <div class="category"
                                                style="flex: 1 1 calc(28.28% - 20px); margin: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                                <p
                                                    style="margin-bottom: 10px; font-weight: bold; border-bottom: 1px solid #888; padding-bottom: 5px">
                                                    {{ GoogleTranslate::trans($articles[0]->category->category_name, app()->getLocale()) }}
                                                </p>
                                                <div class="articles">
                                                    @foreach ($articles as $index => $article)
                                                        <div class="article"
                                                            style="margin-bottom: {{ $index === count($articles) - 1 ? '0' : '3rem' }};">
                                                            <h6 style="font-weight: bold">
                                                                {{ GoogleTranslate::trans($article->title, app()->getLocale()) }}
                                                            </h6>
                                                            <p>{!! GoogleTranslate::trans($article->description, app()->getLocale()) !!}</p>
                                                            <p>
                                                                <a class="text-primary" href="{{ $article->article_url }}">
                                                                    {{ $article->article_url }}
                                                                </a>
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </main>
                        </div>
                    </div>
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>

    </main>
@endsection
