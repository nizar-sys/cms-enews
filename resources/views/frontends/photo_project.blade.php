@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.Photo Gallery'), app()->getLocale()))

@section('content')
    <style>
        .no-galleries {
            padding: 2.5rem 0;
            /* Equivalent to py-10 */
        }

        .no-galleries h2 {
            font-size: 1.5rem;
            /* Equivalent to text-2xl */
            font-weight: bold;
            /* Equivalent to font-bold */
            margin-bottom: 1rem;
            /* Equivalent to mb-4 */
        }

        .no-galleries p {
            color: #4B5563;
            /* Equivalent to text-gray-600 */
        }

        .album {
            margin-bottom: 2rem;
            /* Equivalent to mb-8 */
            width: 100%;
            /* Equivalent to w-full */
        }

        .album h2 {
            font-size: 1.125rem;
            /* Equivalent to text-lg */
            font-weight: bold;
            /* Equivalent to font-bold */
            margin-bottom: 1rem;
            /* Equivalent to mb-4 */
        }

        .photo-container {
            display: flex;
            flex-wrap: wrap;
            /* Equivalent to flex flex-wrap */
        }

        .photo-wrapper {
            width: 100%;
            /* Default to full width */
            margin-bottom: 1rem;
            /* Equivalent to mb-4 */
            padding-right: 0.5rem;
            /* Equivalent to pr-2 */
        }

        @media (min-width: 640px) {

            /* Equivalent to sm:w-1/2 */
            .photo-wrapper {
                width: 50%;
                /* 2 items per row */
            }
        }

        .photo {
            border-radius: 0.5rem;
            /* Equivalent to rounded-lg */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            /* Equivalent to shadow-md */
            overflow: hidden;
            /* Equivalent to overflow-hidden */
        }

        .photo img {
            width: 100%;
            /* Equivalent to w-full */
            height: auto;
            /* Equivalent to h-auto */
            object-fit: contain;
            /* Equivalent to object-contain */
        }
    </style>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}</h2>
                            {!! GoogleTranslate::trans($slider->description, app()->getLocale()) !!}
                        </div>
                    </div>
                @endforeach

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Photo Gallery'), app()->getLocale()) }}
                </h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">
                            {{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Photo Gallery'), app()->getLocale()) }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <section id="primary" class="w-full ">
                    <main id="main" class="site-main" role="main">

                        <h2 class="mb-5">
                            {{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.Photo Gallery'), app()->getLocale()) }}
                        </h2>
                        @if ($photoProjects->isEmpty())
                            <div class="no-galleries">
                                <div>
                                    <h2>{{ __('app.No Photo Galleries Available') }}</h2>
                                </div>
                            </div>
                        @else
                            @foreach ($photoProjects as $albumId => $photos)
                                <div class="album">
                                    <h2>{{ __('app.Album') }} :
                                        {{ GoogleTranslate::trans($photos[0]->photoProjectAlbum->name, app()->getLocale()) }}
                                    </h2>
                                    <hr>
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
