@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Create New User</h2>
            <a href="{{ route('users.index') }}"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-600">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger bg-red-100 text-red-800 p-4 mb-4 rounded-lg dark:bg-red-900 dark:text-red-200">
                <strong class="font-semibold">Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="grid gap-4">
                <div>
                    <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-300">Name:</label>
                    <input type="text" name="name" placeholder="Name"
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div>
                    <label for="email" class="text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                    <input type="email" name="email" placeholder="Email"
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-gray-700 dark:text-gray-300">Password:</label>
                    <input type="password" name="password" placeholder="Password"
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div>
                    <label for="confirm-password" class="text-sm font-medium text-gray-700 dark:text-gray-300">Confirm
                        Password:</label>
                    <input type="password" name="confirm-password" placeholder="Confirm Password"
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div>
                    <label for="roles" class="text-sm font-medium text-gray-700 dark:text-gray-300">Role:</label>
                    <select name="roles[]"
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        multiple="multiple">
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-600 dark:focus:ring-blue-500 dark:focus:ring-2">
                        <i class="fa-solid fa-floppy-disk"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
