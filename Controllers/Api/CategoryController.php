<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // GET /api/categories
    public function index()
    {
        $categories = Category::withCount('books')->paginate(20);
        return response()->json($categories);
    }

    // GET /api/categories/{id}
    public function show($id)
    {
        $category = Category::withCount('books')->find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        return response()->json($category);
    }

    // GET /api/categories/{id}/books
    public function books($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        $books = $category->books()->with('author')->paginate(20);
        return response()->json([
            'category' => $category->name,
            'books'    => $books,
        ]);
    }

    // POST /api/categories
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($data);
        return response()->json($category, 201);
    }

    // PUT /api/categories/{id}
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        $data = $request->validate([
            'name'        => 'sometimes|string|max:100|unique:categories,name,' . $id,
            'description' => 'sometimes|nullable|string',
        ]);

        $category->update($data);
        return response()->json($category);
    }

    
    // DELETE /api/categories/{id}
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted.']);
    }
} 