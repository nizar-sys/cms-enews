@extends('admin.layouts.layout')

@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            @foreach ($data as $key => $value)
                @php
                    $icons = [
                        'count_post' => 'fas fa-file-alt',
                        'count_news' => 'fas fa-newspaper',
                        'count_article' => 'fas fa-comments',
                        'count_user' => 'fas fa-user',
                        'count_visitor' => 'fas fa-users',
                    ];
                    $colors = [
                        'count_post' => 'bg-primary',
                        'count_news' => 'bg-warning',
                        'count_article' => 'bg-info',
                        'count_user' => 'bg-success',
                        'count_visitor' => 'bg-danger',
                    ];
                    $titles = [
                        'count_post' => 'Total Pages',
                        'count_news' => 'Total News',
                        'count_article' => 'Total Articles',
                        'count_user' => 'Total Users',
                        'count_visitor' => 'Total Visitors',
                    ];
                @endphp

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon {{ $colors[$key] }}">
                            <i class="{{ $icons[$key] }}"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ $titles[$key] }}</h4>
                            </div>
                            <div class="card-body">
                                {{ $value }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Download Logs</h4>
                    </div>
                    <div class="card-body">
                        {!! $dataTable->table(['class' => 'table table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
