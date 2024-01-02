<?php 
include("../../include/conexion.php");
include("../../include/busquedas.php");

$id_grado = $_POST['id'];

$cadena = "<option></option>";

$b_grado = buscar_GradoPorId($conexion, $id_grado);
$rb_grado = mysqli_fetch_array($b_grado);

$b_ciclo = buscar_ciclosPorId($conexion, $rb_grado['id_ciclo']);
$rb_ciclo = mysqli_fetch_array($b_ciclo);

$b_areas = buscar_AreaCurricularPorIdNivel($conexion, $rb_ciclo['id_nivel']);
while ($r_b_areas = mysqli_fetch_array($b_areas)) {
    $cadena=$cadena."<option value='".$r_b_areas['id']."'>".$r_b_areas['nombre']."</option>";
}
echo $cadena;

?>
