<?php

use App\Http\Controllers\ExerciseCategoryController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\TrainingPlanController;
use App\Http\Controllers\WeekPlanController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/anatomie', function () {
    return view('anatomy');
})->name('anatomy');
Route::get('/ernaehrung', function () {
    return view('nutrition');
})->name('nutrition');
Route::get('/tipps', function () {
    return view('tips');
})->name('tips');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('exercises', ExerciseController::class);
    Route::resource('exercise-categories', ExerciseCategoryController::class);
    Route::resource('week-plans', WeekPlanController::class);
    Route::resource('training-plans', TrainingPlanController::class);
});
