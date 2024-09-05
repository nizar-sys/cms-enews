@extends('admin.layouts.layout')

@section('title', 'Show Vendor')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.vendors.index') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>Show Vendor</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Vendor Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{ $vendor->name }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-6">
                                    <input type="email" name="email" class="form-control" value="{{ $vendor->email }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                <div class="col-sm-12 col-md-6">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control"
                                            value="********" readonly>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-secondary"
                                                onclick="togglePasswordVisibility()">
                                                <i id="password-icon" class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional fields for business_name, address, contact_person, phone, and mobile_numbers -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Business Name</label>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="business_name" class="form-control"
                                        value="{{ $vendor->business_name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="address" class="form-control" value="{{ $vendor->address }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Person</label>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="contact_person" class="form-control"
                                        value="{{ $vendor->contact_person }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="phone" class="form-control" value="{{ $vendor->phone }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile Numbers</label>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="mobile_numbers" class="form-control"
                                        value="{{ $vendor->mobile_numbers }}" readonly>
                                </div>
                            </div>

                            <!-- Tabel untuk data downloaded dengan scroll jika data terlalu banyak -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Downloads</label>
                                <div class="col-sm-12 col-md-9">
                                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                        @if ($downloadLogs->isEmpty())
                                            <p>No files downloaded yet.</p>
                                        @else
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Filename</th>
                                                        <th>Downloaded At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($downloadLogs as $log)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $log->file() }}</td>
                                                            <td>{{ $log->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-sm-12 col-md-6 offset-md-3">
                                    <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-primary">Edit
                                        Vendor</a>
                                    <a href="{{ route('admin.vendors.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
