@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.procurement_notices'), app()->getLocale()))

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}</h2>
                            {!! GoogleTranslate::trans($slider->description, app()->getLocale()) !!}
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

        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.procurement_notices'), app()->getLocale()) }}
                </h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">
                            {{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.procurement_notices'), app()->getLocale()) }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <header class="entry-header">
                        <h1 class="entry-title">
                            {{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.procurement_notices'), app()->getLocale()) }}
                        </h1>
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
                                                        {!! GoogleTranslate::trans($spesificItem->title, app()->getLocale()) !!}
                                                    </td>
                                                    <td width="30%">
                                                        <ol>
                                                            @foreach ($spesificItem->files as $file)
                                                                <li>
                                                                    {{ GoogleTranslate::trans($file['file_name'], app()->getLocale()) }}
                                                                </li>
                                                            @endforeach
                                                        </ol>

                                                        <a href="{{ route('procurement-notice-files', ['locale' => session('locale', 'en'), 'spesificProcurementId' => $spesificItem->id]) }}"
                                                            class="btn btn-danger btn-sm">{{ __('app.Show Files') }}</a>
                                                    </td>

                                                    <td width="25%">
                                                        {{ __('app.First Date of Publication') }}: <br><strong>

                                                            {{ $spesificItem->date_of_publication }}</strong><br>
                                                        {{ __('app.Last Submission Date/Time') }}:
                                                        <br><strong>{{ $spesificItem->updated_at }}</strong>
                                                    </td>
                                                    <td width="10%">
                                                        @php
                                                            $status = $spesificItem?->status ?? 'draft';
                                                            $badge = match ($status) {
                                                                'open' => 'btn-success',
                                                                'close' => 'btn-danger',
                                                                default => 'btn-warning',
                                                            };
                                                        @endphp

                                                        <span class="btn {{ $badge }}">{{ $status }}</span>
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
                                    <form id="downloadProcurementsForm" method="POST"
                                        action="{{ route('download.multiple') }}">
                                        @csrf
                                        <div class="content-area col-sm-12 col-lg-12" style="margin:15px 0;">
                                            <!-- Additional content can be added here if needed -->
                                        </div>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="selectAllProcurements"></th>
                                                    <th>{{ __('app.Title') }}</th>
                                                    <th>{{ __('app.Notice') }}</th>
                                                    <th>{{ __('app.Published Date') }}</th>
                                                    <th>{{ __('app.Duration') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($generalProcurements as $generalProcurement)
                                                    <tr>
                                                        <td width="5%"><input type="checkbox" name="files[]"
                                                                value="{{ $generalProcurement->file_path }}"></td>
                                                        <td width="35%">{!! GoogleTranslate::trans($generalProcurement->title, app()->getLocale()) !!}</td>
                                                        <td width="20%">
                                                            <a class="btn btn-danger btn-sm"
                                                                href="{{ route('download.uploads', ['file' => $generalProcurement->file_path, 'model' => get_class($generalProcurement), 'id' => $generalProcurement->id]) }}"
                                                                target="_blank">
                                                                <i class="fa fa-file"></i> {{ __('app.Show Files') }}
                                                            </a>
                                                        </td>
                                                        <td width="20%">
                                                            {{ \Carbon\Carbon::parse($generalProcurement->published_date)->format('d/m/Y') }}
                                                        </td>
                                                        <td width="20%">
                                                            {{ GoogleTranslate::trans($generalProcurement->duration, app()->getLocale()) }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            {{ __('app.No files found') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <button type="submit"
                                            class="btn btn-danger btn-sm">{{ __('app.Download Selected') }}</button>
                                    </form>
                                    <br>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="50%" style="text-align:left"></td>
                                                <td width="50%" style="text-align:right"></td>
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
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#selectAllProcurements').click(function() {
                $('input[name="files[]"]').prop('checked', this.checked);
            });

            $('input[name="files[]"]').change(function() {
                $('#selectAllProcurements').prop('checked', $('input[name="files[]"]').length === $(
                    'input[name="files[]"]:checked').length);
            });

            $('#downloadProcurementsForm').submit(function(e) {
                if ($('input[name="files[]"]:checked').length === 0) {
                    e.preventDefault();
                    alert('{{ __('app.No files selected') }}');
                }
            });
        });
    </script>
@endpush
