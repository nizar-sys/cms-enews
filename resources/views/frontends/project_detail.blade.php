@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-8">
                    <main id="main" class="site-main" role="main">


                        <article id="post-329" class="post-329 cca type-cca status-publish has-post-thumbnail hentry">
                            <div class="post-thumbnail">
                                <img width="960" height="540" src="{{ asset($project->image) }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                    decoding="async" fetchpriority="high"
                                    srcset="{{ asset($project->image) }} 960w, https://mcanp.org/en/wp-content/uploads/sites/2/2018/11/monitoring-and-evaluation-300x169.jpeg 300w, https://mcanp.org/en/wp-content/uploads/sites/2/2018/11/monitoring-and-evaluation-768x432.jpeg 768w"
                                    sizes="(max-width: 960px) 100vw, 960px">
                            </div>
                            <header class="entry-header">
                                <h1 class="entry-title">{{ $project->name }}</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                {!! $project->description !!}
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->

                        @if ($prevProject || $nextProject)
                            <nav class="navigation post-navigation" aria-label="Posts">
                                <h2 class="screen-reader-text">Post navigation</h2>
                                <div class="nav-links">
                                    @if ($prevProject)
                                        <div class="nav-previous"><a
                                                href="{{ route('project-detail', [
                                                    'locale' => 'en',
                                                    'slugCategory' => Str::of($project->category->slug)->explode('-')->map(function ($segment) {
                                                            return Str::substr($segment, 0, 1);
                                                        })->implode(''),
                                                    'slugProject' => str($prevProject->name)->slug(),
                                                ]) }}"
                                                rel="prev">{{ $prevProject->name }}</a></div>
                                    @endif

                                    @if ($nextProject)
                                        <div class="nav-next"><a
                                                href="{{ route('project-detail', [
                                                    'locale' => 'en',
                                                    'slugCategory' => Str::of($project->category->slug)->explode('-')->map(function ($segment) {
                                                            return Str::substr($segment, 0, 1);
                                                        })->implode(''),
                                                    'slugProject' => str($nextProject->name)->slug(),
                                                ]) }}"
                                                rel="next">{{ $nextProject->name }}</a></div>
                                    @endif
                                </div>
                            </nav>
                        @endif
                    </main>
                </section><!-- #primary -->


                <aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
                    <section id="block-3" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                    <section id="sp_news_widget-3" class="widget SP_News_Widget">
                        <h3 class="widget-title">News</h3>
                        <div class="recent-news-items no_p">
                            <ul>

                                <li class="news_li">
                                    <a class="newspost-title"
                                        href="https://mcanp.org/en/news/mca-nepal-signs-second-400kv-substation-construction-contract/">MCA-Nepal
                                        signs second 400kV substation construction contract</a>
                                </li>


                                <li class="news_li">
                                    <a class="newspost-title"
                                        href="https://mcanp.org/en/news/mca-nepal-signs-contract-to-construct-400-kv-new-butwal-substation-at-nawalparasi-bardaghat-susta-west/">MCA-Nepal
                                        Signs Contract to Construct 400 kV New Butwal Substation at Nawalparasi (Bardaghat
                                        Susta West)</a>
                                </li>


                                <li class="news_li">
                                    <a class="newspost-title"
                                        href="https://mcanp.org/en/news/mca-nepal-board-advances-18-km-cross-border-segment-of-the-power-transmission-line/">MCA-Nepal
                                        Board Advances 18 km Cross-Border Segment of the Power Transmission Line</a>
                                </li>


                                <li class="news_li">
                                    <a class="newspost-title"
                                        href="https://mcanp.org/en/news/mca-nepal-moving-the-transmission-line-procurement-forward/">MCA-Nepal
                                        moving the Transmission Line Procurement Forward</a>
                                </li>


                                <li class="news_li">
                                    <a class="newspost-title"
                                        href="https://mcanp.org/en/news/bids-open-for-substations-construction/">Bids opened
                                        for substations construction</a>
                                </li>

                            </ul>
                        </div>

                    </section>
                    <section id="block-4" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                    <section id="block-5" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                    <section id="block-6" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow"></div>
                        </div>
                    </section>
                </aside><!-- #secondary -->
            </div><!-- .row -->
        </div>
    </div>
@endsection
