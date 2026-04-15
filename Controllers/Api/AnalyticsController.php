<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    // GET /api/analytics
    public function index()
    {
        return response()->json([
            'total_books'        => $this->totalBooks(),
            'books_per_category' => $this->booksPerCategory(),
            'top_author'         => $this->topAuthor(),
            'authors_ranking'    => $this->authorsRanking(),
        ]);
    }

    // GET /api/analytics/total-books
    public function totalBooks()
    {
        return ['total_books' => Book::count()];
    }

    // GET /api/analytics/books-per-category
    public function booksPerCategory()
    {
        return Category::withCount('books')
            ->orderByDesc('books_count')
            ->get(['id', 'name', 'books_count']);
    }

    // GET /api/analytics/top-author
    public function topAuthor()
    {
        return Author::withCount('books')
            ->orderByDesc('books_count')
            ->first(['id', 'first_name', 'last_name', 'books_count']);
    }

    // GET /api/analytics/authors-ranking
    public function authorsRanking()
    {
        return Author::withCount('books')
            ->orderByDesc('books_count')
            ->get(['id', 'first_name', 'last_name', 'books_count']);
    }
}