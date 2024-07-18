@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-2236" class="post-2236 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ __('app.Procurement Guidelines') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <ol>
                                    @foreach ($guidelinesProcurement as $guideline)
                                        <li><a href="{{ asset($guideline->file_path) }}" target="_blank"
                                                rel="noopener">{{ pathinfo(asset($guideline->file_path), PATHINFO_FILENAME) }}</a>
                                        </li>
                                        <p></p>
                                    @endforeach
                                </ol>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </div>
@endsection
