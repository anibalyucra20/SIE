<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

$nombre = $_POST['nombre_competencia'];
$enfoque = $_POST['nombre_enfoque'];
$descripcion = $_POST['descripcion_competencia'];

$consulta = "INSERT INTO competencia (nombre,enfoque,descripcion) VALUES ( '$nombre', '$enfoque','$descripcion')";

$ejecutar_consulta = mysqli_query($conexion, $consulta);

if ($ejecutar_consulta) {
    echo "<script>
                alert('Se realizó el registro con éxito');
                window.location = '../competencias.php';
            </script>";
}else {
    echo "<script>
                alert('Error, error al registrar');
                window.history.back();
            </script>";
}
?>