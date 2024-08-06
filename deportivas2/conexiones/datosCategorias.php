<?php
//funcion para llenar los selects del form de crear evento con las categorias registradas en los catalogos
function obtenCategorias(){

    include("../conexiones/conexionBD.php");
    $idTorneo = (isset($_POST['torneos'])) ? $_POST['torneos'] : 0;
    $idDisciplina = (isset($_POST['disciplinas'])) ? $_POST['disciplinas'] : 0;
    $idPrueba = (isset($_POST['pruebas'])) ? $_POST['pruebas'] : 0;

    try {

        $consultaCategorias = $conexion->prepare("
    SELECT DISTINCT td.idCategoria, p.nomCategoria FROM torneos_disciplinas
    td JOIN ct_categorias p ON td.idCategoria=p.idCategoria
    WHERE td.idTorneo=:idTorneo AND td.idDisciplina= :idDisciplina
    AND td.idPrueba=:idPrueba
    ");

        $consultaCategorias->bindParam(':idTorneo', $idTorneo);
        $consultaCategorias->bindParam(':idDisciplina', $idDisciplina);
        $consultaCategorias->bindParam(':idPrueba', $idPrueba);
        //si se ejecuta la consulta entonces creamos el array de las categorias
        // Establece el tipo de contenido como JSON
        header('Content-Type: application/json');
        if ($consultaCategorias->execute()) {
            $categorias = array();

            //poblamos el arreglo con las categorias obtenidas
            while ($row = $consultaCategorias->fetch(PDO::FETCH_ASSOC)) {
                $categorias[] = array('idCategoria' => $row['idCategoria'], 'nomCategoria' => $row['nomCategoria']);
            }
            // Establece el tipo de contenido como JSON
            header('Content-Type: application/json');
            // Imprime el JSON resultante
            echo json_encode($categorias);
        } else {
            // Si hay un problema con la ejecución de la consulta, devuelve un mensaje de error
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Error en la ejecución de la consulta de categorías: ' . $consultaCategorias->errorInfo()));
        }
    } catch (PDOException $error) {
        // Si hay una excepción, devuelve un mensaje de error
        // Si hay una excepción, devuelve un mensaje de error
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Error en la consulta de categorías: ' . $error->getMessage()));
    } catch (Exception $e) {
        // Cualquier otra excepción
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Error no relacionado con la consulta: ' . $e->getMessage()));
    }
}
// Llama a la función obtenPruebas solo si se recibe una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    obtenCategorias();
} else {
    // Si no es una solicitud POST, devuelve un mensaje indicando que no se recibieron datos
    header('Content-Type: application/json');
    echo json_encode(array('mensaje' => 'No se recibieron datos en la solicitud.'));
}
