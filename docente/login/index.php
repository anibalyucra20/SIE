<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme15.css">
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Sistema Institucional Educativo</h3>
                    <p style="text-align: justify;">Nuestro sistema educativo se basa en una pedagogía moderna que incorpora metodologías activas, tecnología de vanguardia y un enfoque centrado en el estudiante.
                        <br><br>
                        Ofrecemos una amplia gama de modelos académicos que abarcan desde la educación preescolar hasta la educación secundaria, cubriendo diversas disciplinas y áreas de interés.
                        En nuestro compromiso constante por fomentar la excelencia académica y el crecimiento personal, nuestro sistema institucional educativo se erige como un faro de conocimiento, innovación y desarrollo.
                    </p>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content form-sm">
                    <div class="form-items">
                        <div class="text-center">
                            <img src="../../img/logo_principal.png" alt="" width="100px">
                            <br>
                            <h3 class="text-center">Inicio de Sesión</h3>
                            <br>
                        </div>


                        <form action="iniciar_sesion.php" role="form" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <label>Olvidaste tu Contrasena?</label> <a href="recuperar_password.php">Recuperar Contraseña</a>
                            </div>

                            <div class="form-button text-center">
                                <button id="submit" type="submit" class="ibtn">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>