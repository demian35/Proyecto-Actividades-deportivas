<?php
include("../conexiones/conexionBD.php");
function deleteDisciplina($conexion){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['idDisciplina'])){
            //obtenemos el id de la diciplina a eliminar
            $idDisciplina=$_POST['idDisciplina'];
            try{
                //sentencia para eliminar por el id
                $sentenciaDelete=$conexion->prepare("DELETE FROM ct_disciplinas WHERE idDisciplina=:idDisciplina");
                $sentenciaDelete->bindParam(':idDisciplina',$idDisciplina);//le pasamos el id de la disciplina
                $sentenciaDelete->execute();//ejecutamos la sentencia

                //mensaje de exito
                echo json_encode(['success'=> true,'message' => 'Disciplina eliminada con exito' ]);
            }catch(PDOException $e){
                //cachamos los errores
                if ($e->errorInfo[1] === 1451) {
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar la disciplina: La disciplina está vinculada a un evento']);
                } else {
                    // Si es otra excepción, muestra el mensaje original
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar la disciplina: ' . $e->getMessage()]);
                }
            }catch(Exception $e){
                echo json_encode(['success' => false, 'message' => 'Error general: ' . $e->getMessage()]);
            }
        }else{
            //si el idDisciplina no esta en el POST
            echo json_encode(['success' => false, 'message' => 'ID de la disciplina no proporcionado']);
        }
    }else{
        //Manejamos solicitudes que no son POST
        echo json_encode(['success' => false, 'message' => 'Acceso no permitido']);
    }
}


//ejecutamos la funcion
deleteDisciplina($conexion);


?>