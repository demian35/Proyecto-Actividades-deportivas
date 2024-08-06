<?php

// Datos de conexión a la base de datos
$bd_servidor = '132.247.147.17';
$bd_nombre = 'Mercurioz_deportivas';
$bd_usuario = 'dba_deportivas';
$bd_contraseña = '#MEP_dbz$pk17*';
$bd_puerto = "7408";

try {
    // Conexión PDO a la base de datos MySQL
    $dsn = "mysql:host=$bd_servidor;port=$bd_puerto;dbname=$bd_nombre";
    $conexion = new PDO($dsn, $bd_usuario, $bd_contraseña);
    
    // Establecer el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    

} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}

?>
