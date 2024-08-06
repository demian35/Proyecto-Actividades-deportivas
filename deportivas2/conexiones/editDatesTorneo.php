<?php
// Incluir archivo de conexión a la base de datos
include("../conexiones/conexionBD.php");

//funcion que obtiene todos los torneos y todos sus datos
function obtenerRegistrosTorneosDisciplinas($conexion) {
    try {
        $consulta = $conexion->prepare("SELECT td.*, t.nomTorneo, d.nomDisciplina, p.nomPrueba, c.nomCategoria
                                        FROM torneos_disciplinas td
                                        JOIN ct_torneos t ON td.idTorneo = t.idTorneo
                                        JOIN ct_disciplinas d ON td.idDisciplina = d.idDisciplina
                                        JOIN ct_pruebas p ON td.idPrueba = p.idPrueba
                                        JOIN ct_categorias c ON td.idCategoria = c.idCategoria");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al recuperar datos de torneos_disciplinas: ' . $e->getMessage()]);
        exit();
    }
}


// Función para obtener los registros de torneos_disciplinas filtrados por ID de torneo
function obtenerRegistrosTorneoSeleccionado($conexion, $idTorneoSeleccionado) {
    try {
        $consulta = $conexion->prepare("SELECT td.*, t.nomTorneo, d.nomDisciplina, p.nomPrueba, c.nomCategoria
                                        FROM torneos_disciplinas td
                                        JOIN ct_torneos t ON td.idTorneo = t.idTorneo
                                        JOIN ct_disciplinas d ON td.idDisciplina = d.idDisciplina
                                        JOIN ct_pruebas p ON td.idPrueba = p.idPrueba
                                        JOIN ct_categorias c ON td.idCategoria = c.idCategoria
                                        WHERE td.idTorneo = :idTorneo");
        $consulta->bindParam(':idTorneo', $idTorneoSeleccionado, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al recuperar datos de torneos_disciplinas: ' . $e->getMessage()]);
        exit();
    }
}


// Función para obtener los torneos de la tabla ct_torneos
function obtenerTorneos($conexion) {
    try {
        $consulta = $conexion->prepare("SELECT idTorneo, nomTorneo FROM ct_torneos");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error al recuperar datos de torneos: ' . $e->getMessage();
        return array(); // Devolver un array vacío en caso de error
    }
}

// Obtener los registros de torneos_disciplinas filtrados por el torneo seleccionado (si se ha enviado la petición AJAX)
if (isset($_POST['buscarTorneo']) && isset($_POST['eleccionTorneo'])) {
    $idTorneoSeleccionado = $_POST['eleccionTorneo'];

    // Verificar si se seleccionó "Elige una opción"
    if ($idTorneoSeleccionado == 0) {
        // Obtener todos los registros sin filtrar
        $resultados = obtenerRegistrosTorneosDisciplinas($conexion);
    } else {
        // Obtener los registros filtrados por el torneo seleccionado
        $resultados = obtenerRegistrosTorneoSeleccionado($conexion, $idTorneoSeleccionado);
    }

    // Convertir fechas a formato ISO 8601 antes de enviarlas en la respuesta JSON
    foreach ($resultados as &$fila) {
        $fila['fechaInicio'] = date('c', strtotime($fila['fechaInicio']));
        $fila['fechaFin'] = date('c', strtotime($fila['fechaFin']));
        $fila['fechaInicioIns'] = date('c', strtotime($fila['fechaInicioIns']));
        $fila['fechaFinIns'] = date('c', strtotime($fila['fechaFinIns']));
    }

    // Devolver resultados en formato JSON
    echo json_encode(['success' => true, 'resultados' => $resultados]);
    exit();
} else {
    // Si no hay petición AJAX, sigue con la lógica anterior
    $resultados = obtenerRegistrosTorneosDisciplinas($conexion);
}

// Obtener los torneos
$torneos = obtenerTorneos($conexion);



?>


