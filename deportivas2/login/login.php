<?php include("../templates/headerLogin.php"); ?>

<?php
// Iniciar sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Finalizar la sesión al redireccionar a esta vista
session_destroy();

?>


<div class="container-fluid" id="formularioContinuaReg">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Continuar Registro</h1>
        </div>
    </div>
    
    <div class="container mt-3">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-md-6">
                <div class="d-flex flex-column justify-content-between align-items-center h-100">
                    <!-- Icono de usuario -->
                    <i class="fa-solid fa-registered iconoUsuario"  style="font-size: 6rem; margin-bottom: 10px;"></i>
                    <div class="card bg-white-subtle w-100 w-md-75 mb-3">
                        <!-- Contenido del card -->
                        <div class="card-body text-center">
                            <form id="formLogin"  enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label for="noCedula">Número de cédula:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control custom-input-short" name="noCedula"
                                            id="noCedula" maxlength="5">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noFolioPago">Número de folio:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="noFolioPago"
                                            id="noFolioPago"  maxlength="12">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" id="login">Enviar</button>
                            </form>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-center">
                            <a href="../Registro/nuevoRegistro.php">
                                <p>No te has registrado?? Registrate</p>
                            </a>
                        </div>
                    </div>
                    <script src="../ajax/inicioSesion.js"></script>
                    <footer class="text-center custom-footer">
                        Derechos reservados © DGIRE 2023.
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>