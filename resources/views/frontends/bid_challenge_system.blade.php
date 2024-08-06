@extends('frontends.frontend')

@section('title', __('app.bid_challenge_system'))

@section('content')
    <main class="main">

        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
            <div class="container position-relative">
                <h1>{{ __('app.bid_challenge_system') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.bid_challenge_system') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12">
                    <main id="main" class="site-main" role="main">
                        <article id="post-303" class="post-303 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ __('app.Bid Challenge System') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <ul>
                                    @foreach ($bidChallengeSystem as $bid)
                                        <li>
                                            <h6><strong><a target="_blank" href="{{ asset($bid->file_path) }}">
                                                        {{ $bid->file_name }}</a></strong></h6>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>

        <section id="call-to-action" class="call-to-action section light-background">
            <div class="content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h3>{{ __('app.Subscribe To Our Newsletter') }}</h3>
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
                                <div class="loading">{{ __('app.Loading') }}</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    {{ __('app.Your subscription request has been sent. Thank you!') }}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
