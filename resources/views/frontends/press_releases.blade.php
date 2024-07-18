@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <h1 class="entry-title">{{ __('app.Press Releases') }}</h1>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('app.Name') }}</th>
                                                <th class="text-center">{{ __('app.Download') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pressReleases as $file)
                                                <tr>
                                                    <td width="80%">{{ $file->file_name }}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger" href="{{ asset($file->file_path) }}"
                                                            download><i
                                                                class="far fa-file-pdf"></i>{{ __('app.Download PDF') }}
                                                        </a>
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
    </div>
@endsection
