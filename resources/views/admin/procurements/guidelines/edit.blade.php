@extends('admin.layouts.layout')

@section('title', 'Guideline Procurements')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.procurements-guidelines.index') }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Guideline Procurements</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Guideline Procurements</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.procurements-guidelines.update', $procurementsGuideline->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        File Name
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="file_name" class="form-control"
                                            value="{{ old('file_name', $procurementsGuideline->file_name) }}">

                                        @error('file_name')
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
                                            value="{{ old('category', $procurementsGuideline->category) }}" required
                                            placeholder="File Category">

                                        @error('category')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Guideline /
                                        File</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="file" class="form-control" />

                                        @error('file')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <small class="text-danger">
                                            * Dont upload file if you dont want to change the file
                                        </small>
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
