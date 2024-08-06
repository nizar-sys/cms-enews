@extends('frontends.frontend')

@section('content')
    <style>
        .video-gallery {
            display: flex;
            flex-wrap: wrap;
        }

        .video-item {
            width: 100%;
            margin-bottom: 0.4rem;
            padding-right: 0.5rem;
        }

        @media (min-width: 640px) {
            .video-item {
                width: 50%;
            }
        }

        .video-embed {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
    </style>
    <div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
    <div class="container position-relative">
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                <li class="current">{{ __('app.Video Gallery') }}</li>
            </ol>
        </nav>
    </div>
</div>
<main class="main">
        <div class="container">
            <div class="row">
                <section id="primary" class="w-full ">
                    <main id="main" class="site-main" role="main">
                        <h2 class="mb-5">{{ __('app.Video Gallery') }}</h2>
                        @if($videoGalleries->isEmpty())
                            <div class="no-galleries">
                                <div>
                                    <h2>{{ __('app.No Video Available') }}</h2>
                                </div>
                            </div>
                        @else
                            <div class="video-gallery">
                                @foreach ($videoGalleries as $video)
                                    <div class="video-item">
                                        <div class="video-embed">
                                            <iframe width="560" height="315" src="{{ $video->url }}" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </main>
                </section>
            </div>
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
