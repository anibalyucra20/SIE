<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$b_usuario = buscar_docenteByDni($conexion, $usuario);
$r_b_usuario = mysqli_fetch_array($b_usuario);
$cont = mysqli_num_rows($b_usuario);

if (($cont==1)&&(password_verify($password, $r_b_usuario['password']))) {


    
}else{
    echo "error de contrasenia";
}


?>