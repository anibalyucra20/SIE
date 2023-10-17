<?php
function buscar_docenteByDni($conexion, $dni){
    $consulta = "SELECT * FROM trabajador WHERE dni='$dni'";
    return mysqli_query($conexion, $consulta);
}
function buscar_docente($conexion){
    $consulta = "SELECT * FROM trabajador";
    return mysqli_query($conexion, $consulta);
}




?>