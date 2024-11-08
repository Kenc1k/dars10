<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeController;
use App\Http\Middleware\Auth as MiddlewareAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});
Route::resource('category' , CategoryController::class);

Route::resource('post' , PostController::class);

Route::resource('university' , UniversityController::class);

Route::resource('faculty', FacultyController::class);

Route::get('/employe' , [EmployeController::class , 'index']);
Route::delete('/employe/{employe}' , [EmployeController::class , 'destroy'])->name('employe.destroy')->middleware(MiddlewareAuth::class. ':hr,admin');
Route::get('/employe/create' , [EmployeController::class , 'create'])->name('employe.create')->middleware(MiddlewareAuth::class. ':smm, admin');
Route::post('/employe' , [EmployeController::class , 'store'])->name('employe.store');
Route::get('/employe/{id}/edit' , [EmployeController::class , 'edit'])->name('employe.edit')->middleware(MiddlewareAuth::class. ':frontend,admin');
Route::put('/employe/{id}' , [EmployeController::class , 'update'])->name('employe.update');

Route::get('loginPage' , [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/registerPage', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

