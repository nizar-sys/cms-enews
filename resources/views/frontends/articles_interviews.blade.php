@extends('frontends.frontend')

@section('content')
<main class="main">
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                    <li class="current">{{ __('app.Articles & Interviews') }}</li>
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
                                <h1 class="entry-title">{{ __('app.Articles & Interviews') }}</h1>

                                @if ($articlesInterviews->isEmpty())
                                    <p>There is no published data</p>
                                    
                                    
                                @else
                                    
                                <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                                    @foreach ($articlesInterviews as $articles)
                                        <div class="category"
                                            style="flex: 1 1 calc(28.28% - 20px); margin: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                            <p
                                                style="margin-bottom: 10px; font-weight: bold; border-bottom: 1px solid #888; padding-bottom: 5px">
                                                {{ $articles[0]->category->category_name }}</p>
                                            <div class="articles">
                                                @foreach ($articles as $index => $article)
                                                    <div class="article"
                                                        style="margin-bottom: {{ $index === count($articles) - 1 ? '0' : '3rem' }};">
                                                        <h6 style="font-weight: bold">
                                                            {{ $article->title }}
                                                        </h6>
                                                        <p>{!! $article->description !!}</p>
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
