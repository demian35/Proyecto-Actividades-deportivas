<?php
// Incluir archivo de conexión a la base de datos
include("../conexiones/conexionPagos.php");

//funcion para  contar los numeros de folios registrados.
function cuentafolios($conexion){
    // Verificar si se ha recibido el número de folio desde la solicitud AJAX
    if(isset($_POST['numFolio'])){
        // Limpiar y asignar el número de folio recibido
        $numFolio = trim($_POST['numFolio']);

        try {
            // Preparar la consulta SQL para contar las ocurrencias del folio en la tabla inscripciones
            $sentenciaContarFolios = $conexion->prepare("SELECT COUNT(*) AS total_ocurrencias FROM Mercurioz_deportivas.inscripciones WHERE idFolioPago = :numFolio");
            $sentenciaContarFolios->bindParam(':numFolio', $numFolio, PDO::PARAM_STR);
            $sentenciaContarFolios->execute();

            // Obtener el resultado de la consulta
            $resultado = $sentenciaContarFolios->fetch(PDO::FETCH_ASSOC);

            // Devolver el resultado
            return $resultado['total_ocurrencias'];
        } catch (PDOException $e) {
            // Manejar errores de consulta
            echo "Error al contar las ocurrencias del folio: " . $e->getMessage();
            return false; // Devolver false en caso de error
        }
    } else {
        // No se recibió el número de folio
        echo "No se ha proporcionado un número de folio";
        return false; // Devolver false si no se proporciona el número de folio
    }
}

//funcion para validar que el folio de pago este vigente y en regla
function validaFolio($conexion){
    // Verificar si se ha recibido el número de folio desde la solicitud AJAX
    if(isset($_POST['numFolio'])) {
        // Limpiar y asignar el número de folio recibido
        $numFolio = trim($_POST['numFolio']);

        // Preparar la consulta SQL para buscar el número de folio en la tabla solicitud_pago
        $sentenciaBuscar = $conexion->prepare("SELECT folio_sol, cve_edo_pago FROM solicitud_pago WHERE folio_sol = :numFolio");
        $sentenciaBuscar->bindParam(':numFolio', $numFolio, PDO::PARAM_STR);
        $sentenciaBuscar->execute();

        // Verificar si se encontraron resultados en solicitud_pago
        if($sentenciaBuscar->rowCount() > 0) {
            // Verificar si el estado del pago es 'PFIN'
            $fila = $sentenciaBuscar->fetch(PDO::FETCH_ASSOC);
            if ($fila['cve_edo_pago'] === 'PFIN') {
                // Verificar si existe el folio_sol en det_sol_pagos con el id_concepto_pago específico
                $idConceptoPago = 345; // Id del concepto de pago requerido
                $sentenciaValidar = $conexion->prepare("SELECT folio_sol, id_concepto_pago , cant_requerida  FROM det_sol_pagos WHERE folio_sol = :numFolio AND id_concepto_pago = :idConceptoPago");
                $sentenciaValidar->bindParam(':numFolio', $numFolio, PDO::PARAM_STR);
                $sentenciaValidar->bindParam(':idConceptoPago', $idConceptoPago, PDO::PARAM_INT);
                $sentenciaValidar->execute();
                $resultadoValidacion = $sentenciaValidar->fetch(PDO::FETCH_ASSOC);
                
                // Verificar si se encontraron resultados en det_sol_pagos
                if ($resultadoValidacion) {
                    $cant_requerida = $resultadoValidacion['cant_requerida'];
                    $ocurrencias_folio = cuentafolios($conexion);
                    if($ocurrencias_folio < $cant_requerida){
                        echo "Folio Válido";
                    } else {
                        echo "El folio ya ha sido registrado las veces permitidas";
                    } 
                } else {
                    echo "Folio no válido: El folio no tiene el concepto de pago requerido";
                }
            } else {
                // Folio no válido (cve_edo_pago diferente a 'PFIN')
                echo "Folio no válido: El pago no ha sido finalizado";
            }
        } else {
            // Folio no encontrado en solicitud_pago
            echo "El folio no existe";
        }
    } else {
        // No se recibió el número de folio
        echo "No se ha proporcionado un número de folio";
    }
}


//ejecutamos la funcion
validaFolio($conexion)

?>
