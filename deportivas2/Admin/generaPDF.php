<?php
require_once("../vendor/TCPDF-main/tcpdf.php");
require_once("../conexiones/jugadores.php");
session_start();

$numParticipantes=cuentaParticipantes($conexion);



// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: ../login/login.php");
    // Redirigir también a la página de registro y finalizar la sesión
    header("Location: ../Registro/nuevoRegistro.php");
    session_destroy(); // Finalizar la sesión
    exit(); // Detener la ejecución del script después de la redirección
}



//funcion para generar la cedula de inscripcion en pdf
function generaPDF($jugadoresCombinados){
    // Crear una nueva instancia de TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $border = 0;
    $xHead = 10;
    $pdf->SetY(7);
    $pdf->SetX($xHead);
    $pdf->setFont('helvetica', '', 8.8);
    $pdf->AddPage('L', 'LETTER', 90);

     /* CABECERA */
    
    $pdf->Ln(5);
    $pdf->Image('../img/unam.png', 10, 15, 14, 14);
    $pdf->Image('../img/dgire.png', 255, 15, 10.5, 10.5);
    $cad = 'U N I V E R S I D A D  N A C I O N A L  A U T Ó N O M A  D E  M É X I C O';
    $pdf->Cell(0, 0, $cad, $border, 1, 'C', 0, '', 0);
    $cad = 'DIRECCIÓN GENERAL DE INCORPORACIÓN Y REVALIDACIÓN DE ESTUDIOS';
    $pdf->Cell(0, 0, $cad, $border, 1, 'C', 0, '', 0);
    $cad=$_SESSION['usuario']["nomTorneo"];
    $pdf->Cell(0, 0, $cad, $border, 1, 'C', 0, '', 0);
    $cad='No. de cédula: ' .  $_SESSION['usuario']['idInscripcion'];
    $pdf->Cell(0, 0, $cad, $border, 1, 'C', 0, '', 0);
    $pdf->Ln();
    


        //cuerpo del pdf
        /* Datos personales */
    $pdf->SetFont('helvetica', '', 10);

    $datos='Entrenador: ' . $_SESSION['usuario']["nomEntrenador"]. ' ' .  $_SESSION['usuario']["primerApellido"] . ' ' . $_SESSION['usuario']["segundoApellido"]."\n".
            'Disciplina: ' . $_SESSION['usuario']["nomDisciplina"] . "\n" .
            'Categoría: ' . $_SESSION['usuario']["nomCategoria"] . "\n" .
            'Prueba: ' . $_SESSION['usuario']["nomPrueba"] . "\n".
            'Rama: ' . $_SESSION['usuario']["rama"];
    
    // Calcular la posición Y del primer MultiCell        
    $posicionY = $pdf->GetY();

    // Imprimir todos los datos en un solo Cell
    $pdf->MultiCell(0, 10, $datos, 0,'L', false, 1);
    // Establecer la posición Y del segundo MultiCell
    $pdf->SetY($posicionY);
    $fechaActual = date("d/m/Y H:i:s");

    // Definir los datos para el segundo MultiCell
    $datos2 = 'Fecha de registro: '. $fechaActual ."\n".
                'Escuela: ' .$_SESSION['plantel']['ptl_nombre']."\n".
                'Clave de incorporación: '. $_SESSION['usuario']['ptl_ptl'] ."\n".
                'Propone instalaciones para sede: '. $_SESSION['usuario']['sede'] ."\n".
                'Folio de pago: '.$_SESSION['usuario']['idFolioPago'];

    // Imprimir el segundo MultiCell
    $pdf->MultiCell(0, 10, $datos2, 0, 'R', false, 1);

    // Luego de imprimir los multicells, obtén la posición Y actual
    $posicionY = $pdf->GetY();

   
  
    $content = '
    <h1 style="text-align:center;">Jugadores</h1><br>'; // Agrega un salto de línea después del título
    
    $content .= '<table style="border-collapse: collapse; width: 100%;"><tbody>';
    
    $content .= '<tr>'; // Iniciar una fila
    
    foreach ($jugadoresCombinados as $fila) {
        $content .= '
        <td style="border: 1px solid black; padding: 8px;">
            ' . $fila->nombre->a_nom . ' ' . $fila->nombre->a_pat . ' ' . $fila->nombre->a_mat . '<br>' . 
            $fila->a_exp . '<br>' . 
            'C.R[' . ' ' . '] N.O[' . $fila->idJugador . ']
        </td>';
    }
    
    $content .= '</tr>'; // Cerrar la fila
    
    $content .= '</tbody></table>';
    
    // Agregar el contenido HTML al PDF
    $pdf->writeHTML($content, true, false, true, false, '');
    
    /* PIE */
    // Obtener el ancho de la página y los márgenes
    $pdf->SetY(-35); // Establecer la posición Y al final del PDF
    $pdf->SetFont('helvetica', '', 7.4);

    $pageWidth = $pdf->getPageWidth();
    $margins = $pdf->getMargins();
    $marginLeft = $margins['left'];
    $marginRight = $margins['right'];

    // Calcular el ancho disponible para la celda
    $availableWidth = $pageWidth - $marginLeft - $marginRight;

    // Calcular el punto medio del ancho disponible
    $middlePoint = $marginLeft + ($availableWidth / 2);

    // Calcular la longitud deseada para cada lado
    $lineLength = $availableWidth * 0.4; // Por ejemplo, el 40% del ancho disponible

    // Calcular los puntos de inicio y fin de la línea
    $startX = $middlePoint - ($lineLength / 2);
    $endX = $middlePoint + ($lineLength / 2);

    // Dibujar una línea divisoria
    $pdf->Line($startX, $pdf->GetY(), $endX, $pdf->GetY());

    // Mover a la posición X adecuada para centrar el texto
    $pdf->SetX($marginLeft);

    // Calcular el espacio vertical necesario para la firma
    $verticalSpace = 10; // Puedes ajustar este valor según sea necesario

    // Definir el contenido HTML para el espacio de la firma
    $firmaContent = 'Nombre, firma y sello de la dirección técnica del plantel';

    // Calcular el ancho y la altura del espacio para la firma
    $cellWidth = $availableWidth;
    $cellHeight = $verticalSpace;

    // Agregar el espacio para la firma usando MultiCell
    $pdf->MultiCell($cellWidth, $cellHeight, $firmaContent, 0, 'C', false, 0, '', '', true);

    

    // Mostrar el PDF en el navegador
    $pdf->Output('CedulaInscripcion.pdf', 'I');

    

}



