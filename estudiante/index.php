<?php 
session_start();
include("../include/conexion.php");
include("../include/busquedas.php");
include("../include/funciones.php");

$b_sesion = buscar_sesion_estudiante_porID($conexion, $_SESSION['id_sesion_sie_est']);
$rb_sesion = mysqli_fetch_array($b_sesion);
$id_estudiante = $rb_sesion['id_estudiante'];

if ($id_estudiante==0) {
    header("location: login/");
}else {
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Estudiante | </title>

    <!-- Bootstrap -->
    <link href="../plantilla/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../plantilla/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../plantilla/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../plantilla/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    

                    <?php include("include/menu_estudiante.php"); ?>

                    <!-- page content -->
                    <div class="right_col" role="main">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>ROL ESTUDIANTE</h3>
                                </div>
                                

                                
                            </div>
                            <div class="clearfix"></div>

                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                    <!-- /page content -->

                    <!-- footer content -->
                    <footer>
                        <div class="pull-right">
                            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            </div>

            <!-- jQuery -->
            <script src="../plantilla/vendors/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="../plantilla/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="../plantilla/vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="../plantilla/vendors/nprogress/nprogress.js"></script>
            <!-- validator -->
            <script src="../plantilla/vendors/validator/validator.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="../plantilla/build/js/custom.min.js"></script>

</body>

</html>




<?php
}
?>