<?php 
include("../conexiones/conexionBD.php");

function mostrarCedulas($conexion){
    try {
        //consulta para mostrar las cedulas de inscripcion registradas
        //extraemos los nombres de los torneos , disciplinas , categorias y ramas con un join a partor del idTorneoDisciplina
        $consultaCedulas="SELECT i.*, td.idTorneo, td.idDisciplina, td.idCategoria, td.idPrueba, td.rama,
        t.nomTorneo, d.nomDisciplina, c.nomCategoria, p.nomPrueba
        FROM inscripciones i
        INNER JOIN torneos_disciplinas td ON i.idTorneoDisciplina = td.idTorneoDisciplina
        LEFT JOIN ct_torneos t ON td.idTorneo = t.idTorneo
        LEFT JOIN ct_disciplinas d ON td.idDisciplina = d.idDisciplina
        LEFT JOIN ct_pruebas p ON td.idPrueba = p.idPrueba
        LEFT JOIN ct_categorias c ON td.idCategoria = c.idCategoria";
        $stmt=$conexion->prepare($consultaCedulas);
        $stmt->execute();
        $inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $inscripciones;
    } catch (PDOException $e) {
        // Imprimir el mensaje de error detallado
        echo "Error con la conexión: " . $e->getMessage();
        return false;
    } catch(Exception $e){
        echo "Error General" . $e->getMessage();
        return false;
    }
}
$datosCedulas=mostrarCedulas($conexion);