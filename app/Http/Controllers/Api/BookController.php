<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'is_published' => ['required', 'boolean'],
            'cover_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $validatedData['cover_image'] = $request->file('cover_image')->store('images', 'public');
        Book::create($validatedData);

        return response()->json(['success' => 'Book created successfully']);
    }

    public function show(Book $book)
    {
        return response()->json($book);
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'is_published' => ['required', 'boolean'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('cover_image')) {
            // delete old image
            Storage::delete('public/' . $book->cover_image);

            // store new image
            $validatedData['cover_image'] = $request->file('cover_image')->store('images', 'public');
        }

        $book->update($validatedData);

        return response()->json(['success' => 'Book updated successfully']);
    }
}
