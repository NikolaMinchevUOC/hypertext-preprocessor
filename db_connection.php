<?php

    // Evitamos el acceso directo al archivo como medida de seguridad
    defined('_UOC') or exit('Restricted Access');
    $conn = mysqli_connect("localhost","wordpress23","oq2xKH2bwfXW9","wordpress23");
    $conn->set_charset("utf8");

    // Comprobar conexión
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    
?>
