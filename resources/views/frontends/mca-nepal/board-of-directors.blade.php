@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin: 15rem 10rem 0">
        <section id="primary" class="content-area col-sm-12 col-lg-12">

            <main id="main" class="site-main" role="main">
                <div class="row">
                    <div class="col-md-8">
                        <article id="post-20" class="post-20 page type-page status-publish hentry">
                            <div class="entry-content">
                                <h2>{{ $sectionSetting?->title }}</h2>

                                <div class="wp-block-spacer" style="height: 20px" aria-hidden="true"> </div>

                                <div style="word-wrap: break-word;">
                                    {!! $sectionSetting?->sub_title !!}
                                </div>

                                <p>&nbsp;</p>

                                @if ($directors->isEmpty())
                                    <div class="row mb-4">
                                        <div class="col-12 text-center">
                                            <h4>No data</h4>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($directors as $director)
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <figure>
                                                    <img decoding="async" class="img-fluid" src="{{ $director->image }}"
                                                        alt="" style="border: 7px solid #ccc; width: 100%;" />
                                                </figure>
                                            </div>
                                            <div class="col-md-8">
                                                <h4>{{ $director->name_formatted }}</h4>
                                                <div class="entry-content" style="word-wrap: break-word">
                                                    {!! $director->description !!}
                                                </div><!-- .entry-content -->
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div><!-- .entry-content -->
                        </article><!-- #post-## -->
                    </div>
                    @if ($documentCategory && $documentCategory->document_files_count > 0)
                        <div class="col-md-4">
                            <h4>{{ $documentCategory->name }}</h4>
                            <div class="minutes_lists">
                                <ul class="minutes_single">
                                    @foreach ($documentCategory->documentFiles as $file)
                                        <li>
                                            <a href="{{ asset($file->file_path) }}" title="" target="_blank"><i
                                                    class="far fa-file-pdf"></i> {{ $file->filename }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="text-center">
                                    <a class="btn btn-danger"
                                        href="{{ route('document-category', ['locale' => session('locale', 'en'), 'slugCategory' => $documentCategory->slug]) }}">{{__('app.View More')}}</a>
                                </div>
                            </div>
                        </div><!-- minutes_lists -->
                    @endif
                </div>

            </main><!-- #main -->

        </section>
    </div>
@endsection
