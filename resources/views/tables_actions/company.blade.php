<form action="{{ URL::route('companies.destroy', $row) }}" method="POST">

    <a class="btn btn-info" href="{{ URL::route('companies.show', $row) }}" style="color: white;">
        <i class="bi bi-eye"></i>
    </a>

    <a class="btn btn-primary" href="{{ URL::route('companies.edit', $row) }}">
        <i class="bi bi-pencil-square"></i>
    </a>

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">
        <i class="bi bi-trash"></i>
    </button>
</form>
