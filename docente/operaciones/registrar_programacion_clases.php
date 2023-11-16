<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

$id_curso = $_POST['cursos'];
$seccion = $_POST['seccion'];
$turno = $_POST['turno'];
$modalidad = $_POST['modalidad'];
$docente = $_POST['docente'];

$id_sede = 1;



//$consulta = "INSERT INTO seccion (nombre) VALUES ( '$nombre')";

$ejecutar_consulta = mysqli_query($conexion, $consulta);

if ($ejecutar_consulta) {
    echo "<script>
                alert('Se realizó el registro con éxito');
                window.location = '../secciones.php';
            </script>";
}else {
    echo "<script>
                alert('Error, error al registrar');
                window.history.back();
            </script>";
}
?>