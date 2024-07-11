@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        @if ($projectCategory->description)
                            <article id="post-26" class="post-26 page type-page status-publish hentry">

                                <div class="entry-content">
                                    {!! $projectCategory->description !!}
                                </div>

                            </article>
                        @else
                            <h1 class="entry-title">Cross-Cutting Activities</h1>
                            <div class="row">
                                <div class="project_single col-md-4">
                                    <div class="project-thumbnail">
                                        <a href="https://mcanp.org/en/cca/monitoring-and-evaluation/"><img
                                                src="https://mcanp.org/en/wp-content/uploads/sites/2/2018/11/monitoring-and-evaluation.jpeg"></a>
                                    </div>
                                    <h3><a href="https://mcanp.org/en/cca/monitoring-and-evaluation/">Monitoring and
                                            Evaluation</a></h3>
                                    <p class="dates"><i class="far fa-calendar-alt"></i>2018-11-29</p>
                                    <p></p>
                                    <p>Compacts financed by the Millennium Challenge Corporation (MCC) are subject to
                                        comprehensive monitoring and evaluation to ensure successful implementation of
                                        projects,
                                        and to define the quality and level of desirable outcomes. The Nepal Compact
                                        Monitoring
                                        and Evaluation (M&amp;E) Plan is currently under development as per […]</p>
                                    <p></p>
                                    <!-- <p></p> -->
                                </div>
                                <div class="project_single col-md-4">
                                    <div class="project-thumbnail">
                                        <a href="https://mcanp.org/en/cca/monitoring-and-evaluation/"><img
                                                src="https://mcanp.org/en/wp-content/uploads/sites/2/2018/11/monitoring-and-evaluation.jpeg"></a>
                                    </div>
                                    <h3><a href="https://mcanp.org/en/cca/monitoring-and-evaluation/">Monitoring and
                                            Evaluation</a></h3>
                                    <p class="dates"><i class="far fa-calendar-alt"></i>2018-11-29</p>
                                    <p></p>
                                    <p>Compacts financed by the Millennium Challenge Corporation (MCC) are subject to
                                        comprehensive monitoring and evaluation to ensure successful implementation of
                                        projects,
                                        and to define the quality and level of desirable outcomes. The Nepal Compact
                                        Monitoring
                                        and Evaluation (M&amp;E) Plan is currently under development as per […]</p>
                                    <p></p>
                                    <!-- <p></p> -->
                                </div>
                                <div class="project_single col-md-4">
                                    <div class="project-thumbnail">
                                        <a href="https://mcanp.org/en/cca/monitoring-and-evaluation/"><img
                                                src="https://mcanp.org/en/wp-content/uploads/sites/2/2018/11/monitoring-and-evaluation.jpeg"></a>
                                    </div>
                                    <h3><a href="https://mcanp.org/en/cca/monitoring-and-evaluation/">Monitoring and
                                            Evaluation</a></h3>
                                    <p class="dates"><i class="far fa-calendar-alt"></i>2018-11-29</p>
                                    <p></p>
                                    <p>Compacts financed by the Millennium Challenge Corporation (MCC) are subject to
                                        comprehensive monitoring and evaluation to ensure successful implementation of
                                        projects,
                                        and to define the quality and level of desirable outcomes. The Nepal Compact
                                        Monitoring
                                        and Evaluation (M&amp;E) Plan is currently under development as per […]</p>
                                    <p></p>
                                    <!-- <p></p> -->
                                </div>
                            </div>
                        @endif

                    </main>
                </section>

            </div>
        </div>
    </div>
@endsection
