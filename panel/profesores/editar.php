<?php 

session_start(); 

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);  
require('../../db_connection.php');


$nombre = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
$apellido = mysqli_real_escape_string($conn, stripslashes($_POST['apellido']));
$telefono = mysqli_real_escape_string($conn, stripslashes($_POST['telefono']));
$nif = mysqli_real_escape_string($conn, stripslashes($_POST['nif']));
$email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));

echo $_POST['nombre'];
  
echo $nombre; 
echo $apellido;
echo $telefono;
echo $nif;
echo $email;

//$query = "UPDATE `teachers` SET `name`='Marcos',`surname`='Vazquez',`telephone`='654565409',`nif`='56456552K',`email`='marcosvazquez@uco.edu' WHERE `id_teacher` = 1;";
//$result = mysqli_query($conn, $query) or die(mysql_error());



?>