@extends('frontends.frontend')

@section('content')
    <style scoped>
        .description {
            -webkit-line-clamp: 5;
            /* autoprefixer: off */
            -webkit-box-orient: vertical;
            /* autoprefixer: on */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
        }
    </style>

    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <h1 class="entry-title">{{ __('app.Community Voices') }}</h1>

                                <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                                    @foreach ($communityVoices as $communityVoice)
                                        <div class="article-item"
                                            style="flex: 1 1 calc(33.33% - 20px); margin: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                            <h4 style="font-weight: bold; margin-bottom: 10px">
                                                <a href="{{ route('community-voice-detail', [
                                                    'locale' => 'en',
                                                    'slug' => $communityVoice->slug,
                                                ]) }}"
                                                    style="text-decoration: none;">
                                                    {{ $communityVoice->title }}
                                                </a>
                                            </h4>
                                            <div class="description">

                                                {!! strip_tags($communityVoice->description, '<p><br><span><strong><em>') !!}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </div>
@endsection
