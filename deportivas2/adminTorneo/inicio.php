<?php include("../templates/header.php"); ?>
<?php include("../templates/sidebar.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-light w-75">
                        <div class="card-body">
                            <h5 class="card-title">¡Bienvenido!</h5>
                            <p class="card-text">Navega por el sitio mediante las opciones de la barra lateral izquierda o mediante los enlaces que se
                                presentan a continuación
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Gestión de catálogos</h5>
                                    <p class="card-text">Gestione los catálogos disponibles.</p>
                                    <a href="../adminTorneo/torneo.php" class="btn btn-primary">Torneos</a>
                                    <a href="../adminTorneo/disciplina.php" class="btn btn-primary">Disciplinas</a>
                                    <a href="../adminTorneo/categoria.php" class="btn btn-primary">Ir a Categorías</a>
                                    <a href="../adminTorneo/prueba.php" class="btn btn-primary">Pruebas</a>
                                    <a href="../adminTorneo/eventos.php" class="btn btn-primary">Eventos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Consultar equipos</h5>
                                    <p class="card-text">Ver cuantos equipos hay por disciplina</p>
                                    <a href="../adminTorneo/equipos.php" class="btn btn-primary">Ver Equipos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Gestión de Cédulas</h5>
                                    <p class="card-text">Gestión de las cédulas de inscripción disponibles.</p>
                                    <a href="../adminTorneo/cedulas.php" class="btn btn-primary">Gestión de Cédulas</a>
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

    <?php include("../templates/footer.php"); ?>