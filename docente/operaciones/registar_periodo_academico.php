<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

$id_anio_Academico = $_POST['id_anio_Academico'];
$sede = $_POST['sede'];
$director = $_POST['director'];
$secretario_academico = $_POST['secretario_academico'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$b_periodo_lectivo = buscar_periodo_lectivo($conexion, $id_anio_Academico);
$contar_periodo_lectivo = mysqli_num_rows($b_periodo_lectivo);
if ($contar_periodo_lectivo > 0) {
    echo "<script>
        alert('Error, El periodo lectivo ya está Registrado');
        window.history.back();
    </script>";
} else {
    $consulta = "INSERT INTO periodo_lectivo (id_anio_academico, sede, director, secretario_academico, fecha_inicio, fecha_fin) VALUES ('$id_anio_Academico', '$sede', '$director', '$secretario_academico', '$fecha_inicio', '$fecha_fin')";
    
    $ejecutar_consulta = mysqli_query($conexion, $consulta);
    if ($ejecutar_consulta) {
        echo "<script>
            alert('Se realizó el registro con Éxito');
            window.location = '../docentes.php';
        </script>";
    } else {
        echo "<script>
            alert('Error, Error al Registrar');
            window.history.back();
        </script>";
    }
}
?>