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
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="w-full ">
                    <main id="main" class="site-main" role="main">
                        <h2>{{ __('app.Video Gallery') }}</h2>
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

    </div>
@endsection
