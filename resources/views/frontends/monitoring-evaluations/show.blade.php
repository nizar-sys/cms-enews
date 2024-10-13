@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? translate('Monitoring Evaluations', app()->getLocale()))

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
            text-align: right;
        }

        .nav-next {
            order: 1;
            text-align: left;
        }

        /* Comment section styles */
        .comment-section {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .comment-section:hover {
            transform: scale(1.02);
        }

        .comment-section h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #2c4666;
            text-align: center;
        }

        .comment-section form textarea {
            width: 100%;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .comment-section form button {
            padding: 10px 20px;
            background-color: #2c4666;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment-section form button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .post-navigation {
                flex-direction: column;
            }

            .nav-links a {
                width: 100%;
                margin-bottom: 10px;
            }

            .page-title h1 {
                font-size: 1.5rem;
            }

            .entry-header h1 {
                font-size: 1.5rem;
            }

            .entry-content {
                font-size: 0.9rem;
            }

            #social-buttons {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                padding: 10px 0;
            }

            #social-buttons a {
                flex: 0 0 auto;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                background-color: #2c4666;
                color: #fff;
                border-radius: 50%;
                font-size: 18px;
                transition: background-color 0.3s ease;
                text-align: center;
            }

            #social-buttons a:hover {
                background-color: #0056b3;
            }

            .comment-section h3 {
                font-size: 1.2rem;
            }

            .comment-section form textarea {
                font-size: 0.9rem;
            }

            .comment-section form button {
                width: 100%;
            }
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
                <h1>{{ $monitoringEvaluation->title }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">
                            {{ translate('Monitoring Evaluations Detail', app()->getLocale()) }}</li>
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
                                <img src="{{ asset($monitoringEvaluation->thumbnail) }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image img-fluid"
                                    alt="" decoding="async" fetchpriority="high"
                                    sizes="(max-width: 960px) 100vw, 960px">
                            </div>
                            <header class="entry-header mt-2">
                                <h1 class="entry-title">
                                    {{ $monitoringEvaluation->title }}</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                {!! $monitoringEvaluation->content !!}
                            </div><!-- .entry-content -->
                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->

                        @if ($prevPost || $nextPost)
                            <nav class="navigation post-navigation" aria-label="Posts">
                                <div class="nav-links">
                                    @foreach (['next' => $nextPost, 'prev' => $prevPost] as $rel => $r)
                                        @if ($r)
                                            <div class="row">
                                                <div class="nav-{{ $rel }}">
                                                    <a href="{{ route('monitoring-evaluation.show', [
                                                        'locale' => session('locale', 'en'),
                                                        'evaluation' => $r->id,
                                                    ]) }}"
                                                        rel="{{ $rel }}">
                                                        @if ($rel === 'next')
                                                        &laquo; @else&raquo;
                                                        @endif
                                                    </a>
                                                </div>
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
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                            </div>
                        </div>
                    </section>
                    <section id="sp_news_widget-3" class="widget SP_News_Widget">
                        <h3 class="widget-title">{{ __('app.Latest Posts') }}</h3>
                        <div class="recent-news-items no_p">
                            <ul style="list-style: none">
                                @foreach ($latestPost as $p)
                                    <li class="news_li">
                                        <a class="newspost-title"
                                            href="{{ route('monitoring-evaluation.show', ['locale' => session('locale', 'en'), 'evaluation' => $p->id]) }}">{{ $p->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>

                    <div id="social-buttons">
                        <h3>{{ translate('Share this post', app()->getLocale()) }}:</h3>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}&quote={{ urlencode($monitoringEvaluation->title) ?? '' }}"
                            class="social-button facebook" title="{{ translate('Share on Facebook', app()->getLocale()) }}"
                            rel="nofollow noopener noreferrer" target="_blank">
                            <span class="fab fa-facebook-square"></span>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($monitoringEvaluation->title) ?? '' }}"
                            class="social-button linkedin" title="Share on LinkedIn" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-linkedin"></span>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($monitoringEvaluation->title) ?? '' }}"
                            class="social-button twitter" title="Share on Twitter" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-twitter"></span>
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($monitoringEvaluation->title) ?? '' }}%20{{ urlencode(Request::fullUrl()) }}"
                            class="social-button whatsapp" title="Share on WhatsApp" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-whatsapp"></span>
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($monitoringEvaluation->title) ?? '' }}"
                            class="social-button telegram" title="Share on Telegram" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-telegram-plane"></span>
                        </a>
                        <a href="https://www.pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}&description={{ urlencode($monitoringEvaluation->title) ?? '' }}"
                            class="social-button pinterest" title="Share on Pinterest" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-pinterest"></span>
                        </a>
                    </div>
                </aside><!-- #secondary -->
            </div><!-- .row -->
        </div>
    </main>
@endsection
