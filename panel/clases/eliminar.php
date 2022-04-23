<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');


$id_class = $_GET["id"];


$query = "DELETE FROM `class` WHERE `id_class` = '{$id_class}'";

$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../clases.php');


?>