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
                            <h1 class="entry-title">{{ $projectCategory->name }}</h1>
                            <div class="row">
                                @foreach ($projectCategory->projects as $project)
                                    <div class="project_single col-md-4">
                                        <div class="project-thumbnail">
                                            <a
                                                href="{{ route('project-detail', [
                                                    'locale' => 'en',
                                                    'slugCategory' => Str::of($projectCategory->slug)->explode('-')->map(function ($segment) {
                                                            return Str::substr($segment, 0, 1);
                                                        })->implode(''),
                                                    'slugProject' => str($project->name)->slug(),
                                                ]) }}"><img
                                                    src="{{ asset($project->image) }}"></a>
                                        </div>
                                        <h3><a
                                                href="{{ route('project-detail', [
                                                    'locale' => 'en',
                                                    'slugCategory' => Str::of($projectCategory->slug)->explode('-')->map(function ($segment) {
                                                            return Str::substr($segment, 0, 1);
                                                        })->implode(''),
                                                    'slugProject' => str($project->name)->slug(),
                                                ]) }}">{{ $project->name }}</a>
                                        </h3>
                                        <p class="dates"><i
                                                class="far fa-calendar-alt"></i>{{ $project->created_at->format('Y-m-d') }}
                                        </p>
                                        <p></p>
                                        <p>
                                            {!! str($project->description)->limit(50) !!}
                                        </p>
                                        <p></p>
                                        <!-- <p></p> -->
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </main>
                </section>

            </div>
        </div>
    </div>
@endsection
