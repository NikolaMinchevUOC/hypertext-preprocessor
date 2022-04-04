<?php 

    session_start();  
    
    define('_UOC', 1);  
    require('../db_connection.php');

    if ( isset($_POST['email'], $_POST['password']) ) {
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "SELECT * FROM `users_admin` WHERE email='$email' AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());

        if (mysqli_num_rows($result) == 1) {
            // Redireccionamos al usuario al Dashboard
            header("Location: panel/dashboard.php");
        } else {
            // El correo electrónico o la contraseña es incorrecto
            header("Location: login.php?error=True");
        }

    }else{
        exit('Introduce todos los campos.');
    }
?> 