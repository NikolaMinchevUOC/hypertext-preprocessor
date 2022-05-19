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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User;
        $user->name = 'admin@gmail.com';
        $user->email = 'admin@gmail.com';
        $user->password = 'admin@gmail.com';
        $user->role = 'admin';

        $user->save();

        $user1 = new User;
        $user1->name = 'niko@gmail.com';
        $user1->email = 'niko@gmail.com';
        $user1->password = 'niko@gmail.com';
        $user1->role = 'student';

        $user1->save();

        $user2 = new User;
        $user2->name = 'profesor@gmail.com';
        $user2->email = 'profesor@gmail.com';
        $user2->password = 'profesor@gmail.com';
        $user2->role = 'profesor';

        $user2->save();

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
        $class->id_teacher = 1;
        $class->id_course = 1;
        $class->id_schedule = 1;
        $class->name = 'Intro to PHP';
        $class->color = "#888";
        $class->save();


        $class2 = new Classes;
        $class2->id_teacher = 1;
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

        $exam = new Exam;
        $exam->id_class = 1;
        $exam->id_student = 2;
        $exam->name = "Final exam PHP";
        $exam->mark = 9.6;
        $exam->save();
    }
}
