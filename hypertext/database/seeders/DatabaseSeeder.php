<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Schedule;
use App\Models\Work;
use App\Models\Exam;
use App\Models\Percentage;
use App\Models\Notification;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = new User;
        $user->name = 'Paco Administrador';
        $user->surname = 'Perez';
        $user->telephone = '+34656560945';
        $user->nif = '56566550O';
        $user->email = 'admin@gmail.com';
        $user->password = 'admin@gmail.com';
        $user->role = 'admin';
        $user->save();

        $user1 = new User;
        $user1->name = 'Nikola';
        $user1->surname = 'Minchev Penev';
        $user1->telephone = '+34634340911';
        $user1->nif = '45432332I';
        $user1->email = 'niko@gmail.com';
        $user1->password = 'niko@gmail.com';
        $user1->role = 'student';
        $user1->save();


        $user2 = new User;
        $user2->name = 'Israel';
        $user2->surname = 'Pérez Pérez';
        $user2->telephone = '+3465600236';
        $user2->nif = '12454441D';
        $user2->email = 'israel@gmail.com';
        $user2->password = 'israel@gmail.com';
        $user2->role = 'student';
        $user2->save();


        $user3 = new User;
        $user3->name = 'Mark Profesor';
        $user3->surname = 'Gomez';
        $user3->telephone = '+34656562214';
        $user3->nif = '10454545L';
        $user3->email = 'profesor@gmail.com';
        $user3->password = 'profesor@gmail.com';
        $user3->role = 'profesor';
        $user3->save();

        $course = new Course;
        $course->name = 'Curso de PHP';
        $course->description = 'En este curso de PHP aprenderás a manejar este lenguaje de programación junto a otros frameworks como Laravel';
        $course->date_start = '2022-04-24';
        $course->date_end = '2022-05-24';
        $course->active = 1;
        $course->save();


        $schedule = new Schedule();
        $schedule->time_start = '12:30:00';
        $schedule->time_end = '13:30:00';
        $schedule->day = '2022-04-24';
        $schedule->save();

        $schedule2 = new Schedule();
        $schedule2->time_start = '13:30:00';
        $schedule2->time_end = '14:30:00';
        $schedule2->day = '2022-04-25';
        $schedule2->save();





        $class = new Classes;
        $class->id_teacher = 4;
        $class->id_course = 1;
        $class->id_schedule = 1;
        $class->name = 'Intro to PHP';
        $class->color = "#888";
        $class->save();


        $class2 = new Classes;
        $class2->id_teacher = 4;
        $class2->id_course = 1;
        $class2->id_schedule = 2;
        $class2->name = 'PHP Advanced';
        $class2->color = "#333";
        $class2->save();

        $enrolment = new Enrollment;
        $enrolment->id_student = 2;
        $enrolment->id_course = 1;
        $enrolment->status = 1;
        $enrolment->save();

        $work = new Work;
        $work->id_class = 1;
        $work->id_student = 2;
        $work->name = "Primera entrega PHP";
        $work->mark = 9.6;
        $work->save();


        $work3 = new Work;
        $work3->id_class = 1;
        $work3->id_student = 2;
        $work3->name = "Segunda entrega PHP";
        $work3->mark = 9;
        $work3->save();

        $work1 = new Work;
        $work1->id_class = 2;
        $work1->id_student = 2;
        $work1->name = "Primera entrega PHP Advanced";
        $work1->mark = 9.6;
        $work1->save();

        $work2 = new Work;
        $work2->id_class = 2;
        $work2->id_student = 2;
        $work2->name = "Segunda entrega PHP Advanced";
        $work2->mark = 8;
        $work2->save();

        $exam = new Exam;
        $exam->id_class = 1;
        $exam->id_student = 2;
        $exam->name = "Final exam PHP";
        $exam->mark = 9.6;
        $exam->save();

        $percentage = new Percentage;
        $percentage->id_course = 1;
        $percentage->id_class = 1;
        $percentage->continuous_assessment = 80;
        $percentage->exams = 20;
        $percentage->save();

        $percentage1 = new Percentage;
        $percentage1->id_course = 1;
        $percentage1->id_class = 2;
        $percentage1->continuous_assessment = 80;
        $percentage1->exams = 20;
        $percentage1->save();


        $notification = new Notification;
        $notification->id_student = 2;
        $notification->work = 1;
        $notification->exam = 1;
        $notification->continuous_assessment = 1;
        $notification->final_note = 1;
        $notification->save();
    }
}
