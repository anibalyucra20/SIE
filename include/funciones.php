<?php
function generar_llave()
{
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    function generate_string($input, $strength)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
    $llave = generate_string($permitted_chars, 30);
    return $llave;
}



function reg_sesion($conexion, $id_trabajador, $llave)
{
    $fecha_hora_inicio = date("Y-m-d H:i:s");
    $fecha_hora_fin = strtotime('+1 minute', strtotime($fecha_hora_inicio));
    $fecha_hora_fin = date("Y-m-d H:i:s", $fecha_hora_fin);

    $insertar = "INSERT INTO sesiones (id_trabajador, fecha_hora_inicio, fecha_hora_fin, token) VALUES ('$id_trabajador','$fecha_hora_inicio','$fecha_hora_fin','$llave')";
    $ejecutar_insertar = mysqli_query($conexion, $insertar);
    if ($ejecutar_insertar) {
        //ultimo registro de sesion
        $id_sesion = mysqli_insert_id($conexion);
        return $id_sesion;
    } else {
        return 0;
    }
}
function reg_sesion_estudiante($conexion, $id_estudiante, $llave)
{
    $fecha_hora_inicio = date("Y-m-d H:i:s");
    $fecha_hora_fin = strtotime('+1 minute', strtotime($fecha_hora_inicio));
    $fecha_hora_fin = date("Y-m-d H:i:s", $fecha_hora_fin);

    $insertar = "INSERT INTO sesiones_estudiante (id_estudiante, fecha_hora_inicio, fecha_hora_fin, token) VALUES ('$id_estudiante','$fecha_hora_inicio','$fecha_hora_fin','$llave')";
    $ejecutar_insertar = mysqli_query($conexion, $insertar);
    if ($ejecutar_insertar) {
        //ultimo registro de sesion
        $id_sesion = mysqli_insert_id($conexion);
        return $id_sesion;
    } else {
        return 0;
    }
}

function buscar_docente_sesion($conexion)
{
    $b_sesion = buscar_sesion_porID($conexion, $_SESSION['id_sesion_sie']);
    $r_b_sesion = mysqli_fetch_array($b_sesion);
    $id_trabajador = $r_b_sesion['id_trabajador'];

    return $id_trabajador;
}

function sesion_si_activa($conexion, $id_sesion, $token)
{

    $hora_actuals = date("Y-m-d H:i:s");
    $hora_actual = strtotime('-1 minute', strtotime($hora_actuals));
    $hora_actual = date("Y-m-d H:i:s", $hora_actual);

    $b_sesion = buscar_sesion_porID($conexion, $id_sesion);
    $r_b_sesion = mysqli_fetch_array($b_sesion);

    $fecha_hora_fin_sesion = $r_b_sesion['fecha_hora_fin'];
    $fecha_hora_fin = strtotime('+1 hour', strtotime($fecha_hora_fin_sesion));
    $fecha_hora_fin = date("Y-m-d H:i:s", $fecha_hora_fin);

    if ((password_verify($r_b_sesion['token'], $token)) && ($hora_actual <= $fecha_hora_fin)) {
        actualizar_sesion($conexion, $id_sesion);
        return true;
    } else {
        return false;
    }
}

function actualizar_sesion($conexion, $id_sesion)
{
    $hora_actual = date("Y-m-d H:i:s");
    $nueva_fecha_hora_fin = strtotime('+1 minute', strtotime($hora_actual));
    $nueva_fecha_hora_fin = date("Y-m-d H:i:s", $nueva_fecha_hora_fin);

    $actualizar = "UPDATE sesiones SET fecha_hora_fin='$nueva_fecha_hora_fin' WHERE id=$id_sesion";
    mysqli_query($conexion, $actualizar);
}

function convertir_vigesimal_cualitativo($numero)
{
    if ($numero >= 0 && $numero <= 10) {
        return "C";
    }
    if ($numero > 10 && $numero <= 13) {
        return "B";
    }
    if ($numero > 13 && $numero <= 17) {
        return "A";
    }
    if ($numero > 17 && $numero <= 20) {
        return "AD";
    }
    if ($numero < 0 && $numero > 20) {
        return 0;
    }
}


function calcular_evaluacion($conexion, $id_evaluacion)
{
    $b_ind_logro = buscar_CritEvaPorIdEvaluacion($conexion, $id_evaluacion);
    $suma_total_crit_eva = 0;
    while ($rb_ind_logro = mysqli_fetch_array($b_ind_logro)) {
        if ($rb_ind_logro['calificacion'] != "") {
            $suma_total_crit_eva += ($rb_ind_logro['ponderado'] / 100) * $rb_ind_logro['calificacion'];
        }
    }
    return $suma_total_crit_eva;
}

function calcular_calificacion($conexion, $id_calificacion)
{
    $b_evaluacion = buscar_EvaluacionPorIdCalificacion($conexion, $id_calificacion);
    $suma_total_evaluacion = 0;
    while ($rb_evaluacion = mysqli_fetch_array($b_evaluacion)) {
        $id_evaluacion = $rb_evaluacion['id'];
        $evaluacion = calcular_evaluacion($conexion, $id_evaluacion);

        if ($evaluacion > 0) {
            $suma_total_evaluacion += ($rb_evaluacion['ponderado'] / 100) * round($evaluacion);
        }
    }
    return $suma_total_evaluacion;
}

function calcular_promedio_final($conexion, $id_detalle_mat)
{
    $b_calificacion = buscar_calificacionPorIdDetMat($conexion, $id_detalle_mat);
    $suma_total_promedio = 0;
    while ($rb_calificacion = mysqli_fetch_array($b_calificacion)) {
        $id_calificacion = $rb_calificacion['id'];
        $suma_total_califi = calcular_calificacion($conexion, $id_calificacion);

        if ($suma_total_califi > 0) {
            $suma_total_promedio += ($rb_calificacion['ponderado'] / 100) * round($suma_total_califi);
        }
    }
    return $suma_total_promedio;
}
