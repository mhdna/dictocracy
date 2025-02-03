@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-between">
        @if ($definitions)
            <div>{{ count($definitions) }} definitions</div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($definitions as $definition)
                    <li><a class="underline" href="{{ route('userTerm', ['term' => $definition->term->term]) }}">
                            {{ $definition->term->term }}
                        </a>
                    </li>
                @endforeach
            </div>
        @else
            <p>No terms are defined</p>
        @endif
    </div>
    </div>
@endsection
