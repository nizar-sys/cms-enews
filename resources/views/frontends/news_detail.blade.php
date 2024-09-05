@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.news'), app()->getLocale()))

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ GoogleTranslate::trans($slider->title ?? '', app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ GoogleTranslate::trans($slider->title ?? '', app()->getLocale()) }}</h2>
                            {!! GoogleTranslate::trans($slider->description ?? '', app()->getLocale()) !!}
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
                <h1>{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.News'), app()->getLocale()) }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.News') , app()->getLocale())}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-8">
                    <main id="main" class="site-main" role="main">


                        <article id="post-2761" class="post-2761 news type-news status-publish hentry">
                            <div class="post-thumbnail">
                            </div>
                            <header class="entry-header">
                                <h1 class="entry-title">{{ GoogleTranslate::trans($news->title, app()->getLocale()) }}</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                {!! GoogleTranslate::trans($news->description, app()->getLocale()) !!}
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->

                        @if ($nextNews || $prevNews)
                            <nav class="navigation post-navigation" aria-label="Posts">
                                <h2 class="screen-reader-text">{{ GoogleTranslate::trans('Post navigation', app()->getLocale()) }}</h2>
                                <div class="nav-links">
                                    @if ($prevNews)
                                        <div class="nav-previous"><a
                                                href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $prevNews->id]) }}"
                                                rel="prev">{{ GoogleTranslate::trans($prevNews->title, app()->getLocale()) }}</a></div>
                                    @endif

                                    @if ($nextNews)
                                        <div class="nav-next"><a
                                                href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $nextNews->id]) }}"
                                                rel="next">{{ GoogleTranslate::trans($nextNews->title, app()->getLocale()) }}</a></div>
                                    @endif
                                </div>
                            </nav>
                        @endif

                    </main><!-- #main -->
                </section><!-- #primary -->


                <aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
                    <section id="block-3" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                    <section id="sp_news_widget-3" class="widget SP_News_Widget">
                        <h3 class="widget-title">{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.News'), app()->getLocale()) }}</h3>
                        <div class="recent-news-items no_p">
                            <ul style="list-style: none">

                                @foreach ($latestNews as $latestNew)
                                    <li class="news_li">
                                        <a class="newspost-title"
                                            href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $latestNew->id]) }}">{{ GoogleTranslate::trans($latestNew->title, app()->getLocale()) }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </section>
                    <section id="block-4" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                    <section id="block-5" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                    <section id="block-6" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                </aside><!-- #secondary -->
            </div><!-- .row -->
        </div>
    </main>
@endsection
