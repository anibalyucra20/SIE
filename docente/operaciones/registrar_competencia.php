<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

$nombre = $_POST['nombre'];
$enfoque = $_POST['enfoque'];
$descripcion = $_POST['descripcion'];
$id_area = $_POST['id_area'];

$consulta = "INSERT INTO competencia (nombre,enfoque,descripcion,id_area_curricular) VALUES ( '$nombre', '$enfoque','$descripcion','$id_area')";

$ejecutar_consulta = mysqli_query($conexion, $consulta);

if ($ejecutar_consulta) {
    echo "<script>
                alert('Se realizó el registro con éxito');
                window.location = '../competencias.php?data=".$id_area."';
            </script>";
}else {
    echo "<script>
                alert('Error, error al registrar');
                window.history.back();
            </script>";
}
?>