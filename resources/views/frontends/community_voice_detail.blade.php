@extends('frontends.frontend')

@section('content')
<main class="main">
    
    <div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
    <div class="container position-relative">
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                <li class="current">{{ __('app.Community Voice') }}</li>
            </ol>
        </nav>
    </div>
</div>
    
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="article-detail"
                                            style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                            <h3
                                                style="font-weight: bold; margin-bottom: 20px; padding-bottom:10px; border-bottom: 1px solid #888">
                                                {{ $communityVoice->title }}</h3>
                                            <div class="description">
                                                {!! $communityVoice->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    
</main>
@endsection
