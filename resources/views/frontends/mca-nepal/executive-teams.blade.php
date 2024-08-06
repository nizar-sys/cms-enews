@extends('frontends.frontend')

@section('title', __('app.executive_team'))

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
        <div class="page-title dark-background" data-aos="fade"
            style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $sectionSetting?->title }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->sub_title !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.executive_team') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">
                        <div class="container">
                            <article id="post-22" class="post-22 page type-page status-publish hentry">
                                <div class="entry-content">
                                    <h2>{{ $sectionSetting?->title }}</h2>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <p>{!! $sectionSetting?->sub_title !!}</p>
                                        </div>
                                    </div>

                                    <div class="spacer"></div>

                                    <div class="row">
                                        @if ($executives->isEmpty())
                                            <div class="col-12 text-center">
                                                <h4>{{ __('app.No data') }}</h4>
                                            </div>
                                        @else
                                            @foreach ($executives as $executive)
                                                @php
                                                    $colSize =
                                                        $executives->count() == 1
                                                            ? 'col-12'
                                                            : ($executives->count() == 2
                                                                ? 'col-lg-6 col-md-6'
                                                                : 'col-lg-4 col-md-4');
                                                @endphp
                                                <div class="{{ $colSize }}">
                                                    <h4 class="text-center">{{ $executive->designation->designation }}</h4>
                                                    <h5 class="text-center">{{ $executive->name }}</h5>
                                                    <div class="wp-block-image text-center">
                                                        <figure>
                                                            <img decoding="async" src="{{ $executive->image }}"
                                                                width="127" class="executive-image"
                                                                alt="{{ $executive->name }}">
                                                        </figure>
                                                    </div>
                                                </div>
                                                @if ($loop->iteration % 2 == 0 && $executives->count() > 3 && !$loop->last)
                                    </div>
                                    <div class="row">
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>
                    </main>
                </section>
            </div>
        </div>

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
