<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/admin', function () {
    return view('admin');
})->middleware('role:SuperAdmin');

Route::get('/schooladmin', function () {
    return view('schooladmin');
})->middleware('role:SchoolAdmin');

Route::get('/teacher', function () {
    return view('teacher');
})->middleware('role:Teacher');

Route::get('/student', function () {
    return view('student');
})->middleware('role:Student');

Route::get('/parent', function () {
    return view('parent');
})->middleware('role:Parent');

Route::get('/bursar', function () {
    return view('bursar');
})->middleware('role:Bursar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
