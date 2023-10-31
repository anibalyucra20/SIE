<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");
include("../../include/funciones.php");

//no recibir dni  buscar dn BD
$id = $_POST['data'];
$nombre = $_POST['editar_anio'];
$sede = $_POST['editar_sede'];
$director = $_POST['editar_director'];
$secretario = $_POST['editar_secretario'];
$fecha_inicio = $_POST['editar_fecha_inicio'];
$fecha_fin = $_POST['editar_fecha_fin'];


$consulta = "UPDATE anio_academico SET nombre='$nombre', id_director='$director', id_secretario='$secretario',fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin', id_sede='$sede' WHERE id='$id'";


$ejecutar_consulta = mysqli_query($conexion, $consulta);
if ($ejecutar_consulta) {
    echo "<script>
                alert('Datos Actualizados Correctamente');
                window.location= '../periodo_academico.php';
                </script>
                ";
}else {
    echo "<script>
        alert('Error, Error al Actualizar Datos');
        window.history.back();
    </script>
    ";
}



?>