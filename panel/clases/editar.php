<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');

$id_class = $_GET["id"];

$id_teacher = mysqli_real_escape_string($conn, stripslashes($_POST['id_teacher']));
$id_course = mysqli_real_escape_string($conn, stripslashes($_POST['id_course']));
$id_schedule = mysqli_real_escape_string($conn, stripslashes($_POST['id_schedule']));
$name = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$color = mysqli_real_escape_string($conn, stripslashes($_POST['color']));

$query = "UPDATE `class` SET `id_class`='{$id_class}',`id_teacher`='{$id_teacher}',`id_course`='{$id_course}',`id_schedule`='{$id_schedule}',`name`='{$name}', `color`='{$color}' WHERE `id_class` = '{$id_class}';";
echo $query;
$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../clases.php');


?>