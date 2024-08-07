@extends('frontends.frontend')

@section('title', __('app.contact'))

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-color: #2c4666">
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
                                    <i class="fa fa-envelope"></i> {{ __('app.email') }}: {{ $contact?->email }}</a><br /><br />
                                </p>
                                <div class="map"><iframe style="border: 0 margin:0;" src="{{ $contact?->maps }}"
                                        width="100%" height="450" frameborder="0"
                                        allowfullscreen="allowfullscreen"></iframe></div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </main>
@endsection
