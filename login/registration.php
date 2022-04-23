<?php 

    session_start();  
    
    define('_UOC', 1);  
    require('../db_connection.php');

    // Obtenemos la hora del servidor
    $timezone = date_default_timezone_get();

    // Inicializamos variable para almacenar errores
    $error = array(); 

    if (isset($_POST['register'])) {


      $nombre = mysqli_real_escape_string($conn, stripslashes($_REQUEST['name']));
      $apellidos = mysqli_real_escape_string($conn, stripslashes($_REQUEST['apellidos']));
      $nif = mysqli_real_escape_string($conn, stripslashes($_REQUEST['nif']));
      $telefono = mysqli_real_escape_string($conn, stripslashes($_REQUEST['telefono']));
      $username = mysqli_real_escape_string($conn, stripslashes($_REQUEST['username']));
      $email = mysqli_real_escape_string($conn, stripslashes($_REQUEST['email']));
      $password = mysqli_real_escape_string($conn, stripslashes($_REQUEST['password']));

      if (empty($nombre)){array_push($error, "Nombre es un campo obligatorio");}
      if (empty($apellidos)){array_push($error, "Apellidos es un campo obligatorio");}
      if (empty($nif)){array_push($error, "NIF es un campo obligatorio");}
      if (empty($telefono)){array_push($error, "Teléfono es un campo obligatorio");}
      if (empty($username)){array_push($error, "Nick es un campo obligatorio");}
      if (empty($email)){array_push($error, "Correo Electrónico es un campo obligatorio");}
      if (empty($password)){array_push($error, "Contraseña es un campo obligatorio");}

      // Creamos y ejecutamos la Queyr para comprobar si existe ya el nombre de usuario o el email
      $comprobar_datos = "SELECT * FROM `students` WHERE `username`='$username' OR `email`='$email' LIMIT 1";
      $result = mysqli_query($conn, $comprobar_datos);
      $usuario = mysqli_fetch_assoc($result);
        
      // Creamos la validación de username y email
      if ($usuario) { 
        if ($usuario['username'] === $username) {
          array_push($error, "El nombre de usuario no esta disponible");
        }
        if ($usuario['email'] === $email) {
          array_push($error, "El correo electrónico ya ha sido registrado");
        }
      }

      // Si no hay ningún error
      if (count($error) == 0) {
       

        $query = "INSERT INTO `students`(`username`, `pass`, `email`, `name`, `surname`, `telephone`, `nif`, `date_registered`) VALUES('$username', '$password', '$email', '$nombre', '$apellidos', '$telefono', '$nif', now())";
        $result = mysqli_query($conn, $query) or die(mysql_error());

        if ($result) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Has sido registrado correctamente.";
          header('location: login.php?success=1');
  
        }
      }else{
        foreach ($error as $errors){
          printf("<center>");
          printf("<b>" . $errors) . "</b>";
          printf("</center>");
        }
        printf("<hr><center><a href='register.php'>Volver a la página de registro</a></center>");
      }
    }
?> 