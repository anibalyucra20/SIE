<?php
session_start();
include("../include/conexion.php");
include("../include/busquedas.php");
include("../include/funciones.php");

include("include/verificar_sesion.php");

$cargo = verificar_sesion($conexion);
if($cargo!="Secretario Academico"){
    echo "<script>
					alert('Error, Usted no cuenta con los permisos para acceder a esta página');
					window.history.back();
				</script>
			";
}else{
    

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apoderados | SIE</title>
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

<body class="nav-md"> <!-- cuerpo -->
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
                                            <h2>Apoderados</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".registrar"><i class="fa fa-plus-square"></i> Nuevo</button>


                                            <!--MODAL REGISTRAR-->
                                            <div class="modal fade registrar" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel" align="center">Registrar Apoderado</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!--INICIO CONTENIDO DE MODAL-->
                                                            <div class="x_panel">

                                                                <div class="" align="center">
                                                                    <h2></h2>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="x_content">
                                                                    <br />
                                                                    <form role="form" action="operaciones/registrar_apoderados.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI : </label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input type="number" maxlength="8" class="form-control" name="dni" required="required">
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos y Nombres : </label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input type="text" maxlength="150" class="form-control" name="apellidos_nombres" required="required">
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo : </label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input type="email" maxlength="150" class="form-control" name="correo" required="required">
                                                                                <br>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Direción : </label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input type="text" maxlength="150" class="form-control" name="direccion" required="required">
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento : </label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input type="date" class="form-control" name="fec_nacimiento" required="required">
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono : </label>
                                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                                                <input type="number" maxlength="11" class="form-control" name="telefono" required="required">
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Estudiante(s) : </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="text" maxlength="150" class="form-control" name="estudiantes" required="required">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div align="center">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--FIN DE CONTENIDO DE MODAL-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- FIN MODAL REGISTRAR-->
                                        <br />
                                        <div class="x_content">
                                            <table id="example" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nro</th>
                                                        <th>DNI</th>
                                                        <th>Apellidos y Nombres</th>
                                                        <th>Correo</th>
                                                        <th>Teléfono</th>
                                                        <th>Direccion</th>
                                                        <th>Fecha de Nacimiento</th>
                                                        <th>Genero</th>
                                                        <th>Acciones</th>
                                                        
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                    $b_apoderado = buscar_apoderados($conexion);
                                                    $cont = 0;
                                                    while ($r_b_apoderados = mysqli_fetch_array($b_apoderado)) {
                                                        $cont++;



                                                    ?>
                                                        <tr>
                                                            <td><?php echo $cont; ?></td>
                                                            <td><?php echo $r_b_apoderados['dni']; ?></td>
                                                            <td><?php echo $r_b_apoderados['apellidos_nombres']; ?></td>
                                                            <td><?php echo $r_b_apoderados['correo']; ?></td>
                                                            <td><?php echo $r_b_apoderados['telefono']; ?></td>
                                                            <td><?php echo $r_b_apoderados['direccion']; ?></td>
                                                            <td><?php echo $r_b_apoderados['fecha_nac']; ?></td>
                                                            <td><?php echo $r_b_apoderados['genero']; ?></td>

                                                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target=".editar<?php echo $r_b_apoderados['id']; ?>">Editar</button></td>
                                                        </tr>
                                                        <!--MODAL EDITAR-->
                                                        <div class="modal fade editar<?php echo $r_b_apoderados['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel" align="center">Editar Apoderado</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!--INICIO CONTENIDO DE MODAL-->
                                                                        <div class="x_panel">

                                                                            <div class="" align="center">
                                                                                <h2></h2>
                                                                                <div class="clearfix"></div>
                                                                            </div>
                                                                            <div class="x_content">
                                                                                <br />
                                                                                <form role="form" action="operaciones/editar_apoderado.php" class="form-horizontal form-label-left input_mask" method="POST">
                                                                                    <div class="form-group">
                                                                                    <input type="hidden" name="id_apoderado" value="<?php echo $r_b_apoderados['id']; ?>">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI : </label>
                                                                                            <div class="row">
                                                                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                                                                    <input type="number" class="form-control" value="<?php echo $r_b_apoderados['dni']; ?>" name="editar_dni" readonly>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos y Nombres : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" class="form-control" value="<?php echo $r_b_apoderados['apellidos_nombres']; ?>" name="editar_apellidos_nombres">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="email" class="form-control" name="editar_correo" required="required"value="<?php echo $r_b_apoderados['correo']; ?>">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Direción : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" class="form-control" name="editar_direccion" required="required" value="<?php echo $r_b_apoderados['direccion']; ?>">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">fecha de Nacimiento : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" class="form-control" name="editar_fecha_nacimiento" required="required" value="<?php echo $r_b_apoderados['fecha_nac']; ?>">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono : </label>
                                                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                                                                <input type="number" class="form-control" name="editar_telefono" required="required" value="<?php echo $r_b_apoderados['telefono']; ?>">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero: </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <select class="form-control" name="editar_genero" id="genero" required value="<?php echo $r_b_apoderados['genero']; ?>">
                                                                                                    <option value=""></option>
                                                                                                    <option value="M" <?php if ($r_b_apoderados['genero'] == "M") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>Masculino</option>
                                                                                                    <option value="F" <?php if ($r_b_apoderados['genero'] == "F") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>Femenino</option>
                                                                                                </select>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estudiante(s) : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" class="form-control" name="id_estudiantes" required="required"value="<?php echo $r_b_apoderados['id_estudiantes']; ?>">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div align="center">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <!--FIN DE CONTENIDO DE MODAL-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- FIN MODAL EDITAR-->
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

<?php
}