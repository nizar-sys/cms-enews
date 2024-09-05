@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.bid_challenge_system'), app()->getLocale()))

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
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
                <h1>{{ GoogleTranslate::trans($sectionSetting?->title ?? __('app.bid_challenge_system'), app()->getLocale()) }}</h1>
                <div style="word-wrap: break-word;">
                    {!! $sectionSetting?->sub_title !!}
                </div>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.bid_challenge_system') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col-sm-12">
                    <main id="main" class="site-main" role="main">
                        <article id="post-303" class="post-303 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ GoogleTranslate::trans('Bid Challenge System', app()->getLocale()) }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <div class="table-responsive">
                                    <form id="downloadBidsForm" method="POST" action="{{ route('download.multiple') }}">
                                        @csrf
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="selectAllBids"></th>
                                                    <th>{{ __('app.File Name') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($bidChallengeSystem as $bid)
                                                    <tr>
                                                        <td width="5%"><input type="checkbox" name="files[]"
                                                                value="{{ $bid->file_path }}"></td>
                                                        <td width="95%">
                                                            <h6><strong>
                                                                    <a target="_blank"
                                                                        href="{{ route('download.uploads', ['file' => $bid->file_path]) }}">
                                                                        {{ GoogleTranslate::trans($bid->file_name, app()->getLocale()) }}
                                                                    </a>
                                                                </strong></h6>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center">
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
            $('#selectAllBids').click(function() {
                $('input[name="files[]"]').prop('checked', this.checked);
            });

            $('input[name="files[]"]').change(function() {
                $('#selectAllBids').prop('checked', $('input[name="files[]"]').length === $(
                    'input[name="files[]"]:checked').length);
            });

            $('#downloadBidsForm').submit(function(e) {
                if ($('input[name="files[]"]:checked').length === 0) {
                    e.preventDefault();
                    alert('{{ __('app.No files selected') }}');
                }
            });
        });
    </script>
@endpush
