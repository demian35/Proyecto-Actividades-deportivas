<?php
include("../conexiones/conexionBD.php");

//funcion para realizar el registro de un entrenador en la tabla entrenadores
function registraEntrenador($conexion){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Datos del entrenador
        $correoEntrenador = filter_input(INPUT_POST, 'correoEntrenador', FILTER_SANITIZE_EMAIL); 
        $confirmacionCorreo = filter_input(INPUT_POST, 'confirmaCorreo', FILTER_SANITIZE_EMAIL);   
        $nombreEntrenador = (isset($_POST['nombreEntrenador'])) ? $_POST['nombreEntrenador'] : "";
        $aPartenoEntrenador = (isset($_POST['apaternoEntrenador'])) ? $_POST['apaternoEntrenador'] : "";
        $aMaternoEntrenador = (isset($_POST['amaternoEntrenador'])) ? $_POST['amaternoEntrenador'] : "";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
        $celular = (isset($_POST['celular'])) ? $_POST['celular'] : "";
    
        try {
    
            // Validar el formato del correo electrónico
            if (!filter_var($correoEntrenador, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("El formato del correo electrónico no es válido.");
            }

        
    
            // Verifica si el correo ya existe en la base de datos
            $consultaExistencia = $conexion->prepare("SELECT * FROM entrenadores WHERE correoEntrenador = :correoEntrenador");
            $consultaExistencia->bindParam(':correoEntrenador', $correoEntrenador);
            $consultaExistencia->execute();
            $resultadoExistencia = $consultaExistencia->fetch(PDO::FETCH_ASSOC);
    
            if ($resultadoExistencia) {
                // El correo ya existe, recuperar los datos del entrenador
                echo json_encode(array('success' => true, 'existe_entrenador' => true, 'datos_entrenador' => $resultadoExistencia));
            } else {
                // El correo no existe, realizar la inserción
                $insercionEntrenador = $conexion->prepare("INSERT INTO entrenadores(correoEntrenador, nomEntrenador, primerApellido, segundoApellido, telefono, celular, fechaAltaEnt, fechaModEnt) 
                VALUES(:correoEntrenador, :nombreEntrenador, :aPartenoEntrenador, :aMaternoEntrenador, :telefono, :celular,NOW(),NULL)");
                $insercionEntrenador->bindParam(':correoEntrenador', $correoEntrenador);
                $insercionEntrenador->bindParam(':nombreEntrenador', $nombreEntrenador);
                $insercionEntrenador->bindParam(':aPartenoEntrenador', $aPartenoEntrenador);
                $insercionEntrenador->bindParam(':aMaternoEntrenador', $aMaternoEntrenador);
                $insercionEntrenador->bindParam(':telefono', $telefono);
                $insercionEntrenador->bindParam(':celular', $celular);
                $insercionEntrenador->execute();
            }
    
            // Cierra las consultas y la conexión a la base de datos
            $consultaExistencia->closeCursor();
            $conexion = null;
        }catch(Exception $error){
            // Manejar la excepción y responder con un JSON de error
            echo json_encode(array('success' => false, 'error_message' => "Error: " . $error->getMessage()));
        }
    }
}

//ejecutamos la funcion
registraEntrenador($conexion);

?>

