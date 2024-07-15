@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.job-lists.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Add New Job</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Job</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.job-lists.update', $joblist->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Position
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="position"
                                            class="form-control @error('position') is-invalid @enderror"
                                            value="{{ old('position', $joblist->position) }}">
                                        @error('position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="file"
                                            class="form-control @error('file') is-invalid @enderror" />
                                        @error('file')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Vacancy Deadline
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="vacancy_deadline"
                                            class="form-control @error('vacancy_deadline') is-invalid @enderror"
                                            value="{{ old('vacancy_deadline', $joblist->vacancy_deadline) }}">
                                        @error('vacancy_deadline')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Current Status
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="current_status"
                                            class="form-control @error('current_status') is-invalid @enderror"
                                            value="{{ old('current_status', $joblist->current_status) }}">
                                        @error('current_status')
                                            <div class="invalid-feedback">
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
