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


$query = "INSERT INTO `enrollment`(`id_student`, `id_course`, `status`) VALUES ($id_usuario, $id_course, 1)";

mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../cursos.php');
