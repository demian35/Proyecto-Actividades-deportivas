<?php
include("../conexiones/conexionsybase.php");

//funcion que se encarga de validar que un plantel este en la base de datos
function buscaPlantel($conexion2){
    try {
        $claveInc = (isset($_POST['claveInc'])) ? $_POST['claveInc'] : "";
    
        // Preparar la consulta SQL
        $sentenciaBuscar = $conexion2->prepare("SELECT * FROM unamsi.dbo.planteles WHERE ptl_ptl = :claveInc");
        $sentenciaBuscar->bindParam(':claveInc', $claveInc, PDO::PARAM_STR);
        
        // Ejecutar la consulta preparada
        $sentenciaBuscar->execute();
        
        // Obtener el resultado de la consulta
        $resultado = $sentenciaBuscar->fetch(PDO::FETCH_ASSOC);
        
        // Inicializar el arreglo de respuesta
        $response = [];
    
        // Verificar si se encontró algún plantel
        if ($resultado) {
            // Crear un arreglo con el resultado encontrado
            $response['nombrePlantel'] = $resultado['ptl_nombre'];
        } else {
            // Si no se encuentra nada, enviar un mensaje de error
            $response['error'] = 'Este plantel no existe';
        }
    
        // Convertir el arreglo a formato JSON y enviarlo como respuesta
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        // Manejar la excepción y enviar un mensaje de error
        $response['error'] = 'Error en la consulta: ' . $e->getMessage();
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

//ejecutamos el metodo
buscaPlantel($conexion2);

?>
