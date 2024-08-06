<?php
// Datos de conexión a la base de datos de pagos
$bd_servidor = '132.247.147.17';
$bd_nombre = 'Mercurioz_pagos_v2020';
$bd_usuario = 'dba_mercurioz';
$bd_contraseña = '#ME_dbz$pk24';
$bd_puerto = '7408';

try {
    // Conexión PDO a la base de datos MySQL de los pagos
    $dsn = "mysql:host=$bd_servidor;port=$bd_puerto;dbname=$bd_nombre";
    $conexion = new PDO($dsn, $bd_usuario, $bd_contraseña);

    // Establecer el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Mostrar un mensaje genérico en caso de error
    echo "Error al conectarse con la base de datos";
}
?>
