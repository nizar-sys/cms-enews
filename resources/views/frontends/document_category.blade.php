@extends('frontends.frontend')

@section('title', $documentsReportsCategory->name)

@section('content')
    {{-- <div id="content" class="site-content" style="margin-top: 15rem">
        
    </div> --}}

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
            <div class="container position-relative">
                <h1>{{ $documentsReportsCategory->name }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $documentsReportsCategory->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <h1 class="entry-title">{{ $documentsReportsCategory->name }}</h1>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('app.Name') }}</th>
                                                <th class="text-center">{{ __('app.Download') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($documentsReportsCategory->documentFiles as $file)
                                                <tr>
                                                    <td width="80%">{{ $file->filename }}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger" href="{{ asset($file->file_path) }}"
                                                            target="_blank"><i class="far fa-file-pdf"></i>
                                                            {{ __('app.View PDF') }}</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-center">{{ __('app.No files found') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </section><!-- #primary -->

            </div><!-- .row -->
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
