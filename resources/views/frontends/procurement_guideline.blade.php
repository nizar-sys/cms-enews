@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.procurement_guidelines'),
    app()->getLocale()))

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ GoogleTranslate::trans($slider->title ?? '', app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ GoogleTranslate::trans($slider->title ?? '', app()->getLocale()) }}</h2>
                            {!! GoogleTranslate::trans($slider->description ?? '', app()->getLocale()) !!}
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
                <h1>{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.procurement_guidelines'), app()->getLocale()) }}
                </h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">
                            {{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.procurement_guidelines'), app()->getLocale()) }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <main id="main" class="site-main" role="main">


                        <article id="post-2236" class="post-2236 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ __('app.Procurement Guidelines') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <div class="table-responsive">
                                    <form id="downloadGuidelinesForm" method="POST"
                                        action="{{ route('download.multiple') }}">
                                        @csrf
                                        @if ($latestProcurementDate)
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <strong>{{ GoogleTranslate::trans('Info', app()->getLocale()) }}!</strong>
                                                {{ GoogleTranslate::trans('Latest updated procurement guideline at:', app()->getLocale()) }}
                                                <strong>{{ \Carbon\Carbon::parse($latestProcurementDate)->format('d/m/Y') }}
                                                    <small>({{ \Carbon\Carbon::parse($latestProcurementDate)->diffForHumans() }})</small></strong>
                                                <button type="button" class="close btn btn-transparent"
                                                    data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        @endif
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="selectAllGuidelines"></th>
                                                    <th>{{ __('app.Document Category') }}</th>
                                                    <th>{{ __('app.Title') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($guidelinesProcurement as $guideline)
                                                    <tr>
                                                        <td width="5%"><input type="checkbox" name="files[]"
                                                                value="{{ $guideline->file_path }}"></td>
                                                        <td width="45%">
                                                            {{ GoogleTranslate::trans($guideline->category ?? 'No Data', app()->getLocale()) }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('download.uploads', ['file' => $guideline->file_path, 'model' => get_class($guideline), 'id' => $guideline->id]) }}"
                                                                target="_blank" rel="noopener">
                                                                {{ GoogleTranslate::trans(pathinfo(asset($guideline->file_path), PATHINFO_FILENAME), app()->getLocale()) }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">
                                                            {{ __('app.No files found') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <button type="submit"
                                            class="btn btn-danger btn-sm">{{ __('app.Download Selected') }}</button>
                                    </form>
                                </div>


                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#selectAllGuidelines').click(function() {
                $('input[name="files[]"]').prop('checked', this.checked);
            });

            $('input[name="files[]"]').change(function() {
                $('#selectAllGuidelines').prop('checked', $('input[name="files[]"]').length === $(
                    'input[name="files[]"]:checked').length);
            });

            $('#downloadGuidelinesForm').submit(function(e) {
                if ($('input[name="files[]"]:checked').length === 0) {
                    e.preventDefault();
                    alert('{{ __('app.No files selected') }}');
                }
            });
        });
    </script>
@endpush
