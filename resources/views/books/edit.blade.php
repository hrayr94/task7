@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3" required class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $book->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="publication_year" class="block text-sm font-medium text-gray-700">Publication Year</label>
                <input type="number" id="publication_year" name="publication_year" value="{{ $book->publication_year }}" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="authors" class="block text-sm font-medium text-gray-700">Authors</label>
                <select id="authors" name="authors[]" multiple required class="form-multiselect block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ in_array($author->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $author->first_name }} {{ $author->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
        </form>
    </div>
@endsection
