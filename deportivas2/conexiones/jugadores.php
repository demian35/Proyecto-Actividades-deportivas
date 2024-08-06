<?php
require("../conexiones/iniciarSesion.php");

try {
    // Obtener el idInscripcion de la sesión
    $idInscripcion = $_SESSION['usuario']['idInscripcion'];

    // Consulta para obtener los datos de la tabla jugadores
    $sqlJugadores = "SELECT idJugador, a_exp FROM jugadores WHERE idInscripcion = :idInscripcion";
    $stmtJugadores = $conexion->prepare($sqlJugadores);
    $stmtJugadores->bindParam(':idInscripcion', $idInscripcion, PDO::PARAM_INT);
    $stmtJugadores->execute();
    $jugadores = $stmtJugadores->fetchAll(PDO::FETCH_OBJ);

    // Crear un arreglo para almacenar los resultados combinados
    $jugadoresCombinados = [];

    // Obtener los nombres de los alumnos
    foreach ($jugadores as $jugador) {
        $a_exp = $jugador->a_exp;
        $sqlNames = "SELECT a_nom, a_pat, a_mat FROM unamsi.dbo.alumnos WHERE a_exp = :a_exp";
        $stmtNames = $conexion2->prepare($sqlNames);
        $stmtNames->bindParam(':a_exp', $a_exp, PDO::PARAM_STR);
        $stmtNames->execute();
        $nombreAlumno = $stmtNames->fetch(PDO::FETCH_OBJ);

        // Combinar los resultados de las dos consultas
        $jugadorCombinado = (object) [
            'idJugador' => $jugador->idJugador,
            'a_exp' => $jugador->a_exp,
            'nombre' => $nombreAlumno
        ];

        // Agregar el jugador combinado al arreglo de resultados combinados
        $jugadoresCombinados[] = $jugadorCombinado;
    }
    //var_dump($jugadorCombinado);
    $stmtestatus="SELECT estatusInscripcion FROM Mercurioz_deportivas.inscripciones WHERE estatusInscripcion=0 AND idInscripcion=:idInscripcion"; 
    $estatusInscripcion=$conexion->prepare($stmtestatus);
    $estatusInscripcion->bindParam(':idInscripcion',$idInscripcion);
    $estatusInscripcion->execute();
    
    
    if($estatus=$estatusInscripcion->fetch(PDO::FETCH_ASSOC)){
        $estatus=0;
    }else{
        $estatus=1;
    }
    

    // Ahora tienes los resultados combinados en $jugadoresCombinados
} catch (PDOException $e) {
    // Manejar errores de PDO
    echo "Error: " . $e->getMessage();
}

function cuentaParticipantes($conexion){
    $numParticipantes=$_SESSION['usuario']['num_participantes'];
    $idInscripcion = $_SESSION['usuario']['idInscripcion'];
    try {
        $stmtParticipantes = "SELECT COUNT(*) AS num_participantes FROM Mercurioz_deportivas.jugadores WHERE idInscripcion=:idInscripcion";
        $cupoParticipantes = $conexion->prepare($stmtParticipantes);
        $cupoParticipantes->bindParam(':idInscripcion', $idInscripcion);
        $cupoParticipantes->execute();

        // Devuelve el número de participantes inscritos
        $cupo=$cupoParticipantes->fetch(PDO::FETCH_ASSOC)['num_participantes'];
        return $cupo;
    } catch(PDOException $e) {
        // Manejar errores de PDO
        echo "Error: " . $e->getMessage();
        return -1; // Retorna un valor indicando un error
    }

}


?>