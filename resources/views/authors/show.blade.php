@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="py-8">
            <h1 class="text-2xl font-bold mb-4">Author Details</h1>

            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1 text-lg font-semibold">{{ $author->first_name }} {{ $author->last_name }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Biography</label>
                        <div class="mt-1 text-gray-800">{{ $author->biography }}</div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('authors.edit', $author) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md">Edit Author</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md ml-2">Delete Author</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
