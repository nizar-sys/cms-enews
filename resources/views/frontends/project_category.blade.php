@extends('frontends.frontend')

@section('title', $projectCategory->name)

@section('content')
    <main class="main">

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

        <section id="call-to-action" class="call-to-action section light-background">

            <div class="content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h3>{{ __('app.Subscribe To Our Newsletter') }}</h3>
                            <p class="opacity-50">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nesciunt, reprehenderit!
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <form action="forms/newsletter.php" class="form-subscribe php-email-form">
                                <div class="form-group d-flex align-items-stretch">
                                    <input type="email" name="email" class="form-control h-100"
                                        placeholder="Enter your e-mail">
                                    <input type="submit" class="btn btn-secondary px-4" value="{{ __('app.Subscribe') }}">
                                </div>
                                <div class="loading">{{ __('app.Loading') }}</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    {{ __('app.Your subscription request has been sent. Thank you!') }}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
