@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Edit User</h2>
            <a href="{{ route('users.index') }}"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-600">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="grid gap-4">
                <div class="col-span-1">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Name"
                        class="mt-1 block w-full p-2.5 rounded-lg border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        value="{{ $user->name }}">
                </div>

                <div class="col-span-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email"
                        class="mt-1 block w-full p-2.5 rounded-lg border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        value="{{ $user->email }}">
                </div>

                <div class="col-span-1">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="mt-1 block w-full p-2.5 rounded-lg border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>

                <div class="col-span-1">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm
                        Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password"
                        class="mt-1 block w-full p-2.5 rounded-lg border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>

                <div class="col-span-1">
                    <label for="roles" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role:</label>
                    <select name="roles[]" id="roles"
                        class="mt-1 block w-full p-2.5 rounded-lg border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        multiple>
                        <option value="" disabled>Select a Role</option>
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}"
                                {{ in_array($value, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-1 text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-600">
                        <i class="fa-solid fa-floppy-disk"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
