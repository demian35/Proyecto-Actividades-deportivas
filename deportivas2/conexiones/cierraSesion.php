<?php
// cerrarSesion.php
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir a la página de inicio de sesión o a donde desees
header("Location: ../Registro/nuevoRegistro.php");
exit();
?>
