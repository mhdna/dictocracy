@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center px-4">
        <div class="mb-10 w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-6">Login</h2>

            @if (session('error'))
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 dark:bg-red-900 dark:text-red-300">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email
                        Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox text-blue-600"
                            {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Remember Me</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
