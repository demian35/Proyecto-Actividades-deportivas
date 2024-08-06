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
                    <?php include("../conexiones/muestraCedulas.php"); ?>
                    <h1>Cédulas de inscripción </h1>
                    <?php if ($datosCedulas !== false) { ?>

                    <table class="table table-bordered" id="tableCedulas">
                        <thead>
                            <tr class="table-primary">
                                <th>Cédula inscripción</th>
                                <th>Status</th>
                                <th>Torneo</th>
                                <th>Disciplina</th>
                                <th>Prueba</th>
                                <th>Categoría</th>
                                <th>Rama</th>
                                <th>Número de participantes</th>
                                <th>Sede</th>
                                <th>Clave plantel</th>
                                <th>Folio de pago</th>
                                <th>Correo</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($datosCedulas as $fila) :?>
                            <tr>
                                <td><?php echo $fila['idInscripcion']; ?></td>
                                <td><?php echo $fila['estatusInscripcion']; ?></td>
                                <td><?php echo $fila['nomTorneo']; ?></td>
                                <td><?php echo $fila['nomDisciplina']; ?></td>
                                <td><?php echo $fila['nomPrueba']; ?></td>
                                <td><?php echo $fila['nomCategoria']; ?></td>
                                <td><?php echo $fila['rama']; ?></td>
                                <td><?php echo $fila['num_participantes']; ?></td>
                                <td><?php echo $fila['sede']; ?></td>
                                <td><?php echo $fila['ptl_ptl']; ?></td>
                                <td><?php echo $fila['idFolioPago']; ?></td>
                                <td><?php echo $fila['correoEntrenador']; ?></td>
                                <td>
                                    <div class="d-flex mt-2">
                                        <button type="button"
                                            class="btn btn-warning custom-spacing-between-buttons editaEstatus"
                                            data-bs-toggle="modal" data-cedula='<?php echo json_encode($fila); ?>'
                                            data-bs-target="#editaEstatusModal">
                                            <i class="fa-solid fa-pen-to-square"></i>Edita estatus
                                        </button>
                                        <button type="button"
                                            class="btn btn-info readCedula custom-spacing-between-buttons"
                                            data-cedula='<?php echo json_encode($fila); ?>' data-bs-toggle="modal"
                                            data-bs-target="#consultaCedulaModal">
                                            <i class="fa-solid fa-clipboard-question"></i> Consultar
                                        </button>
                                        <button type="button" class="btn btn-danger bajaCedula"
                                            data-cedula='<?php echo json_encode($fila); ?>' data-backdrop="static"
                                            data-keyboard="false">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="../adminTorneo/inicio.php" role="button">Regresar a inicio</a>
                    <?php } ?>


                    <!-- Modal -->
                    <div class="modal fade" id="consultaCedulaModal" tabindex="-1"
                        aria-labelledby="consultaCedulaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cédula</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Campos para mostrar los detalles de la cedula -->
                                    <div id="detallecedulaInscripcion"></div>
                                    <div id="detallestatus"></div>
                                    <div id="detalleTorneo"></div>
                                    <div id="detalleNombreDisciplina"></div>
                                    <div id="detalleNombrePrueba"></div>
                                    <div id="detalleNombreCategoria"></div>
                                    <div id="detalleRama"></div>
                                    <div id="detallenumParticipantes"></div>
                                    <div id="detalleSede"></div>
                                    <div id="detalleclavePlantel"></div>
                                    <div id="detallefolioPago"></div>
                                    <div id="detalleCorreo"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editaEstatusModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edita cédula</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="newEstatus">Estatus:</label>
                                            <input required class="form-control" type="text" name="newEstatus"
                                                id="newEstatus" style="width: 500px;" maxlength="1">
                                        </div>
                                        <br>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="editarButtonCedula">Guarda
                                        Cambios</button>
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
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../DataTables/language_es.js"></script>
    <script src="../ajax/cedulas.js"></script>
    <script src="../ajax/eliminaCedula.js"></script>
    <script src="../ajax/editaEstatus.js"></script>