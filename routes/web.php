<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/anatomie', function () {
        return view('anatomy');
    });
    Route::get('/ernaehrung', function () {
        return view('nutrition');
    });
    Route::get('/tipps', function () {
        return view('tips');
    });
    Route::get('/uebungen', function () {
        return view('exercises');
    });
    Route::get('/plan', function () {
        return view('plan');
    });
});
