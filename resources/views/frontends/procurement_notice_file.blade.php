@extends('frontends.frontend')

@section('title', __('app.Procurement Files'))

@section('content')
    <main class="main">
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ __('app.Procurement Files') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.Procurement Files') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <header class="entry-header">
                        <h1 class="entry-title">{{ __('app.Procurement Files') }}</h1>
                    </header>

                    <main id="main" class="site-main" role="main">
                        <div class="table-responsive">
                            <form id="downloadDocumentsForm" method="POST" action="{{ route('download.multiple') }}">
                                @csrf
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAllDocuments"></th>
                                            <th>Document Title</th>
                                            <th>Document Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($spesificProcurement->files as $file)
                                            <tr>
                                                <td width="5%"><input type="checkbox" name="files[]"
                                                        value="{{ $file['file_path'] }}"></td>
                                                <td width="45%">{{ $file['file_name'] }}</td>
                                                <td width="50%">
                                                    <a target="_blank"
                                                        href="{{ route('download.uploads', ['file' => $file['file_path']]) }}">
                                                        {{ $file['file_name'] }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">{{ __('app.No files found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('Download Selected') }}</button>
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
            $('#selectAllDocuments').click(function() {
                $('input[name="files[]"]').prop('checked', this.checked);
            });

            $('input[name="files[]"]').change(function() {
                $('#selectAllDocuments').prop('checked', $('input[name="files[]"]').length === $(
                    'input[name="files[]"]:checked').length);
            });

            $('#downloadDocumentsForm').submit(function(e) {
                if ($('input[name="files[]"]:checked').length === 0) {
                    e.preventDefault();
                    alert('No files selected');
                }
            });
        });
    </script>
@endpush
