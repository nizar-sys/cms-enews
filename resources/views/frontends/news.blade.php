@extends('frontends.frontend')

@push('style')
    <style>
        .news_pagination.wpnw-numeric {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
    </style>
@endpush
@section('content')
    <div id="content" class="site-content" style="margin-top: 8rem">

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        <h1 class="entry-title mt-2">{{ __('app.News') }}</h1>
                        <div class="row">
                            @foreach ($news as $post)
                                <div class="project_single col-md-4">
                                    <h3><a
                                            href="{{ route('news-detail', ['locale' => session('locale', 'en'), 'new' => $post->id]) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="dates"><i
                                            class="far fa-calendar-alt"></i>{{ $post->created_at->format('Y-m-d') }}
                                    </p>
                                    <p></p>
                                    <p>
                                        {!! str($post->description)->limit(50) !!}
                                    </p>
                                    <p></p>
                                    <!-- <p></p> -->

                                    <a href="{{ route('news-detail', ['locale' => session('locale', 'en'), 'new' => $post->id]) }}"
                                        class="news-more-link">{{ __('app.Read More') }}</a>
                                </div>
                            @endforeach
                        </div>

                        <div class="news_pagination wpnw-numeric">
                            {{ $news->links('pagination::bootstrap-4') }}
                        </div>

                    </main>
                </section>

            </div>
        </div>
    </div>
@endsection
