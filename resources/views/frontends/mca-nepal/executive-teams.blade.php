@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <div class="container">

                            <article id="post-22" class="post-22 page type-page status-publish hentry">
                                <div class="entry-content">
                                    <h2>Executive team</h2>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <p>{!! $sectionSetting?->sub_title !!}</p>
                                        </div>
                                    </div>

                                    <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>

                                    <div class="row">
                                        @if ($executives->isEmpty())
                                            <div class="col-12 text-center">
                                                <h4>No data</h4>
                                            </div>
                                        @else
                                            @foreach ($executives as $executive)
                                                @if ($loop->first && $executives->count() == 1)
                                                    <div class="col-12">
                                                        <h4 class="text-center">{{ $executive->designation->designation }}
                                                        </h4>
                                                        <h5 class="text-center">{{ $executive->name }}</h5>
                                                        <div class="wp-block-image text-center">
                                                            <figure>
                                                                <img decoding="async" src="{{ $executive->image }}"
                                                                    style="border:7px solid #ccc;"
                                                                    alt="{{ $executive->name }}" width="127">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                @elseif ($executives->count() == 2)
                                                    <div class="col-lg-6 col-md-6">
                                                        <h4 class="text-center">{{ $executive->designation->designation }}
                                                        </h4>
                                                        <h5 class="text-center">{{ $executive->name }}</h5>
                                                        <div class="wp-block-image text-center">
                                                            <figure>
                                                                <img decoding="async" src="{{ $executive->image }}"
                                                                    style="border:7px solid #ccc;"
                                                                    alt="{{ $executive->name }}" width="127">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                @elseif ($executives->count() == 3)
                                                    <div class="col-lg-4 col-md-4">
                                                        <h4 class="text-center">{{ $executive->designation->designation }}
                                                        </h4>
                                                        <h5 class="text-center">{{ $executive->name }}</h5>
                                                        <div class="wp-block-image text-center">
                                                            <figure>
                                                                <img decoding="async" src="{{ $executive->image }}"
                                                                    style="border:7px solid #ccc;"
                                                                    alt="{{ $executive->name }}" width="127">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-lg-6 col-md-6">
                                                        <h4 class="text-center">{{ $executive->designation->designation }}
                                                        </h4>
                                                        <h5 class="text-center">{{ $executive->name }}</h5>
                                                        <div class="wp-block-image text-center">
                                                            <figure>
                                                                <img decoding="async" src="{{ $executive->image }}"
                                                                    style="border:7px solid #ccc;"
                                                                    alt="{{ $executive->name }}" width="127">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    @if ($loop->iteration % 2 == 0 && $executives->count() > 3)
                                    </div>
                                    <div class="row">
                                        @endif
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>



                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>
                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
