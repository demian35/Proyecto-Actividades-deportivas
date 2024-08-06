<?php
//funcion para llenar los selects del form de crear evento con las disciplinas registradas en los catalogos
function obtenerDisciplinas() {
    include("../conexiones/conexionBD.php");

    $idTorneo = (isset($_POST['torneos'])) ? $_POST['torneos'] : 0;

    $consultaDisciplinas = $conexion->prepare("
        SELECT DISTINCT td.idDisciplina, d.nomDisciplina 
        FROM torneos_disciplinas td 
        JOIN ct_disciplinas d ON td.idDisciplina = d.idDisciplina 
        WHERE td.idTorneo = :idTorneo
    ");
    $consultaDisciplinas->bindParam(':idTorneo', $idTorneo);
    $consultaDisciplinas->execute();

    $disciplinas = array();
    while ($row = $consultaDisciplinas->fetch(PDO::FETCH_ASSOC)) {
        $disciplinas[] = array('idDisciplina' => $row['idDisciplina'], 'nomDisciplina' => $row['nomDisciplina']);
    }

    // Verificar si hay disciplinas antes de imprimir el JSON
    if (!empty($disciplinas)) {
        return $disciplinas;
    } else {
        // Si no hay disciplinas, devolver un arreglo vacío
        return array();
    }
}

// Imprimir el JSON solo si hay disciplinas
$disciplinas = obtenerDisciplinas();
if (!empty($disciplinas)) {
    echo json_encode($disciplinas);
}
?>
