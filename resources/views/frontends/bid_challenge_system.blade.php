@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 8rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-303" class="post-303 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ __('app.Bid Challenge System') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <ul>
                                    @foreach ($bidChallengeSystem as $bid)
                                        <li>
                                            <h6><strong><a target="_blank" href="{{ asset($bid->file_path) }}">
                                                        {{ $bid->file_name }}</a></strong></h6>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </div>
@endsection
