@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
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
                                                    target="_blank"><i class="far fa-file-pdf"></i> {{ __('app.View PDF') }}
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
    </div>
@endsection
