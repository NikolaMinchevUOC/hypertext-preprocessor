<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClasesController;


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


// ************************* COURSES

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

// ************************* Schedule

Route::resource('scheduleController', 'App\Http\Controllers\ScheduleController');

Route::get('/admin-schedule', [ScheduleController::class, 'getSchedules'])
    ->middleware('auth.admin')
    ->name('adminSchedules.getSchedules');

Route::get('/admin-schedule/create', [ScheduleController::class, 'createSchedule'])
    ->middleware('auth.admin')
    ->name('createSchedule');


Route::post('/admin-schedule/create', [ScheduleController::class, 'storeSchedule'])
    ->name('adminSchedule.storeSchedule');

Route::get('/admin-schedule/edit/{id}', [ScheduleController::class, 'editSchedule'])
    ->middleware('auth.admin')
    ->name('adminSchedule.editSchedule');

Route::post('/admin-schedule/destroy', [ScheduleController::class, 'destroySchedule'])
    ->middleware('auth.admin')
    ->name('adminSchedule.destroySchedule');

Route::post('/admin-schedule/update/{id}', [ScheduleController::class, 'updateSchedule'])
    ->middleware('auth.admin')
    ->name('adminSchedule.updateSchedule');


// ************************* Clases

Route::resource('clasesController', 'App\Http\Controllers\ClasesController');

Route::get('/admin-clases', [ClasesController::class, 'getClases'])
    ->middleware('auth.admin')
    ->name('adminClases.getClases');

Route::get('/admin-clases/create', [ClasesController::class, 'createClases'])
    ->middleware('auth.admin')
    ->name('createClases');


Route::post('/admin-clases/create', [ClasesController::class, 'storeClases'])
    ->name('adminClases.storeClases');

Route::post('/admin-clases/destroy', [ClasesController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('adminClases.destroy');

Route::get('/admin-clases/edit/{id}', [ClasesController::class, 'editClase'])
    ->middleware('auth.admin')
    ->name('adminClases.editClase');

Route::post('/admin-clases/update/{id}', [ClasesController::class, 'updateClases'])
    ->middleware('auth.admin')
    ->name('adminClases.updateClases');
