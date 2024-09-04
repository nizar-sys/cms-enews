@extends('admin.layouts.layout')

@section('title', 'Edit Vendor')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.vendors.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Vendors</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Vendor</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.vendors.update', $vendor->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Name
                                    </label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $vendor->name) }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Email
                                    </label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $vendor->email) }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Password
                                    </label>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Leave blank to keep current password">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="togglePasswordVisibility()">
                                                    <i id="password-icon" class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-6">
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
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
@endpush
