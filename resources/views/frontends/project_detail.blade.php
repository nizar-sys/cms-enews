@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($project->name, app()->getLocale()))

@push('style')
    <style>
        .post-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .nav-links {
            display: flex;
            width: 100%;
        }

        .nav-links div {
            flex: 1;
        }

        .nav-links a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2c4666;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            width: 25%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #0056b3;
        }

        .nav-prev {
            order: 2;
            /* This will put prev on the right */
            text-align: right;
        }

        .nav-next {
            order: 1;
            /* This will put next on the left */
            text-align: left;
        }
    </style>
@endpush

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

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ GoogleTranslate::trans($project->name, app()->getLocale()) }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ GoogleTranslate::trans($project->name, app()->getLocale()) }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-8">
                    <main id="main" class="site-main" role="main">

                        <article id="post-329" class="post-329 cca type-cca status-publish has-post-thumbnail hentry">
                            <div class="post-thumbnail">
                                <img width="960" height="540" src="{{ asset($project->image) }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                    decoding="async" fetchpriority="high" sizes="(max-width: 960px) 100vw, 960px">
                            </div>
                            <header class="entry-header mt-2">
                                <h1 class="entry-title">{{ GoogleTranslate::trans($project->name, app()->getLocale()) }}
                                </h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                {!! GoogleTranslate::trans($project->description, app()->getLocale()) !!}
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->

                        @if ($prevProject || $nextProject)
                            <nav class="navigation post-navigation" aria-label="Posts">
                                <div class="nav-links">
                                    @foreach (['next' => $nextProject, 'prev' => $prevProject] as $rel => $project)
                                        @if ($project)
                                            <div class="nav-{{ $rel }}">
                                                <a href="{{ route('project-detail', [
                                                    'locale' => session('locale', 'en'),
                                                    'slugCategory' => Str::of($project->category->slug)->explode('-')->map(fn($segment) => Str::substr($segment, 0, 1))->implode(''),
                                                    'slugProject' => str(GoogleTranslate::trans($project->name, app()->getLocale()))->slug(),
                                                ]) }}"
                                                    rel="{{ $rel }}">
                                                    {{ GoogleTranslate::trans($project->name, app()->getLocale()) }}
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </nav>
                        @endif
                    </main>
                </section><!-- #primary -->


                <aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
                    <section id="block-3" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                    <section id="sp_news_widget-3" class="widget SP_News_Widget">
                        <h3 class="widget-title">{{ __('app.News') }}</h3>
                        <div class="recent-news-items no_p">
                            <ul>

                                @foreach ($latestNews as $latestNew)
                                    <li class="news_li">
                                        <a class="newspost-title"
                                            href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $latestNew->id]) }}">{{ GoogleTranslate::trans($latestNew->title, app()->getLocale()) }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </section>
                </aside><!-- #secondary -->
            </div><!-- .row -->
        </div>

    </main>
@endsection
