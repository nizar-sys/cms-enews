@extends('frontends.frontend')

@section('title', __('app.contract_award_notice'))

@section('content')
    <main class="main">

        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
            <div class="container position-relative">
                <h1>{{ __('app.contract_award_notice') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.contract_award_notice') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <header class="entry-header">
                        <h1 class="entry-title"{{ __('app.Contract Award Notice') }}></h1>
                    </header>

                    <main id="main" class="site-main" role="main">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('app.Name') }}</th>
                                        <th>{{ __('app.Posted On') }}</th>
                                        <th class="text-center">{{ __('app.Download') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contractAwardNotice as $contractAwardNotice)
                                        <tr>
                                            <td width="70%">{{ $contractAwardNotice->file_name }}</td>

                                            <td width="15%">
                                                {{ \Carbon\Carbon::parse($contractAwardNotice->posted_on)->format('d/m/Y') }}
                                            </td>

                                            <td width="15%" class="text-center">
                                                <a class="btn btn-danger"
                                                    href="{{ asset($contractAwardNotice->file_path) }}" title=""
                                                    target="_blank"><i class="far fa-file-pdf"></i>
                                                    {{ __('app.View PDF') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No files found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </main><!-- #main -->
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
