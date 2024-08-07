@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.Publications'))

@section('content')
    <main class="main">
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $sectionSetting?->title ?? __('app.Publications') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $sectionSetting?->title ?? __('app.Publications') }}</li>
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
                                <h1 class="entry-title">{{ $sectionSetting?->title ?? __('app.Publications') }}</h1>

                                @if ($articlesInterviews->isEmpty())
                                    <p>There is no published data</p>
                                @else
                                    <div class="row"
                                        style="display: flex; flex-wrap: wrap; justify-content: space-between;">
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

    </main>
@endsection
