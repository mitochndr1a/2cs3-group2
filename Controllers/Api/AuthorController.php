<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // GET /api/authors
    public function index()
    {
        $authors = Author::withCount('books')->paginate(20);
        return response()->json($authors);
    }

    // GET /api/authors/{id}
    public function show($id)
    {
        $author = Author::withCount('books')->find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found.'], 404);
        }

        return response()->json($author);
    }

    // GET /api/authors/{id}/books
    public function books($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found.'], 404);
        }

        $books = $author->books()->with('category')->paginate(20);
        return response()->json([
            'author' => $author->full_name,
            'books'  => $books,
        ]);
    }

    // POST /api/authors
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'bio'        => 'nullable|string',
            'email'      => 'nullable|email|unique:authors,email',
        ]);

        $author = Author::create($data);
        return response()->json($author, 201);
    }

    // PUT /api/authors/{id}
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found.'], 404);
        }

        $data = $request->validate([
            'first_name' => 'sometimes|string|max:100',
            'last_name'  => 'sometimes|string|max:100',
            'bio'        => 'sometimes|nullable|string',
            'email'      => 'sometimes|nullable|email|unique:authors,email,' . $id,
        ]);

        $author->update($data);
        return response()->json($author);
    }

    // DELETE /api/authors/{id}
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found.'], 404);
        }

        $author->delete();
        return response()->json(['message' => 'Author deleted.']);
    }
}