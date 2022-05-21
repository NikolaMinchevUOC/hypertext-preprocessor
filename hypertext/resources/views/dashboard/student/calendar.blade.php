@extends('layouts.dashboard')

@section('title', 'Calendario')

@section('content')

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 1100px;
        margin: 40px auto;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>


<div class="container">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: "@php $time = Carbon\Carbon::now()->toDateTimeString(); echo $time; @endphp",
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    <?php

                    $id_studnet = Illuminate\Support\Facades\Auth::id();



                    $enrolments = \App\Models\Enrollment::where('id_student', $id_studnet)->where('status', 1)->get();

                    if (!empty($enrolments)) {
                        foreach ($enrolments as $enrolment) {

                            $clases = \App\Models\Classes::where('id_course', $enrolment->id_course)->get();

                            if (!empty($clases)) {
                                foreach ($clases as $clase) {

                                    $color = $clase->color;
                                    $name = $clase->name;
                                    echo "{
                    title:'$name',
                    color:'$color',

                    ";
                                    $schedule = \App\Models\Schedule::where('id_schedule', $clase->id_schedule)->first();

                                    if (!empty($schedule)) {

                                        $day = $schedule->day;
                                        $time_start = $schedule->time_start;
                                        $time_end = $schedule->time_end;
                                        echo "
                        start  : '" . $day . "T" . $time_start . "',
                        end    : '" . $day . "T" . $time_end . "',

                    },";
                                    }
                                }
                            }
                        }
                    }
                    ?>
                ]
            });

            calendar.render();
        });
    </script>

    <div id='calendar'></div>



</div>

@endsection
