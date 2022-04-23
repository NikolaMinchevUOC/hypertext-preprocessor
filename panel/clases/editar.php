<?php

session_start();

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);
require('../../db_connection.php');


//$id_class = mysqli_real_escape_string($conn, stripslashes($_POST['id_class']));
$id_teacher = mysqli_real_escape_string($conn, stripslashes($_POST['teacherid']));
$id_course = mysqli_real_escape_string($conn, stripslashes($_POST['courseid']));
$name = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$color = mysqli_real_escape_string($conn, stripslashes($_POST['color']));
$dia  = mysqli_real_escape_string($conn, stripslashes($_POST['dia']));
$date = date_create($dia);
$diaFormateado = date_format($date, "Y-m-d");
$inicio  = mysqli_real_escape_string($conn, stripslashes($_POST['inicio']));
$date = date_create($inicio);
$inicioFormateado = date_format($date, "h:i:s");
$fin  = mysqli_real_escape_string($conn, stripslashes($_POST['fin']));
$date1 = date_create($fin);
$finFormateado = date_format($date1, "h:i:s");

$query = "INSERT INTO `schedule`(`id_class`, `time_start`, `time_end`, `day`) VALUES (100000,'{$inicioFormateado}','{$finFormateado}', '{$diaFormateado}')";
mysqli_query($conn, $query) or die(mysql_error());

$query = "SELECT * from `schedule` ORDER BY id_schedule DESC LIMIT 1;";
$result = mysqli_query($conn, $query) or die(mysql_error());
$value = mysqli_fetch_assoc($result);
$id_schedule = $value["id_schedule"];


$query = "INSERT INTO `class`(`id_teacher`, `id_course`, `id_schedule`, `name`, `color`) VALUES ({$id_teacher},{$id_course},{$id_schedule}, '{$name}', '{$color}')";
mysqli_query($conn, $query) or die(mysql_error());


$query = "SELECT * from `class` ORDER BY id_class DESC LIMIT 1;";
$result = mysqli_query($conn, $query) or die(mysql_error());
$value = mysqli_fetch_assoc($result);
$id_class = $value["id_class"];


$query = "UPDATE `schedule` SET id_class = $id_class WHERE id_schedule = $id_schedule";
mysqli_query($conn, $query) or die(mysql_error());


header('Location: ../clases.php');
