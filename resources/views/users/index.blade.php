@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Users Management</h2>
            <a href="{{ route('users.create') }}"
                class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 dark:bg-green-700 dark:hover:bg-green-600">
                <i class="fa fa-plus"></i> Create New User
            </a>
        </div>


        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                            No</th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                            Name</th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                            Email</th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                            Roles</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400"
                            width="280px">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                    @foreach ($data as $key => $user)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-100">{{ ++$i }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $role)
                                        <span
                                            class="inline-block bg-green-200 text-green-800 text-xs font-semibold px-2 py-1 rounded-full dark:bg-green-700 dark:text-green-300">{{ $role }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('users.show', $user->id) }}"
                                    class="text-blue-600 hover:text-blue-800 mr-2 dark:text-blue-400 dark:hover:text-blue-600">
                                    <i class="fa-solid fa-list"></i> Show
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-yellow-600 hover:text-yellow-800 mr-2 dark:text-yellow-400 dark:hover:text-yellow-600">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="inline"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
