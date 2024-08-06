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
                    <div id="formularioDisciplina" class="formulario">
                        <h1>Catálogo de Disciplinas</h1>
                        <!-- Button trigger modal -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#agregarDisciplinaModal">
                                <i class="fa-solid fa-plus"></i> Agrega Disciplina
                            </button>
                        </div>
                        <?php if ($datosDisciplinas !== false) { ?>
                        <table class="table table-bordered" id="tableDisciplina">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID</th>
                                    <th>Nombre de la disciplina</th>
                                    <th>Número mínimo de jugadores</th>
                                    <th>Número máximo de jugadores</th>
                                    <th>Clave concepto pago</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datosDisciplinas as $fila) : ?>
                                <tr>
                                    <td><?php echo $fila['idDisciplina']; ?></td>
                                    <td><?php echo $fila['nomDisciplina']; ?></td>
                                    <td><?php echo $fila['numMinJugador']; ?></td>
                                    <td><?php echo $fila['numMaxJugador']; ?></td>
                                    <td><?php echo $fila['cve_concepto_pago']; ?></td>
                                    <td class="d-flex">

                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-warning custom-spacing-between-buttons btn-editar-Disciplina"
                                            data-bs-toggle="modal" data-disciplina='<?php echo json_encode($fila); ?>'
                                            data-bs-target="#editarDisciplinaModal">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </button>
                                        <button type="button"
                                            class="btn btn-info custom-spacing-between-buttons btn-consultar-Disciplina"
                                            data-bs-toggle="modal" data-disciplina='<?php echo json_encode($fila); ?>'
                                            data-bs-target="#detalleDisciplinaModal">
                                            <i class="fa-solid fa-clipboard-question"></i> Consultar
                                        </button>
                                        <button type="button" class="btn btn-danger eliminar" data-disciplina='<?php echo json_encode($fila); ?>' data-backdrop="static"
                                        data-keyboard="false"><i class="fa-solid fa-trash"></i>Eliminar</button>
                                    </td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="../adminTorneo/inicio.php" role="button">Regresar a inicio</a>
                        <?php } ?>

                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="agregarDisciplinaModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Disciplina</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="claveDis">Clave disciplina:</label>
                                            <input required class="form-control" type="text" name="claveDis"
                                                id="claveDis" style="width: 500px;" maxlength="5">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="nombreDis">Nombre de disciplina:</label>
                                            <input required class="form-control" type="text" name="nombreDis"
                                                id="nombreDis" style="width: 500px;" maxlength="30">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="min">Mínimo de jugadores:</label>
                                            <input required class="form-control" type="number" name="min" id="min"
                                                style="width: 150px;" maxlength="2">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="max">Máximo de jugadores:</label>
                                            <input required class="form-control" type="number" name="max" id="max"
                                                style="width: 150px;" maxlength="2">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="clavepago">Clave concepto pago:</label>
                                            <input required class="form-control" type="text" name="clavepago"
                                                id="clavepago" style="width: 100px;" maxlength="4">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="guardarButtonDisciplina">Guardar
                                        Disciplina</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editarDisciplinaModal" tabindex="-1"
                        aria-labelledby="editarDisciplinaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar disciplina</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <br>
                                        <div class="form-group">
                                            <label for="newnombreDis">Nombre de disciplina:</label>
                                            <input required class="form-control" type="text" name="newnombreDis"
                                                id="newnombreDis" style="width: 500px;" maxlength="30">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="newMin">Mínimo de jugadores:</label>
                                            <input required class="form-control" type="number" name="newMin" id="newMin"
                                                style="width: 150px;" maxlength="2">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="newMax">Máximo de jugadores:</label>
                                            <input required class="form-control" type="number" name="newMax" id="newMax"
                                                style="width: 150px;" maxlength="2">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="newClavepago">Clave concepto pago:</label>
                                            <input required class="form-control" type="text" name="newClavepago"
                                                id="newClavepago" style="width: 100px;" maxlength="4">
                                        </div>
                                        <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-success" type="submit"
                                        id="editarButtonDisciplina">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal consulta disciplina -->
                    <div class="modal fade" id="detalleDisciplinaModal" tabindex="-1"
                        aria-labelledby="detalleDisciplinaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="detalleDisciplinaModalLabel">Disciplina</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Campos para mostrar los detalles de la disciplina -->
                                    <div id="detalleDiciplinaID"></div>
                                    <div id="detalleDisciplinaNombre"></div>
                                    <div id="detalleminimoJugadores"></div>
                                    <div id="detallemaximoJugadores"></div>
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

    <?php include("../templates/footer.php"); ?>
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../DataTables/language_es.js"></script>
    <script src="../ajax/disciplina.js"></script>
    <script src="../ajax/eliminaDisciplina.js"></script>