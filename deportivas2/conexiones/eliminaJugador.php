<?php
include("../conexiones/conexionBD.php");

//funcion para eliminar un jugador de la tabla jugadores
function eliminaJugador($conexion){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['idJugador'])){
            $idJugador=$_POST['idJugador'];
            try{
                //sentencia para eliminar un jugador por su id
                $sentenciaDelete=$conexion->prepare("DELETE FROM jugadores WHERE idJugador=:idJugador");
                $sentenciaDelete->bindParam(':idJugador', $idJugador);//le pasamos el idJugador a eliminar
                $sentenciaDelete->execute();//ejecutamos la sentencia

                //mensaje de exito
                echo json_encode(['success'=> true,'message' => 'Jugador eliminado con exito']);
            }catch(PDOException $e){
                echo json_encode(['success' => false, 'message' => 'Error al eliminar jugador: ' . $e->getMessage()]);
            }catch(Exception $e){
                echo json_encode(['success' => false, 'message' => 'Error general: ' . $e->getMessage()]);
            }
        }else{
            echo "Id del torneo no proporcionado";
        }
    }else{
        echo "Acceso no permitido";
    }
}

//ejecutamos la funcion
eliminaJugador($conexion);

?>