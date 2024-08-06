<?php include("../templates/header.php"); ?>
<link rel="stylesheet" href="../DataTables/datatables.min.css">
<?php include("../templates/sidebar.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php include("../conexiones/vercatalogos.php") ?>

                    <div id="formularioTorneo" class="formulario">
                        <h1>Catálogo de torneos</h1>
                        <!-- Button trigger modal crea torneo-->
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#agregarTorneoModal">
                                <i class="fa-solid fa-plus"></i> Agregar torneo
                            </button>
                        </div>

                        <?php if ($datosTorneos !== false) { ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableTorneos">
                                <thead>
                                    <tr class="table-primary">
                                        <th>ID</th>
                                        <th>Nombre del torneo</th>
                                        <th>Eslogan</th>
                                        <th>vigencia</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datosTorneos as $fila) : ?>
                                    <tr>
                                        <td><?php echo $fila['idTorneo']; ?></td>
                                        <td><?php echo $fila['nomTorneo']; ?></td>
                                        <td><?php echo $fila['eslogan']; ?></td>
                                        <td><?php echo $fila['vigencia']; ?></td>
                                        <td class="d-flex">
                                            <button type="button"
                                                class="btn btn-warning custom-spacing-between-buttons btn-editar"
                                                data-bs-toggle="modal" data-torneo='<?php echo json_encode($fila); ?>'
                                                data-bs-target="#modalEditaTorneo">
                                                <i class="fa-solid fa-pen-to-square"></i> Editar
                                            </button>
                                            <!-- Button trigger modal -->
                                            <button type="button"
                                                class="btn btn-info custom-spacing-between-buttons readTorneo"
                                                data-bs-toggle="modal" data-torneo='<?php echo json_encode($fila); ?>'
                                                data-bs-target="#consultaTorneoModal">
                                                <i class="fa-solid fa-clipboard-question"></i> Consultar
                                            </button>
                                            <button type="button" class="btn btn-danger deleteTorneo"
                                                data-torneo='<?php echo json_encode($fila); ?>' data-backdrop="static"
                                                data-keyboard="false"><i class="fa-solid fa-trash"></i>
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href="../adminTorneo/inicio.php" role="button">Regresar a inicio</a>
                            <?php } ?>
                        </div>
                        





                        <div class="modal fade" id="agregarTorneoModal" tabindex="-1"
                            aria-labelledby="agregarTorneoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="agregarTorneoModalLabel">Agregar Torneo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" enctype="multipart/form-data" method="post">
                                            <!-- Nombre del torneo -->
                                            <div class="form-group">
                                                <label for="nombre">Nombre del torneo:</label>
                                                <input required class="form-control" type="text" name="nombre"
                                                    id="nombre" style="width: 100%;" value="" maxlength="30">
                                            </div>
                                            <br>
                                            <!-- Eslogan del torneo -->
                                            <div class="form-group">
                                                <label for="eslogan">Eslogan del torneo:</label>
                                                <input required class="form-control" type="text" name="eslogan"
                                                    id="eslogan" style="width: 100%;" maxlength="50">
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" id="guardarButton">Guardar
                                            Torneo</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modalEditaTorneo" tabindex="-1"
                            aria-labelledby="modalEditaTorneoLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalEditaTorneoLabel">Editar torneo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" enctype="multipart/form-data" method="post">
                                            <!-- Nombre del torneo -->
                                            <div class="form-group">
                                                <label for="newNombre">Nombre del torneo:</label>
                                                <input required class="form-control" type="text" name="newNombre"
                                                    id="newNombre" style="width: 100%;"  maxlength="30">
                                            </div>
                                            <br>
                                            <!-- Eslogan del torneo -->
                                            <div class="form-group">
                                                <label for="newEslogan">Eslogan del torneo:</label>
                                                <input required class="form-control" type="text" name="newEslogan"
                                                    id="newEslogan" style="width: 100%;" maxlength="50">
                                            </div>

                                            <!-- Vigencia del torneo -->
                                            <div class="form-group">
                                                <label for="newVigencia">Vigencia del torneo (0 o 1):</label>
                                                <input required class="form-control" type="number" name="newVigencia"
                                                    id="newVigencia" min="0" max="1" style="width: 100%;">
                                            </div>

                                            <br>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button class="btn btn-success" type="submit"
                                            id="editactTorneoButton">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal consulta torneos -->
                        <div class="modal fade" id="consultaTorneoModal" tabindex="-1"
                            aria-labelledby="consultaTorneoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="consultaTorneoModalLabel">Torneo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Campos para mostrar los detalles del torneo -->
                                        <div id="detalleTorneoID"></div>
                                        <div id="detalleTorneoNombre"></div>
                                        <div id="detalleTorneoEslogan"></div>
                                        <div id="detalleTorneoVigencia"></div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
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
    </div>
    <?php include("../templates/footer.php"); ?>
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../DataTables/language_es.js"></script>
    <script src="../ajax/torneo.js"></script>