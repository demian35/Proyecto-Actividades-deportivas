<?php include("../templates/header.php"); ?>
<?php include("../templates/sidebar.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="muestraEquipos" style="display: block;">
                        <div class="container d-flex justify-content-center align-items-center">
                            <div class="card  col-12 col-md-8 col-lg-6">
                                <div class="card-header">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <!-- Nombre del torneo -->
                                        <div class="form-group">
                                            <label for="listaEquipos">Equipos:</label>
                                            <select name="listaEquipos" class="form-select" id="listaEquipos">
                                                <option value="0">Elige una opción</option>
                                                <?php
                                                require_once("../conexiones/conexionBD.php");
                                                $consultaDisciplinas = $conexion->query("SELECT idDisciplina , nomDisciplina FROM ct_disciplinas");

                                                while ($disciplina = $consultaDisciplinas->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='{$disciplina['idDisciplina']}'>{$disciplina['nomDisciplina']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive" id="resultadosTabla">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Nombre Disciplina</th>
                                                    <th>Numero de Equipos</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer" style="background-color: white;">
                                    <a class="btn btn-primary" href="../adminTorneo/inicio.php" role="button">Regresar a inicio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="../ajax/obtenCedulas.js">
                    </script>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include("../templates/footer.php"); ?>