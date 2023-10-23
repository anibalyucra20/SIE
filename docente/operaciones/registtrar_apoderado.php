<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

// Recoge los datos del formulario
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$estudiantes = $_POST['estudiantes'];

// Realiza la inserción en la tabla Apoderado
$consulta = "INSERT INTO Apoderado (dni, Nombres, Correo, Direccion, Telefono) VALUES ('$dni', '$nombres', '$correo', '$direccion', '$telefono')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    // Obtiene el ID del apoderado recién registrado
    $id_apoderado = mysqli_insert_id($conexion);

    // Separa los estudiantes y los almacena en un array
    $estudiantes = explode(',', $estudiantes);

    // Relaciona el apoderado con los estudiantes en la tabla ApoderadoEstudiante
    foreach ($estudiantes as $id_estudiante) {
        $consultaRelacion = "INSERT INTO ApoderadoEstudiante (ID_Apoderado, ID_Estudiante) VALUES ($id_apoderado, $id_estudiante)";
        $resultadoRelacion = mysqli_query($conexion, $consultaRelacion);
    }

    echo "El apoderado se registró correctamente.";

    // Puedes redirigir a una página de éxito o realizar otras operaciones aquí
} else {
    echo "Hubo un error al registrar el apoderado.";
}
?>