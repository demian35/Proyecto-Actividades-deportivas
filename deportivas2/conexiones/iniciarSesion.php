<?php
include("../conexiones/conexionBD.php");
include("../conexiones/conexionsybase.php");

// Iniciar sesión
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // Recibir los datos del formulario
    $noCedula = $_POST["noCedula"];
    $noFolioPago = $_POST["noFolioPago"];

    try {
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
            WHERE i.idInscripcion = :noCedula AND i.idFolioPago = :noFolioPago"; 



        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':noCedula', $noCedula, PDO::PARAM_STR);
        $stmt->bindParam(':noFolioPago', $noFolioPago, PDO::PARAM_STR);
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
            echo "success";
        } else {
            echo "Error: Credenciales incorrectas.";
        }
    } catch (PDOException $e) {
        // Imprimir el mensaje de error detallado
        echo "Error con la conexión: " . $e->getMessage();
    } catch(Exception $e) {
        echo "Error General" . $e->getMessage();
    }
}
?>
