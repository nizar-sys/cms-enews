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

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Preview</th>
                                                <th>File Input</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Favicon</td>
                                                <td>
                                                    <img id="faviconPreview" class="img-preview img-fluid w-25"
                                                        src="{{ asset($setting?->favicon) }}" alt="Favicon Preview">
                                                </td>
                                                <td>
                                                    <div class="custom-file">
                                                        <input type="file" name="favicon" class="custom-file-input"
                                                            id="faviconFile">
                                                        <label class="custom-file-label" for="faviconFile">Choose
                                                            file</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">Left Icon</td>
                                                <td>
                                                    <img id="leftIconPreview" class="img-preview img-fluid w-25"
                                                        src="{{ asset($setting?->left_icon) }}" alt="Left Icon Preview">
                                                </td>
                                                <td>
                                                    <div class="custom-file">
                                                        <input type="file" name="left_icon" class="custom-file-input"
                                                            id="leftIconFile">
                                                        <label class="custom-file-label" for="leftIconFile">Choose
                                                            file</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">Center Logo</td>
                                                <td>
                                                    <img id="centerIconPreview" class="img-preview img-fluid w-25"
                                                        src="{{ asset($setting?->center_icon) }}" alt="Center Logo Preview">
                                                </td>
                                                <td>
                                                    <div class="custom-file">
                                                        <input type="file" name="center_icon" class="custom-file-input"
                                                            id="centerIconFile">
                                                        <label class="custom-file-label" for="centerIconFile">Choose
                                                            file</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">Right Icon</td>
                                                <td>
                                                    <img id="rightIconPreview" class="img-preview img-fluid w-25"
                                                        src="{{ asset($setting?->right_icon) }}" alt="Right Icon Preview">
                                                </td>
                                                <td>
                                                    <div class="custom-file">
                                                        <input type="file" name="right_icon" class="custom-file-input"
                                                            id="rightIconFile">
                                                        <label class="custom-file-label" for="rightIconFile">Choose
                                                            file</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">App Logo</td>
                                                <td>
                                                    <img id="appLogoPreview" class="img-preview img-fluid w-25"
                                                        src="{{ asset($setting?->logo) }}" alt="App Logo Preview">
                                                </td>
                                                <td>
                                                    <div class="custom-file">
                                                        <input type="file" name="logo" class="custom-file-input"
                                                            id="appLogoFile">
                                                        <label class="custom-file-label" for="appLogoFile">Choose
                                                            file</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group row mb-4">
                                    <div class="col-md-12 text-right">
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

@push('styles')
    <style>
        .img-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 8px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = {
                favicon: document.getElementById('faviconFile'),
                left_icon: document.getElementById('leftIconFile'),
                center_icon: document.getElementById('centerIconFile'),
                right_icon: document.getElementById('rightIconFile'),
                app_logo: document.getElementById('appLogoFile')
            };

            const previews = {
                favicon: document.getElementById('faviconPreview'),
                left_icon: document.getElementById('leftIconPreview'),
                center_icon: document.getElementById('centerIconPreview'),
                right_icon: document.getElementById('rightIconPreview'),
                app_logo: document.getElementById('appLogoPreview')
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

            for (const key in fileInputs) {
                fileInputs[key].addEventListener('change', function() {
                    updatePreview(this, previews[key]);
                });
            }
        });
    </script>
@endpush
