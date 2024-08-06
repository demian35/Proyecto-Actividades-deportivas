<?php include_once("../templates/headerRegistro.php");?>
<div class="registrosContainer">
    <div id="formularioFolio" style="display: block;">
        <div class="container mt-3">
            <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="col-md-6">
                    <div class="d-flex flex-column justify-content-between align-items-center h-100">
                        <div class="card bg-white-subtle w-100 w-md-75 " style="margin-bottom: 30%;">
                            <!-- Contenido del card -->
                            <div class="card-header">
                                <h1 style="color:#0d6efd; font-weight: bold;">Folio de pago</h1>
                            </div>
                            <div class="card-body ">
                                <form action="" enctype="multipart/form-data" method="post">

                                    <div class="form-group">
                                        <label for="numfolio">Número de folio:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="numFolio" id="numFolio"
                                                pattern="[0-9]{12}" inputmode="numeric" maxlength="12">
                                            <button class="btn btn-primary" type="button" id="button-addon1"><i
                                                    class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <br>
                                    <button class="btn btn-primary" type="button" id="sigFolio"
                                        disabled>Siguiente</button>
                                </form>
                            </div>
                            <div class="card-footer" style="background-color: white;">
                                <h3 id="folioValidofooter" style="color:#008f4c; text-align:center;"></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../ajax/validaFolio.js">
    </script>




    <div id="formularioEscuela" style="display: none;">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 56px);">
            <div class="container mt-3">
                <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                    <div class="col-md-6">
                        <div class="d-flex flex-column justify-content-between align-items-center h-100">
                            <div class="card bg-white-subtle w-100 w-md-75 " style="margin-bottom:30%">
                                <!-- Contenido del card -->
                                <div class="card-header">
                                    <h1 style="color:#0d6efd; font-weight: bold;">Datos de la escuela</h1>
                                </div>
                                <div class="card-body ">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="claveInc">Clave de incorporación:</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="claveInc" id="claveInc"
                                                    pattern="[0-9]{4}" maxlength="4">
                                                <button class="btn btn-primary" type="button" id="button-addon2"><i
                                                        class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="propuestaSwitch" value="No">
                                            <input class="form-check-input" name="propuestaSwitch" id="propuestaSwitch"
                                                type="checkbox">
                                            <label class="form-check-label " for="propuestaSwitch">
                                                Propuesta para sede del torneo.
                                            </label>
                                        </div>
                                        <div class="form-group" id="horariosContainer" style="display: none;">
                                            <label for="horarios">Horarios Disponibles:</label>
                                            <textarea class="form-control" id="horarios" name="horarios"
                                                style="width: 400px"></textarea>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" type="button" id="backEscuela">Atras</button>
                                        <button class="btn btn-primary" type="button" id="sigEscuela"
                                            disabled>Siguiente</button>
                                    </form>
                                </div>
                                <div class="card-footer" style="background-color: white;">
                                    <h3 id="nombrePlantelHeader" style="color:#008f4c; text-align:center;"></h3>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../ajax/validaPlantel.js">
    </script>


    <script>
    // Agrega un controlador de eventos para el campo de entrada
    document.getElementById("claveInc").addEventListener("input", function(e) {
        console.log('Evento de entrada de claveInc');
        // Elimina caracteres no numéricos y asegura que tenga un máximo de 5 dígitos
        this.value = this.value.replace(/[^0-9]/g, "").slice(0, 4);
    });

    $(document).ready(function() {
        $('#propuestaSwitch').click(function() {
            var checkbox = $(this);
            var hiddenInput = $('input[name="propuestaSwitch"]');
            hiddenInput.val(checkbox.prop('checked') ? "Si" : "No");

            // Mostrar u ocultar el campo de texto según el estado del checkbox
            if (checkbox.is(":checked")) {
                $("#horariosContainer").show();
            } else {
                $("#horariosContainer").hide();
            }
        });
    });
    </script>

    <?php include("../conexiones/datosTorneo.php"); ?>
    <div id="formularioRegTorneo" style="display: none;">
        <div class="container mt-3">
            <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="col-md-6">
                    <div class="d-flex flex-column justify-content-between align-items-center h-100">
                        <div class="card bg-white-subtle w-100 w-md-75 mb-3">
                            <!-- Contenido del card -->
                            <div class="card-header">
                                <h1 style="color:#0d6efd; font-weight: bold;">Datos del torneo</h1>
                            </div>
                            <div class="card-body ">
                                <form action="../conexiones/datosTorneo.php" enctype="multipart/form-data"
                                    method="post">
                                    <div class="form-group">
                                        <label for="torneos">Torneo:</label>
                                        <select name="torneos" class="form-select" id="torneos">
                                            <option value="0">Elige una opción</option>
                                            <?php echo $torneos; ?>
                                        </select>

                                    </div>
                                    <input type="hidden" id="torneoSeleccionadoInput" name="torneoSeleccionado" value=""
                                        readonly>

                                    <div class="form-group">
                                        <label for="disciplinas">Disciplina:</label>
                                        <select name="disciplinas" class="form-select" id="disciplinas">
                                            <option value="0">Elige una opción</option>
                                        </select>

                                    </div>



                                    <div class="form-group">
                                        <label for="pruebas">Prueba:</label>
                                        <select name="pruebas" class="form-select" id="pruebas">
                                            <option value="0">Elige una opción</option>
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <label for="categorias">Categoría:</label>
                                        <select name="categorias" class="form-select" id="categorias">
                                            <option value="0">Elige una opción</option>
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <label for="ram">Rama:</label>
                                        <select name="ram" class="form-select" id="ram">
                                            <option value="0">Elige una opción</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="numParticipantes">Número de participantes a inscribir:</label>
                                        <input required class="form-control" type="number" name="numParticipantes"
                                            id="numParticipantes" style="width: 150px;">

                                    </div>

                                    <br>
                                    <button class="btn btn-primary" type="button" id="backTorneo">Atras</button>
                                    <button class="btn btn-primary" type="button" id="sigTorneo"
                                        disabled>Siguiente</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../ajax/validaDatosTorneo.js">
    </script>

    <script src="../js/validaSelects.js">
    </script>
    <script>
    // Agrega un controlador de eventos para el campo de entrada
    document.getElementById("numParticipantes").addEventListener("input", function(e) {
        console.log('Evento de entrada de numParticipantes');
        // Elimina caracteres no numéricos y asegura que tenga un máximo de 5 dígitos
        this.value = this.value.replace(/[^1-9]/g, "").slice(0, 12);
    });
    </script>




    <div id="formularioEntrenador" style="display: none;">
        <div class="container mt-3">
            <div class="row justify-content-center" style="min-height: 80vh;">
                <div class="col-md-6">
                    <div class="card bg-white-subtle w-100 mb-3">
                        <!-- Contenido del card -->
                        <div class="card-header">
                            <h1 style="color:#0d6efd; font-weight: bold;">Datos del entrenador</h1>
                        </div>
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label for="correoEntrenador">Correo Electrónico:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="correoEntrenador"
                                            id="correoEntrenador" maxlength="60">
                                        <button class="btn btn-primary" type="button" id="button-addon3"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="confirmaCorreo">Confirmar correo electrónico:</label>
                                    <input required class="form-control" type="text" name="confirmaCorreo"
                                        id="confirmaCorreo" maxlength="60" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nombreEntrenador">Nombre:</label>
                                    <input required class="form-control" type="text" name="nombreEntrenador"
                                        id="nombreEntrenador" maxlength="60" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="apaternoEntrenador">Apellido Paterno:</label>
                                    <input required class="form-control" type="text" name="apaternoEntrenador"
                                        id="apaternoEntrenador" maxlength="60" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="amaternoEntrenador">Apellido Materno:</label>
                                    <input required class="form-control" type="text" name="amaternoEntrenador"
                                        id="amaternoEntrenador" maxlength="60" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Número de Teléfono:</label>
                                    <input type="text" class="form-control" name="telefono" id="telefono"
                                        pattern="[0-9]{10}" maxlength="10" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="celular">Número de Celular:</label>
                                    <input type="text" class="form-control" name="celular" id="celular"
                                        pattern="[0-9]{10}" maxlength="10" readonly>
                                </div>
                                <br>
                                <button class="btn btn-primary" type="button" id="backEntrenador">Atras</button>
                                <button class="btn btn-success" type="button" id="editarEntrenador" disabled
                                    hidden>Guardar</button>
                                <button class="btn btn-success" type="button" id="guardar">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            Si ya se había registrado previamente puede buscar su correo electrónico presionando el
                            botón
                            buscar
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/controlaTelefonos.js">
    </script>


    <script src="../ajax/validaEntrenador.js">
    </script>

</div>




<script src="../js/muestraFormsRegistros.js">
</script>




<footer class="text-center custom-footer">

</footer>

</body>

</html>