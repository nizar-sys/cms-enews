@extends('frontends.frontend')

@section('title', __('app.contact'))

@push('style')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ __('app.contact') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.contact') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-18" class="post-18 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ __('app.contact') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>{{ $contact?->address }}<br />
                                    <i class="fa fa-phone"> </i> {{ __('app.phone') }}: {{ $contact?->phone }}<br />
                                    <i class="fa fa-envelope"></i> {{ __('app.email') }}:
                                    {{ $contact?->email }}</a><br /><br />
                                </p>
                                <div class="map"><iframe style="border: 0 margin:0;" src="{{ $contact?->maps }}"
                                        width="100%" height="450" frameborder="0"
                                        allowfullscreen="allowfullscreen"></iframe></div>

                                <div class="contact-form"
                                    style="background-color: #f7f9fc; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                    <h2
                                        style="text-align: center; color: #2c4666; margin-bottom: 20px; animation: fadeIn 1s ease-in-out;">
                                        {{ translate('Contact Us' ?? '', app()->getLocale()) }}</h2>

                                    <form action="{{ route('contact.send', ['locale' => session('locale', 'en')]) }}"
                                        method="POST" style="animation: fadeInUp 1.2s ease-in-out;">
                                        @csrf
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="name"
                                                style="color: #2c4666;">{{ translate('Name' ?? '', app()->getLocale()) }}</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                required
                                                style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 5px; transition: border-color 0.3s ease-in-out;"
                                                onfocus="this.style.borderColor='#2c4666'"
                                                onblur="this.style.borderColor='#ddd'">
                                        </div>

                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="email"
                                                style="color: #2c4666;">{{ translate('Email' ?? '', app()->getLocale()) }}</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                required
                                                style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 5px; transition: border-color 0.3s ease-in-out;"
                                                onfocus="this.style.borderColor='#2c4666'"
                                                onblur="this.style.borderColor='#ddd'">
                                        </div>

                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label for="message"
                                                style="color: #2c4666;">{{ translate('Message' ?? '', app()->getLocale()) }}</label>
                                            <textarea id="message" name="message" class="form-control" rows="4" required
                                                style="padding: 10px; width: 100%; border: 1px solid #ddd; border-radius: 5px; transition: border-color 0.3s ease-in-out;"
                                                onfocus="this.style.borderColor='#2c4666'" onblur="this.style.borderColor='#ddd'"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #2c4666; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; width: 100%; 
                                                    cursor: pointer; transition: background-color 0.3s ease-in-out;"
                                            onmouseover="this.style.backgroundColor='#1f3550'"
                                            onmouseout="this.style.backgroundColor='#2c4666'">
                                            {{ translate('Submit' ?? '', app()->getLocale()) }}
                                        </button>
                                    </form>
                                </div><!-- .contact-form -->
                            </div><!-- .entry-content -->
                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </main>
@endsection
