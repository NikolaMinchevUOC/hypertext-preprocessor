<?php

session_start();

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);
require('../../db_connection.php');


$id_course = $_GET["id"];


$email = $_SESSION["email"];

$query = "SELECT * FROM `students` WHERE `email` = '{$email}'";
$result = mysqli_query($conn, $query) or die(mysql_error());
$value = mysqli_fetch_assoc($result);
$id_usuario = $value["id"];



$query = "UPDATE `enrollment` SET `status`=0 WHERE `id_course` = $id_course AND `id_student` = $id_usuario";

$result = mysqli_query($conn, $query) or die(mysql_error());
header('Location: ../cursos.php');
