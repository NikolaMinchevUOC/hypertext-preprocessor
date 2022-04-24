<?php

session_start();

// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
    header('location: ../login/login.php');
}

define('_UOC', 1);
require('../../db_connection.php');

$id_admin = $_GET["id"];

$username = mysqli_real_escape_string($conn, stripslashes($_POST['username']));
$nombre = mysqli_real_escape_string($conn, stripslashes($_POST['name']));


$query = "UPDATE `users_admin` SET `username`='{$username}',`name`='{$nombre}' WHERE `id_user_admin` = {$id_admin};";
$result = mysqli_query($conn, $query) or die(mysql_error());

header('Location: ../perfil.php');
