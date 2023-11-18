<?php
include('../../include/conexion.php');
$password = $_POST['password'];
$password_b = $_POST['password_b'];

if ($password == $password_b) {
    $password_seguro = password_hash($password, PASSWORD_DEFAULT);
    $consulta = "UPDATE trabajador SET password='$password_seguro', reset_password=0, token_password=' '";
    if (mysqli_query($conexion, $consulta)) {
        echo "<script>
                alert('Conatraseña Actualizada');
                window.location= '../login/';
                </script>
                ";
    }else{
        echo "<script>
                alert('Error, No se pudo Actualizar la Contraseña');
                window.history.back();
            </script>";
    }
    
}else {
    echo "<script>
                alert('Error, Las contraseñas no coinciden');
                window.history.back();
            </script>";
}

?>