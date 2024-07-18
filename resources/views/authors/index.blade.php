@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Authors</h1>
                <a href="{{ route('authors.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Add Author</a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biography</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($authors as $author)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $author->first_name }} {{ $author->last_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-wrap break-words">
                                <div class="text-sm text-gray-500">{{ $author->biography }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('authors.show', $author) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="{{ route('authors.edit', $author) }}" class="text-blue-600 hover:text-blue-900 ml-2">Edit</a>
                                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
