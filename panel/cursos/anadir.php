<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');

$nombre = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$descripcion = mysqli_real_escape_string($conn, stripslashes($_POST['descripcion']));
$fecha_inicio = mysqli_real_escape_string($conn, stripslashes($_POST['fecha_inicio']));
$fecha_fin = mysqli_real_escape_string($conn, stripslashes($_POST['fecha_fin']));

$query = "INSERT INTO `courses`(`name`, `description`, `date_start`, `date_end`, `active`) VALUES ('{$nombre}','{$descripcion}','{$fecha_inicio}','{$fecha_fin}', 1)";
$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../cursos.php');


?>