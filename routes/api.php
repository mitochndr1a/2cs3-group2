<?php
 
use App\Http\Controllers\Api\AnalyticsController;
use App\Http\Controllers\Api\ApiKeyController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;
 
/*
|--------------------------------------------------------------------------
| Public routes — no API key required
|--------------------------------------------------------------------------
*/
 
// Generate an API key
Route::post('/auth/generate', [ApiKeyController::class, 'generate']);
 
/*
|--------------------------------------------------------------------------
| Protected routes — requires X-API-KEY header
|--------------------------------------------------------------------------
*/
 
Route::middleware('auth.apikey')->group(function () {
 
    // API Key management
    Route::get('/auth/keys',          [ApiKeyController::class, 'index']);
    Route::delete('/auth/keys/{id}',  [ApiKeyController::class, 'revoke']);
 
    // Books
    Route::get('/books',        [BookController::class, 'index']);
    Route::get('/books/{id}',   [BookController::class, 'show']);
    Route::post('/books',       [BookController::class, 'store']);
    Route::put('/books/{id}',   [BookController::class, 'update']);
    Route::delete('/books/{id}',[BookController::class, 'destroy']);
 
    // Authors
    Route::get('/authors',             [AuthorController::class, 'index']);
    Route::get('/authors/{id}',        [AuthorController::class, 'show']);
    Route::get('/authors/{id}/books',  [AuthorController::class, 'books']);   // relationship
    Route::post('/authors',            [AuthorController::class, 'store']);
    Route::put('/authors/{id}',        [AuthorController::class, 'update']);
    Route::delete('/authors/{id}',     [AuthorController::class, 'destroy']);
 
    // Categories
    Route::get('/categories',              [CategoryController::class, 'index']);
    Route::get('/categories/{id}',         [CategoryController::class, 'show']);
    Route::get('/categories/{id}/books',   [CategoryController::class, 'books']); // relationship
    Route::post('/categories',             [CategoryController::class, 'store']);
    Route::put('/categories/{id}',         [CategoryController::class, 'update']);
    Route::delete('/categories/{id}',      [CategoryController::class, 'destroy']);
 
    // Analytics
    Route::get('/analytics',                        [AnalyticsController::class, 'index']);
    Route::get('/analytics/total-books',            [AnalyticsController::class, 'totalBooks']);
    Route::get('/analytics/books-per-category',     [AnalyticsController::class, 'booksPerCategory']);
    Route::get('/analytics/top-author',             [AnalyticsController::class, 'topAuthor']);
    Route::get('/analytics/authors-ranking',        [AnalyticsController::class, 'authorsRanking']);
});