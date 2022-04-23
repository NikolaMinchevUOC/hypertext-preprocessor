<?php 

    session_start();  
    
    define('_UOC', 1);  
    require('../db_connection.php');

    if ( isset($_POST['email'], $_POST['password']) ) {
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $password = md5($password);

        $queryStudent = "SELECT * FROM `students` WHERE email='$email' AND pass='$password'";
        $resultUser = mysqli_query($conn, $queryStudent);

        $queryAdmin = "SELECT * FROM `users_admin` WHERE email='$email' AND password='$password'";
        $resultAdmin = mysqli_query($conn, $queryAdmin) ;

        if (mysqli_num_rows($resultUser) == 1) {
            // Redireccionamos al usuario al Dashboard
            $_SESSION['email'] = $email;
            header("Location: ../panel/dashboardStudent.php");
           
        }else if(mysqli_num_rows($resultAdmin) == 1){
            $_SESSION['email'] = $email;
            header("Location: ../panel/dashboardAdmin.php");

        }else {
            // El correo electrónico o la contraseña es incorrecto
            header("Location: login.php?error=0");
        }

    }else{
        exit('Introduce todos los campos.');
    }
?> 