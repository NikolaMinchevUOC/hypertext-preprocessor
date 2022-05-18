<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::resource('adminController', 'App\Http\Controllers\AdminController');


Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');


Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::get('/profesor', [ProfesorController::class, 'index'])
    ->middleware('auth.profesor')
    ->name('profesor.index');

Route::get('/admin-courses', [AdminController::class, 'courses'])
    ->middleware('auth.admin')
    ->name('adminCourses.index');

Route::get('/admin-courses/create', [AdminController::class, 'createCourse'])
    ->middleware('auth.admin')
    ->name('adminCourses.createCourse');


Route::post('/admin-courses/create', [AdminController::class, 'storeCourse'])
    ->name('adminCourses.storeCourse');

Route::get('/admin-courses/edit/{id}', [AdminController::class, 'editCourse'])
    ->middleware('auth.admin')
    ->name('adminCourses.editCourse');

Route::post('/admin-courses/update/{id}', [AdminController::class, 'updateCourse'])
    ->middleware('auth.admin')
    ->name('adminCourses.updateCourse');

