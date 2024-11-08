<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});
Route::resource('category' , CategoryController::class);

Route::resource('post' , PostController::class);

Route::resource('university' , UniversityController::class);

Route::resource('faculty', FacultyController::class);

Route::resource('employe', EmployeController::class);

Route::get('loginPage' , [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/registerPage', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

