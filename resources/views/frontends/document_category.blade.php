@extends('frontends.frontend')

@section('title', $documentsReportsCategory->name)

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ $documentsReportsCategory->name }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $documentsReportsCategory->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <h1 class="entry-title">{{ $documentsReportsCategory->name }}</h1>
                                <div class="table-responsive">
                                    <form id="downloadForm" method="POST" action="{{ route('download.multiple') }}">
                                        @csrf
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" id="selectAll">
                                                    </th>
                                                    <th>{{ __('app.Name') }}</th>
                                                    <th class="text-center">{{ __('app.Download') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($documentsReportsCategory->documentFiles as $file)
                                                    <tr>
                                                        <td width="5%"><input type="checkbox" name="files[]"
                                                                value="{{ $file->file_path }}"></td>
                                                        <td width="75%">{{ $file->filename }}</td>
                                                        <td class="text-center">
                                                            <a class="btn btn-danger"
                                                                href="{{ route('download.uploads', ['file' => $file->file_path]) }}"
                                                                target="_blank"><i class="far fa-file"></i>
                                                                {{ __('app.Show Files') }}</a>
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
                            </main>
                        </div>
                    </div>
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>
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
