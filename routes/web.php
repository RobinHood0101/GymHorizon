<?php

use App\Http\Controllers\ExerciseCategoryController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\WeekPlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/anatomie', function () {
    return view('anatomy');
});
Route::get('/ernaehrung', function () {
    return view('nutrition');
});
Route::get('/tipps', function () {
    return view('tips');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('uebungen', ExerciseController::class);
    Route::resource('exercise-categories', ExerciseCategoryController::class);
    Route::resource('wochenplan', WeekPlanController::class);
    Route::resource('trainingsplan', PlanController::class);
});
