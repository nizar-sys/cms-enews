@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.Administrative'))

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
                <h1>{{ $sectionSetting?->title ?? __('app.Administrative') }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->description !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $sectionSetting?->title ?? __('app.Administrative') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        <h1 class="entry-title mb-5">{{ $sectionSetting?->title ?? __('app.Administrative') }}</h1>
                        <div class="row gx-5">
                            @foreach ($news as $post)
                                <div class="project_single col-md-4">
                                    @if ($post->image)
                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset($post->image) }}" class="img-fluid" alt="{{ $post->title }}"
                                                width="200">
                                        </div>
                                    @endif
                                    <h3><a
                                            href="{{ route('what-we-do.administrative-detail', ['locale' => session('locale', 'en'), 'id' => $post->id]) }}">{{ $post->title }}</a>
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

                                    <a href="{{ route('what-we-do.administrative-detail', ['locale' => session('locale', 'en'), 'id' => $post->id]) }}"
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
