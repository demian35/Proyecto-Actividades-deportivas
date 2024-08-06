<?php
include("../conexiones/conexionBD.php");

// Función para mostrar registros de la tabla ct_torneos
function mostrarTorneos($conexion){
    try {
        // Consulta para mostrar los torneos registrados en ct_torneos
        $consultaTorneos = "SELECT idTorneo, nomTorneo, eslogan, vigencia FROM ct_torneos";
        
        // Preparar y ejecutar la consulta
        $stmt = $conexion->prepare($consultaTorneos);
        $stmt->execute();
        
        // Mostrar los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        return false;
    }
}

// Llamar a la función mostrarTorneos con la conexión establecida
$datosTorneos = mostrarTorneos($conexion);


//funcion para mostrar los registros de ct_disciplinas
function muestractDisciplinas($conexion){
    try{
        //consulta para traer las disciplinas
        $consultaDisciplinas="SELECT idDisciplina,nomDisciplina,numMaxJugador,numMinJugador,cve_concepto_pago FROM ct_disciplinas";
        $stmt=$conexion->prepare($consultaDisciplinas);
        $stmt->execute();
        //mostramos los resultados
        $resultados=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }catch (PDOException $e){
        echo "error de conexion".$e->getMessage();
        return false;
    }
}
//imprimimos las disciplinas
$datosDisciplinas= muestractDisciplinas($conexion);

//funcion para mostrar los registros de la tabla ct_Categorias
function muestractCategorias($conexion){
    try{
        //consulta para traer las categorias;
        $consultaCategorias="SELECT idCategoria,nomCategoria FROM ct_categorias";
        $stmt=$conexion->prepare($consultaCategorias);
        $stmt->execute();
        //mostramos los resultados
        $resultados=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }catch(PDOException $e){
        echo "Error de conexion". $e->getMessage();
        return false;
    }
}
//imprimimos las categorias
$datosCategorias= muestractCategorias($conexion);

//funcion para mostrar los registros de la tabla ct_Pruebas
function muestractPruebas($conexion){
    try{
        //consulta para traer las pruebas
        $consultaPruebas="SELECT idPrueba,nomPrueba FROM ct_pruebas";
        $stmt=$conexion->prepare($consultaPruebas);
        $stmt->execute();
        //mostramos los resultados
        $resultados=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }catch(PDOException $e){
        echo "Error de conexion". $e->getMessage();
        return false;
    }
}


//imprimimos las pruebas
$datosPruebas= muestractPruebas($conexion);

?>