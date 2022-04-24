<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');

$id_student = $_GET["id"];


$nombre = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$apellido = mysqli_real_escape_string($conn, stripslashes($_POST['surname']));
$telefono = mysqli_real_escape_string($conn, stripslashes($_POST['telephone']));
$nif = mysqli_real_escape_string($conn, stripslashes($_POST['nif']));

$query = "UPDATE `students` SET `name`='{$nombre}',`surname`='{$apellido}',`telephone`='{$telefono}',`nif`='{$nif}' WHERE `id` = {$id_student};";
$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../perfil.php');
