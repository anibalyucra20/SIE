<?php
session_start();
$id_anio_academico = $_GET['dato'];
$_SESSION['anio_lectivo_est'] = $id_anio_academico;
echo "<script>
                window.location= window.history.back();
    			</script>";
?>