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

                    <!-- Formulario de Categorias -->
                    <div id="formularioCategoria" class="formulario">
                        <h1>Catálogo de Categorías</h1>
                        <!-- Button trigger modal agrega categoria -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#agregarCategoriaModal">
                                <i class="fa-solid fa-plus"></i> Agregar Categoría
                            </button>
                        </div>
                        <?php if ($datosCategorias !== false) { ?>
                        <table class="table table-bordered" id="tableCategoria">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datosCategorias as $fila) : ?>
                                <tr>
                                    <td><?php echo $fila['idCategoria']; ?></td>
                                    <td><?php echo $fila['nomCategoria']; ?></td>
                                    <td class="d-flex">
                                        <button type="button"
                                            class="btn btn-warning btn-editaCategoria custom-spacing-between-buttons"
                                            data-bs-toggle="modal" data-categoria='<?php echo json_encode($fila); ?>'
                                            data-bs-target="#editarCategoriaModal">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </button>
                                        <button type="button"
                                            class="btn btn-info custom-spacing-between-buttons readCategoria"
                                            data-bs-toggle="modal" data-categoria='<?php echo json_encode($fila); ?>'
                                            data-bs-target="#detalleCategoriaModal">
                                            <i class="fa-solid fa-clipboard-question"></i> Consultar
                                        </button>
                                        <button type="button" class="btn btn-danger deleteCategoria"
                                            data-categoria='<?php echo json_encode($fila); ?>' data-backdrop="static"
                                            data-keyboard="false"><i class="fa-solid fa-trash"></i> Eliminar</button>
                                    </td>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="../adminTorneo/inicio.php" role="button">Regresar a inicio</a>
                        <?php } ?>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="agregarCategoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registra una categoría</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="nombreCategoria">Nombre de Categoría:</label>
                                            <input required class="form-control" type="text" name="nombreCategoria"
                                                id="nombreCategoria" style="width: 500px;" maxlength="30">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="guardarButtonCategoria">Guardar
                                        Categoría</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="editarCategoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edita categoría</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editarCategoriaForm" enctype="multipart/form-data" method="post">
                                        <br>
                                        <div class="form-group">
                                            <label for="newnomCategoria">Nombre de Categoría:</label>
                                            <input required class="form-control" type="text" name="newnomCategoria"
                                                id="newnomCategoria" style="width: 500px;" maxlength="30">
                                        </div>
                                        <br>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-success" type="button"
                                        id="editarButtonCategoria">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal detalles Categoria-->
                    <div class="modal fade" id="detalleCategoriaModal" tabindex="-1"
                        aria-labelledby="detalleCategoriaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="detalleCategoriaModalLabel">Categoría</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Campos para mostrar los detalles de la categoria -->
                                    <div id="detalleCategoriaID"></div>
                                    <div id="detalleCategoriaNombre"></div>
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
    <script src="../ajax/categoria.js"></script>
    <script src="../ajax/eliminaCategoria.js"></script>