@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.contract_award_notice'))

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ translate($slider->title ?? '', app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ translate($slider->title ?? '', app()->getLocale()) }}</h2>
                            {!! translate($slider->description ?? '', app()->getLocale()) !!}
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
                <h1>{{ $sectionSetting?->title ?? __('app.contract_award_notice') }}
                </h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->sub_title !!}
                </div>
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
                            <form id="downloadContractsForm" method="POST" action="{{ route('download.multiple') }}">
                                @csrf
                                @if ($latestContractAwardDate)
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <strong>{{ translate('Info', app()->getLocale()) }}!</strong>
                                        {{ translate('Latest updated contract award notices file at:', app()->getLocale()) }}
                                        <strong>{{ \Carbon\Carbon::parse($latestContractAwardDate)->format('d/m/Y') }}
                                            <small>({{ \Carbon\Carbon::parse($latestContractAwardDate)->diffForHumans() }})</small></strong>
                                        <button type="button" class="close btn btn-transparent" data-bs-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="fas fa-times"></i>
                                            </span>
                                        </button>
                                    </div>
                                @endif
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAllContracts"></th>
                                            <th>{{ __('app.Name') }}</th>
                                            <th>{{ __('app.Posted On') }}</th>
                                            <th class="text-center">{{ __('app.Download') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($contractAwardNotice as $contractAward)
                                            <tr>
                                                <td width="5%"><input type="checkbox" name="files[]"
                                                        value="{{ $contractAward->file_path }}"></td>
                                                <td width="55%">
                                                    {{ $contractAward->file_name }}
                                                </td>
                                                <td width="15%">
                                                    {{ \Carbon\Carbon::parse($contractAward->posted_on)->format('d/m/Y') }}
                                                </td>
                                                <td width="25%" class="text-center">
                                                    <a class="btn btn-danger"
                                                        href="{{ route('download.uploads', ['file' => $contractAward->file_path]) }}"
                                                        title="{{ __('app.Download') }}" target="_blank">
                                                        <i class="far fa-file"></i> {{ __('app.Show Files') }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">{{ __('app.No files found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <button type="submit"
                                    class="btn btn-danger btn-sm">{{ __('app.Download Selected') }}</button>
                            </form>
                        </div>
                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#selectAllContracts').click(function() {
                $('input[name="files[]"]').prop('checked', this.checked);
            });

            $('input[name="files[]"]').change(function() {
                $('#selectAllContracts').prop('checked', $('input[name="files[]"]').length === $(
                    'input[name="files[]"]:checked').length);
            });

            $('#downloadContractsForm').submit(function(e) {
                if ($('input[name="files[]"]:checked').length === 0) {
                    e.preventDefault();
                    alert('{{ __('app.No files selected') }}');
                }
            });
        });
    </script>
@endpush
