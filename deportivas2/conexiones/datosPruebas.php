<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//funcion para llenar los selects del form de crear evento con las pruebas registradas en los catalogos
function obtenPruebas(){

    include("../conexiones/conexionBD.php");

    $idTorneo = (isset($_POST['torneos'])) ? $_POST['torneos'] : 0;
    $idDisciplina = (isset($_POST['disciplinas'])) ? $_POST['disciplinas'] : 0;

    try {
        $consultaPruebas = $conexion->prepare("
            SELECT DISTINCT td.idPrueba, p.nomPrueba 
            FROM torneos_disciplinas td
            JOIN ct_pruebas p ON td.idPrueba = p.idPrueba
            WHERE td.idTorneo = :idTorneo AND td.idDisciplina = :idDisciplina
        ");

        $consultaPruebas->bindParam(':idTorneo', $idTorneo);
        $consultaPruebas->bindParam(':idDisciplina', $idDisciplina);

        // si se ejecuta la consulta creamos el array para las pruebas
        if ($consultaPruebas->execute()) {
            $pruebas = array();

            // Obtiene las pruebas y las almacena en el arreglo
            while ($row = $consultaPruebas->fetch(PDO::FETCH_ASSOC)) {
                $pruebas[] = array('idPrueba' => $row['idPrueba'], 'nomPrueba' => $row['nomPrueba']);
            }

            // Establece el tipo de contenido como JSON
            header('Content-Type: application/json');

            // Imprime el JSON resultante
            echo json_encode($pruebas);
        } else {
            // Si hay un problema con la ejecución de la consulta, devuelve un mensaje de error
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Error en la ejecución de la consulta de pruebas: ' . $consultaPruebas->errorInfo()));
        }
    } catch (PDOException $e) {
        // Si hay una excepción, devuelve un mensaje de error
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Error en la consulta de pruebas: ' . $e->getMessage()));
    }
}

// Llama a la función obtenPruebas solo si se recibe una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    obtenPruebas();
} else {
    // Si no es una solicitud POST, devuelve un mensaje indicando que no se recibieron datos
    header('Content-Type: application/json');
    echo json_encode(array('mensaje' => 'No se recibieron datos en la solicitud.'));
}
?>
