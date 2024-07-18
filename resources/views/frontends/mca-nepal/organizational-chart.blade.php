@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 8rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-245" class="post-245 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ $sectionSetting?->title ?? __('app.organizational_chart') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>{!! $sectionSetting?->sub_title ?? 'No Data' !!}</p>


                                <div>
                                    <figure class="aligncenter is-resized"><img decoding="async"
                                            src="{{ $sectionSetting?->image }}" alt="" class="wp-image-1114"
                                            width="100%" height="auto" />
                                        <figcaption>{{__('app.update_program')}} : {{ $sectionSetting?->updated_at->format('Y-m-d H:i') ?? 'No Data' }}
                                        </figcaption>

                                    </figure>
                                </div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
