<div class="d-flex justify-content-between">
    <a href="{{ route('admin.general-procurements-notices.edit', $id) }}" class="btn btn-sm btn-warning mr-1">
        <i class="fas fa-pencil-alt" data-tooltip="Edit"></i>
    </a>
    <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $id }})">
        <i class="fas fa-trash" data-tooltip="Delete"></i>
    </button>

    <form id="form-delete-{{ $id }}" action="{{ route('admin.general-procurements-notices.destroy', $id) }}"
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
