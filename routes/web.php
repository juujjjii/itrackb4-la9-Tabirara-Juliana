<?php

use App\Http\Controllers\SubjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subjects/featured', [SubjectsController::class, 'featured'])
    ->name('subjects.featured');

Route::get('/subjects/filter/{units?}', function ($units = null) {
    return redirect()->route('subjects.index', $units !== null ? ['units' => $units] : []);
})->name('subjects.filter');

Route::resource('subjects', SubjectsController::class)
    ->only(['index', 'show', 'create', 'store']);
