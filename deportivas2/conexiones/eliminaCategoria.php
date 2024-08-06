<?php
include("../conexiones/conexionBD.php");

//funcion para borrar una categoria
function deleteCategoria($conexion){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['idCategoria'])){
            //obtenemos el id de la categoria
            $idCategoria=$_POST['idCategoria'];
            try {
                //sentencia para eliminar por el id
                $sentenciaDelete=$conexion->prepare("DELETE FROM ct_categorias WHERE idCategoria=:idCategoria");
                $sentenciaDelete->bindParam(':idCategoria',$idCategoria);
                $sentenciaDelete->execute();//ejecutamos la sentencia

                //mensaje de exito
                echo json_encode(['success'=> true,'message' => 'Categoría eliminada con exito']);
            } catch (PDOException $e) {
                if ($e->errorInfo[1] === 1451) {
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar la categoría: La categoría está vinculada a un evento']);
                } else {
                    // Si es otra excepción, muestra el mensaje original
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar la categoría ' . $e->getMessage()]);
                }
            }catch(Exception $e){
                echo json_encode(['success' => false, 'message' => 'Error general: ' . $e->getMessage()]);
            }
        }else{
            //si el idCategoria no esta en el POST
            echo json_encode(['success' => false, 'message' => 'ID de la categoría no proporcionado']);
        }
    }else{
        //Manejamos solicitudes que no son POST
        echo json_encode(['success' => false, 'message' => 'Acceso no permitido']);
    }
}

//ejecutamos la funcion
deleteCategoria($conexion);

?>