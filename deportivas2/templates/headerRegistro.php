<?php
// Iniciar sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Finalizar la sesión al redireccionar a esta vista
session_destroy();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--icono del titulo de la pagina-->
    <link rel="icon" href="../img/dgire.png" type="image/x-icon">
    <!-- Estilos personalisados-->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../vendor/Bootstrap/bootstrap5.2.3.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="../vendor/AdminLTE/adminlte3.2.0.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <title>Actividades deportivas</title>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Header -->
    
    <header>
        <div class="container-fluid">
            <div class="row banner">
                <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                    <a href="https://www.unam.mx/" target=_BLANK>
                        <img class="" style="margin-top:10px;margin-bottom:10px;" src="../img/unam_white.png" id="img-unam"
                            alt="">
                    </a>
                </div>
                <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4" style="color:#FFF;">
                    <a href="https://www.unam.mx/" style="text-decoration:none;" target=_BLANK>
                        <h4 class=" hidden-sm hidden-xs" id="txtUnam" >Universidad Nacional <br>
                            Autónoma de México</h4>
                        <h4 class=" hidden-md hidden-lg" id="txtUnam" >UNAM</h4>
                    </a>
                </div>

                <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4" style="color:#FFF;">
                    <a href="https://www.dgire.unam.mx/webdgire/" style="text-decoration:none; " target=_BLANK>
                        <p class=" hidden-sm hidden-xs" id="txtDgire" style="padding-top:10px;">Dirección General de
                            Incorporación y <br> Revalidación de Estudios</p>
                        <p class=" hidden-md hidden-lg" id="txtDgire">DGIRE</p>
                    </a>
                </div>
                <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                    <a href="https://www.dgire.unam.mx/webdgire/" target="_BLANK">
                        <img class="" src="../img/dgire_white.png" id="img-dgire" alt="">
                    </a>
                </div>
            </div>
            <div class="row bannerEventos">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtEventos">
                    <h2>SOLICITUD DE PARTICIPACIÓN DE ACTIVIDADES DEPORTIVAS Y RECREATIVAS</h2>
                </div>
            </div>

            <nav class="navbar navbar-expand-md bg-white">
                <div class="container-fluid">
                        <!-- Movemos el li a la izquierda usando la clase 'ms-auto' -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="" id="linkForminiciarSesion">Continuar Registro
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

        </div>
    </header>
    <!-- /.header -->
    <!-- /.header -->
  