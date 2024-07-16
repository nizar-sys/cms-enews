@extends('frontends.frontend')

@section('content')
    <div id="content" class="site-content" style="margin-top: 15rem">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Procurement Notices</h1>
                    </header>

                    <main id="main" class="site-main" role="main">

                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-specific-tab" data-toggle="tab" href="#nav-specific"
                                    role="tab" aria-controls="nav-specific" aria-selected="false">Specific
                                    Procurement</a>
                                <a class="nav-link" id="nav-general-tab" data-toggle="tab" href="#nav-general"
                                    role="tab" aria-controls="nav-general" aria-selected="true">General Procurement</a>

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
                                                <th>Title &amp; ID</th>
                                                <th>Issued Documents</th>
                                                <th>Important Date</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($spesificProcurements as $spesificItem)
                                                <tr>
                                                    <td width="8%">{{ $loop->iteration }}</td>

                                                    <td width="35%">
                                                        {!! $spesificItem->title !!}
                                                    </td>
                                                    <td width="30%">
                                                        <ol>
                                                            @foreach ($spesificItem->files as $file)
                                                                <li>
                                                                    {{ $file['file_name'] }}
                                                                </li>
                                                            @endforeach
                                                        </ol>

                                                        <a href="{{ route('procurement-notice-files', ['locale' => session('locale', 'en'), 'spesificProcurementId' => $spesificItem->id]) }}"
                                                            class="badge badge-danger">Show Files</a>
                                                    </td>

                                                    <td width="25%">
                                                        First Date of Publication: <br><strong>

                                                            {{ $spesificItem->date_of_publication }}</strong><br>
                                                        Last Submission Date/Time:
                                                        <br><strong>{{ $spesificItem->updated_at }}</strong>
                                                    </td>
                                                    <td width="10%">
                                                        @php
                                                            $status = $spesificProcurement->status ?? 'draft';
                                                            $badge = match ($status) {
                                                                'open' => 'badge-success',
                                                                'close' => 'badge-danger',
                                                                default => 'badge-warning',
                                                            };
                                                        @endphp

                                                        <span class="badge {{ $badge }}">{{ $status }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" style="text-align: center">No files found</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                                <div class="table-responsive">
                                    <div class="content-area col-sm-12 col-lg-12" style="margin:15px 0;">
                                    </div>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Notice</th>
                                                <th>Published Date</th>
                                                <th>Duration</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($generalProcurements as $generalProcurement)
                                                <tr>
                                                    <td width="35%">{!! $generalProcurement->title !!}</td>
                                                    <td width="20%">
                                                        <a class="btn btn-danger"
                                                            href="{{ asset($generalProcurement->file_path) }}"
                                                            target="_blank"><i class="fa fa-file-pdf"></i> View PDF</a>
                                                    </td>
                                                    <td width="20%">
                                                        {{ \Carbon\Carbon::parse($generalProcurement->published_date)->format('d/m/Y') }}
                                                    </td>
                                                    <td width="20%">
                                                        {{ $generalProcurement->duration }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center">No files found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <br>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="50%" style="text-align:left">
                                                </td>
                                                <td width="50%" style="text-align:right">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                </section>
            </div>
            <!-- #main -->
            <!-- #primary -->

        </div>
    </div>
@endsection
