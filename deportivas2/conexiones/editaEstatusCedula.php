<?php
include("../conexiones/conexionBD.php");

//funcion para editar el estatus en la tabla inscripciones
function editaEstatusCedula($conexion) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['idInscripcion'])) {
            // Recibimos los datos del formulario
            $idInscripcion = isset($_POST['idInscripcion']) ? $_POST['idInscripcion'] : null;
            $estatusInscripcion = isset($_POST['estatusInscripcion']) ? $_POST['estatusInscripcion'] : null;

            try {
                $sentenciaActualizar = $conexion->prepare("UPDATE inscripciones SET estatusInscripcion=:estatusInscripcion, fechaModInsc=NOW() WHERE idInscripcion=:idInscripcion");
                $sentenciaActualizar->bindParam(':idInscripcion', $idInscripcion);
                $sentenciaActualizar->bindParam(':estatusInscripcion', $estatusInscripcion);
                $sentenciaActualizar->execute();

                // Mensaje de éxito
                echo json_encode(['success' => true, 'message' => 'Estatus actualizado correctamente']);
            } catch(PDOException $e) {
                echo json_encode(['success' => false, 'message' => 'Error al actualizar el estatus de la inscripción: ' . $e->getMessage()]);
            }
        } else {
            // Si 'idInscripcion' no está presente en $_POST
            echo json_encode(['success' => false, 'message' => 'ID de la cedula no proporcionado']);
        }
    } else {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Acceso denegado']);
    }
}

// Establecer el encabezado JSON
header('Content-Type: application/json');

// Ejecutamos la función
editaEstatusCedula($conexion);

?>
