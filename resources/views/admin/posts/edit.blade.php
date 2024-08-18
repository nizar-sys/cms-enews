@extends('admin.layouts.layout')

@section('title', 'Post')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Posts</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Posts</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="thumbnail" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Category Name
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror selectric"
                                            required>
                                            <option value="" disabled selected>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Title
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $post->title) }}" required>

                                        @error('title')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Content / Description
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="content" id="" class="summernote" style="height: 100px" required>{{ old('content', $post->title) }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Status
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        @php
                                            $statuses = ['draft' => 'Draft', 'published' => 'Published'];
                                            $oldStatus = old('status', $post->status);
                                        @endphp

                                        <div class="d-flex align-items-center">
                                            @foreach ($statuses as $value => $label)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('status') is-invalid @enderror"
                                                        type="radio" name="status" id="status_{{ $value }}"
                                                        value="{{ $value }}"
                                                        {{ $oldStatus == $value ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="status_{{ $value }}">
                                                        {{ $label }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image-preview').css({
                'background-image': 'url("{{ asset($post->thumbnail) }}")',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
    </script>
@endpush
