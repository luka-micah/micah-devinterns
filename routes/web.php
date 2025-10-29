<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/admin', function () {
    return view('welcome');
})->middleware(['auth', 'role:SuperAdmin']);

Route::get('/schooladmin', function () {
    return view('home');
})->middleware(['auth', 'role:SchoolAdmin']);

Route::get('/teacher', function () {
    return view('home');
})->middleware(['auth', 'role:Teacher']);

Route::get('/student', function () {
    return view('home');
})->middleware(['auth', 'role:Student']);

Route::get('/parent', function () {
    return view('home');
})->middleware(['auth', 'role:Parent']);

Route::get('/bursar', function () {
    return view('home');
})->middleware(['auth', 'role:Bursar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
