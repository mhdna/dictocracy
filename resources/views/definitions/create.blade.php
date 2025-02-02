@extends('layouts.app')

@section('title', 'Create Definition')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-8">
        <!-- Heading -->
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Add New Definition</h2>
            <a class="btn btn-primary btn-sm text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg"
                href="{{ route('definitions.index') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('definitions.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Term -->
            <div class="form-group">
                <label for="term" class="block text-lg font-medium text-gray-700 dark:text-white">Term</label>
                <input type="text" name="term" id="term"
                    class="form-control mt-2 px-4 py-2 w-full border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 dark:bg-gray-800 dark:text-white"
                    placeholder="Term" value="{{ old('term') }}">
                @error('term')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Definition -->
            <div class="form-group">
                <label for="definition" class="block text-lg font-medium text-gray-700 dark:text-white">Definition</label>
                <textarea
                    class="form-control mt-2 px-4 py-2 w-full border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 dark:bg-gray-800 dark:text-white"
                    style="height:150px" name="definition" id="definition" placeholder="Definition">{{ old('definition') }}</textarea>
                @error('definition')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Example -->
            <div class="form-group">
                <label for="example" class="block text-lg font-medium text-gray-700 dark:text-white">Example</label>
                <textarea
                    class="form-control mt-2 px-4 py-2 w-full border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 dark:bg-gray-800 dark:text-white"
                    style="height:150px" name="example" id="example" placeholder="Example">{{ old('example') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 dark:bg-blue-800 dark:hover:bg-blue-700">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection
