<?php
include("../conexiones/conexionBD.php");

//funcion para borrar una prueba de la tabla ct_pruebas
function deletePrueba($conexion){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['idPrueba'])){
            //obtenemos el id de la prueba que queremos eliminar
            $idPrueba=$_POST['idPrueba'];

            try{
                //sentencia para eliminar una prueba por su id
                $sentenciaDelete=$conexion->prepare("DELETE FROM ct_pruebas WHERE idPrueba=:idPrueba");
                $sentenciaDelete->bindParam(':idPrueba', $idPrueba);//le pasamos el id que queremos eliminar
                $sentenciaDelete->execute();//ejecutamos la sentencia

                //mensaje de exito
                echo json_encode(['success'=> true,'message' => 'Prueba eliminada con exito' ]);
            }catch(PDOException $e){
                if ($e->errorInfo[1] === 1451) {
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar la prueba: La prueba está vinculada a un evento']);
                } else {
                    // Si es otra excepción, muestra el mensaje original
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar la prueba: ' . $e->getMessage()]);
                }
            }catch(Exception $e){
                echo json_encode(['success' => false, 'message' => 'Error general: ' . $e->getMessage()]);
            }
        }else{
            //si el idPrueba no esta en el post
            echo json_encode(['success' => false, 'message' => 'ID de la prueba no proporcionado']);
        }
    }else{
        //Manejamos solicitudes que no son POST
        echo json_encode(['success' => false, 'message' => 'Acceso no permitido']);
    }
}

//ejecutamos la funcion
deletePrueba($conexion);

?>