@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.spesific-procurements-notices.show', $spesificProcurementsNotice->id) }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Procurement Notices Files</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Procurement Notices Files</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.spesific-procurements-notices.files.update', ['file' => $file->id, 'spesificProcurementsNotice' => $spesificProcurementsNotice->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Document Category
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="category"
                                            class="form-control @error('category') is-invalid @enderror"
                                            value="{{ old('category', $file->category) }}">

                                        @error('category')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Document Name
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="file_name"
                                            class="form-control @error('file_name') is-invalid @enderror"
                                            value="{{ old('file_name', $file->file_name) }}">

                                        @error('file_name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Document
                                        File</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="file" class="form-control" />

                                        @error('file')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <small class="text-danger">
                                            * Don't upload file if you don't want to change the file
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
