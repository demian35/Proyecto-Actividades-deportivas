<?php
include("../conexiones/conexionBD.php");

$nombrePrueba=(isset($_POST['nombrePrueba'])) ? $_POST['nombrePrueba'] : "";

//funcion para agregar pruebas a la tabla ct_pruebas
function agregaPrueba($conexion,$nombrePrueba){
    //respuesta que enviaremos al cliente
    $response=array();
    try{
        $sentenciaInsercion = $conexion->prepare("INSERT INTO Mercurioz_deportivas.ct_pruebas (idPrueba,nomPrueba,fechaAltaPrue,fechaModPrueba) VALUES(NULL,:nomPrueba,NOW(),NULL);");
        $sentenciaInsercion->bindParam(':nomPrueba', $nombrePrueba);//parametro del nombre a insertar a la base de datos
        $sentenciaInsercion->execute();

        $response['success'] = true;
    }catch(PDOException $e){
        //manejo de excepciones
        $response['success'] = false;
        $response['error'] = 'Error al insertar la categoría.';
    }
    // Devolver la respuesta como JSON al cliente
    echo json_encode($response);
}

//ejecutamos la operacion
agregaPrueba($conexion,$nombrePrueba);

?>