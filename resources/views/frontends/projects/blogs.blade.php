@extends('frontends.frontend')

@section('title', __('app.Posts'))

@push('style')
    <style>
        ._pagination.wpnw-numeric {
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
                <h1>{{ __('app.Posts') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.Posts') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="recent-posts" class="recent-posts section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('app.Latest Posts') }}</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-5">
                    @foreach ($posts as $post)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset($post->thumbnail) }}" class="img-fluid" alt="{{ $post->title }}">
                                    <span class="post-date">@datetime($post->created_at)</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $post->title }}</h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span
                                                class="ps-2">{{ $post->author->name }}</span>
                                        </div>
                                        <span class="px-3 text-black-50"></span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar"></i> <span class="ps-2">@datetime($post->created_at)</span>
                                        </div>
                                    </div>

                                    <hr>

                                    <a href="{{ route('posts-detail', ['locale' => session('locale', 'en'), 'post' => $post->slug]) }}"
                                        class="readmore stretched-link"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
    </main>
@endsection
