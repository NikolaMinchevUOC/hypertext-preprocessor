<?php

    // Creamos la función que permite conectarse a la DB
    //function ConnectToDB(){

    //    $dbhost = "uocx-icc02-p8.uoclabs.uoc.es/";
    //    $dbuser = "wordpress23";
    //    $dbpass = "oq2xKH2bwfXW9";
    //    $db = "wordpress23";

    //    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    //    return $conn;
    //}
    
    // Creamos una función para cerrar la conexión con la DB
    //function CloseDB($conn){
    //    $conn -> close();
    //}


    // Evitamos el acceso directo al archivo como medida de seguridad
    //defined('_UOC') or exit('Restricted Access');
    $conn = mysqli_connect("localhost","niko","niko","producto2");

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }else{
        $conn->set_charset("utf8");
    }
   
    
?>
