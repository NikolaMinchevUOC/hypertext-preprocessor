<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');


$id_teacher = $_GET["id"];


$query = "DELETE FROM `teachers` WHERE `id_teacher` = '{$id_teacher}'";

$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../profesores.php');


?>