<?php
// busquedas docente
function buscar_docenteByDni($conexion, $dni){
    $consulta = "SELECT * FROM trabajador WHERE dni='$dni'";
    return mysqli_query($conexion, $consulta);
}
function buscar_docente($conexion){
    $consulta = "SELECT * FROM trabajador";
    return mysqli_query($conexion, $consulta);
}
function buscar_docentePorId($conexion, $id){
    $consulta = "SELECT * FROM trabajador WHERE id='$id'";
    return mysqli_query($conexion, $consulta);
}
function buscar_docentePorCargo($conexion, $cargo){
    $consulta = "SELECT * FROM trabajador WHERE cargo='$cargo'";
    return mysqli_query($conexion, $consulta);
}

// busquedas estudiantes
function buscar_estudiante($conexion){
    $consulta = "SELECT * FROM estudiante";
    return mysqli_query($conexion, $consulta);
}
function buscar_estudiantePorId($conexion, $id){
    $consulta = "SELECT * FROM estudiante WHERE id='$id'";
    return mysqli_query($conexion, $consulta);
}
function buscar_estudiantePorDni($conexion, $dni){
    $consulta = "SELECT * FROM estudiante WHERE dni='$dni'";
    return mysqli_query($conexion, $consulta);
}
function buscar_estudiantePorDniNombres($conexion, $dni, $nombres){
    $consulta = "SELECT * FROM estudiante WHERE dni='$dni' AND apellidos_nombres='$nombres'";
    return mysqli_query($conexion, $consulta);
}
//buscar apoderados
function buscar_apoderados($conexion){
    $consulta = "SELECT * FROM apoderado";
    return mysqli_query($conexion, $consulta);
}
function buscar_apoderadoPorId($conexion, $id){
    $consulta = "SELECT * FROM apoderado WHERE id='$id'";
    return mysqli_query($conexion, $consulta);
}

// busquedas sedes

function buscar_sedes($conexion){
    $consulta = "SELECT * FROM sede";
    return mysqli_query($conexion, $consulta);
}
function buscar_sedesPorId($conexion, $id){
    $consulta = "SELECT * FROM sede WHERE id='$id'";
    return mysqli_query($conexion, $consulta);
}

//busquedas datos institucionales
function buscar_datos_institucionales($conexion){
    $consulta = "SELECT * FROM datos_institucionales";
    return mysqli_query($conexion, $consulta);
}


?>