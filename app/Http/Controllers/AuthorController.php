<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('books')->paginate(10);
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'required',
        ]);
        Author::create($request->only('first_name', 'last_name', 'biography'));

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author->load('books');
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'required',
        ]);
        $author->update($request->only('first_name', 'last_name', 'biography'));
        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
