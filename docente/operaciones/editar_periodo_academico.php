
<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");
include("../../include/funciones.php");
// Recoge los datos del formulario
$id_periodo = $_POST['id_periodo'];
$sede = $_POST['sede'];
$director = $_POST['director'];
$secretario_academico = $_POST['secretario_academico'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

// Realiza la actualización en la base de datos
$consulta = "UPDATE anio_academico SET sede = '$sede', director = '$director', secretario_academico = '$secretario_academico', fecha_inicio = '$fecha_inicio', fecha_fin = '$fecha_fin' WHERE id = $id_periodo";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "<script>
                alert('Datos Actualizados Correctamente');
                window.location= '../periodo_academico.php';
                </script>
                ";
} else {
    echo "<script>
        alert('Error, Error al Actualizar Datos');
        window.history.back();
    </script>
    ";
}
?>