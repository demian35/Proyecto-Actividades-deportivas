<?php

//incluimos el archivo que nos conecta con la base de datos
include("../conexiones/conexionBD.php");

function deleteTorneo($conexion) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['idTorneo'])) {
            $idTorneo = $_POST['idTorneo'];

            try {
                $sentenciaDelete = $conexion->prepare("DELETE FROM ct_torneos WHERE idTorneo = :idTorneo");
                $sentenciaDelete->bindParam(':idTorneo', $idTorneo);
                $sentenciaDelete->execute();

                echo json_encode(['success' => true, 'message' => 'Torneo eliminado con éxito']);
            } catch (PDOException $e) {
                // Verifica si la excepción es debido a la integridad referencial
                if ($e->errorInfo[1] === 1451) {
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar torneo: El torneo está vinculado a un evento']);
                } else {
                    // Si es otra excepción, muestra el mensaje original
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar torneo: ' . $e->getMessage()]);
                }
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Error general: ' . $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'ID del torneo no proporcionado']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Acceso no permitido']);
    }
}


//ejecutamos la funcion
deleteTorneo($conexion);

?>