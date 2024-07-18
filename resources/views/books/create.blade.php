@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Create a New Book</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3" required class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="publication_year" class="block text-sm font-medium text-gray-700">Publication Year</label>
                <input type="number" id="publication_year" name="publication_year" value="{{ old('publication_year') }}" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="authors" class="block text-sm font-medium text-gray-700">Authors</label>
                <select id="authors" name="authors[]" multiple required class="form-multiselect block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Book</button>
        </form>
    </div>
@endsection
