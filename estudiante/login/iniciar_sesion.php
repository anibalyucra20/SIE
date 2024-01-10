<?php
include("../../include/conexion.php");
include("../../include/busquedas.php");
include("../../include/funciones.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$b_usuario = buscar_estudiantePorDni($conexion, $usuario);
$r_b_usuario = mysqli_fetch_array($b_usuario);
$cont = mysqli_num_rows($b_usuario);



if (($cont==1)&&(password_verify($password, $r_b_usuario['password']))) {
    $b_anio_acad = buscar_anio_academicoultimo($conexion);
    $r_b_anio_acad = mysqli_fetch_array($b_anio_acad);
    $id_anio_acad = $r_b_anio_acad['id'];

    $llave = generar_llave();
    $token = password_hash($llave, PASSWORD_DEFAULT);
    $id_estudiante = $r_b_usuario['id'];
    $id_session = reg_sesion_estudiante($conexion, $id_estudiante, $llave);
    session_start();
    if($id_session!=0){
        $_SESSION['id_sesion_sie_est'] = $id_session;
        $_SESSION['token_sie_est'] = $token;
        $_SESSION['anio_lectivo_est'] = $id_anio_acad;
        $_SESSION['id_sede_est'] = $r_b_usuario['id_sede'];
        echo "<script>
                window.location= '../../estudiante/';
                </script>
                ";
    }else{
        echo "<script>
    alert('Error, al iniciar sesion. Intente Nuevamente');
    window.location= '../login/';
    </script>";
    }
    
}else{
    echo "<script>
    alert('Error, Usuario y/o Contraseña no Válidos. Intente Nuevamente');
    window.location= '../login/';
    </script>";
}


?>