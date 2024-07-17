@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">\
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
    </div>
@endsection
