<form action="{{ route('definitions.destroy', $definition->id) }}" method="POST">
    @can('definition-edit')
        <a class="btn btn-primary btn-sm" href="{{ route('definitions.edit', $definition->id) }}"><i
                class="fa-solid fa-pen-to-square"></i> Edit</a>
    @endcan

    @csrf
    @method('DELETE')

    @can('definition-delete')
        <button onsubmit="return confirm('Are you sure?');" type="submit" class="btn btn-danger btn-sm"><i
                class="fa-solid fa-trash"></i> Delete</button>
    @endcan
</form>
