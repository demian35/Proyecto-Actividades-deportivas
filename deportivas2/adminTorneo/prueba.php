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

                    <div id="formularioPrueba" class="formulario">
                        <h1>Catálogo de pruebas</h1>
                        <!-- Button trigger modal agrega prueba -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarPruebaModal">
                                <i class="fa-solid fa-plus"></i> Agregar prueba
                            </button>
                        </div>
                        <?php if ($datosPruebas !== false) { ?>
                            <table class="table table-bordered" id="tablePrueba">
                                <thead>
                                    <tr class="table-primary">
                                        <th>ID</th>
                                        <th>Categorìa</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datosPruebas as $fila) : ?>
                                        <tr>
                                            <td><?php echo $fila['idPrueba']; ?></td>
                                            <td><?php echo $fila['nomPrueba']; ?></td>
                                            <td class="d-flex">
                                                <button type="button" class="btn btn-warning updatePrueba custom-spacing-between-buttons" data-bs-toggle="modal" data-bs-target="#editarPruebaModal" data-prueba='<?php echo json_encode($fila); ?>'>
                                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                                </button>
                                                <button type="button" class="btn btn-info readPrueba custom-spacing-between-buttons" data-bs-toggle="modal" data-bs-target="#detallepruebaModal" data-prueba='<?php echo json_encode($fila); ?>'>
                                                    <i class="fa-solid fa-clipboard-question"></i> Consultar
                                                </button>
                                                <button type="button" class="btn btn-danger deletePrueba" data-prueba='<?php echo json_encode($fila); ?>' data-backdrop="static" data-keyboard="false">
                                                    <i class="fa-solid fa-trash"></i> Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href="../adminTorneo/inicio.php" role="button">Regresar a inicio</a>
                        <?php } ?>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="agregarPruebaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar prueba</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="nombrePrueba">Nombre de Prueba:</label>
                                            <input required class="form-control" type="text" name="nombrePrueba" id="nombrePrueba" style="width: 500px;" maxlength="30">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="guardarButtonPrueba">Guardar Categoria</button>
                                </div>
                            </div>
                        </div>
                    </div>
                   

                    <!-- Modal para editar pruebas -->
                    <div class="modal fade" id="editarPruebaModal" tabindex="-1" aria-labelledby="editarPruebaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarPruebaModalLabel">Edita Prueba</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="newnomPrueba">Nombre de Prueba:</label>
                                            <input required class="form-control" type="text" name="newnomPrueba" id="newnomPrueba" style="width: 500px;" maxlength="30">
                                        </div>
                                        <br>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-success" type="submit" id="editarButtonPrueba">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                   

                    <!-- Modal para consultar -->
                    <div class="modal fade" id="detallepruebaModal" tabindex="-1" aria-labelledby="detallepruebaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="detallepruebaModalLabel">Prueba</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Campos para mostrar los detalles de la categoria -->
                                    <div id="detallePruebaID"></div>
                                    <div id="detallePruebaNombre"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
    <script src="../ajax/prueba.js"></script>
    <script src="../ajax/eliminaPrueba.js"></script>