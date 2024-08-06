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
                    <?php require_once("../conexiones/editDatesTorneo.php") ?>
                    <!-- <div id="muestraTorneos" style="display: block; height: 600px; overflow-y: scroll;"> -->
                    <h1>Eventos</h1>

                    <div class="mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#crearTorneoModal">
                            Crear Evento
                        </button>
                    </div>
                        <table class="table table-bordered" id="tableEvents">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID</th>
                                    <th>Torneo</th>
                                    <th>Disciplina</th>
                                    <th>Prueba</th>
                                    <th>Categorìa</th>
                                    <th>Rama</th>
                                    <th>Inicio del torneo</th>
                                    <th>Fin del torneo</th>
                                    <th>Inicio de inscripciones</th>
                                    <th>Fin de inscripciones</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($resultados as $fila) : ?>
                                <tr>
                                    <td class="idTorneo"><?php echo $fila['idTorneo']; ?></td>
                                    <td><?php echo $fila['nomTorneo']; ?></td>
                                    <td><?php echo $fila['nomDisciplina']; ?></td>
                                    <td><?php echo $fila['nomPrueba']; ?></td>
                                    <td><?php echo $fila['nomCategoria']; ?></td>
                                    <td><?php echo $fila['rama']; ?></td>
                                    <td><?php echo $fila['fechaInicio']; ?></td>
                                    <td><?php echo $fila['fechaFin']; ?></td>
                                    <td><?php echo $fila['fechaInicioIns']; ?></td>
                                    <td><?php echo $fila['fechaFinIns']; ?></td>
                                    <td>
                                        <div class="d-flex mt-2">
                                            <!-- Button trigger edita evento -->
                                            <button type="button"
                                                class="btn btn-warning editDates custom-spacing-between-buttons"
                                                data-evento='<?php echo json_encode($fila); ?>' data-bs-toggle="modal"
                                                data-bs-target="#modalUpdateDates">
                                                <i class="fa-solid fa-pen-to-square"></i> Editar
                                            </button>
                                            <button type="button"
                                                class="btn btn-info readEvento custom-spacing-between-buttons"
                                                data-evento='<?php echo json_encode($fila); ?>' data-bs-toggle="modal"
                                                data-bs-target="#detalleEventoModal">
                                                <i class="fa-solid fa-clipboard-question"></i> Consultar
                                            </button>
                                            <button type="button" class="btn btn-danger deleteEvento"
                                                data-evento='<?php echo json_encode($fila); ?>' data-backdrop="static"
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
                                    

                    <div class="modal fade" id="crearTorneoModal" tabindex="-1" aria-labelledby="crearTorneoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="crearTorneoModalLabel">Crear evento
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php include("../conexiones/opcionesFormCrearTorneo.php") ?>
                                    <div id="formulariocreaTorneo" style="display: none;">
                                        <form action="../conexiones/creaTorneo.php" enctype="multipart/form-data"
                                            method="post">
                                            <!-- Nombre del torneo -->
                                            <div class="form-group">
                                                <label for="listaTorneos">Nombre del torneo:</label>
                                                <select name="listaTorneos" class="form-select" id="listaTorneos">
                                                    <option value="0">Elige una opción</option>
                                                    <?php
                                                        foreach ($torneos as $torneo) {
                                                            echo "<option value='" . $torneo['idTorneo'] . "'>" . $torneo['nomTorneo'] . "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="listaDisciplinas">Disciplinas:</label>
                                                <select name="listaDisciplinas" class="form-select"
                                                    id="listaDisciplinas">
                                                    <option value="0">Elige una opción</option>
                                                    <?php
                                                        foreach ($disciplinas as $disciplina) {
                                                            echo "<option value='" . $disciplina['idDisciplina'] . "'>" . $disciplina['nomDisciplina'] . "</option>";
                                                        }
                                                     ?>
                                                </select>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="listaPruebas">Pruebas:</label>
                                                <select name="listaPruebas" class="form-select" id="listaPruebas">
                                                    <option value="0">Elige una opción</option>
                                                    <?php
                                                        foreach ($pruebas as $prueba) {
                                                            echo "<option value='" . $prueba['idPrueba'] . "'>" . $prueba['nomPrueba'] . "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="listaCategorias">Categorias:</label>
                                                <select name="listaCategorias" class="form-select" id="listaCategorias">
                                                    <option value="0">Elige una opción</option>
                                                    <?php
                                                        foreach ($categorias as $categoria) {
                                                            echo "<option value='" . $categoria['idCategoria'] . "'>" . $categoria['nomCategoria'] . "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="listaRamas">Ramas:</label>
                                                <select name="listaRamas" class="form-select" id="listaRamas">
                                                    <option value="0">Elige una opción</option>
                                                    <option value="Femenil">Femenil</option>
                                                    <option value="Varonil">Varonil</option>
                                                    <option value="Unica">Única</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="fechaIniciotorneo">Fecha de inicio del
                                                    torneo:</label>
                                                <input required class="form-control" type="date"
                                                    name="fechaIniciotorneo" id="fechaIniciotorneo"
                                                    style="width: 500px;">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="fechaFintorneo">Fecha de fin del torneo:</label>
                                                <input required class="form-control" type="date" name="fechaFintorneo"
                                                    id="fechaFintorneo" style="width: 500px;">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="fechaInicioinscripciones">Fecha de inicio de las
                                                    inscripciones:</label>
                                                <input required class="form-control" type="date"
                                                    name="fechaInicioinscripciones" id="fechaInicioinscripciones"
                                                    style="width: 500px;">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="fechaFininscripciones">Fecha final de
                                                    inscripciones:</label>
                                                <input required class="form-control" type="date"
                                                    name="fechaFininscripciones" id="fechaFininscripciones"
                                                    style="width: 500px;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-success" type="submit" id="ButtonCrearEvento">Crear
                                        Torneo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="../js/sweetalert2.all.min.js"></script>

                    <!-- Modal edita fechas -->
                    <div class="modal fade" id="modalUpdateDates" tabindex="-1" aria-labelledby="modalUpdateDatesLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalUpdateDatesLabel">Editar evento</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="fechamodIniciotorneo">Fecha de inicio del
                                                    torneo:</label>
                                                <input required class="form-control" type="date"
                                                    name="fechamodIniciotorneo" id="fechamodIniciotorneo"
                                                    style="width: 500px;">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="fechamodFintorneo">Fecha de fin del torneo:</label>
                                                <input required class="form-control" type="date"
                                                    name="fechamodFintorneo" id="fechamodFintorneo"
                                                    style="width: 500px;">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="fechamodInicioinscripciones">Fecha de inicio de las
                                                    inscripciones:</label>
                                                <input required class="form-control" type="date"
                                                    name="fechamodInicioinscripciones" id="fechamodInicioinscripciones"
                                                    style="width: 500px;">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="fechamodFininscripciones">Fecha final de
                                                    inscripciones:</label>
                                                <input required class="form-control" type="date"
                                                    name="fechamodFininscripciones" id="fechamodFininscripciones"
                                                    style="width: 500px;">
                                            </div>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-success" type="submit"
                                        id="ButtonEditarEvento">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal consulta evento -->
                    <div class="modal fade" id="detalleEventoModal" tabindex="-1"
                        aria-labelledby="detalleEventoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="detalleEventoModallLabel">Evento</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Campos para mostrar los detalles del evento -->
                                    <div id="detalleEventoID"></div>
                                    <div id="detalleNombreEvento"></div>
                                    <div id="detalleNombreDisciplina"></div>
                                    <div id="detalleNombrePrueba"></div>
                                    <div id="detalleNombreCategoria"></div>
                                    <div id="detalleRama"></div>
                                    <div id="detalleFechaInicio"></div>
                                    <div id="detalleFechaFin"></div>
                                    <div id="detalleFechaInicioInsc"></div>
                                    <div id="detalleFechaFinInsc"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
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

<?php include("../templates/footer.php"); ?>
<script src="../DataTables/datatables.min.js"></script>
<script src="../DataTables/language_es.js"></script>
<script src="../ajax/evento.js"></script>
<script src="../ajax/eliminaEvento.js"></script>