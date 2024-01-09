<?php 
$b_sesion = buscar_sesion_porID($conexion, $_SESSION['id_sesion_sie']);
$r_b_sesion = mysqli_fetch_array($b_sesion);
$id_trabajador = $r_b_sesion['id_trabajador'];
$b_docente = buscar_docentePorId($conexion, $id_trabajador);
$r_b_docente = mysqli_fetch_array($b_docente);

?>

<div class="navbar nav_title" style="border: 0;">
    <a href="index.php" class="site_title"><i class="fa fa-pencil"></i> <span>SIE</span></a>
</div>

<div class="clearfix"></div>
<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="img_docente/70198965.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Bienvenido,</span>
        <h2><?php echo $r_b_docente['apellidos_nombres']; ?></h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="index.php"><i class="fa fa-home"></i> Inicio </a>
            </li>
            <li><a><i class="fa fa-clone"></i>Evaluación <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="calificaciones_areas.php">Mis Cursos</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="img_docente/70198965.jpg" alt=""><?php echo $r_b_docente['apellidos_nombres']; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Mi perfil</a></li>
                        <li><a href="../include/cerrar_sesion.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión </a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        $busc_sede_id = buscar_sedesPorId($conexion, $_SESSION['id_sede']);
                        $res_busc_sede_id = mysqli_fetch_array($busc_sede_id);
                        echo $res_busc_sede_id['nombre'];

                        ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <?php
                        $buscar_sedes = buscar_sedes($conexion);
                        while ($res_buscar_sedes = mysqli_fetch_array($buscar_sedes)) {
                        ?>
                            <li><a href="operaciones/actualizar_sesion_sede.php?dato=<?php echo $res_buscar_sedes['id']; ?>"><?php if ($res_buscar_sedes['id'] == $_SESSION['id_sede']) {
                                                                                                                                    echo "<b>";
                                                                                                                                } ?><?php echo $res_buscar_sedes['nombre']; ?><?php if ($res_buscar_sedes['id'] == $_SESSION['id_sede']) {
                                                                                                                                                                    echo "</b>";
                                                                                                                                                                } ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php

                        if ($_SESSION['anio_lectivo'] == '') {
                            $b_ultimo_anio_acad = buscar_anio_academicoultimoporSede($conexion, $_SESSION['id_sede']);
                            $rb_ultimo_sede = mysqli_fetch_array($b_ultimo_anio_acad);
                            $_SESSION['anio_lectivo'] = $rb_ultimo_sede['id'];
                        }
                        $busc_anio_id = buscar_anio_academico_id($conexion, $_SESSION['anio_lectivo']);
                        $res_busc_anio_id = mysqli_fetch_array($busc_anio_id);
                        echo $res_busc_anio_id['nombre'];
                        ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <?php
                        $buscar_anios_Acad = buscar_anio_academicoInvertidoporSede($conexion, $_SESSION['id_sede']);
                        while ($res_buscar_anios_Acad = mysqli_fetch_array($buscar_anios_Acad)) {
                        ?>
                            <li><a href="operaciones/actualizar_sesion_anio_acad.php?dato=<?php echo $res_buscar_anios_Acad['id']; ?>"><?php if ($res_buscar_anios_Acad['id'] == $_SESSION['anio_lectivo']) {
                                                                                                                                            echo "<b>";
                                                                                                                                        } ?><?php echo $res_buscar_anios_Acad['nombre']; ?><?php if ($res_buscar_anios_Acad['id'] == $_SESSION['anio_lectivo']) {
                                                                                                                                                                                    echo "</b>";
                                                                                                                                                                                } ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->