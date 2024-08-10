@extends('frontends.frontend')

@section('title', __('app.About'))

@push('style')
    <style>
        .spacer {
            height: 30px;
        }

        .executive-image {
            border: 7px solid #ccc;
            width: 127px;
        }
    </style>
@endpush

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1></h1>
                <div style="word-wrap: break-word;">
                    {{ $about->title ?? 'app.Read More' }}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.Read More') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <h1>{{ $about->title ?? 'app.Read More' }}</h1>
                    <main id="main" class="site-main" role="main">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 position-relative text-center" data-aos="zoom-out">
                                    <img src="{{ $about ? asset($about->image) : asset('/ac/assets/img/img_sq_1.jpg') }}"
                                        alt="Image" class="img-fluid thumbnail-image"
                                        style="max-width: 100%; height: auto; max-height: 400px; object-fit: cover;">

                                    <a href="{{ $about ? $about->video_url : 'https://www.youtube.com/watch?v=LXb3EKWsInQ' }}"
                                        class="glightbox pulsating-play-btn"
                                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    </a>
                                </div>
                            </div>
                            <!-- Divider -->
                            <hr>

                            <!-- Content Section -->
                            <article id="post-22" class="post-22 page type-page status-publish hentry">
                                <div class="entry-content">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <p>{!! $about->description !!}</p>
                                        </div>
                                    </div>
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>
                    </main>
                </section>
            </div>
        </div>

    </main>
@endsection
