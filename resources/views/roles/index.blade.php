@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Role Management</h2>
        </div>


        <table class="min-w-full table-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">No</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ ++$i }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-100">{{ $role->name }}</td>
                        <td class="px-4 py-2 text-sm">
                            <a href="{{ route('roles.show', $role->id) }}"
                                class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                <i class="fa-solid fa-list"></i> Show
                            </a>

                            @can('role-edit')
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="ml-2 text-yellow-500 hover:text-yellow-700 dark:text-yellow-400 dark:hover:text-yellow-300">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                            @endcan

                            @can('role-delete')
                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="ml-2 text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
