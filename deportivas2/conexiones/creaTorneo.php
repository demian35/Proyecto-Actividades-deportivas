<?php
include("../conexiones/conexionBD.php");

//funcion para crear torneos con los datos del catalogo
function creaTorneo($conexion){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el ID del torneo seleccionado
        $nomTorneo = $_POST["listaTorneos"];
        $nomDisciplina = $_POST["listaDisciplinas"];
        $nomPrueba = $_POST["listaPruebas"];
        $nomCategoria = $_POST["listaCategorias"];
    
        // Verificar si se encontraron los IDs
        if ($nomTorneo && $nomCategoria && $nomDisciplina && $nomPrueba) {
            // Obtener los demás datos del formulario
            $rama = $_POST["listaRamas"];
            $fechaInicioTorneo = $_POST["fechaIniciotorneo"];
            $fechaFinTorneo = $_POST["fechaFintorneo"];
            $fechaInicioInscripciones = $_POST["fechaInicioinscripciones"];
            $fechaFinInscripciones = $_POST["fechaFininscripciones"];
    
            try {
                $stmtInsert = $conexion->prepare("INSERT INTO Mercurioz_deportivas.torneos_disciplinas (idTorneo, idDisciplina, idPrueba, idCategoria, rama, fechaInicio, fechaFin, fechaInicioIns, fechaFinIns, fechaAltaTorDisc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    
                $stmtInsert->execute([$nomTorneo, $nomDisciplina, $nomPrueba, $nomCategoria, $rama, $fechaInicioTorneo, $fechaFinTorneo, $fechaInicioInscripciones, $fechaFinInscripciones]);
    
                // Verificar si se realizó la inserción correctamente
                if ($stmtInsert->rowCount() > 0) {
                    echo "Torneo creado exitosamente.";
                } else {
                    echo "Error al crear el torneo.";
                }
            } catch (PDOException $e) {
                echo "Error en la inserción de datos: " . $e->getMessage();
            }
        } else {
            echo "No se encontraron las disciplinas, pruebas o categorías seleccionadas.";
    
            echo "Nombre del torneo: " . $nomTorneo . "<br>";
            echo "Nombre de la disciplina: " . $nomDisciplina . "<br>";
            echo "Nombre de la prueba: " . $nomPrueba . "<br>";
            echo "Nombre de la categoría: " . $nomCategoria . "<br>";
        }
    }
}

//ejecutamos el metodo
creaTorneo($conexion);


?>
