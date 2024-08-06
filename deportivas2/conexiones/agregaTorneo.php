<?php  
include("../conexiones/conexionBD.php");

//recepcion de los datos para el form 
$IDtorneo=(isset($_POST['IDtorneo'])) ? $_POST['IDtorneo'] : ""; //recibimos el ID del form si se recibe un id entonces lo guardamos en IDtorneo=$_POST['IDtorneo'] caso contrario nada
$nombre=(isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$eslogan=(isset($_POST['eslogan'])) ? $_POST['eslogan'] : "";

//metodo para agregar al catalogo de torneos tabla ct_torneos
function agregaTorneo($conexion,$IDtorneo,$nombre,$eslogan){
    //sentencia para insertar
    $sentenciaInsercion = $conexion->prepare("INSERT INTO Mercurioz_deportivas.ct_torneos(idTorneo,nomTorneo, eslogan, vigencia, fechaAltaTor, fechaModTor) VALUES(NULL,:nombreTorneo, :eslogan, '1', NOW(), NULL);");
    $sentenciaInsercion->bindParam(':nombreTorneo', $nombre);//parametro del nombre a insertar a la base de datos
    $sentenciaInsercion->bindParam(':eslogan', $eslogan);//parametro del nombre a insertar a la base de datos
    $sentenciaInsercion->execute();

}

//ejecutamos la funcion
agregaTorneo($conexion,$IDtorneo,$nombre,$eslogan);


?>