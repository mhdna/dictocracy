@extends('layouts.app')

@section('title', 'Approve Definitions')

@section('content')
    <div class="container mx-auto px-6 py-4">
        <h2 class="text-3xl font-extrabold mb-5 text-gray-800 dark:text-gray-100">Unapproved Definitions</h2>


        @if ($definitions->isEmpty())
            <p class="text-gray-600 dark:text-gray-300">No unapproved definitions found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Term</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Definition
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Example
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($definitions as $definition)
                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $definition->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $definition->term->name }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $definition->definition }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $definition->example }}
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    <form action="{{ route('approve.update', $definition->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 text-white py-1 px-3 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 dark:bg-green-700 dark:hover:bg-green-600 dark:focus:ring-green-500">
                                            Approve
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            {{-- <div class="mt-4"> --}}
            {{--     {{ $definitions->links('pagination::tailwind') }} --}}
            {{-- </div> --}}
        @endif
    </div>
@endsection
