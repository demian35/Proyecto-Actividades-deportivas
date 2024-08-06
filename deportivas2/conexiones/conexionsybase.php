<?php

// Script para conectarnos con sybase
$bd_servidor = '132.248.38.28';
$bd_nombre = 'unamsi';
$bd_usuario = 'sistemasSocial';
$bd_contraseña = 'Xn2sOS23_';
$bd_puerto = '4101';

try {
    $dsn = "dblib:host=$bd_servidor:$bd_puerto;dbname=$bd_nombre";
    $conexion2 = new PDO($dsn, $bd_usuario, $bd_contraseña);
    $conexion2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion2->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conexion2->exec("set char_convert utf8");

} catch (PDOException $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
}


?>