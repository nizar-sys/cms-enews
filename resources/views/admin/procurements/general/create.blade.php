@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.general-procurements-notices.index') }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>General Procurements</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add General Procurements</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.general-procurements-notices.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Title
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea required name="title" id="" class="summernote" style="height: 80px">{{ old('title') }}</textarea>

                                        @error('title')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Notice /
                                        File</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="file" class="form-control" required />

                                        @error('file')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        File Category
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="category" class="form-control"
                                            value="{{ old('category') }}" required
                                            placeholder="File Category">

                                        @error('category')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Published Date
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="published_date" class="form-control"
                                            value="{{ old('published_date') }}" required>

                                        @error('published_date')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                @php
                                    $now = \Carbon\Carbon::now();
                                    $currentMonth = $now->format('F');
                                    $nextMonth = $now->addMonth()->format('F');
                                    $currentYear = $now->format('Y');
                                @endphp

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Duration
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="duration" class="form-control"
                                            value="{{ old('duration') }}" required
                                            placeholder="{{ $currentMonth }} to {{ $nextMonth }} {{ $currentYear }}">

                                        @error('duration')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
