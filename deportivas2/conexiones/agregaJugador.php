<?php
include("../conexiones/conexionsybase.php");
include("../conexiones/conexionBD.php");

// Verificar si el número de expediente existe en Sybase
$expediente = $_POST['expediente']; // Obtener el número de expediente del formulario
$idInscripcion=$_POST['idinscripcion'];
$ptl_ptl=$_POST['ptl_ptl'];

// Función para validar que el número de expediente exista en la base de datos y coincide con el plantel
function validaExp($conexion2, $expediente, $ptl_ptl) {
    try {
        $validaexp = $conexion2->prepare("SELECT COUNT(*) AS total FROM unamsi.dbo.alumnos WHERE a_exp = :expJugador AND a_ptl = :ptl_ptl AND a_vig IN ('A', 'V', 'N')");
        $validaexp->bindParam(':expJugador', $expediente);
        $validaexp->bindParam(':ptl_ptl', $ptl_ptl);
        $validaexp->execute();
        $resultado = $validaexp->fetch(PDO::FETCH_ASSOC);
        // Retornar verdadero si el número de expediente coincide con el plantel, falso de lo contrario
        return $resultado['total'] > 0;
    } catch (PDOException $e) {
        // Manejar errores de consulta SQL
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        return false;
    }
}
//funcion que valida si un jugador ya esta inscrito en la cedula
function existeJugador($conexion, $expediente, $idInscripcion) {
    try {
        $consulta = $conexion->prepare("SELECT COUNT(*) AS total FROM Mercurioz_deportivas.jugadores WHERE a_exp = :expediente AND idInscripcion = :idInscripcion");
        $consulta->bindParam(':expediente', $expediente);
        $consulta->bindParam(':idInscripcion', $idInscripcion);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] > 0;
    } catch (PDOException $e) {
        // Manejar errores de consulta SQL
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        return false;
    }
}

//funcion para agregar jugador a la cedula
function agregaJugador($conexion, $expediente, $idInscripcion) {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try {
            // Verificar si el jugador ya existe en la tabla de jugadores
            if (existeJugador($conexion, $expediente,$idInscripcion)) {
                // Si el jugador ya existe, devuelve un mensaje de error
                echo "El jugador ya está registrado";
                return false;
            }
            
            // Si el jugador no existe, procede a insertarlo
            $sentenciaInsercion = $conexion->prepare("INSERT INTO Mercurioz_deportivas.jugadores (idjugador, idInscripcion, a_exp, fechaAltaJug, fechaModJug) 
                VALUES (NULL, :idInscripcion, :expJugador, NOW(), NULL)");
            $sentenciaInsercion->bindParam(':idInscripcion', $idInscripcion);
            $sentenciaInsercion->bindParam(':expJugador', $expediente);
            $sentenciaInsercion->execute();
            // Devolver éxito si se inserta el jugador correctamente
            return true;
        } catch (PDOException $e) {
            // Manejar el error de alguna manera apropiada
            echo " Error al agregar jugador: " . $e->getMessage();
            return false;
        }
    }
}

// Validar el número de expediente y plantel
$validacionExitosa = validaExp($conexion2, $expediente, $ptl_ptl);
if ($validacionExitosa) {
    // El número de expediente existe y coincide con el plantel en la base de datos Sybase
    // Llamar a la función agregaJugador para insertar el jugador en la base de datos MySQL
    if (agregaJugador($conexion, $expediente, $idInscripcion)) {
        echo "success"; // Envía esta respuesta si el jugador se registra correctamente
    } else {
        echo ""; // Envía esta respuesta si hay un error al agregar el jugador
    }
} else {
    // El número de expediente no existe en la base de datos Sybase o no coincide con el plantel
    echo "El alumno no esta vigente o no pertenece a su plantel";
}





?>
