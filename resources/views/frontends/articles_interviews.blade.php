@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <h1 class="entry-title">{{ __('app.Articles & Interviews') }}</h1>

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
                                                            <a href="{{ $article->article_url }}">
                                                                {{ $article->article_url }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </div>
@endsection
