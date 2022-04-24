<?php

// Evitamos el acceso directo al archivo como medida de seguridad
defined('_UOC') or exit('Restricted Access');
$conn = mysqli_connect("localhost", "niko", "niko", "producto2");
$conn->set_charset("utf8");

// Comprobar conexión
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
