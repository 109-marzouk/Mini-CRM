<form action="{{ URL::route('employees.destroy', $row) }}" method="POST">

    <a class="btn btn-primary" href="{{ URL::route('employees.edit', $row) }}">
        <i class="bi bi-pencil-square"></i>
    </a>

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">
        <i class="bi bi-trash"></i>
    </button>
</form>
