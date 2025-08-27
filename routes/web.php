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
        return view('anatomie');
    });
    Route::get('/ernaehrung', function () {
        return view('ernaehrung');
    });
    Route::get('/tipps', function () {
        return view('tipps');
    });
    Route::get('/uebungen', function () {
        return view('uebungen');
    });
    Route::get('/plan', function () {
        return view('plan');
    });
});
