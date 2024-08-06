<?php
header('Content-Type: application/json');

function obtenRamas(){

    include("../conexiones/conexionBD.php");
    $idTorneo = (isset($_POST['torneos'])) ? $_POST['torneos'] : 0;
    $idDisciplina = (isset($_POST['disciplinas'])) ? $_POST['disciplinas'] : 0;
    $idPrueba = (isset($_POST['pruebas'])) ? $_POST['pruebas'] : 0;
    $idCategoria = (isset($_POST['categorias'])) ? $_POST['categorias'] : 0;
    try {
        $consultaRamas = $conexion->prepare("SELECT rama FROM torneos_disciplinas WHERE
        idTorneo=:idTorneo AND idDisciplina=:idDisciplina AND idPrueba=:idPrueba AND idCategoria=:idCategoria");


        $consultaRamas->bindParam(':idTorneo', $idTorneo);
        $consultaRamas->bindParam(':idDisciplina', $idDisciplina);
        $consultaRamas->bindParam(':idPrueba', $idPrueba);
        $consultaRamas->bindParam(':idCategoria', $idCategoria);
        //si se ejecuta la consulta entonces creamos el array de las ramas
        if ($consultaRamas->execute()) {
            $ramas = array();
            //almacenamos las ramas en el arreglo 
            while ($row = $consultaRamas->fetch(PDO::FETCH_ASSOC)) {
                $ramas[] = array('rama' => $row['rama']);
            }

            // Establece el tipo de contenido como JSON
            header('Content-Type: application/json');
            // Imprime el JSON resultante
            echo json_encode($ramas);
            error_log(json_encode($ramas));
        } else {
            // Si hay un problema con la ejecución de la consulta, devuelve un mensaje de error
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Error en la ejecución de la consulta de ramas: ' . $consultaRamas->errorInfo()));
        }
    } catch (PDOException $error) {
        echo json_encode(array('error' => 'Error en la consulta de categorías: ' . $error->getMessage()));
    }
}
// Llama a la función obtenPruebas solo si se recibe una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    obtenRamas();
} else {
    // Si no es una solicitud POST, devuelve un mensaje indicando que no se recibieron datos
    header('Content-Type: application/json');
    echo json_encode(array('mensaje' => 'No se recibieron datos en la solicitud.'));
}
