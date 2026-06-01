<?php

use App\Http\Controllers\ExerciseCategoryController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TrainingPlanController;
use App\Http\Controllers\WeekPlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Statamic\Eloquent\Entries\Entry;

require __DIR__.'/auth.php';

Route::get('/', function (Request $request) {
    $first_login = $request->boolean('first_login', false);
    return view('home', ['first_login' => $first_login]);
})->name('home');

Route::get('/anatomy', function () {
    $entries = Entry::query()
        ->where('collection', 'anatomy')
        ->limit(5)
        ->get();
    return view('anatomy', ['entries' => $entries]);
})->name('anatomy');

Route::get('/nutrition', function () {
    $entries = Entry::query()
        ->where('collection', 'nutrition')
        ->limit(5)
        ->get();
    return view('nutrition', ['entries' => $entries]);
})->name('nutrition');

Route::get('/tips', function () {
    $entries = Entry::query()
        ->where('collection', 'tips')
        ->limit(5)
        ->get();
    return view('tips', ['entries' => $entries]);
})->name('tips');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('exercises', ExerciseController::class);
    Route::resource('exercise-categories', ExerciseCategoryController::class);
    Route::resource('week-plans', WeekPlanController::class);
    Route::resource('training-plans', TrainingPlanController::class);

    Route::get('/pdf-download/{type}', [PDFController::class, 'buildPDF'])
        ->name('pdf')
        ->middleware(['throttle:2']);

    Route::get('/exports/{file}', [PDFController::class, 'getPDF'])
        ->name('exports');
});
