<?php
session_start();
include("../include/conexion.php");
include("../include/busquedas.php");
include("../include/funciones.php");

include("include/verificar_sesion.php");

$cargo = verificar_sesion($conexion);
if ($cargo != "Secretario Academico") {
    echo "<script>
					alert('Error, Usted no cuenta con los permisos para acceder a esta página');
					window.history.back();
				</script>
			";
} else {

    

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Matrícula | SIE</title>
        <!--icono en el titulo-->
        <link rel="shortcut icon" href="">

        <!-- Bootstrap -->
        <link href="../plantilla/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../plantilla/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../plantilla/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../plantilla/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../plantilla/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../plantilla/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../plantilla/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../plantilla/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../plantilla/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../plantilla/build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">


                        <?php include("include/menu_secretaria_academica.php"); ?>

                        <!-- page content -->
                        <div class="right_col" role="main">
                            <div class="">
                                <div class="page-title">
                                    <div class="title_left">

                                    </div>


                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Matrículas</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <a href="matricula.php" class="btn btn-success"><i class="fa fa-plus-square"></i> Nuevo</a>
                                                <br />
                                                <div class="x_content">
                                                    <table id="example" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>DNI</th>
                                                                <th>Estudiante</th>
                                                                <th>Año Académico</th>
                                                                <th>Sede</th>
                                                                <th>Nivel</th>
                                                                <th>Grado</th>
                                                                <th>Seccion</th>
                                                                <th>Turno</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <?php
                                                            $contador = 0;
                                                            $b_matriculas = buscar_matriculasPorAnioSede($conexion,$_SESSION['anio_lectivo'],$_SESSION['id_sede']);
                                                            while ($rb_matriculas = mysqli_fetch_array($b_matriculas)) {
                                                               $contador ++;

                                                               $b_estudiante = buscar_estudiantePorId($conexion, $rb_matriculas['id_estudiante']);
                                                               $rb_estudiante = mysqli_fetch_array($b_estudiante);

                                                               $b_anio_acad = buscar_anio_academico_id($conexion, $rb_matriculas['id_anio_academico']);
                                                               $rb_anio_acad = mysqli_fetch_array($b_anio_acad);

                                                               $b_sede = buscar_sedesPorId($conexion, $rb_matriculas['id_sede']);
                                                               $rb_sede = mysqli_fetch_array($b_sede);

                                                               $b_nivel = buscar_nivel_id($conexion, $rb_matriculas['id_nivel']);
                                                               $rb_nivel = mysqli_fetch_array($b_nivel);

                                                               $b_grado = buscar_gradoPorId($conexion, $rb_matriculas['id_grado']);
                                                               $rb_grado = mysqli_fetch_array($b_grado);

                                                               $b_seccion = buscar_seccionPorid($conexion, $rb_matriculas['id_seccion']);
                                                               $rb_seccion = mysqli_fetch_array($b_seccion);

                                                               $b_turno = buscar_turno_id($conexion, $rb_matriculas['id_turno']);
                                                               $rb_turno = mysqli_fetch_array($b_turno);
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $contador; ?></td>
                                                                    <td><?php echo $rb_estudiante['dni']; ?></td>
                                                                    <td><?php echo $rb_estudiante['apellidos_nombres']; ?></td>
                                                                    <td><?php echo $rb_anio_acad['nombre']; ?></td>
                                                                    <td><?php echo $rb_sede['nombre']; ?></td>
                                                                    <td><?php echo $rb_nivel['nombre']; ?></td>
                                                                    <td><?php echo $rb_grado['nombre']; ?></td>
                                                                    <td><?php echo $rb_seccion['nombre']; ?></td>
                                                                    <td><?php echo $rb_turno['nombre']; ?></td>
                                                                    <td><a href="ver_matricula.php?data=<?php echo $rb_matriculas['id']; ?>" class="btn btn-success">Editar</a></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>





                                            </div>
                                        </div>
                                    </div>
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
                <!-- iCheck -->
                <script src="../plantilla/vendors/iCheck/icheck.min.js"></script>
                <!-- Datatables -->
                <script src="../plantilla/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                <script src="../plantilla/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                <script src="../plantilla/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                <script src="../plantilla/vendors/jszip/dist/jszip.min.js"></script>
                <script src="../plantilla/vendors/pdfmake/build/pdfmake.min.js"></script>
                <script src="../plantilla/vendors/pdfmake/build/vfs_fonts.js"></script>

                <!-- Custom Theme Scripts -->
                <script src="../plantilla/build/js/custom.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#example').DataTable({
                            "language": {
                                "processing": "Procesando...",
                                "lengthMenu": "Mostrar _MENU_ registros",
                                "zeroRecords": "No se encontraron resultados",
                                "emptyTable": "Ningún dato disponible en esta tabla",
                                "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                "search": "Buscar:",
                                "infoThousands": ",",
                                "loadingRecords": "Cargando...",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Último",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                },
                            }
                        });

                    });
                </script>

    </body>

    </html>
<?php }
