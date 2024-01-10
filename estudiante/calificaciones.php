<?php
session_start();
include("../include/conexion.php");
include("../include/busquedas.php");
include("../include/funciones.php");

$b_sesion = buscar_sesion_estudiante_porID($conexion, $_SESSION['id_sesion_sie_est']);
$rb_sesion = mysqli_fetch_array($b_sesion);
$id_estudiante = $rb_sesion['id_estudiante'];

if ($id_estudiante == 0) {
    header("location: login/");
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
                                        <h3></h3>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Mis Calificaciones</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <?php
                                                $b_matricula = buscar_matriculasPorIdEstudianteIdAnio($conexion, $id_estudiante, $_SESSION['anio_lectivo_est']);
                                                $rb_matricula = mysqli_fetch_array($b_matricula);

                                                $b_estudiante = buscar_estudiantePorId($conexion, $id_estudiante);
                                                $rb_estudiante = mysqli_fetch_array($b_estudiante);

                                                $b_anio_acad = buscar_anio_academico_id($conexion, $_SESSION['anio_lectivo_est']);
                                                $rb_anio_acad = mysqli_fetch_array($b_anio_acad);

                                                $b_sede = buscar_sedesPorId($conexion, $_SESSION['id_sede_est']);
                                                $rb_sede = mysqli_fetch_array($b_sede);

                                                $b_nivel = buscar_nivel_id($conexion, $rb_matricula['id_nivel']);
                                                $rb_nivel = mysqli_fetch_array($b_nivel);

                                                $b_grado = buscar_gradoPorId($conexion, $rb_matricula['id_grado']);
                                                $rb_grado = mysqli_fetch_array($b_grado);

                                                $b_turno = buscar_turno_id($conexion, $rb_matricula['id_turno']);
                                                $rb_turno = mysqli_fetch_array($b_turno);

                                                $b_seccion = buscar_seccionPorid($conexion, $rb_matricula['id_seccion']);
                                                $rb_seccion = mysqli_fetch_array($b_seccion);

                                                $b_periodos_lectivos = buscar_periodos($conexion);
                                                $cont_periodo_lectivos = mysqli_num_rows($b_periodos_lectivos);
                                                $cant_columnas = $cont_periodo_lectivos * 2;



                                                ?>
                                                <br />
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-striped jambo_table bulk_action table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="3">ÁREAS CURRICULARES</th>
                                                                    <th rowspan="3">CURSOS</th>
                                                                    <th colspan="6">TRIMESTRE</th>
                                                                    <th rowspan="3">PROMEDIO FINAL</th>
                                                                    <th rowspan="3">PROMEDIO DE ÁREA</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">I</th>
                                                                    <th colspan="2">II</th>
                                                                    <th colspan="2">III</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>En Numeros</th>
                                                                    <th>En letras</th>
                                                                    <th>En Numeros</th>
                                                                    <th>En letras</th>
                                                                    <th>En Numeros</th>
                                                                    <th>En letras</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $contenido_cursos = '';
                                                                $b_area_curriculares = buscar_AreaCurricularPorIdNivel($conexion, $rb_matricula['id_nivel']);
                                                                while ($rb_areas_curricular = mysqli_fetch_array($b_area_curriculares)) {
                                                                    $b_cursos = buscar_cursoPorIdArea($conexion, $rb_areas_curricular['id']);
                                                                    $cont_cursos = mysqli_num_rows($b_cursos);
                                                                    $contenido_cursos .= '<tr><td rowspan="' . $cont_cursos . '" >' . $rb_areas_curricular['nombre'] . '</td>';
                                                                    $contador_cursos = 0;
                                                                    while ($rb_cursos = mysqli_fetch_array($b_cursos)) {
                                                                        if ($contador_cursos > 0) {
                                                                            $contenido_cursos .= '<tr>';
                                                                        }
                                                                        $contador_cursos++;


                                                                        $b_curso_programado = buscar_cursos_prog_porSede_Anio_grado_turno_seccion($conexion, $rb_sede['id'], $rb_anio_acad['id'], $rb_cursos['id'], $rb_turno['id'], $rb_seccion['id']);
                                                                        $rb_curso_programado = mysqli_fetch_array($b_curso_programado);
                                                                        if (mysqli_num_rows($b_curso_programado) > 0) {

                                                                            $contenido_cursos .= '<td>' . $rb_cursos['nombre'] . '</td>';

                                                                            $b_det_mat = buscar_detmatriculadosPorIdMatProg($conexion, $rb_matricula['id'], $rb_curso_programado['id']);
                                                                            $rb_det_mat = mysqli_fetch_array($b_det_mat);

                                                                            $b_calificcaciones = buscar_calificacionPorIdDetMat($conexion, $rb_det_mat['id']);
                                                                            $suma_total_calif = 0;
                                                                            $cant_calif = mysqli_num_rows($b_calificcaciones);
                                                                            $cont_calif = 0;
                                                                            while ($rb_calificacion = mysqli_fetch_array($b_calificcaciones)) {
                                                                                $id_calif = $rb_calificacion['id'];

                                                                                //funcion para calcular la calificacion
                                                                                $suma_total_evaluacion = calcular_calificacion($conexion, $id_calif);

                                                                                $contenido_cursos .= '<td>';
                                                                                if ($suma_total_evaluacion > 0) {
                                                                                    $cont_calif++;
                                                                                    $suma_total_calif += round($suma_total_evaluacion);
                                                                                    $contenido_cursos .= round($suma_total_evaluacion);
                                                                                }
                                                                                $contenido_cursos .= '</td><td>';
                                                                                if ($suma_total_evaluacion > 0) {
                                                                                    $contenido_cursos .= convertir_vigesimal_cualitativo(round($suma_total_evaluacion));
                                                                                }
                                                                                $contenido_cursos .= '</td>';
                                                                            }
                                                                            $ponderado = '';
                                                                            if ($cant_calif == $cont_calif) {
                                                                                $ponderado = convertir_vigesimal_cualitativo($suma_total_calif / $cont_calif);
                                                                            }
                                                                            $contenido_cursos .= '<td>' . $ponderado . '</td><td></td>';
                                                                        }
                                                                        $contenido_cursos .= '</tr>';
                                                                    }
                                                                }

                                                                echo $contenido_cursos;
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