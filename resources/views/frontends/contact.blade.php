@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 8rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-18" class="post-18 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">Contact</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>{{ $contact?->address }}<br />
                                    <i class="fa fa-phone"> </i> Call: {{ $contact?->phone }}<br />
                                    <i class="fa fa-envelope"></i> Email: {{ $contact?->email }}</a><br /><br />
                                </p>
                                <div class="map"><iframe style="border: 0 margin:0;" src="{{ $contact?->maps }}"
                                        width="100%" height="450" frameborder="0"
                                        allowfullscreen="allowfullscreen"></iframe></div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
