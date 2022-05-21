@extends('layouts.dashboard')

@section('title', 'Calendario')

@section('content')

<style>
    
    html, body {
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
            {
              title: 'All Day Event',
              start: '2022-04-01'
            },
            {
              title: 'Long Event',
              start: '2022-04-07',
              end: '2022-04-10'
            },
            {
              groupId: '999',
              title: 'Repeating Event',
              start: '2022-04-09T16:00:00'
            },
            {
              groupId: '999',
              title: 'Repeating Event',
              start: '2022-04-16T16:00:00'
            },
            {
              title: 'Conference',
              start: '2022-04-11',
              end: '2022-04-13'
            },
            {
              title: 'Meeting',
              start: '2022-04-12T10:30:00',
              end: '2022-04-12T12:30:00'
            },
            {
              title: 'Lunch',
              start: '2022-04-12T12:00:00'
            },
            {
              title: 'Meeting',
              start: '2022-04-12T14:30:00'
            },
            {
              title: 'Birthday Party',
              start: '2022-04-13T07:00:00'
            },
            {
              title: 'Click for Google',
              url: 'http://google.com/',
              start: '2022-04-28'
            }
          ]
        });
    
        calendar.render();
      });
    
    </script>

    <div id='calendar'></div>
    
    

</div>

@endsection
