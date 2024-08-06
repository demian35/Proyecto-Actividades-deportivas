<?php
include("../conexiones/conexionBD.php");

try {
    // Verificar si la clave 'disciplinas' está presente en $_POST
    if (isset($_POST['disciplinas'])) {
        // Obtener el valor de la disciplina seleccionada desde la solicitud POST
        $disciplinaSeleccionada = $_POST['disciplinas'];

        // Realizar la consulta a la base de datos para obtener los límites
        $query = "
            SELECT d.numMinJugador, d.numMaxJugador
            FROM torneos_disciplinas td
            JOIN ct_disciplinas d ON td.idDisciplina = d.idDisciplina
            WHERE td.idDisciplina = :disciplina
        ";

        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':disciplina', $disciplinaSeleccionada);
        $stmt->execute();

        // Obtener los resultados
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Devolver los resultados como JSON
        echo json_encode($resultado);
    } else {
        // Manejar el caso en que 'disciplinas' no está definido en $_POST
        http_response_code(400);  // Código de respuesta HTTP 400 (Bad Request)
        echo json_encode(['error' => 'La clave "disciplinas" no está definida en la solicitud.']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
