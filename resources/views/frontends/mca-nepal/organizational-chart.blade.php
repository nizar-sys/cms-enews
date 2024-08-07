@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.organizational_chart'))

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $sectionSetting?->title }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->sub_title !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.organizational_chart') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

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
                                        <figcaption>{{ __('app.update_program') }} :
                                            {{ $sectionSetting?->updated_at->format('Y-m-d H:i') ?? 'No Data' }}
                                        </figcaption>

                                    </figure>
                                </div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </main>
@endsection
