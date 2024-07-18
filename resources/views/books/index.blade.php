@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="mb-4 flex justify-between items-center">
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Books</h1>
                        <a href="{{ route('books.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md">Add Book</a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publication Year</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Authors</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($books as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $book->title }}</td>
                                <td class="px-6 py-4 whitespace-wrap break-words">{{ $book->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $book->publication_year }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach($book->authors as $author)
                                        {{ $author->first_name }} {{ $author->last_name }}
                                        @if(!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('books.show', $book) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">View</a>
                                    <a href="{{ route('books.edit', $book) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md ml-2">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
