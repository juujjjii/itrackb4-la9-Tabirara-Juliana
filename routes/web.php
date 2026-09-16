<?php

use App\Http\Controllers\SubjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teachers/featured', [TeacherController::class, 'featured'])
    ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
    ->only(['index', 'show']);

Route::get('/books/featured',        [BooksController::class, 'featured'])
    ->name('books.featured');

Route::get('/books/filter/{pages?}', [BooksController::class, 'filter'])
    ->name('books.filter');

Route::resource('books', BooksController::class)
    ->only(['index', 'show']);