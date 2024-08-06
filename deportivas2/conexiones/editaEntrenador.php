<?php

//funcion para editar de la tabla entrenadores
function editaEntrenador($conexion){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("../conexiones/conexionBD.php");
    
        try {
            //parametros que vamos a recibir
            $correoEntrenador = (isset($_POST['correoEntrenador'])) ? $_POST['correoEntrenador'] : "";
            $confirmacionCorreo = (isset($_POST['confirmaCorreo'])) ? $_POST['confirmaCorreo'] : "";
            $nombreEntrenador = (isset($_POST['nombreEntrenador'])) ? $_POST['nombreEntrenador'] : "";
            $aPartenoEntrenador = (isset($_POST['apaternoEntrenador'])) ? $_POST['apaternoEntrenador'] : "";
            $aMaternoEntrenador = (isset($_POST['amaternoEntrenador'])) ? $_POST['amaternoEntrenador'] : "";
            $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
            $celular = (isset($_POST['celular'])) ? $_POST['celular'] : "";
    
            $actualizacionEntrenador = $conexion->prepare("UPDATE entrenadores 
                SET nomEntrenador = :nombreEntrenador, 
                    primerApellido = :primerApellido,  
                    segundoApellido = :segundoApellido, 
                    telefono = :telefono, 
                    celular = :celular, 
                    fechaModEnt = NOW() 
                WHERE correoEntrenador = :correoEntrenador");
    
            $actualizacionEntrenador->bindParam(':nombreEntrenador', $nombreEntrenador);
            $actualizacionEntrenador->bindParam(':primerApellido', $aPartenoEntrenador);  
            $actualizacionEntrenador->bindParam(':segundoApellido', $aMaternoEntrenador);  
            $actualizacionEntrenador->bindParam(':telefono', $telefono);
            $actualizacionEntrenador->bindParam(':celular', $celular);
            $actualizacionEntrenador->bindParam(':correoEntrenador', $correoEntrenador);  
            $actualizacionEntrenador->execute();
            echo json_encode(array("success" => true));
            exit();
        } catch (PDOException $e) {
            // Manejo de errores de PDO
            $response = array("success" => false, "error_message" => "Error: " . $e->getMessage());
            echo json_encode($response);
            exit();
        } 
    }
}
//ejecutamos la funcion
editaEntrenador($conexion);


?>
