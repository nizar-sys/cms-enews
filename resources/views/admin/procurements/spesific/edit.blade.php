@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.spesific-procurements-notices.index') }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Spesific Procurements</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Spesific Procurements</h4>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{ route('admin.spesific-procurements-notices.update', $spesificProcurementsNotice->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Title & ID
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea required name="title" id="" class="summernote" style="height: 100px">{{ old('title', $spesificProcurementsNotice->title) }}</textarea>

                                        @error('title')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        First Date of Publication
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="date_of_publication" class="form-control"
                                            value="{{ old('date_of_publication', $spesificProcurementsNotice->date_of_publication) }}"
                                            required>

                                        @error('date_of_publication')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="status" required>
                                            <option value="">Select</option>
                                            @foreach (['open', 'close'] as $status)
                                                <option value="{{ $status }}"
                                                    @if (old('status', $spesificProcurementsNotice->status) == $status) selected @endif>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('status')
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
