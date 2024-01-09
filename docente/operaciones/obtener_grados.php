<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");


$id_nivel = $_POST['id_nivel'];

	$cadena = '<option></option>';
	$b_ciclos = buscar_ciclosPorIdNivel($conexion, $id_nivel);
	while ($r_b_ciclos = mysqli_fetch_array($b_ciclos)) {
		$b_grados = buscar_gradoPorIdCiclo($conexion, $r_b_ciclos['id']);
		while ($r_b_grados = mysqli_fetch_array($b_grados)) {
			$texto = '';
			if (isset($_POST['grado'])) {
				if ($r_b_grados['id']==$_POST['grado']) {
					$texto='selected';
				}
			}
			$cadena=$cadena.'<option value="'.$r_b_grados['id'].'" '.$texto.'>'.$r_b_grados['nombre'].'</option>';
		}
	}
		echo $cadena;

?>