@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Students</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">



            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">Alumno</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Clase</th>
                        <th scope="col">Nota EC</th>
                        <th scope="col">Nota Exams</th>
                        <th scope="col">Nota Final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    @php
                    $porcentages =Illuminate\Support\Facades\DB::table('percentages')->where('id_course', '=', $course->id_course)->where('id_class', '=', $clase->id_class)->first();
                    $sumaNotaEc = 0;
                    $numeroDeNotasEc=0;
                    $pesoNotaEC = $porcentages->continuous_assessment;
                    $works = Illuminate\Support\Facades\DB::table('works')->where('id_class', '=', $clase->id_class)->where('id_student', '=', $student->id)->get();
                    foreach ($works as $work) {
                    $sumaNotaEc += $work->mark;
                    $numeroDeNotasEc++;
                    }

                    if( $numeroDeNotasEc == 0){
                    $numeroDeNotasEc =1;
                    }
                    $notaEc = (($sumaNotaEc /$numeroDeNotasEc) * $porcentages->continuous_assessment) / 100;
                    $notaEcMedia = number_format(($sumaNotaEc /$numeroDeNotasEc),2) ;

                    $sumaNotaExams = 0;
                    $numeroDeNotasExams=1;
                    $pesoNotaExams = $porcentages->exams;
                    $exams = Illuminate\Support\Facades\DB::table('exams')->where('id_class', '=', $clase->id_class)->where('id_student', '=', $student->id)->get();
                    foreach ($exams as $exam) {
                    $sumaNotaExams += $exam->mark;

                    if( $numeroDeNotasExams == 1){

                    }else{
                    $numeroDeNotasExams++;
                    }

                    }
                    $notaExamsMedia =number_format(($sumaNotaExams /$numeroDeNotasExams),2) ;

                    $notaExams =(($sumaNotaExams /$numeroDeNotasExams) * $porcentages->exams) / 100;
                    $notaFinal= number_format($notaEc + $notaExams,2) ;
                    @endphp
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$clase->name}}</td>
                        <td>{{$notaEcMedia}} ({{$pesoNotaEC}}%)</td>
                        <td>{{$notaExamsMedia}} ({{$pesoNotaExams}}%)</td>
                        <td>{{$notaFinal}}</td>
                        <td>
                            <a href="/profesor-trabajos/{{$course->id_course}}/{{$clase->id_class}}/{{$student->id}}" class="btn btn-info">Ver Trabajos</a>
                            <a href="/profesor-exams/{{$course->id_course}}/{{$clase->id_class}}/{{$student->id}}" class="btn btn-info">Ver Examenes</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button onclick="history.go(-1);" class="btn btn-info">Back </button>
        </div>
    </div>
</div>

@endsection
