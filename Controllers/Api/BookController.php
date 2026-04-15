<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/books
    public function index()
    {
        $books = Book::with(['author', 'category'])->paginate(20);
        return response()->json($books);
    }

    // GET /api/books/{id}
    public function show($id)
    {
        $book = Book::with(['author', 'category'])->find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found.'], 404);
        }

        return response()->json($book);
    }

    // POST /api/books
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'isbn'           => 'nullable|string|unique:books,isbn',
            'author_id'      => 'required|exists:authors,id',
            'category_id'    => 'required|exists:categories,id',
            'published_year' => 'nullable|integer|min:1000|max:2100',
            'description'    => 'nullable|string',
            'copies'         => 'nullable|integer|min:1',
        ]);

        $book = Book::create($data);
        return response()->json($book->load(['author', 'category']), 201);
    }

    // PUT /api/books/{id}
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found.'], 404);
        }

        $data = $request->validate([
            'title'          => 'sometimes|string|max:255',
            'isbn'           => 'sometimes|nullable|string|unique:books,isbn,' . $id,
            'author_id'      => 'sometimes|exists:authors,id',
            'category_id'    => 'sometimes|exists:categories,id',
            'published_year' => 'sometimes|nullable|integer|min:1000|max:2100',
            'description'    => 'sometimes|nullable|string',
            'copies'         => 'sometimes|integer|min:1',
        ]);

        $book->update($data);
        return response()->json($book->load(['author', 'category']));
    }

    // DELETE /api/books/{id}
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found.'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted.']);
    }
}