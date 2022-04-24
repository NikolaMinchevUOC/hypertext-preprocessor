<?php



define('_UOC', 1);
require('../db_connection.php');

$email = $_SESSION['email'];

$query = "SELECT * FROM `courses` WHERE 1";
$result = mysqli_query($conn, $query) or die(mysql_error());


?>


<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

<style>
  body,
  html {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px
  }

  #calendar {
    max-width: 1100px;
    margin: 40px auto
  }
</style>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Calendario Admin</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '2022-04-07',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

              $nombre = $row["name"];
              $start = $row["date_start"];
              $end = $row["date_end"];


              echo "{
                title: '$nombre',
                start: '$start',
                end: '$end',
                },";
            }
          }
          ?>
        ]
      });
      calendar.render();
    });
  </script>


  <div id="calendar"></div>



</main>