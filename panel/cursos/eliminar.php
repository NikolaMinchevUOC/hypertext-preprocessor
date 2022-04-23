<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');


$id_course = $_GET["id"];


$query = "DELETE FROM `courses` WHERE `id_course` = '{$id_course}'";

$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../cursos.php');


?>