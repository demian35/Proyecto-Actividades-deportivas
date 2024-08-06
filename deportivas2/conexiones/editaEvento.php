<?php
include("../conexiones/conexionBD.php");

//funcion que editar las fechas de los eventos en la tabla torneos_disciplinas
function editaEvento($conexion){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Verificamos si existe el id del evento
        if(isset($_POST['idTorneoDisciplina'])){
            // Recuperamos los datos del formulario
            $idTorneoDisciplina = $_POST['idTorneoDisciplina'];
            $inicioTorneo = $_POST['fechaInicio'];
            $finTorneo = $_POST['fechaFin'];
            $inicioInscripciones = $_POST['fechaInicioIns'];
            $finInscripciones = $_POST['fechaFinIns'];

            try{
                $sentenciaActualizar = $conexion->prepare("UPDATE torneos_disciplinas SET fechaInicio=:inicioTorneo, fechaFin=:finTorneo, fechaInicioIns=:inicioInscripciones, fechaFinIns=:finInscripciones, fechaModTorDisc=NOW() WHERE idTorneoDisciplina=:idTorneoDisciplina");
                $sentenciaActualizar->bindParam(':idTorneoDisciplina', $idTorneoDisciplina);
                $sentenciaActualizar->bindParam(':inicioTorneo', $inicioTorneo);
                $sentenciaActualizar->bindParam(':finTorneo', $finTorneo);
                $sentenciaActualizar->bindParam(':inicioInscripciones', $inicioInscripciones);
                $sentenciaActualizar->bindParam(':finInscripciones', $finInscripciones);
                $sentenciaActualizar->execute();
                
                // Mensaje de éxito
                $respuesta = ['success' => true, 'message' => 'Fechas del evento actualizadas correctamente'];
            } catch(PDOException $e){
                $respuesta = ['success' => false, 'message' => 'Error en la actualización de las fechas del evento: ' . $e->getMessage()];
            }
        } else {
            // Si 'idTorneoDisciplina' no está presente en $_POST
            $respuesta = ['success' => false, 'message' => 'ID del evento no proporcionado'];
        }
        // Imprimir el JSON al final
        echo json_encode($respuesta);
    } else {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Acceso denegado']);
    }
}

editaEvento($conexion);

?>