<?php
// Incluir el archivo de conexión a la base de datos
include("../conexiones/conexionBD.php");

//funcion para editar registros de la tabla ct_torneos
function editaTorneo($conexion){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si el índice 'idTorneo' está presente en $_POST
        if (isset($_POST['idTorneo'])) {
            // Obtener los datos del formulario
            $idTorneo = $_POST['idTorneo'];
            $nombre = $_POST['nombre'];
            $eslogan = $_POST['eslogan'];
            $vigencia = $_POST['vigencia'];
    
            try {
                $sentenciaActualizar = $conexion->prepare("UPDATE ct_torneos SET nomTorneo = :nombre, eslogan = :eslogan, vigencia = :vigencia , fechaModTor= NOW() WHERE idTorneo = :idTorneo");
                $sentenciaActualizar->bindParam(':idTorneo', $idTorneo);
                $sentenciaActualizar->bindParam(':nombre', $nombre);
                $sentenciaActualizar->bindParam(':eslogan', $eslogan);
                $sentenciaActualizar->bindParam(':vigencia', $vigencia);
                $sentenciaActualizar->execute();
                
                // mensaje de éxito
                echo json_encode(['success' => true, 'message' => 'Torneo actualizado correctamente']);
            } catch (PDOException $e) {
                // Manejar errores de la base de datos
                echo json_encode(['success' => false, 'message' => 'Error en la actualización del torneo: ' . $e->getMessage()]);
            }
        } else {
            // Si 'idTorneo' no está presente en $_POST
            echo "ID del torneo no proporcionado";
        }
    } else {
        // Manejar solicitudes que no son POST
        echo "Acceso no permitido";
    }

}
// Llamar a la función para editar el torneo
editaTorneo($conexion);

//funcion para editar registros de la tabla ct_disciplinas
function editaDisciplina($conexion){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //verificamos si existe el id
        if(isset($_POST['idDisciplina'])){
            //recuperamos los datos del formulario
            $idDisciplina=$_POST['idDisciplina'];
            $nomDisciplina=$_POST['nombreDis'];
            $minJugadores=$_POST['min'];
            $maxJugadores=$_POST['max'];
            $clavePago=$_POST['clavePago'];

            try{
                $sentenciaActualizar=$conexion->prepare("UPDATE ct_disciplinas SET nomDisciplina=:nomDisciplina,
                numMaxJugador=:numMaxJugador, numMinJugador=:numMinJugador,cve_concepto_pago=:cve_concepto_pago, fechaModDisc=NOW() WHERE idDisciplina= :idDisciplina");
                $sentenciaActualizar->bindParam(':idDisciplina',$idDisciplina);
                $sentenciaActualizar->bindParam(':nomDisciplina',$nomDisciplina);
                $sentenciaActualizar->bindParam(':numMaxJugador',$maxJugadores);
                $sentenciaActualizar->bindParam(':numMinJugador',$minJugadores);
                $sentenciaActualizar->bindParam(':cve_concepto_pago',$clavePago);
                $sentenciaActualizar->execute();
                // mensaje de éxito
                echo json_encode(['success' => true, 'message' => 'disciplina actualizada correctamente']);
            }catch(PDOException $e){
                echo json_encode(['success' => false, 'message' => 'Error en la actualización de la disciplina: ' . $e->getMessage()]);
            }
        }else{
            // Si 'idDisciplina' no está presente en $_POST
            echo "ID de la disciplina no proporcionado";
        }
    }else{
        http_response_code(403);
        
        echo "Acceso denegado"; 
    }
}

//llamamos a la funcion
editaDisciplina($conexion);



//funcion para editar registros de la tabla ct_categorias
function editaCategoria($conexion){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['idCategoria'])) {
            // Recibimos los datos del formulario
            $idCategoria = $_POST['idCategoria'];
            $nomCategoria = isset($_POST['nombreCategoria']) ? $_POST['nombreCategoria'] : null;

            try {
                $sentenciaActualizar = $conexion->prepare("UPDATE ct_categorias SET nomCategoria=:nomCategoria, fechaModCat=NOW() WHERE idCategoria=:idCategoria");
                $sentenciaActualizar->bindParam(':idCategoria', $idCategoria);
                $sentenciaActualizar->bindParam(':nomCategoria', $nomCategoria);
                $sentenciaActualizar->execute();

                // Mensaje de éxito 
                echo json_encode(['success' => true, 'message' => 'Categoria actualizada correctamente']);
            } catch (PDOException $e) {
                echo json_encode(['success' => false, 'message' => 'Error en la actualización de la categoría: ' . $e->getMessage()]);
            }
        } else {
             // Si 'idCategoria' no está presente en $_POST
             echo json_encode(['success' => false, 'message' => 'ID de la categoría no proporcionado']);
        }
    } else {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Acceso denegado']);
    }
}

// Llamamos a la función
editaCategoria($conexion);

//funcion para editar registros de la tabla ct_pruebas
function editaPrueba($conexion){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['idPrueba'])){
            //recibimos los datos del formulario 
            $idPrueba = isset($_POST['idPrueba']) ? $_POST['idPrueba'] : null;
            $nomPrueba = isset($_POST['nomPrueba']) ? $_POST['nomPrueba'] : null;


            try{
                $sentenciaActualizar=$conexion->prepare("UPDATE ct_pruebas SET nomPrueba=:nomPrueba , fechaModPrueba=NOW() WHERE idPrueba=:idPrueba");
                $sentenciaActualizar->bindParam(':idPrueba',$idPrueba);
                $sentenciaActualizar->bindParam(':nomPrueba',$nomPrueba);
                $sentenciaActualizar->execute();

                 // Mensaje de éxito 
                 echo json_encode(['success' => true, 'message' => 'Prueba actualizada correctamente']);
            }catch(PDOException $e){
                // Si 'idPrueba' no está presente en $_POST
             echo json_encode(['success' => false, 'message' => 'ID de la prueba no proporcionado'. $e->getMessage()]);
            }
            
        }else{
             // Si 'idPrueba' no está presente en $_POST
             echo json_encode(['success' => false, 'message' => 'ID de la prueba no proporcionado']);
        }
    }else{
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Acceso denegado']);
    }
}
//ejecutamos la funcion
editaPrueba($conexion);



?>