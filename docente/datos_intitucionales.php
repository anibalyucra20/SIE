<?php
include("../include/conexion.php");
include("../include/busquedas.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Datos Institucionales | SIE</title>
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
                      <h2>Docente</h2>
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
                              <h4 class="modal-title" id="myModalLabel" align="center">Datos Institucionales</h4>
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
                                  <form role="form" action="operaciones/registrar_programacion_clases.php" class="form-horizontal form-label-left input_mask" method="POST">
                                    
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruc: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" maxlength="150" class="form-control" name="ruc" required="required">
                                        <br>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Codigo Modular: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" maxlength="150" class="form-control" name="codigo_modular" required="required">
                                        <br>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Razon Social: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" maxlength="150" class="form-control" name="razon_social" required="required">
                                        <br>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Departamento: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" maxlength="150" class="form-control" name="departamento" required="required">
                                        <br>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Provincia: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" maxlength="150" class="form-control" name="Provincia" required="required">
                                        <br>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Distrito: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" maxlength="150" class="form-control" name="Provincia" required="required">
                                        <br>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" maxlength="150" class="form-control" name="direccion" required="required">
                                        <br>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" maxlength="150" class="form-control" name="telefono" required="required">
                                        <br>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo: </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" maxlength="150" class="form-control" name="correo" required="required">
                                        <br>
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
                              <th>Año</th>
                              <th>Sede</th>
                              <th>Fecha Inicio</th>
                              <th>Fecha Fin</th>
                              <th>Director</th>
                              <th>Secretario</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                                                        <?php
                                                        $b_datos_institucionales = buscar_datos_institucionales($conexion);
                                                        $cont = 0;
                                                        while ($r_b_datos_institucionales = mysqli_fetch_array($b_sedes)) {
                                                            $cont++;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $cont; ?></td>
                                                                <td><?php echo $r_b_sedes['codigo']; ?></td>
                                                                <td><?php echo $r_b_sedes['nombre']; ?></td>
                                                                <td><?php echo $r_b_sedes['direccion']; ?></td>
                                                                <?php $b_docente_id = buscar_docentePorId($conexion, $r_b_sedes['id_responsable']);
                                                                $r_b_docente_id = mysqli_fetch_array($b_docente_id);
                                                                ?>
                                                                <td><?php echo $r_b_docente_id['apellidos_nombres']; ?></td>
                                                                <td><?php echo $r_b_sedes['tipo']; ?></td>
                                                                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target=".editar<?php echo $r_b_sedes['id']; ?>">Editar</button></td>
                                                            </tr>
                                                            <!--MODAL EDITAR-->
                                                            <div class="modal fade editar<?php echo $r_b_datos_institucionales['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">

                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                            </button>
                                                                            <h4 class="modal-title" id="myModalLabel" align="center">Editar Datos Institucionales</h4>
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
                                                                                    <form role="form" action="operaciones/editar_sede.php" class="form-horizontal form-label-left input_mask" method="POST">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruc : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" maxlength="20" class="form-control" name="ruc" value="<?php echo $r_b_datos_institucionales['ruc']; ?>" disabled>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">codigo Modular : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" maxlength="50" class="form-control" name="cod_modular" value="<?php echo $r_b_datos_institucionales['cod_modular']; ?>" required>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Razón Social : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" maxlength="50" class="form-control" name="razon_social" value="<?php echo $r_b_datos_institucionales['razon_social']; ?>" required>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Departamento : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" maxlength="50" class="form-control" name="departamento" value="<?php echo $r_b_datos_institucionales['departamento']; ?>" required>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Provincia : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" maxlength="50" class="form-control" name="provincia" value="<?php echo $r_b_sedes['provincia']; ?>" required>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" maxlength="50" class="form-control" name="direccion" value="<?php echo $r_b_sedes['direccion']; ?>" required>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="text" maxlength="20" class="form-control" name="telefono" value="<?php echo $r_b_sedes['telefono']; ?>" required>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <input type="email" maxlength="150" class="form-control" name="correo" value="<?php echo $r_b_sedes['correo']; ?>" required>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Responsable : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <select name="responsable" id="" class="form-control" required>
                                                                                                    <option value=""></option>
                                                                                                    <?php $b_docente_editar = buscar_docentePorCargo($conexion, "Director");
                                                                                                    while ($r_b_docente_editar = mysqli_fetch_array($b_docente_editar)) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $r_b_docente_editar['id']; ?>" <?php if ($r_b_docente_editar['id'] == $r_b_sedes['id_responsable']) {
                                                                                                                                                                        echo "selected";
                                                                                                                                                                    } ?>><?php echo $r_b_docente_editar['apellidos_nombres']; ?></option>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </select>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo : </label>
                                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                <select name="tipo_sede" id="" class="form-control" required>
                                                                                                    <option value=""></option>
                                                                                                    <option value="EBR" <?php if ($r_b_sedes['tipo'] == "EBR") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>EBR</option>
                                                                                                    <option value="EBA" <?php if ($r_b_sedes['tipo'] == "EBA") {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>EBA</option>
                                                                                                </select>
                                                                                                <br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <input type="hidden" name="data_editar" value="<?php echo $r_b_sedes['id']; ?>">
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