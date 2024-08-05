@extends('frontends.frontend')

@section('title', __('app.board_of_directors'))

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
            <div class="container position-relative">
                <h1>{{ $sectionSetting?->title }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->sub_title !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.board_of_directors') }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section id="about-3" class="about-3 section">
            <div class="container">
                <div class="row gy-4 justify-content-between align-items-center">
                    <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                        @if ($documentCategory && $documentCategory->document_files_count > 0)
                            <h4>{{ $documentCategory->name }}</h4>
                            <div class="minutes_lists">
                                <ul class="minutes_single" style="list-style: none">
                                    @foreach ($documentCategory->documentFiles as $file)
                                        <li>
                                            <a href="{{ asset($file->file_path) }}" title="" target="_blank"><i
                                                    class="far fa-file-pdf"></i> {{ $file->filename }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="text-center">
                                    <a class="btn btn-danger"
                                        href="{{ route('document-category', ['locale' => session('locale', 'en'), 'slugCategory' => $documentCategory->slug]) }}">{{ __('app.View More') }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-4">{{ $sectionSetting?->title }}</h2>
                        <div style="word-wrap: break-word;">
                            {!! $sectionSetting?->sub_title !!}
                        </div>

                        @if ($directors->isEmpty())
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <h4>{{ __('app.No data') }}</h4>
                                </div>
                            </div>
                        @else
                            @foreach ($directors as $director)
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <figure>
                                            <img decoding="async" class="img-fluid" src="{{ $director->image }}"
                                                alt="" style="border: 7px solid #ccc; width: 100%;" />
                                        </figure>
                                    </div>
                                    <div class="col-md-8">
                                        <h4>{{ $director->name_formatted }}</h4>
                                        <div class="entry-content" style="word-wrap: break-word">
                                            {!! $director->description !!}
                                        </div><!-- .entry-content -->
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section id="call-to-action" class="call-to-action section light-background">

            <div class="content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h3>{{ __('app.Subscribe To Our Newsletter') }}</h3>
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
                                <div class="loading">{{ __('app.Loading') }}</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    {{ __('app.Your subscription request has been sent. Thank you!') }}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
