<?php



define('_UOC', 1);
require('../db_connection.php');

$email = $_SESSION['email'];






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
    <h1 class="h2">Calendario Student</h1>
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
          $queryS = "SELECT * FROM `students` WHERE `email` = '{$email}'";
          $resultS = mysqli_query($conn, $queryS) or die(mysql_error());
          $valueS = mysqli_fetch_assoc($resultS);
          $id_usuario = $valueS["id"];


          $query = "SELECT * FROM `enrollment` WHERE id_student = $id_usuario AND status = 1";
          $result = mysqli_query($conn, $query) or die(mysql_error());



          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $query2 = "SELECT * FROM `class` WHERE id_course = {$row['id_course']}";
              $result2 = mysqli_query($conn, $query2) or die(mysql_error());
              if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {

                  $color = $row['color'];
                  $name = $row['name'];
                  echo "{
                    title:'$name',
                    color:'$color',
                    
                    ";
                  $query3 = "SELECT * FROM `schedule` WHERE id_schedule = {$row['id_schedule']}";
                  $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                  if ($result3->num_rows > 0) {
                    while ($row = $result3->fetch_assoc()) {
                      $day = $row['day'];
                      $time_start = $row['time_start'];
                      $time_end = $row['time_end'];
                      echo "
                        start  : '" . $day . "T" . $time_start . "',
                        end    : '" . $day . "T" . $time_end . "',
                        
                    },";
                    }
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


  <div id="calendar"></div>



</main>