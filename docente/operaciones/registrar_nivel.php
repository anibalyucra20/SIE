<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

$cod_modular = $_POST['codigo_modular'];
$nombre = $_POST['nombre'];
$id_sede = $_POST['id_sede'];


$consulta = "INSERT INTO nivel (nombre, id_director, id_secretario, fecha_inicio, fecha_fin, id_sede) VALUES ('$anio', '$director', '$secretario', '$fecha_inicio', '$fecha_fin', '$sede')";

$ejecutar_consulta = mysqli_query($conexion, $consulta);

if ($ejecutar_consulta) {
    echo "<script>
                alert('Se realizó el registro con éxito');
                window.location = '../periodo_academico.php';
            </script>";
}else {
    echo "<script>
                alert('Error, error al registrar');
                window.history.back();
            </script>";
}
