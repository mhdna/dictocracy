@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Show User</h2>
            <a href="{{ route('users.index') }}"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-600">
                Back
            </a>
        </div>

        <div class="grid gap-4">
            <div class="col-span-1">
                <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Name:</strong>
                <p class="text-lg text-gray-800 dark:text-gray-100">{{ $user->name }}</p>
            </div>

            <div class="col-span-1">
                <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Email:</strong>
                <p class="text-lg text-gray-800 dark:text-gray-100">{{ $user->email }}</p>
            </div>

            <div class="col-span-1">
                <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Roles:</strong>
                <div class="space-x-2">
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <span
                                class="inline-block px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-200">{{ $v }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
