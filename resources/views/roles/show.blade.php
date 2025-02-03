@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Show Role</h2>
            <a href="{{ route('roles.index') }}"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-600 dark:focus:ring-blue-500">
                Back
            </a>
        </div>

        <div class="grid gap-4">
            <div class="form-group">
                <strong class="text-sm text-gray-700 dark:text-gray-300">Name:</strong>
                <p class="text-gray-800 dark:text-gray-100">{{ $role->name }}</p>
            </div>
            <div class="form-group">
                <strong class="text-sm text-gray-700 dark:text-gray-300">Permissions:</strong>
                @if (!empty($rolePermissions))
                    <div class="mt-2">
                        @foreach ($rolePermissions as $v)
                            <span
                                class="bg-green-100 text-green-700 py-1 px-2 rounded-lg text-xs dark:bg-green-900 dark:text-green-300">{{ $v->name }}</span>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600 dark:text-gray-400">No permissions assigned</p>
                @endif
            </div>
        </div>
    </div>
@endsection
