<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

$dni = $_POST['dni'];
$apellidos_nombres = $_POST['apellidos_nombres'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$fecha_contrato = $_POST['fecha_contrato'];
$grado_academico = $_POST['grado_academico'];
$condicion_laboral = $_POST['condicion_laboral'];
$cargo = $_POST['cargo'];

$ruta_archivo = "../img_docente/".$dni.".jpg";

$b_docente = buscar_docenteByDni($conexion, $dni);
$contar_docentes = mysqli_num_rows($b_docente);
if ($contar_docentes > 0) {
    echo "<script>
			alert('Error, Docente ya está Registrado');
			window.history.back();
		</script>
		";
}else{
if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_archivo)) {
    $consulta = "INSERT INTO trabajador (dni,apellidos_nombres,correo,telefono,direccion,fecha_nac,genero,fecha_contrato,grado_academico,cond_laboral,cargo,foto,password,estado,reset_password,token_password) VALUES ('$dni','$apellidos_nombres','$correo','$telefono','$direccion','$fecha_nacimiento','$genero','$fecha_contrato','$grado_academico','$condicion_laboral','$cargo','$ruta_archivo',' ',1,0,' ')";
    $ejecutar_consulta = mysqli_query($conexion, $consulta);
    if ($ejecutar_consulta) {
        echo "<script>
			        alert('Se realizó el registro con Éxito');
			        window.location= '../docentes.php?reg=1';
		            </script>
		            ";
    }else {
        echo "<script>
			alert('Error, Error al Registrar');
			window.history.back();
		</script>
		";
    }
}
}

?>