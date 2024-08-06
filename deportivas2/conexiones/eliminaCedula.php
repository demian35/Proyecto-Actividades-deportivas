<?php
include("../conexiones/conexionBD.php");

//funcion para eliminar de la tabla inscripciones 
function eliminaCedula($conexion){
    try{
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idInscripcion'])){
            $idInscripcion=$_POST['idInscripcion'];

            //sentencia para eliminar en la tabla inscripciones
            $stmtDelcedula=$conexion->prepare("DELETE FROM inscripciones where idInscripcion= :idInscripcion");
            $stmtDelcedula->bindParam(':idInscripcion',$idInscripcion);
            $stmtDelcedula->execute();
            // Puedes devolver una respuesta JSON con un mensaje de éxito
            echo json_encode(['success' => true, 'message' => 'Cedula eliminada correctamente']);
        }else{
            // Devuelve un mensaje de error si no se recibe el ID del registro
            echo json_encode(['success' => false, 'message' => 'Error: ID de registro no recibido']);
        }
    }catch(PDOException $e){
        if ($e->errorInfo[1] === 1451) {
            echo json_encode(['success' => false, 'message' => 'Error al elimiinar la cédula: La cédula tiene jugadores inscritos']);
        } else {
            // Si es otra excepción, muestra el mensaje original
            echo json_encode(['success' => false, 'message' => 'Error al eliminar la cédula: ' . $e->getMessage()]);
        }
    }catch(Exception $err){
        echo json_encode(['success' => false, 'message' => 'Error: ' . $err->getMessage()]);
    }    
}

//ejecutamos la funcion
eliminaCedula($conexion);



?>