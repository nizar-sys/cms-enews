@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 8rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-478" class="post-478 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">FAQs</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <div id="accordions-2183" class="accordions-2183 accordions"
                                    data-accordions={&quot;lazyLoad&quot;:true,&quot;id&quot;:&quot;2183&quot;,&quot;event&quot;:&quot;click&quot;,&quot;collapsible&quot;:&quot;true&quot;,&quot;heightStyle&quot;:&quot;content&quot;,&quot;animateStyle&quot;:&quot;swing&quot;,&quot;animateDelay&quot;:1000,&quot;navigation&quot;:true,&quot;active&quot;:999,&quot;expandedOther&quot;:&quot;no&quot;}>
                                    <div id="accordions-lazy-2183" class="accordions-lazy" accordionsId="2183">
                                    </div>

                                    <div class="items" style="display:none">

                                        @forelse ($faqs as $faq)
                                            <div post_id="{{ $faq->id }}" itemcount="0"
                                                header_id="header-{{ $loop->index }}" id="header-{{ $loop->index }}"
                                                style="" class="accordions-head head{{ $loop->index }} border-none"
                                                toggle-text="" main-text="{{ $faq->question }}">
                                                <span id="accordion-icons-{{ $loop->index }}" class="accordion-icons">
                                                    <span class="accordion-icon-active accordion-plus"><i
                                                            class="fas fa-chevron-up"></i></span>
                                                    <span class="accordion-icon-inactive accordion-minus"><i
                                                            class="fas fa-chevron-right"></i></span>
                                                </span>
                                                <span id="header-text-{{ $loop->index }}"
                                                    class="accordions-head-title">{{ $faq->question }}</span>
                                            </div>
                                            <div class="accordion-content content{{ $loop->index }}">
                                                {!! $faq->answer !!}
                                            </div>
                                        @empty
                                            <p>No data</p>
                                        @endforelse



                                    </div>



                                </div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div>
@endsection
