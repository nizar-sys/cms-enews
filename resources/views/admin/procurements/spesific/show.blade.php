@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.spesific-procurements-notices.index') }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Spesific Procurements Files</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Spesific Procurements Files</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.spesific-procurements-notices.files.create', $spesificProcurementsNotice->id) }}"
                                    class="btn btn-success">
                                    Add Data
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title & ID</th>
                                            <th>Document Name</th>
                                            <th>Document File</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($spesificProcurementsNotice->files as $file)
                                            <tr>
                                                <td>{!! str($file->spesificProcurement->title)->limit(50) !!}</td>
                                                <td>{{ $file->file_name }}</td>
                                                <td>
                                                    <a href="{{ route('download.uploads', ['file' => $file->file_path]) }}" target="_blank"
                                                        class="btn btn-danger btn-sm">View File</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.spesific-procurements-notices.files.edit', ['file' => $file->id, 'spesificProcurementsNotice' => $spesificProcurementsNotice->id]) }}"
                                                            class="btn btn-sm btn-warning mr-1">
                                                            <i class="fas fa-pencil-alt" data-tooltip="Edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="confirmDelete({{ $spesificProcurementsNotice->id }})">
                                                            <i class="fas fa-trash" data-tooltip="Delete"></i>
                                                        </button>

                                                        <form id="form-delete-{{ $spesificProcurementsNotice->id }}"
                                                            action="{{ route('admin.spesific-procurements-notices.files.destroy', ['file' => $file->id, 'spesificProcurementsNotice' => $spesificProcurementsNotice->id]) }}"
                                                            method="post" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>

                                                    <script>
                                                        function confirmDelete(id) {
                                                            Swal.fire({
                                                                title: 'Are you sure?',
                                                                text: "You won't be able to revert this!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#d33',
                                                                cancelButtonColor: '#3085d6',
                                                                confirmButtonText: 'Sure!',
                                                                cancelButtonText: 'Cancel'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.getElementById('form-delete-' + id).submit();
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">{{ __('app.No files found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
