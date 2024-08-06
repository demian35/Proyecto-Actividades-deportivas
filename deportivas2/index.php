<?php include("../templates/headerUser.php"); ?>
<?php include("../templates/sidebarUser.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container-xl">
                        <h1 style=" text-align: left; direction: ltr;"> Bienvenido
                            <?php  echo $_SESSION['plantel']['ptl_nombre']; ?> (<?=$_SESSION['usuario']['ptl_ptl']?>)
                        </h1>
                    </div>

                    <div class="container-xl">
                        <div class="card">
                            <div class="card-body">
                                Estos son sus datos registrados para la cédula de inscripción.
                                <br>
                                Para continuar con el registro de jugadores presione "Agregar Participantes"
                                Para salir solo presione "Salir"
                            </div>
                        </div>
                    </div>

                    <div class="container-xl">
                        <div class="card bg-white-subtle  w-100 w-md-75">
                            <div class="card-header">
                                <h1>Datos de inscripción</h1>
                            </div>
                            <ul class="list-group list-group-flush">
                                <div id="datosInscripcion">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" id="idInscripcion">Número de cédula:
                                            <?php echo $_SESSION['usuario']['idInscripcion']; ?>
                                        </li>
                                        <li class="list-group-item" id="nombreEscuela">Nombre de la escuela:
                                            <?php echo $_SESSION['plantel']['ptl_nombre']; ?>
                                        </li>
                                        <li class="list-group-item" id="claveIncorporacion">Clave de incorporación:
                                            <?php echo $_SESSION['usuario']['ptl_ptl']; ?>
                                        </li>
                                        <li class="list-group-item" id="numFolio">Número de folio:
                                            <?php echo $_SESSION['usuario']['idFolioPago']; ?>
                                        </li>
                                        </li>
                                        <li class="list-group-item" id="torneoSeleccionado">Torneo:
                                            <?php echo $_SESSION['usuario']["nomTorneo"]; ?>
                                        </li>
                                        <li class="list-group-item">Disciplina:
                                            <?php echo $_SESSION['usuario']["nomDisciplina"]; ?>
                                        </li>
                                        <li class="list-group-item">Categoría:
                                            <?php echo $_SESSION['usuario']["nomCategoria"]; ?>
                                        </li>
                                        <li class="list-group-item">Prueba:
                                            <?php echo $_SESSION['usuario']["nomPrueba"]; ?>
                                        </li>

                                        <li class="list-group-item">Rama:
                                            <?php echo $_SESSION['usuario']["rama"]; ?>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    Para iniciar con el registro de participantes pase a la siguiente página
                                    <a class="btn btn-primary" href="../Admin/gestionJugadores.php"
                                        role="button">Agregar participantes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    Para salir del registro solo presione aqui
                                    <a class="btn btn-danger" href="../Registro/nuevoRegistro.php"
                                        role="button">Salir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include("../templates/footeruser.php"); ?>