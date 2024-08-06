<?php
include("../conexiones/conexionBD.php");

$nombreCategoria=(isset($_POST['nombreCategoria'])) ? $_POST['nombreCategoria'] : "";

//funcion que realiza el registro de la categoria en la tabla ct_categoria 
function agregaCategoria($conexion,$nombreCategoria){
     // Respuesta que enviaremos al cliente
     $response = array();
     try{
     $sentenciaInsercion = $conexion->prepare("INSERT INTO Mercurioz_deportivas.ct_categorias (idCategoria,nomCategoria,fechaAltaCaT,fechaModCat) VALUES
     (NULL,:nombreCat,NOW(),NULL);");
     $sentenciaInsercion->bindParam(':nombreCat', $nombreCategoria);//parametro del nombre a insertar a la base de datos
     $sentenciaInsercion->execute();
     
          // Si llegamos aquí, la inserción fue exitosa
          $response['success'] = true;
     }catch(PDOException $e){
          // Si hay una excepción, significa que hubo un error en la inserción
          $response['success'] = false;
          $response['error'] = 'Error al insertar la categoría.';

     }

     // Devolver la respuesta como JSON al cliente
     echo json_encode($response);
}
//ejecutamos la funcion
agregaCategoria($conexion,$nombreCategoria);

?>