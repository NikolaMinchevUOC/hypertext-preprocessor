<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');

$id_course = $_GET["id"];
$nombre = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$descripcion = mysqli_real_escape_string($conn, stripslashes($_POST['descripcion']));
$fecha_inicio = mysqli_real_escape_string($conn, stripslashes($_POST['fecha_inicio']));
$fecha_fin = mysqli_real_escape_string($conn, stripslashes($_POST['fecha_fin']));
$activo = mysqli_real_escape_string($conn, stripslashes($_POST['active']));

$query = "UPDATE `courses` SET `name`='{$nombre}',`description`='{$descripcion}',`date_start`='{$fecha_inicio}',`date_end`='{$fecha_fin}',`active`='{$activo}' WHERE `id_course` = '{$id_course}';";
$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../cursos.php');


?>