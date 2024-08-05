@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>General Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Setting</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.general-setting.update', 1) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon Logo
                                        Preview</label>
                                    <div class="col-sm-12 col-md-7 d-flex">
                                        <img id="faviconPreview" class="w-25" src="{{ asset($setting?->favicon) }}"
                                            alt="">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                        Icon</label>
                                    <div class="col-sm-12 col-md-7 d-flex">
                                        <img id="leftIconPreview" class="w-25 mr-2" src="{{ asset($setting?->left_icon) }}"
                                            alt="">
                                        <img id="centerIconPreview" class="w-25 mr-2"
                                            src="{{ asset($setting?->app_logo) }}" alt="">
                                        <img id="rightIconPreview" class="w-25" src="{{ asset($setting?->right_icon) }}"
                                            alt="">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="favicon" class="custom-file-input" id="faviconFile">
                                            <label class="custom-file-label" for="faviconFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Left Icon</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="left_icon" class="custom-file-input"
                                                id="leftIconFile">
                                            <label class="custom-file-label" for="leftIconFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Right Icon</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="right_icon" class="custom-file-input"
                                                id="rightIconFile">
                                            <label class="custom-file-label" for="rightIconFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">App Logo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="app_logo" class="custom-file-input"
                                                id="centerIconFile">
                                            <label class="custom-file-label" for="centerIconFile">Choose file</label>
                                        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = {
                favicon: document.getElementById('faviconFile'),
                left_icon: document.getElementById('leftIconFile'),
                app_logo: document.getElementById('centerIconFile'),
                right_icon: document.getElementById('rightIconFile')
            };

            const previews = {
                favicon: document.getElementById('faviconPreview'),
                left_icon: document.getElementById('leftIconPreview'),
                app_logo: document.getElementById('centerIconPreview'),
                right_icon: document.getElementById('rightIconPreview')
            };

            function updatePreview(input, preview) {
                const file = input.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

            fileInputs.favicon.addEventListener('change', function() {
                updatePreview(this, previews.favicon);
            });

            fileInputs.left_icon.addEventListener('change', function() {
                updatePreview(this, previews.left_icon);
            });

            fileInputs.app_logo.addEventListener('change', function() {
                updatePreview(this, previews.app_logo);
            });

            fileInputs.right_icon.addEventListener('change', function() {
                updatePreview(this, previews.right_icon);
            });
        });
    </script>
@endpush
