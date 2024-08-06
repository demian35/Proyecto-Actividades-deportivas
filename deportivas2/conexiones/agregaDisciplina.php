<?php 
include("../conexiones/conexionBD.php");

// Datos que recibiremos del formulario
$nombreDis = (isset($_POST['nombreDis'])) ? $_POST['nombreDis'] : "";
$claveDis = (isset($_POST['claveDis'])) ? $_POST['claveDis'] : "";
$min = (isset($_POST['min'])) ? $_POST['min'] : "";
$max = (isset($_POST['max'])) ? $_POST['max'] : "";
$clavepago = (isset($_POST['clavepago'])) ? $_POST['clavepago'] : "";

//funcion para agregar una nueva disciplina a la tabla ct_disciplinas
function agregaDisciplina($conexion,$nombreDis,$claveDis,$min,$max,$clavepago){
    // Respuesta que enviaremos al cliente
    $response = array();

    try {
        // Sentencia para realizar la inserción
        $sentenciaInsercion = $conexion->prepare("INSERT INTO Mercurioz_deportivas.ct_disciplinas(idDisciplina, nomDisciplina, numMaxJugador, numMinJugador, cve_concepto_pago, fechaAltaDisc, fechaModDisc) VALUES(:claveDisc, :nombreDisc, :maximo, :minimo, :clavepg, NOW(), NULL);");
        $sentenciaInsercion->bindParam(':claveDisc', $claveDis);
        $sentenciaInsercion->bindParam(':nombreDisc', $nombreDis);
        $sentenciaInsercion->bindParam(':minimo', $min);
        $sentenciaInsercion->bindParam(':maximo', $max);
        $sentenciaInsercion->bindParam(':clavepg', $clavepago);
        $sentenciaInsercion->execute();

        // Si llegamos aquí, la inserción fue exitosa
        $response['success'] = true;
    } catch (PDOException $e) {
        // Si hay una excepción, significa que la clave ya existe
        $response['success'] = false;
        $response['error'] = 'La clave de disciplina ya está registrada.';
    }

    // Devolver la respuesta como JSON al cliente
    echo json_encode($response);
}

//ejecutamos la funcion
agregaDisciplina($conexion,$nombreDis,$claveDis,$min,$max,$clavepago);

?>
