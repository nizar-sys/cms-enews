@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-126" class="post-126 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ $sectionSetting->title }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                {!! $sectionSetting->description !!}
                                <p>&nbsp;</p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Vacancy Deadline</th>
                                            <th>Current Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobLists as $job)
                                            <tr>
                                                <td><a href="{{ $job->filepath }}" target="_blank"
                                                        rel="noopener">{{ $job->position }}</a></td>
                                                <td>{{ $job->vacancy_deadline }}</td>
                                                <td>{{ $job->current_status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
