<?php
include("../conexiones/conexionBD.php");

// Consulta SQL para obtener la lista de torneos
$muestraTorneos = $conexion->query("SELECT DISTINCT td.idTorneo, t.nomTorneo 
FROM torneos_disciplinas td
JOIN ct_torneos t ON td.idTorneo = t.idTorneo WHERE t.vigencia = 1");

// Formatear los resultados como opciones de select
//$torneos = '<option value="0">Elige una opción</option>';
while ($row = $muestraTorneos->fetch(PDO::FETCH_ASSOC)) {
    $torneos .= '<option value="' . $row['idTorneo'] . '">' . $row['nomTorneo'] . '</option>';
}

?>