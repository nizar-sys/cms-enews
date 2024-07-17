@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 8rem">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        @if ($latestProjectsUpdate)
                            <article id="post-2242" class="post-2242 page type-page status-publish hentry">
                                <header class="entry-header">
                                    <h1 class="entry-title">{{ __('app.Latest Project Updates') }}</h1>
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                @foreach ($latestProjectsUpdate as $latest)
                                                    <td style="text-align: {{ $loop->iteration == 1 ? 'left' : 'right' }};">
                                                        <h5><a title="{{ __('app.' . $latest->name) }}"
                                                                href="{{ route('project-category', ['locale' => session('locale', 'en'), 'slugCategory' => $latest->slug]) }}">{{ __('app.' . $latest->name) }}</a>
                                                        </h5>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- .entry-content -->

                            </article>
                        @else
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
                                                        'slugProject' => $project->slug,
                                                    ]) }}"><img
                                                        src="{{ asset($project->image) }}"></a>
                                            </div>
                                            <h3><a
                                                    href="{{ route('project-detail', [
                                                        'locale' => 'en',
                                                        'slugCategory' => Str::of($projectCategory->slug)->explode('-')->map(function ($segment) {
                                                                return Str::substr($segment, 0, 1);
                                                            })->implode(''),
                                                        'slugProject' => $project->slug,
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
                        @endif

                    </main>
                </section>

            </div>
        </div>
    </div>
@endsection
