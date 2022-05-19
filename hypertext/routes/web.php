<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\PercentageController;

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



// ************************* Enrolments

Route::resource('enrolmentsController', 'App\Http\Controllers\EnrolmentController');

Route::get('/admin-enrolments', [EnrolmentController::class, 'getEnrolments'])
    ->middleware('auth.admin')
    ->name('adminEnrollment.getEnrolments');

Route::get('/admin-enrolment/create', [EnrolmentController::class, 'createEnrolment'])
    ->middleware('auth.admin')
    ->name('adminEnrollment.createEnrolment');


Route::post('/admin-enrolment/create', [EnrolmentController::class, 'storeEnrolment'])
    ->name('adminEnrollment.storeEnrolment');

Route::post('/admin-enrolment/destroy', [EnrolmentController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('adminEnrollment.destroy');



Route::get('/admin-enrolment/edit/{id}', [EnrolmentController::class, 'editEnrolment'])
    ->middleware('auth.admin')
    ->name('adminEnrollment.editEnrolment');

// Route::post('/admin-enrolment/update/{id}', [EnrolmentController::class, 'updateEnrolment'])
//     ->middleware('auth.admin')
//     ->name('adminEnrollment.updateEnrolment');


// ************************* Works

Route::resource('workController', 'App\Http\Controllers\WorkController');

Route::get('/admin-works', [WorkController::class, 'getWorks'])
    ->middleware('auth.admin')
    ->name('adminWork.getWorks');

Route::get('/admin-work/create', [WorkController::class, 'createWork'])
    ->middleware('auth.admin')
    ->name('createWork');


Route::post('/admin-work/create', [WorkController::class, 'storeWork'])
    ->name('adminWork.storeWork');

Route::post('/admin-work/destroy', [WorkController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('adminWork.destroy');

Route::get('/admin-work/edit/{id}', [WorkController::class, 'editWork'])
    ->middleware('auth.admin')
    ->name('adminWork.editWork');

Route::post('/admin-work/update/{id}', [WorkController::class, 'updateWork'])
    ->middleware('auth.admin')
    ->name('adminWork.updateWork');


// ************************* Exam

Route::resource('examController', 'App\Http\Controllers\ExamController');

Route::get('/admin-exams', [ExamController::class, 'getExams'])
    ->middleware('auth.admin')
    ->name('adminExam.getExams');

Route::get('/admin-exam/create', [ExamController::class, 'createExam'])
    ->middleware('auth.admin')
    ->name('createExam');


Route::post('/admin-exam/create', [ExamController::class, 'storeExam'])
    ->name('adminExam.storeExam');

Route::post('/admin-exam/destroy', [ExamController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('adminExam.destroy');

Route::get('/admin-exam/edit/{id}', [ExamController::class, 'editExam'])
    ->middleware('auth.admin')
    ->name('adminExam.editExam');

Route::post('/admin-exam/update/{id}', [ExamController::class, 'updateExam'])
    ->middleware('auth.admin')
    ->name('adminExam.updateExam');


// ************************* Percentage

Route::resource('examPercentage', 'App\Http\Controllers\PercentageController');

Route::get('/admin-percentage', [PercentageController::class, 'getPercentage'])
    ->middleware('auth.admin')
    ->name('adminPercentage.getPercentage');

Route::get('/admin-percentage/create', [PercentageController::class, 'createPercentage'])
    ->middleware('auth.admin')
    ->name('createPercentage');


Route::post('/admin-percentage/create', [PercentageController::class, 'storePercentage'])
    ->name('adminPercentage.storePercentage');

Route::post('/admin-percentage/destroy', [PercentageController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('adminPercentage.destroy');

Route::get('/admin-percentage/edit/{id}', [PercentageController::class, 'editPercentage'])
    ->middleware('auth.admin')
    ->name('adminPercentage.editPercentage');

Route::post('/admin-percentage/update/{id}', [PercentageController::class, 'updatePercentage'])
    ->middleware('auth.admin')
    ->name('adminPercentage.updatePercentage');
