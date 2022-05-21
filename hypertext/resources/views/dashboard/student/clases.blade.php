@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Clases</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">



            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Course</th>
                        <th scope="col">Nota EC</th>
                        <th scope="col">Nota Exams</th>
                        <th scope="col">Nota Final</th>
                        <th scope="col">Schedule day</th>
                        <th scope="col">Schedule start</th>
                        <th scope="col">Schedule end</th>
                        <th scope="col">Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clases as $clase)
                    @php
                    $id_studnet = Illuminate\Support\Facades\Auth::id();
                    $teacher = \App\Models\User::where('id', $clase->id_teacher)->first();
                    $course = \App\Models\Course::where('id_course', $clase->id_course)->first();
                    $schedule = \App\Models\Schedule::where('id_schedule', $clase->id_schedule)->first();
                    $porcentages =Illuminate\Support\Facades\DB::table('percentages')->where('id_course', '=', $course->id_course)->where('id_class', '=', $clase->id_class)->first();

                    $ca=(empty($porcentages)) ? 0 : $porcentages->continuous_assessment;
                    $pa =(empty($porcentages)) ? 0 : $porcentages->exams;

                    $sumaNotaEc = 0;
                    $numeroDeNotasEc=0;
                    $pesoNotaEC = $ca;
                    $works = Illuminate\Support\Facades\DB::table('works')->where('id_class', '=', $clase->id_class)->where('id_student', '=', $id_studnet)->get();
                    foreach ($works as $work) {
                    $sumaNotaEc += $work->mark;
                    $numeroDeNotasEc++;
                    }

                    if( $numeroDeNotasEc == 0){
                    $numeroDeNotasEc =1;
                    }
                    $notaEc = (($sumaNotaEc /$numeroDeNotasEc) * $ca) / 100;
                    $notaEcMedia = number_format(($sumaNotaEc /$numeroDeNotasEc),2) ;

                    $sumaNotaExams = 0;
                    $numeroDeNotasExams=1;
                    $pesoNotaExams = $pa;
                    $exams = Illuminate\Support\Facades\DB::table('exams')->where('id_class', '=', $clase->id_class)->where('id_student', '=', $id_studnet)->get();
                    foreach ($exams as $exam) {
                    $sumaNotaExams += $exam->mark;

                    if( $numeroDeNotasExams == 1){

                    }else{
                    $numeroDeNotasExams++;
                    }

                    }
                    $notaExamsMedia =number_format(($sumaNotaExams /$numeroDeNotasExams),2) ;

                    $notaExams =(($sumaNotaExams /$numeroDeNotasExams) * $pa) / 100;
                    $notaFinal= number_format($notaEc + $notaExams,2) ;




                    @endphp
                    <tr>
                        <td>{{$clase->id_class}}</td>
                        <td>{{$clase->name}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$notaEcMedia}} ({{$pesoNotaEC}}%)</td>
                        <td>{{$notaExamsMedia}} ({{$pesoNotaExams}}%)</td>
                        <td>{{$notaFinal}}</td>
                        <td>{{$schedule->day}}</td>
                        <td>{{$schedule->time_start}}</td>
                        <td>{{$schedule->time_end}}</td>
                        <td>
                            <div style="padding:10px; background-color:<?php echo $clase->color; ?>"></div>
                        </td>
                        <td>
                            <a href="/student-works/{{$clase->id_class}}" class="btn btn-info">Ver Trabajos</a>
                            <a href="/student-exams/{{$clase->id_class}}" class="btn btn-info">Ver Exams</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