function modificaEstatus($conexion) {
    $numParticipantes = $_SESSION["usuario"]["num_participantes"];
    $idInscripcion = $_SESSION['usuario']['idInscripcion'];
    
    try {
        // Verificar si el número de participantes es igual al almacenado en la sesión
        if ($numParticipantes === $_SESSION['usuario']["num_participantes"]) {
            // Actualizar el estatus de la inscripción en la base de datos
            $stmtestatusUpdate = "UPDATE Mercurioz_deportivas.inscripciones SET estatusInscripcion = 1 WHERE idInscripcion = :idInscripcion"; 
            $updateEstatusInscripcion = $conexion->prepare($stmtestatusUpdate);
            $updateEstatusInscripcion->bindParam(':idInscripcion', $_SESSION['usuario']['idInscripcion']);
            $updateEstatusInscripcion->execute(); 
        }
    } catch (PDOException $e) {
        // Manejar errores de PDO
        echo "Error: " . $e->getMessage();    
    }
}
//si el numero de jugadores es menor al numero requerido mandamos la alerta Faltan Participantes por registrar
if($numParticipantes<$_SESSION['usuario']["num_participantes"]){
    echo "FALTAN PARTICIPANTES POR REGISTRAR";
}else{
    // Llamar a la función generaPDF con el arreglo de jugadores combinados si ya se registraron todos los jugadores requeridos
    generaPDF($jugadoresCombinados);
    modificaEstatus($conexion);
}


?>