<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/anatomie', function () {
    return view('anatomie');
});
Route::get('/ernaehrung', function () {
    return view('ernaehrung');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
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
