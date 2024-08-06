@extends('frontends.frontend')

@section('title', __('app.procurement_notices'))

@section('content')
    <main class="main">
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url({{ asset('/ac') }}/assets/img/page-title-bg.webp);">
            <div class="container position-relative">
                <h1>{{ __('app.procurement_notices') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.procurement_notices') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <header class="entry-header">
                        <h1 class="entry-title">{{ __('app.Procurement Notices') }}</h1>
                    </header>

                    <main id="main" class="site-main" role="main">

                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-specific-tab" data-bs-toggle="tab" href="#nav-specific"
                                    role="tab" aria-controls="nav-specific"
                                    aria-selected="false">{{ __('app.Spesific Procurement') }}</a>
                                <a class="nav-link" id="nav-general-tab" data-bs-toggle="tab" href="#nav-general"
                                    role="tab" aria-controls="nav-general"
                                    aria-selected="true">{{ __('app.General Procurement') }}</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-specific" role="tabpanel"
                                aria-labelledby="nav-specific-tab">

                                <div class="content-area col-sm-12 col-lg-12" style="margin:15px 0;">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>{{ __('app.Title & ID') }}</th>
                                                <th>{{ __('app.Issued Documents') }}</th>
                                                <th>{{ __('app.Important Date') }}</th>
                                                <th>{{ __('app.Status') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($spesificProcurements as $spesificItem)
                                                <tr>
                                                    <td width="8%">{{ $loop->iteration }}</td>

                                                    <td width="35%">
                                                        {!! $spesificItem->title !!}
                                                    </td>
                                                    <td width="30%">
                                                        <ol>
                                                            @foreach ($spesificItem->files as $file)
                                                                <li>
                                                                    {{ $file['file_name'] }}
                                                                </li>
                                                            @endforeach
                                                        </ol>

                                                        <a href="{{ route('procurement-notice-files', ['locale' => session('locale', 'en'), 'spesificProcurementId' => $spesificItem->id]) }}"
                                                            class="badge badge-danger">{{ __('app.Show FIles') }}</a>
                                                    </td>

                                                    <td width="25%">
                                                        {{ __('app.First Date of Publication') }}: <br><strong>

                                                            {{ $spesificItem->date_of_publication }}</strong><br>
                                                        {{ __('app.Last Submission Date/Time') }}:
                                                        <br><strong>{{ $spesificItem->updated_at }}</strong>
                                                    </td>
                                                    <td width="10%">
                                                        @php
                                                            $status = $spesificProcurement->status ?? 'draft';
                                                            $badge = match ($status) {
                                                                'open' => 'badge-success',
                                                                'close' => 'badge-danger',
                                                                default => 'badge-warning',
                                                            };
                                                        @endphp

                                                        <span class="badge {{ $badge }}">{{ $status }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" style="text-align: center">
                                                        {{ __('app.No files found') }}</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                                <div class="table-responsive">
                                    <div class="content-area col-sm-12 col-lg-12" style="margin:15px 0;">
                                    </div>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('app.Title') }}</th>
                                                <th>{{ __('app.Notice') }}</th>
                                                <th>{{ __('app.Published Date') }}</th>
                                                <th>{{ __('app.Duration') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($generalProcurements as $generalProcurement)
                                                <tr>
                                                    <td width="35%">{!! $generalProcurement->title !!}</td>
                                                    <td width="20%">
                                                        <a class="btn btn-danger"
                                                            href="{{ asset($generalProcurement->file_path) }}"
                                                            target="_blank"><i class="fa fa-file-pdf"></i>
                                                            {{ __('app.View PDF') }} </a>
                                                    </td>
                                                    <td width="20%">
                                                        {{ \Carbon\Carbon::parse($generalProcurement->published_date)->format('d/m/Y') }}
                                                    </td>
                                                    <td width="20%">
                                                        {{ $generalProcurement->duration }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center">
                                                        {{ __('app.No files found') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <br>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="50%" style="text-align:left">
                                                </td>
                                                <td width="50%" style="text-align:right">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
