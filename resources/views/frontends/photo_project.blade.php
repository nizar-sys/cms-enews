@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.Photo Gallery'))

@section('content')
    <style>
        .no-galleries {
            padding: 40px 0;
            text-align: center;
        }

        .no-galleries h2 {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 16px;
            color: #2c3e50;
        }

        .album {
            margin-bottom: 32px;
            width: 100%;
        }

        .album h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 16px;
            color: #34495e;
        }

        .photo-container {
            display: flex;
            overflow-x: auto;
            gap: 15px;
            padding-bottom: 15px;
        }

        .photo-wrapper {
            flex: 0 0 auto;
            width: 200px;
        }

        .photo {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .photo img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .page-title {
            background-color: #2c4666;
            padding: 60px 0;
            text-align: center;
            color: #fff;
        }

        .page-title h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .breadcrumbs {
            display: inline-block;
        }

        .breadcrumbs ol {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            justify-content: center;
        }

        .breadcrumbs ol li {
            margin: 0 8px;
            font-size: 16px;
            color: #bdc3c7;
        }

        .breadcrumbs ol li a {
            color: #1abc9c;
            text-decoration: none;
        }

        .breadcrumbs ol li.current {
            color: #ecf0f1;
        }
    </style>

    <div class="page-title dark-background" data-aos="fade">
        <div class="container position-relative">
            <h1>{{ $sectionSetting?->title ?? __('app.Photo Gallery') }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                    <li class="current">{{ $sectionSetting?->title ?? __('app.Photo Gallery') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <main class="main">
        <div class="container">
            <div class="row">
                <section id="primary" class="w-full">
                    <main id="main" class="site-main" role="main">
                        <h2 class="mb-5" style="text-align: center; font-size: 2rem; color: #34495e;">
                            {{ __('app.Photo Project') }}</h2>
                        @if ($photoProjects->isEmpty())
                            <div class="no-galleries">
                                <div>
                                    <h2>{{ __('app.No Photo Project Available') }}</h2>
                                </div>
                            </div>
                        @else
                            @foreach ($photoProjects as $albumId => $photos)
                                <div class="album">
                                    <h2>{{ $photos[0]->photoProjectAlbum->name }}</h2>
                                    <div class="photo-container">
                                        @foreach ($photos as $photo)
                                            <div class="photo-wrapper">
                                                <div class="photo">
                                                    <img src="{{ asset($photo->photo_path) }}" alt="Photo">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </main>
                </section>
            </div>
        </div>
    </main>
@endsection
