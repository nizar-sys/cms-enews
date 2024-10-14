@extends('frontends.frontend')

@section('title', $sectionSetting ? $sectionSetting->title : __('app.board_of_directors'))

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

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $sectionSetting ? $sectionSetting->title : '' }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting ? $sectionSetting->sub_title : '' !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.board_of_directors') }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">
                        <div class="container">
                            <article id="post-22" class="post-22 page type-page status-publish hentry">
                                <div class="entry-content">
                                    <h2>{{ $sectionSetting ? $sectionSetting->title : '' }}
                                    </h2>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <p>{!! $sectionSetting ? $sectionSetting->sub_title : '' !!}</p>
                                        </div>
                                    </div>

                                    <div class="spacer"></div>

                                    <div class="row">
                                        @if ($directors->isEmpty())
                                            <div class="col-12 text-center">
                                                <h4>{{ __('app.No data') }}</h4>
                                            </div>
                                        @else
                                            @foreach ($directors as $director)
                                                @php
                                                    $colSize =
                                                        $directors->count() == 1
                                                            ? 'col-12'
                                                            : ($directors->count() == 2
                                                                ? 'col-lg-6 col-md-6'
                                                                : 'col-lg-4 col-md-4');
                                                @endphp
                                                <div class="{{ $colSize }}">
                                                    <h4 class="text-center">
                                                        {{ $director->designation?->designation ?? __('app.No data') }}
                                                    </h4>
                                                    <h5 class="text-center">{{ $director->name }}</h5>
                                                    <div class="wp-block-image text-center">
                                                        <figure>
                                                            <img decoding="async" src="{{ $director->image }}"
                                                                width="127" class="executive-image"
                                                                alt="{{ $director->name }}">
                                                        </figure>
                                                    </div>
                                                </div>
                                                @if ($loop->iteration % 2 == 0 && $directors->count() > 3 && !$loop->last)
                                    </div>
                                    <div class="row">
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>
                    </main>
                </section>
            </div>
        </div>

        @if ($documentCategory && $documentCategory->document_files_count > 0)
            <section id="about-3" class="about-3 section">
                <div class="container">
                    <div class="row gy-4 justify-content-between align-items-center">
                        <div class="col-lg-12 order-lg-2 position-relative" data-aos="zoom-out">

                            <h4>{{ $documentCategory->name ?? __('app.No data') }}</h4>
                            <div class="minutes_lists table-responsive">
                                <form id="downloadForm" method="POST" action="{{ route('download.multiple') }}">
                                    @csrf
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="selectAll"></th>
                                                <th>{{ __('app.Name') }}</th>
                                                <th>{{ __('app.Download') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($documentCategory->documentFiles as $file)
                                                <tr>
                                                    <td width="5%"><input type="checkbox" name="files[]"
                                                            value="{{ $file->file_path }}"></td>
                                                    <td width="75%">
                                                        {{ $file->filename ?? __('app.No data') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger"
                                                            href="{{ route('download.uploads', ['file' => $file->file_path, 'model' => get_class($file), 'id' => $file->id]) }}"
                                                            title="{{ $file->filename ?? __('app.No data') }}"
                                                            target="_blank">
                                                            <i class="far fa-file-pdf"></i> {{ __('app.Download') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">{{ __('app.No files found') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="btn btn-danger btn-sm">{{ __('app.Download Selected') }}</button>
                                </form>
                                <div class="text-center mt-3">
                                    <a class="btn btn-danger"
                                        href="{{ route('document-category', ['locale' => session('locale', 'en'), 'slugCategory' => $documentCategory->slug]) }}">{{ __('app.View More') }}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#selectAll').click(function() {
                $('input[name="files[]"]').prop('checked', this.checked);
            });

            $('input[name="files[]"]').change(function() {
                $('#selectAll').prop('checked', $('input[name="files[]"]').length === $(
                    'input[name="files[]"]:checked').length);
            });

            $('#downloadForm').submit(function(e) {
                if ($('input[name="files[]"]:checked').length === 0) {
                    e.preventDefault();
                    alert('{{ __('app.No files selected') }}');
                }
            });
        });
    </script>
@endpush
