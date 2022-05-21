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
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfesorWorkController;
use App\Http\Controllers\ProfesorExamController;

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

Route::get('/student', [StudentController::class, 'index'])
    ->middleware('auth.student')
    ->name('student.index');



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



// ************************* ADMIN Enrolments

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

// ************************* STUDENT Enrolments

Route::resource('enrolmentsController', 'App\Http\Controllers\EnrolmentController');

Route::get('/student-enrolments', [EnrolmentController::class, 'getStudentEnrolments'])
    ->middleware('auth.student')
    ->name('adminEnrollment.getEnrolments');

Route::get('/student-enrolment/create', [EnrolmentController::class, 'createStudentEnrolment'])
    ->middleware('auth.student')
    ->name('adminEnrollment.createEnrolment');

Route::post('/student-enrolment/create', [EnrolmentController::class, 'storeStudentEnrolment'])
    ->name('adminEnrollment.storeEnrolment');

Route::get('/student-enrolment/edit/{id}', [EnrolmentController::class, 'editStudentEnrolment'])
    ->middleware('auth.student')
    ->name('studentEnrollment.editEnrolment');

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


// ************************* NotificationController

Route::resource('examNotification', 'App\Http\Controllers\NotificationController');

Route::get('/admin-notification', [NotificationController::class, 'getNotification'])
    ->middleware('auth.admin')
    ->name('adminNotification.getNotification');

Route::get('/admin-notification/create', [NotificationController::class, 'createNotification'])
    ->middleware('auth.admin')
    ->name('createNotification');


Route::post('/admin-notification/create', [NotificationController::class, 'storeNotification'])
    ->name('adminNotification.storeNotification');

Route::post('/admin-notification/destroy', [NotificationController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('adminNotification.destroy');

Route::get('/admin-notification/edit/{id}', [NotificationController::class, 'editNotification'])
    ->middleware('auth.admin')
    ->name('adminNotification.editNotification');

Route::post('/admin-notification/update/{id}', [NotificationController::class, 'updateNotification'])
    ->middleware('auth.admin')
    ->name('adminNotification.updateNotification');



Route::get('/student-notification', [NotificationController::class, 'getNotificationStudent'])
    ->middleware('auth.student')
    ->name('studentNotification.getNotificationStudent');


Route::post('/student-notification/update/', [NotificationController::class, 'updateNotificationStudent'])
    ->middleware('auth.student')
    ->name('studentNotification.updateNotificationStudent');

Route::get('/student-calendar', [StudentController::class, 'getCalendar'])
    ->middleware('auth.student')
    ->name('studentCalendar.getCalendar');


// ************************* EDIT PROFILE CONTROLLER


Route::get('profile', [UserController::class, 'edit']);
Route::patch('profile/{user}/update', [UserController::class, 'update']);



/************************ STUDENT VIEWS */

Route::resource('studentController', 'App\Http\Controllers\StudentController');


Route::get('/student-mensajes', [StudentController::class, 'studentShowMensajes'])
    ->middleware('auth.student')
    ->name('studentClase.studentShowMensajes');



// Route::get('/student-clases', [StudentController::class, 'studentShowClases'])
//     ->middleware('auth.student')
//     ->name('studentShowClases.studentShowClases');

// Route::get('/student-clase/{id}', [StudentController::class, 'studentShowClases'])
//     ->middleware('auth.student')
//     ->name('studentShowClases.studentShowClases');

Route::get('/student-clase/{id}', [StudentController::class, 'studentShowClases'])
    ->middleware('auth.student')
    ->name('studentClase.studentShowClases');

Route::get('/student-works/{id}', [StudentController::class, 'studentShowWorks'])
    ->middleware('auth.student')
    ->name('studentWorks.studentShowWorks');


Route::get('/student-exams/{id}', [StudentController::class, 'studentShowExams'])
    ->middleware('auth.student')
    ->name('studentExams.studentShowExams');



/************************ PROFESOR VIEWS */
Route::get('/profesor-clase-porcentages/{id_course}/{id_clase}', [ProfesorController::class, 'modificarPorcentage'])
    ->middleware('auth.profesor')
    ->name('profesorPorcentage.modificarPorcentage');


Route::get('/profesor-clases/{id}', [ProfesorController::class, 'profesorShowClases'])
    ->middleware('auth.profesor')
    ->name('profesorClases.profesorShowClases');


Route::post('/profesor-percentage/update/{id}', [ProfesorController::class, 'updatePercentage'])
    ->middleware('auth.profesor')
    ->name('profesorPorcentage.updatePercentage');



Route::get('/profesor-students/{id_course}/{id_clase}', [ProfesorController::class, 'profesorShowStudents'])
    ->middleware('auth.profesor')
    ->name('profesorStudents.showStudents');


Route::get('/profesor-trabajos/{id_course}/{id_clase}/{id_student}', [ProfesorController::class, 'profesorShowTrabajos'])
    ->middleware('auth.profesor')
    ->name('profesorTrabajos.profesorShowTrabajos');

Route::get('/profesor-exams/{id_course}/{id_clase}/{id_student}', [ProfesorController::class, 'profesorShowExams'])
    ->middleware('auth.profesor')
    ->name('profesorTrabajos.profesorShowExams');
/********************* PROFESOR WORKS CRUD ******************************/
Route::resource('profesorWorkController', 'App\Http\Controllers\ProfesorWorkController');


Route::get('/profesor-work/create', [ProfesorWorkController::class, 'createWork1'])
    ->middleware('auth.profesor');



Route::post('/profesor-work/create', [ProfesorWorkController::class, 'storeWork1'])
    ->middleware('auth.profesor');


Route::post('/profesor-work/destroy', [ProfesorWorkController::class, 'destroy'])
    ->middleware('auth.profesor');


Route::get('/profesor-work/edit/{id}', [ProfesorWorkController::class, 'editWork1'])
    ->middleware('auth.profesor');


Route::post('/profesor-work/update/{id}', [ProfesorWorkController::class, 'updateWork1'])
    ->middleware('auth.profesor');

/********************* PROFESOR EXAM CRUD ******************************/
Route::resource('profesorExamController', 'App\Http\Controllers\ProfesorExamController');


Route::get('/profesor-exam/create', [ProfesorExamController::class, 'createExam1'])
    ->middleware('auth.profesor')
    ->name('createExam1');


Route::post('/profesor-exam/create', [ProfesorExamController::class, 'storeExam1'])
    ->middleware('auth.profesor')
    ->name('profesorExam.storeExam1');

Route::post('/profesor-exam/destroy', [ProfesorExamController::class, 'destroy'])
    ->middleware('auth.profesor')
    ->name('profesorExam.destroy');

Route::get('/profesor-exam/edit/{id}', [ProfesorExamController::class, 'editExam1'])
    ->middleware('auth.profesor')
    ->name('profesorExam.editExam1');

Route::post('/profesor-exam/update/{id}', [ProfesorExamController::class, 'updateExam1'])
    ->middleware('auth.profesor')
    ->name('profesorExam.updateExam1');
