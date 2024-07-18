@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="py-8">
            <h1 class="text-2xl font-bold mb-4">Edit Author</h1>

            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <form action="{{ route('authors.update', $author) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $author->first_name) }}" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 sm:text-sm rounded-md">
                        @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $author->last_name) }}" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 sm:text-sm rounded-md">
                        @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="biography" class="block text-sm font-medium text-gray-700">Biography</label>
                        <textarea id="biography" name="biography" rows="4" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 sm:text-sm rounded-md">{{ old('biography', $author->biography) }}</textarea>
                        @error('biography')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md">Update Author</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
