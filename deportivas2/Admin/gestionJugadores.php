<?php include("../templates/headerUser.php"); ?>
<link rel="stylesheet" href="../DataTables/datatables.min.css">
<?php include("../templates/sidebarUser.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <?php require_once("../conexiones/jugadores.php"); ?>
                    <h1>Gestión de participantes del equipo</h1>
                    <h3 style="text-align:center;"><?=$_SESSION['plantel']['ptl_nombre'];?> (<?=$_SESSION['usuario']['ptl_ptl']?>)</h3>
                    <?php
                    // Obtener el número de participantes inscritos
                    $numParticipantes = cuentaParticipantes($conexion);
                    
                
                    // Verificar si el número de participantes alcanzó el límite
                    if ($numParticipantes >= $_SESSION["usuario"]["num_participantes"]) {
                        // Ocultar el botón de "Agregar jugador"
                        echo '<style>#agregarParticipanteBtn { display: none; }</style>';

                        // Verificar si el usuario ha finalizado el registro
                        if ($estatus != 0) {
                            // Mostrar mensaje de registro concluido
                            echo '<p>Haz concluido el registro por lo tanto ya no puedes registrar jugadores</p>';
                        } else {
                            // Mostrar mensaje de registro completo
                            echo '<p>Haz registrado todos los jugadores posibles </p>';
                        }
                    }
                    ?>
                    <div class="mb-3">
                        <!-- Button trigger modal -->
                        <?php if($estatus==0):?>
                        <button type="button" class="btn btn-primary" id="agregarParticipanteBtn" data-bs-toggle="modal"
                            data-bs-target="#modalRegistraJugador">
                            <i class="fa-solid fa-plus"></i> Agregar participante
                        </button>
                                                
                        <?php endif;?>

                    </div>


                    <table class="table table-bordered" id="tableParticipants">
                        <thead>
                            <tr class="table-primary">
                                <th style="display: none;">plantel</th>
                                <th>Número</th>
                                <th>Número de cédula</th>
                                <th>Número de cuenta</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php foreach($jugadoresCombinados as $index => $fila) :?>

                            <tr>
                                <td style="display: none;"><?php echo $_SESSION['usuario']['ptl_ptl']; ?></td>
                                <td class="idJugador"><?php echo $fila->idJugador; ?></td>
                                <td><?php echo $_SESSION['usuario']['idInscripcion']; ?></td>
                                <td><?php echo $fila->a_exp; ?></td>
                                <td><?php echo $fila->nombre->a_nom . ' ' . $fila->nombre->a_pat . ' ' . $fila->nombre->a_mat; ?>
                                </td>
                                <td>
                                    <div class="d-flex mt-2">
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-info custom-spacing-between-buttons readPlayer"
                                            data-bs-toggle="modal" data-bs-target="#consultaJugadorModal"
                                            data-jugador='<?php echo json_encode($fila); ?>'>
                                            <i class="fa-solid fa-clipboard-question"></i> Consultar
                                        </button>
                                        <?php if($estatus==0): ?>
                                        <button type="button" class="btn btn-danger deletePlayer"
                                            data-jugador='<?php echo json_encode($fila); ?>' data-backdrop="static"
                                            data-keyboard="false">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-danger deletePlayer disabled"
                                            data-jugador='<?php echo json_encode($fila); ?>' data-backdrop="static"
                                            data-keyboard="false">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </button>
                                        <?php endif;?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                    <?php if($estatus==0): ?>
                    <button type="button" class="btn btn-success" id="finalizarRegistroBtn">Finalizar Registro</button>
                    <?php else: ?>
                    <button type="button" class="btn btn-success" id="finalizarRegistroBtn">Imprimir Cédula en PDF</button>
                    <?php endif;?>
                    <a class="btn btn-primary" href="../Admin/index.php" role="button">Regresar a inicio</a>

                    <h4 style="text-align:center;">Participantes a registrar: <?=$_SESSION['usuario']["num_participantes"];?> </h3>
                    <!-- Modal -->
                    <div class="modal fade" id="modalRegistraJugador" tabindex="-1"
                        aria-labelledby="modalRegistraJugadorLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalRegistraJugadorLabel">Registra Jugador</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="ptl_ptl" hidden>Plantel:</label>
                                            <input required class="form-control" type="text" name="ptl_ptl" id="ptl_ptl"
                                                style="width: 500px;"
                                                value='<?php echo $_SESSION['usuario']['ptl_ptl']; ?>' readonly hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="idinscripcion" hidden>ID de inscripción:</label>
                                            <input required class="form-control" type="text" name="idinscripcion"
                                                id="idinscripcion" style="width: 500px;"
                                                value='<?php echo $_SESSION['usuario']['idInscripcion']; ?>' readonly hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="expJugador">Ingrese el número de expediente del jugador:</label>
                                            <input required class="form-control" type="text" name="expJugador"
                                                id="expJugador" style="width: 500px;">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary"
                                        id="buttonRegistraJugador">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="consultaJugadorModal" tabindex="-1"
                        aria-labelledby="consultaJugadorModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="consultaJugadorModalLabel">Datos de Jugador</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Aquí se imprimirán los detalles del jugador -->
                                    <p id="nombreCompleto"></p>
                                    <p id="a_exp"></p>
                                    <p id="idJugador"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar
                                    </button>
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
<script src="../DataTables/datatables.min.js"></script>
<script src="../DataTables/language_es.js"></script>
<script src="../ajax/jugadores.js"></script>
<script src="../ajax/agregaJugador.js"></script>
<script src="../js/modalesConsulta.js"></script>
<script src="../ajax/eliminaJugador.js"></script>
<script src="../ajax/generaPDF.js"></script>