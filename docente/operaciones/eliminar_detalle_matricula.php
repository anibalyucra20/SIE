<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");
include("../../include/funciones.php");

//no recibir dni  buscar dn BD
$id_det_mat = $_GET['data'];
$id_matricula = $_GET['data2'];


// ELIMINAR CRITERIOS DE EVALUACION
// ELIMINAR EVALUACIONES
// ELIMINAR CALIFICACIONES
// ELIMINAR DETALLE DE MATRICULA

$b_calificaciones = buscar_calificacionPorIdDetMat($conexion, $id_det_mat);
$cont_error = 0;
while ($rb_calificaciones = mysqli_fetch_array($b_calificaciones)) {
    $id_calificacion = $rb_calificaciones['id'];

    $b_evaluaciones = buscar_EvaluacionPorIdCalificacion($conexion, $id_calificacion);
    while ($rb_evaluaciones = mysqli_fetch_array($b_evaluaciones)) {
        $id_evaluacion = $rb_evaluaciones['id'];

        $b_criterios_evaluacion = buscar_CritEvaPorIdEvaluacion($conexion, $id_evaluacion);
        while ($rb_criterios_eva = mysqli_fetch_array($b_criterios_evaluacion)) {
            $id_crit_eva = $rb_criterios_eva['id'];
            $consulta = "DELETE FROM criterio_evaluacion WHERE id='$id_crit_eva'";
            $ejecutar = mysqli_query($conexion, $consulta);
            if (!$ejecutar) {
                $cont_error++;
            }
        }
        $consulta = "DELETE FROM evaluacion WHERE id='$id_evaluacion'";
        $ejecutar = mysqli_query($conexion, $consulta);
        if (!$ejecutar) {
            $cont_error++;
        }
    }
    $consulta = "DELETE FROM calificacion WHERE id='$id_calificacion'";
    $ejecutar = mysqli_query($conexion, $consulta);
    if (!$ejecutar) {
        $cont_error++;
    }
}

if ($cont_error == 0) {
    $consulta = "DELETE FROM detalle_matricula WHERE id='$id_det_mat'";
    $ejecutar = mysqli_query($conexion, $consulta);
    if ($ejecutar) {
        echo "<script>
                window.location= '../ver_matricula.php?data=".$id_matricula."';
                </script>
                ";
    } else {
        echo "<script>
        alert('Error, Error al Eliminar Curso Programado');
        window.history.back();
    </script>
    ";
    }
} else {
    echo "<script>
        alert('Error, Error al Eliminar Contenido');
        window.history.back();
    </script>
    ";
}