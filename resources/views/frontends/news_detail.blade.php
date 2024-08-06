@extends('frontends.frontend')

@section('title', __('app.news'))

@section('content')
<main class="main">
    <div class="page-title dark-background" data-aos="fade"
        style="background-color: #2c4666">
        <div class="container position-relative">
            <h1>{{ __('app.News') }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                    <li class="current">{{ __('app.News') }}</li>
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
                                <h1 class="entry-title">{{ $news->title }}</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                {!! $news->description !!}
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->

                        @if ($nextNews || $prevNews)
                            <nav class="navigation post-navigation" aria-label="Posts">
                                <h2 class="screen-reader-text">Post navigation</h2>
                                <div class="nav-links">
                                    @if ($prevNews)
                                        <div class="nav-previous"><a
                                                href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $prevNews->id]) }}"
                                                rel="prev">{{ $prevNews->title }}</a></div>
                                    @endif

                                    @if ($nextNews)
                                        <div class="nav-next"><a
                                                href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $nextNews->id]) }}"
                                                rel="next">{{ $nextNews->title }}</a></div>
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
                        <h3 class="widget-title">{{ __('app.News') }}</h3>
                        <div class="recent-news-items no_p">
                            <ul>

                                @foreach ($latestNews as $latestNew)
                                    <li class="news_li">
                                        <a class="newspost-title"
                                            href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $latestNew->id]) }}">{{ $latestNew->title }}</a>
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
        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section light-background">

            <div class="content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h3>{{ __("app.Subscribe To Our Newsletter") }}</h3>
                            <p class="opacity-50">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nesciunt, reprehenderit!
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <form action="forms/newsletter.php" class="form-subscribe php-email-form">
                                <div class="form-group d-flex align-items-stretch">
                                    <input type="email" name="email" class="form-control h-100"
                                        placeholder="Enter your e-mail">
                                    <input type="submit" class="btn btn-secondary px-4" value="{{ __('app.Subscribe') }}">
                                </div>
                                <div class="loading">{{ __("app.Loading") }}</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    {{ __("app.Your subscription request has been sent. Thank you!") }}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Call To Action Section -->

</main>
@endsection
