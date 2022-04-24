<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');

$id_teacher = $_GET["id"];
$nombre = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$apellido = mysqli_real_escape_string($conn, stripslashes($_POST['apellidos']));
$telefono = mysqli_real_escape_string($conn, stripslashes($_POST['telefono']));
$nif = mysqli_real_escape_string($conn, stripslashes($_POST['nif']));
$email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));

$query = "UPDATE `teachers` SET `name`='{$nombre}',`surname`='{$apellido}',`telephone`='{$telefono}',`nif`='{$nif}',`email`='{$email}' WHERE `id_teacher` = '{$id_teacher}';";
$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../profesores.php');


?>