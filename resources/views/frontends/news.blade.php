@extends('frontends.frontend')

@section('title', __('app.news'))

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
    <main class="main">
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
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

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        <h1 class="entry-title mb-5">{{ __('app.News') }}</h1>
                        <div class="row gx-5">
                            @foreach ($news as $post)
                                <div class="project_single col-md-4">
                                    <h3><a
                                            href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $post->id]) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="dates"><i class="far fa-calendar-alt"
                                            style="margin-right: 7px"></i>{{ $post->created_at->format('Y-m-d') }}
                                    </p>
                                    <p></p>
                                    <p>
                                        {!! str($post->description)->limit(50) !!}
                                    </p>
                                    <p></p>
                                    <!-- <p></p> -->

                                    <a href="{{ route('media-notices.news-detail', ['locale' => session('locale', 'en'), 'new' => $post->id]) }}"
                                        class="btn btn-danger btn btn-sm text-white">{{ __('app.Read More') }}</a>
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
    </main>
@endsection
