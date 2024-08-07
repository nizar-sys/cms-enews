@extends('frontends.frontend')

@section('title', __('app.faqs'))

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ __('app.faqs') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.faqs') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">
                        <article id="post-478" class="post-478 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">FAQs</h1>
                            </header><!-- .entry-header -->
        
                            <div class="entry-content">
                                <div class="accordion" id="faqAccordion">
                                    @forelse ($faqs as $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse-{{ $loop->index }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    {!! $faq->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No data</p>
                                    @endforelse
                                </div>
                            </div><!-- .entry-content -->
                        </article><!-- #post-## -->
                    </main><!-- #main -->
                </section><!-- #primary -->
            </div><!-- .row -->
        </div>
    </main>
@endsection
