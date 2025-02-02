{{-- TODO: Super confusing mix between under_definition and defintions --}}
<x-layout>
    <div class="flex flex-col justify-between">
        @if ($terms)
            <div>{{ count($terms) }} Terms</div>
            @foreach ($terms as $term)
                <tr>
                    <a href="/term/{{ $term->term }}">
                        <x-term-card :term="$term->term" />
                    </a>
                    <td>
                        <form action="{{ route('defintions.destroy', $defintion->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('defintions.show', $defintion->id) }}"><i
                                    class="fa-solid fa-list"></i> Show</a>
                            @can('defintion-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('defintions.edit', $defintion->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                            @endcan

                            @csrf
                            @method('DELETE')

                            @can('defintion-delete')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                    Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <p>No terms are defined</p>
        @endif
    </div>
    </div>
</x-layout>
