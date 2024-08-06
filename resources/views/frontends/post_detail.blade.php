@extends('frontends.frontend')

@section('title', $post->title)

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

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $post->title }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $post->title }}</li>
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
                                <img src="{{ asset($post->thumbnail) }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image img-fluid"
                                    alt="" decoding="async" fetchpriority="high"
                                    sizes="(max-width: 960px) 100vw, 960px">
                            </div>
                            <header class="entry-header mt-2">
                                <h1 class="entry-title">{{ $post->title }}</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                {!! $post->content !!}
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->

                        @if ($prevPost || $nextPost)
                            <nav class="navigation post-navigation" aria-label="Posts">
                                <div class="nav-links">
                                    @foreach (['next' => $nextPost, 'prev' => $prevPost] as $rel => $post)
                                        @if ($post)
                                            <div class="nav-{{ $rel }}">
                                                <a href="{{ route('posts-detail', [
                                                    'locale' => session('locale', 'en'),
                                                    'post' => $post->slug,
                                                ]) }}"
                                                    rel="{{ $rel }}">
                                                    {{ $post->title }}
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
                        <h3 class="widget-title">{{ __('app.Latest Posts') }}</h3>
                        <div class="recent-news-items no_p">
                            <ul style="list-style: none">

                                @foreach ($latestPost as $p)
                                    <li class="news_li">
                                        <a class="newspost-title"
                                            href="{{ route('posts-detail', ['locale' => session('locale', 'en'), 'post' => $p->slug]) }}">{{ $p->title }}</a>
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
