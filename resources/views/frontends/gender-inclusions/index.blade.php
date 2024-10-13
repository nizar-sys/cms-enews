@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? translate('Gender & Social Inclusions', app()->getLocale()))

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

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ translate($slider->title ?? '', app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ translate($slider->title ?? '', app()->getLocale()) }}</h2>
                            {!! translate($slider->description ?? '', app()->getLocale()) !!}
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
                <h1>{{ $sectionSetting?->title ?? translate('Gender & Social Inclusions', app()->getLocale()) }}
                </h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->description ?? translate('No Data', app()->getLocale()) !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">
                            {{ $sectionSetting?->title ?? translate('Gender & Social Inclusions', app()->getLocale()) }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="recent-posts" class="recent-posts section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ translate('Latest', app()->getLocale()) }}</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-5">
                    @foreach ($genderInclusions as $inclusion)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset($inclusion->thumbnail) }}" class="img-fluid"
                                        alt="{{ $inclusion->title }}">
                                    <span class="post-date">@datetime($inclusion->created_at)</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">
                                        {{ $inclusion->title }}
                                    </h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span
                                                class="ps-2">{{ $inclusion->author->name }}</span>
                                        </div>
                                        <span class="px-3 text-black-50"></span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar"></i> <span class="ps-2">@datetime($inclusion->created_at)</span>
                                        </div>
                                    </div>

                                    <hr>

                                    <a href="{{ route('gender-social-inclusion.show', ['locale' => session('locale', 'en'), 'inclusion' => $inclusion->id]) }}"
                                        class="readmore stretched-link"><span>{{ translate('Read More', app()->getLocale()) }}</span><i
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
