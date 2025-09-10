<?php

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
    Route::get('/uebungen', function () {
            return view('exercises');
    });
    Route::get('/wochenplan', function () {
        return view('weekPlan');
    });
    Route::get('/trainingsplan', function () {
        return view('trainingPlan');
    });
});
