<ol>
    @foreach ($files as $file)
        <li>
            {{ $file['file_name'] }}
        </li>
    @endforeach
</ol>

<a href="{{ route('admin.spesific-procurements-notices.show', $id) }}"
    class="badge badge-danger">Show Files</a>
