<?php
include("../conexiones/conexionBD.php");

//consulta para obtener los torneos registrados SU ID Y EL NOMBRE DEL TORNEO
$consultatorneos=$conexion->prepare("SELECT idTorneo, nomTorneo FROM ct_torneos");
$consultatorneos->execute();
$torneos=$consultatorneos->fetchAll(PDO::FETCH_ASSOC);


//consulta para obtener los registros de las disciplinas registradas
$consultadisciplinas=$conexion->prepare("SELECT idDisciplina, nomDisciplina FROM ct_disciplinas");
$consultadisciplinas->execute();
$disciplinas=$consultadisciplinas->fetchAll(PDO::FETCH_ASSOC);


//consulta para obtener los registros de las pruebas registradas
$consultaPruebas=$conexion->prepare("SELECT idPrueba, nomPrueba FROM ct_pruebas");
$consultaPruebas->execute();
$pruebas=$consultaPruebas->fetchAll(PDO::FETCH_ASSOC);

//consulta para obtener los registros de las categorias registradas
$consultaCategorias=$conexion->prepare("SELECT idCategoria, nomCategoria FROM ct_categorias");
$consultaCategorias->execute();
$categorias=$consultaCategorias->fetchAll(PDO::FETCH_ASSOC);


?>