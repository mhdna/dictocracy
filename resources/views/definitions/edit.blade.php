@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-black dark:text-white">Edit definition</h2>
        <a href="{{ route('definitions.index') }}"
            class="bg-blue-500 text-white py-2 px-4 rounded-sm text-sm flex items-center space-x-2 dark:bg-blue-700">
            <i class="fa fa-arrow-left"></i>
            <span>Back</span>
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-md mb-4">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mb-5" action="{{ route('definitions.update', $definition->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Term Input -->
            <div class="flex flex-col">
                <label for="term" class="text-lg font-medium mb-2 text-black dark:text-white">Term:</label>
                <input type="text" name="definition" id="term" value="{{ $definition->term->term }}"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                    placeholder="Term">
            </div>

            <div class="flex flex-col">
                <label for="detail" class="text-lg font-medium mb-2 text-black dark:text-white">Definition:</label>
                <textarea name="definition" id="definition"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                    style="height:150px" placeholder="Detail">{{ $definition->definition }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="detail" class="text-lg font-medium mb-2 text-black dark:text-white">Example:</label>
                <textarea name="example" id="example"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                    style="height:150px" placeholder="Detail">{{ $definition->example }}</textarea>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-6 rounded-sm text-sm flex items-center space-x-2 dark:bg-blue-700">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Submit</span>
                </button>
            </div>
        </div>
    </form>
@endsection
