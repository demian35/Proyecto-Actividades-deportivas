<?php
include("../conexiones/conexionBD.php");

//funcion para eliminar un evento de la tabla torneos_disciplinas
function eliminaEvento($conexion){
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idTorneoDisciplina'])) {
            $idTorneoDisciplina = $_POST['idTorneoDisciplina']; //recibimos el idTorneodisciplina del dato a eliminar
    
            //sentencia para eliminar el evento
            $stmtDelevento = $conexion->prepare("DELETE FROM torneos_disciplinas WHERE idTorneoDisciplina= :idtorneoDisciplina");
            $stmtDelevento->bindParam(':idtorneoDisciplina', $idTorneoDisciplina);
            $stmtDelevento->execute();
            // Puedes devolver una respuesta JSON con un mensaje de éxito
            echo json_encode(['success' => true, 'message' => 'Evento eliminado correctamente']);
        } else {
            // Devuelve un mensaje de error si no se recibe el ID del registro
            echo json_encode(['success' => false, 'message' => 'Error: ID de registro no recibido']);
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] === 1451) {
            echo json_encode(['success' => false, 'message' => 'Error al eliminar evento: El evento está vinculado a cedulas de inscripción']);
        } else {
            // Si es otra excepción, muestra el mensaje original
            echo json_encode(['success' => false, 'message' => 'Error al eliminar torneo: ' . $e->getMessage()]);
        }
    } catch (Exception $e) {
        // Manejo de otros errores
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
//ejecutamos la funcion
eliminaEvento($conexion);

?>