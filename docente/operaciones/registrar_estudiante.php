<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");
// Recoge los datos del formulario
$dni = $_POST['dni'];
$apellidos_nombres = $_POST['apellidos_nombres'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$sede = $_POST['sede'];
$discapacidad = $_POST['discapacidad'];

// Sube la foto del estudiante al servidor
$carpeta_destino = "../img_estudiante/"; 
$nombre_archivo = $_FILES['foto']['name'];
$ruta_archivo = $carpeta_destino . $nombre_archivo;

if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_archivo)) {
    // Realiza la inserción en la base de datos
    $consulta = "INSERT INTO Estudiantes (dni, apellidos_nombres, correo, direccion, telefono, fecha_nac, genero, Sede, Discapacidad, Foto) VALUES ('$dni', '$apellidos_nombres', '$correo', '$direccion', '$telefono', '$fecha_nacimiento', '$genero', '$sede', '$discapacidad', '$nombre_archivo')";
    
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "El estudiante se registró correctamente.";
    } else {
        echo "Hubo un error al registrar el estudiante.";
    }
} else {
    echo "Error al subir la foto del estudiante.";
}
?>