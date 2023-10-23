<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

// Recoge los datos del formulario
$dni = $_POST['dni'];
$apellidos_nombres = $_POST['apellidos_nombres'];
$nivel_academico = $_POST['nivel_academico'];
$grado_academico = $_POST['grado_academico'];
$turno = $_POST['turno'];
$seccion = $_POST['seccion'];

// Realiza la inserción en la base de datos
$consulta = "INSERT INTO Estudiantes (DNI, ApellidosNombres, NivelAcademico, GradoAcademico, Turno, Seccion) VALUES ('$dni', '$apellidos_nombres', '$nivel_academico', '$grado_academico', '$turno', '$seccion')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "La matrícula se registró correctamente.";
} else {
    echo "Hubo un error al registrar la matrícula.";
}
?>