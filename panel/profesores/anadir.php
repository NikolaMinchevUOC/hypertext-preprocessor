<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');

$nombre = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$apellido = mysqli_real_escape_string($conn, stripslashes($_POST['apellidos']));
$telefono = mysqli_real_escape_string($conn, stripslashes($_POST['telefono']));
$nif = mysqli_real_escape_string($conn, stripslashes($_POST['nif']));
$email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));

$query = "INSERT INTO `teachers`(`name`, `surname`, `telephone`, `nif`, `email`) VALUES ('{$nombre}','{$apellido}','{$telefono}','{$nif}','{$email}')";
$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../profesores.php');


?>