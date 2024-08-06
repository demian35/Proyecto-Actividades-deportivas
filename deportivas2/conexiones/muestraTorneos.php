<?php
include("../conexiones/conexionBD.php");

function muestraTorneos($conexion){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['tipo']) && !empty($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
    
            switch ($tipo) {
                case 'torneos':
                    // Consulta SQL para obtener los torneos disponibles
                    $consultaTorneos = $conexion->query("SELECT td.idTorneo, t.nomTorneo as nombreTorneo FROM torneos_disciplinas td
                                                        JOIN ct_torneos t ON td.idTorneo = t.idTorneo");
                    $torneos = $consultaTorneos->fetchAll(PDO::FETCH_ASSOC);
    
                    // Devuelve las opciones como JSON
                    echo json_encode($torneos);
                    break;
    
                // Agrega más casos según sea necesario para otras opciones
            }
        } else {
            echo json_encode(['error' => 'Tipo no especificado']);
        }
    } else {
        echo json_encode(['error' => 'Método de solicitud incorrecto']);
    }
}
muestraTorneos($conexion);

?>
