@extends('frontends.frontend')

@section('title', $projectCategory->name)

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                        <div class="carousel-container">
                            <h2>{{ $slider->title }}</h2>
                            {!! $slider->description !!}
                        </div>
                    </div>
                @endforeach

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $projectCategory->name }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $projectCategory->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        @if ($latestProjectsUpdate)
                            <article id="post-2242" class="post-2242 page type-page status-publish hentry">
                                <header class="entry-header">
                                    <h1 class="entry-title">Latest Project Updates</h1>
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                @foreach ($latestProjectsUpdate as $latest)
                                                    <td style="text-align: {{ $loop->iteration == 1 ? 'left' : 'right' }};">
                                                        <h5><a title="{{ $latest->name }}"
                                                                href="{{ route('project-category', ['locale' => session('locale', 'en'), 'slugCategory' => $latest->slug]) }}">{{ $latest->name }}</a>
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
                                    <header class="entry-header">
                                        <h1 class="entry-title">{{ $projectCategory->name }}</h1>
                                    </header><!-- .entry-header -->

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
                                                        width="370" height="370"
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
    </main>
@endsection
