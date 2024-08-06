<?php
//script para obtener las cedulas de una disciplina en especifico
include("../conexiones/conexionBD.php");
if(isset($_GET['disciplina'])){
    $disciplinaSeleccionada=$_GET['disciplina'];
    //realizamos la consulta para obtener la información de la tabla 

    $consultaCedulas=$conexion->prepare("SELECT COUNT(*) AS totalCedulas, ct_disciplinas.nomDisciplina 
                                         FROM inscripciones  
                                         INNER JOIN torneos_disciplinas ON inscripciones.idTorneoDisciplina = torneos_disciplinas.idTorneoDisciplina
                                         INNER JOIN ct_disciplinas ON torneos_disciplinas.idDisciplina = ct_disciplinas.idDisciplina
                                         WHERE ct_disciplinas.idDisciplina = :disciplina");
    $consultaCedulas->bindParam(':disciplina', $disciplinaSeleccionada, PDO::PARAM_INT);
    $consultaCedulas->execute();
    $resultado = $consultaCedulas->fetch(PDO::FETCH_ASSOC);

    if (!empty($resultado)) {
        $totalCedulas = $resultado['totalCedulas'];
        $nomDisciplina = $resultado['nomDisciplina'];

        echo "<table class='table table-bordered'>
                <thead>
                    <tr class='table-primary'>
                        <th>Nombre Disciplina</th>
                        <th>Numero de Equipos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$nomDisciplina}</td>
                        <td>{$totalCedulas}</td>
                    </tr>
                </tbody>
              </table>";
    } else {
        echo "<p>No hay cédulas para la disciplina seleccionada.</p>";
    }
} else {
    echo "Error: No se proporcionó una disciplina válida.";
}
?>
