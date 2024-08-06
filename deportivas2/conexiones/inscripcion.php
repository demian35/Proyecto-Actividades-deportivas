<?php
include("conexionBD.php");
include("conexionsybase.php");
session_start(); // Iniciar o reanudar la sesión
//funcion que realiza el registro en la tabla de inscripciones 
function realizaInscripcion($conexion,$conexion2){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validar los datos recibidos
        $correoEntrenador = filter_input(INPUT_POST, 'correoEntrenador', FILTER_SANITIZE_EMAIL);
        $torneoSeleccionado = filter_input(INPUT_POST, 'torneoSeleccionadoInput', FILTER_VALIDATE_INT);
        $disciplinaSeleccionada= filter_input(INPUT_POST, 'disciplinaSeleccionadaInput', FILTER_VALIDATE_INT);
        $categoriaSeleccionada= filter_input(INPUT_POST, 'categoriaSeleccionadaInput', FILTER_VALIDATE_INT);
        $pruebaSeleccionada=filter_input(INPUT_POST, 'pruebaSeleccionadaInput', FILTER_VALIDATE_INT);
        $ramaSeleccionada=filter_input(INPUT_POST, 'ramaSeleccionadaInput', FILTER_SANITIZE_STRING);
        $numJugadores = filter_input(INPUT_POST, 'numParticipantes', FILTER_VALIDATE_INT);
        $claveInc = filter_input(INPUT_POST, 'claveInc', FILTER_SANITIZE_STRING);
        $numFolio = filter_input(INPUT_POST, 'numFolio', FILTER_SANITIZE_STRING);
        $propuestaSede = filter_input(INPUT_POST,'propuestaSwitch',FILTER_SANITIZE_STRING);
        $horario=filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
    
        // Verificar si los datos son válidos
        if ($correoEntrenador && $torneoSeleccionado && $numJugadores && $claveInc && $numFolio !== false) {
            try {
                $verificaTorneoDisciplina = $conexion->prepare("SELECT idTorneoDisciplina FROM torneos_disciplinas WHERE idTorneo = :idTorneo AND idDisciplina = :idDisciplina
                AND idCategoria = :idCategoria AND idPrueba=:idPrueba AND rama=:rama");
                $verificaTorneoDisciplina->bindParam(':idTorneo', $torneoSeleccionado);
                $verificaTorneoDisciplina->bindParam(':idDisciplina', $disciplinaSeleccionada);
                $verificaTorneoDisciplina->bindParam(':idCategoria',$categoriaSeleccionada);
                $verificaTorneoDisciplina->bindParam(':idPrueba',$pruebaSeleccionada);
                $verificaTorneoDisciplina->bindParam(':rama',$ramaSeleccionada);
                $verificaTorneoDisciplina->execute();
                
    
                $idTorneoDisciplina = $verificaTorneoDisciplina->fetchColumn();
    
                if ($idTorneoDisciplina) {
                    $insercionInscripcion = $conexion->prepare("INSERT INTO inscripciones (correoEntrenador, idTorneoDisciplina, num_participantes, ptl_ptl, sede,horario,idFolioPago, estatusInscripcion, fechaAltaInsc, fechaModInsc) 
                    VALUES (:correoEntrenador, :idTorneoDisciplina, :numJugadores, :claveInc,:sede,:horario ,:numFolio, '0', NOW(), NULL)");
                    $insercionInscripcion->bindParam(':correoEntrenador', $correoEntrenador);
                    $insercionInscripcion->bindParam(':idTorneoDisciplina', $idTorneoDisciplina);
                    $insercionInscripcion->bindParam(':numJugadores', $numJugadores);
                    $insercionInscripcion->bindParam(':claveInc', $claveInc);
                    $insercionInscripcion->bindParam(':horario', $horario);
                    $insercionInscripcion->bindParam(':sede', $propuestaSede);
                    $insercionInscripcion->bindParam(':numFolio', $numFolio);
                    $insercionInscripcion->execute();
    
                    $idInscripcion = null; // Definir $idInscripcion antes de utilizarlo
                    // Después de realizar la inserción en la tabla inscripciones
                    $idInscripcion = $conexion->lastInsertId();
                    //inicio de sesion instantaneo despues de realizar la inscripcion
                    // Obtener los datos del usuario recién registrado
                    $sql = "SELECT i.*, td.idTorneo, td.idDisciplina, td.idCategoria, td.idPrueba, td.rama,
                    t.nomTorneo, d.nomDisciplina, c.nomCategoria, p.nomPrueba, e.nomEntrenador,
                    e.primerApellido,e.segundoApellido
                    FROM inscripciones i
                    INNER JOIN torneos_disciplinas td ON i.idTorneoDisciplina = td.idTorneoDisciplina
                    LEFT JOIN ct_torneos t ON td.idTorneo = t.idTorneo
                    LEFT JOIN ct_disciplinas d ON td.idDisciplina = d.idDisciplina
                    LEFT JOIN ct_pruebas p ON td.idPrueba = p.idPrueba
                    LEFT JOIN ct_categorias c ON td.idCategoria = c.idCategoria
                    INNER JOIN entrenadores e ON i.correoEntrenador=e.correoEntrenador
                    WHERE i.idInscripcion = :idInscripcion";
    
                    $stmt = $conexion->prepare($sql);
                    $stmt->bindParam(':idInscripcion', $idInscripcion, PDO::PARAM_INT);
                    $stmt->execute();
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    $cveptl=$usuario["ptl_ptl"];
    
                     // Consulta para imprimir los nombres de sybase de los planteles
                    $sqlsybase="SELECT ptl_nombre FROM unamsi.dbo.planteles WHERE ptl_ptl = '$cveptl'"; 
                    $stmt1 = $conexion2->prepare($sqlsybase);
                    $stmt1->execute();
                    $plantel=$stmt1->fetch(PDO::FETCH_ASSOC); 
    
    
    
                    if ($usuario) {
                        // Guardar la sesión del usuario
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["plantel"] = $plantel;
                        $response = array("success" => true, "usuario" => $usuario, "idInscripcion" => $idInscripcion);
                        echo json_encode($response);
                    } else {
                        $response = array("success" => false, "error" => "Error al obtener los datos del usuario.");
                        echo json_encode($response);
                    }
                }    
            } catch (PDOException $e) {
                $response = array("success" => false, "error" => "Error en la inserción de la inscripción: " . $e->getMessage());
                echo json_encode($response);
            }
        } else {
            $response = array("success" => false, "error" => "Error: Datos no válidos.");
            echo json_encode($response);
        }
    }
}
//ejecutamos la funcion para inscribir
realizaInscripcion($conexion,$conexion2)

?>
