@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Book Details</h1>

        <div class="bg-white shadow sm:rounded-lg">
            <div class="p-6">
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Title</h2>
                    <p class="text-lg text-gray-700">{{ $book->title }}</p>
                </div>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Description</h2>
                    <p class="text-lg text-gray-700">{{ $book->description }}</p>
                </div>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Publication Year</h2>
                    <p class="text-lg text-gray-700">{{ $book->publication_year }}</p>
                </div>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Authors</h2>
                    <ul class="text-lg text-gray-700">
                        @foreach($book->authors as $author)
                            <li>{{ $author->first_name }} {{ $author->last_name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <a href="{{ route('books.edit', $book) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
