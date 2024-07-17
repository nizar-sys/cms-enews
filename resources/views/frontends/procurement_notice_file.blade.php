@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 8rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <header class="entry-header">
                        <h1 class="entry-title">{{ __('app.Procurement Files') }}</h1>
                    </header>

                    <main id="main" class="site-main" role="main">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Document Title</th>
                                        <th>Document Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($spesificProcurement->files as $file)
                                        <tr>
                                            <td>{{ $file['file_name'] }}</td>
                                            <td>
                                                <a target="_blank"
                                                    href="{{ asset($file['file_path']) }}">{{ $file['file_name'] }}</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">No files found</td>
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
