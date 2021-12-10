<?php
session_start();

if ($_SESSION['usuario'] == null) {
    header('location: index.html');
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Editar perfil | Mixed Cards</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.6.1/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/mixed cards logo.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark position-static top-0 py-4">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="img/mixed cards logo.png" alt="" width="58"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-uppercase mx-2" aria-current="page" href="index.html">Inicio</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <div class="dropstart d-flex align-items-center mx-2">
                        <button type="button" class="btn text-light" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-translate fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu blur-bg-white">
                            <li><a class="text-light dropdown-item" href="#">Español</a></li>
                            <li><a class="text-light dropdown-item" href="#">Ingles</a></li>
                        </ul>
                    </div>
                    <div class="blur-bg-white border border-0 rounded-3 d-flex align-items-center px-lg-2">
                        <a class="text-light m-2" href="#" data-bs-toggle="modal" data-bs-target="#logModal" id="log-state-icon">
                            <i class="bi bi-box-arrow-in-right fa-2x"></i></a>
                        <a class="text-light m-2" href="cosmeticos.php"><i class="bi bi-cart2 fa-lg"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar Usuario -->
    <div class="offcanvas offcanvas-end bg-page-green text-white" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <button type="button" class="btn-close btn-close-white text-reset p-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="offcanvas-body">
            <!-- Usuario -->
            <div class="d-flex justify-content-center mb-4">
                <i class="far fa-user-circle fa-10x"></i>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <h2 id="username-sb"></h2>
            </div>
            <!-- Opciones -->
            <hr>
            <ul class="nav nav-pills flex-column mb-auto" id="sidebar-items">
                <li class="py-2 rounded-3">
                    <div class="dropdown">
                        <a class="nav-link text-white active dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>
                            Perfil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="ver_perfil.php">
                                    <i class="far fa-id-card me-2"></i>
                                    Ver perfil</a></li>
                            <li><a class="dropdown-item active" href="editar_perfil.php">
                                    <i class="fas fa-user-edit me-2"></i>
                                    Editar perfil</a></li>
                        </ul>
                    </div>
                </li>
                <li class="py-2 rounded-3">
                    <a href="cartera.php" class="nav-link text-white">
                        <i class="fas fa-wallet me-2"></i>
                        Cartera
                    </a>
                </li>
                <li class="py-2 rounded-3">
                    <a href="inventario.php" class="nav-link text-white">
                        <i class="fas fa-briefcase me-2"></i>
                        Inventario
                    </a>
                </li>
                <li class="py-2 rounded-3">
                    <a href="mis_estadisticas.php" class="nav-link text-white">
                        <i class="bi bi-clipboard-data me-2"></i>
                        Mis estadísticas
                    </a>
                </li>
            </ul>
            <hr>
        </div>
        <div class="d-flex align-items-end justify-content-center pb-3">
            <button class="btn btn-lg btn-outline-light w-75" type="button" id="btn-cerrar-sesion">Cerrar
                sesión</button>
        </div>
    </div>

    <!-- Formulario Editar perfil -->
    <div class="container pt-5">
        <div class="row g-3">
            <div class="col-md-4 blur-bg-white text-white rounded-3 py-5 shadow">
                <div class="p-3 h-100 align-self-center ">
                    <div class="d-flex justify-content-center">
                        <i class="far fa-user-circle fa-10x"></i>
                    </div>
                    <div class="d-flex justify-content-center mb-1">
                        <h1 class="display-6" id="username-card-show"></h1>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <p id="email-card-show"></p>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <form id="editar-form" action="php/registro.php" method="POST" enctype="multipart/form-data">
                    <div class="p-5 blur-bg-white text-white rounded-3 shadow">
                        <div id="mod-alert"></div>
                        <input type="text" class="d-none" name="id-reg" id="id-reg">
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-floating mb-3 text-light">
                                    <input type="text" class="form-control border border-2 border-light rounded rounded-3 shadow" placeholder="Nombre" name="name-reg" id="name-reg" required autocomplete="off">
                                    <label for="floatingInput">Nombre</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 text-light">
                                    <input type="text" class="form-control border border-2 border-light rounded rounded-3 shadow" placeholder="Apellido" name="surname-reg" id="surname-reg" required autocomplete="off">
                                    <label for="floatingInput">Apellido</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-floating mb-3 text-light">
                                    <input type="text" class="form-control border border-2 border-light rounded rounded-3 shadow " placeholder="Nombre de usuario" name="username-reg" id="username-reg" data-bs-trigger="focus" autocomplete="off">
                                    <label for="floatingInput">Usuario</label>
                                    <div id="reg-username-alert" class="text-danger"></div>
                                </div>
                                <!-- Popover de usuario -->
                                <div class="visually-hidden">
                                    <div id="popover-title">
                                        <div><b>Requerimientos</b></div>
                                    </div>
                                    <div id="popover-content" class="p-0">
                                        <div class="m-0">
                                            <div class="text-danger" id="username-param1">
                                                <p><i class="fas fa-times"></i> Al menos una mayuscula</p>
                                            </div>
                                            <div class="text-danger" id="username-param2">
                                                <p><i class="fas fa-times"></i> Más de 5 caracteres</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 text-light">
                                    <input type="email" class="form-control border border-2 border-light rounded rounded-3 shadow" placeholder="E-mail" name="email-reg" id="email-reg" required autocomplete="off">
                                    <label for="floatingInput">E-mail</label>
                                    <div id="reg-email-alert" class="text-danger"></div>
                                </div>

                            </div>
                        </div>
                        <div class="form-floating mb-3 text-light">
                            <input type="number" class="form-control border border-2 border-light rounded rounded-3 shadow" placeholder="Número de teléfono" name="tel-reg" id="tel-reg" autocomplete="off">
                            <label for="floatingInput">Número de teléfono <label style="color: rgba(255, 255, 255, 0.514);">(Opcional)</label></label>
                        </div>
                        <div class="form-floating mb-3 text-light">
                            <input type="date" class="form-control border border-2 border-light rounded rounded-3 shadow" placeholder="Nacimiento" name="nac-reg" id="nac-reg" required>
                            <label for="floatingPassword">Nacimiento</label>
                            <div id="reg-nac-alert" class="text-danger"></div>
                        </div>

                        <div class="input-group border border-2 border-light rounded rounded-3 shadow mb-3" id="passwd-reg-container">
                            <div class="form-floating flex-grow-1 text-light">
                                <input type="password" class="form-control border border-0" id="passwd-reg" placeholder="Contraseña" name="passwd-reg" minlength="9" maxlength="25" data-bs-trigger="focus" required autocomplete="off">
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                            <button class="input-group-text border border-0 bg-transparent text-light me-1" id="btn-reg-eye" type="button"><i class="far fa-eye"></i></button>
                        </div>
                        <!-- Popover de contraseña -->
                        <div class="visually-hidden">
                            <div id="popover-title-passwd">
                                <div><b>Requerimientos</b></div>
                            </div>
                            <div id="popover-content-passwd" class="p-0">
                                <div class="m-0">
                                    <div class="text-danger" id="passwd-param1">
                                        <p><i class="fas fa-times"></i> Al menos una mayuscula</p>
                                    </div>
                                    <div class="text-danger" id="passwd-param2">
                                        <p><i class="fas fa-times"></i> Al menos un número</p>
                                    </div>
                                    <div class="text-danger" id="passwd-param3">
                                        <p><i class="fas fa-times"></i> Más de 8 caracteres</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / -->
                        <div class="input-group border border-2 border-light rounded rounded-3 shadow mb-3" id="passwd-rep-reg-container">
                            <div class="form-floating flex-grow-1 text-light">
                                <input type="password" class="form-control border border-0 " id="passwd-rep-reg" placeholder="Contraseña" name="passwd-rep-reg" minlength="9" maxlength="25" required autocomplete="off">
                                <label for="floatingPassword">Repetir contraseña</label>
                            </div>
                            <button class="input-group-text border border-0 bg-transparent text-light me-1" id="btn-rep-reg-eye" type="button"><i class="far fa-eye"></i></button>
                        </div>
                        <div class="d-flex align-self-center justify-content-center">
                            <button class="w-50 btn btn-lg btn-outline-light border border-2 rounded-pill shadow mt-3" type="submit" name="submit" id="btn-submit-reg">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Footer -->
    <div class="w-100" style="padding-top: 10%;">
        <footer class="text-center text-lg-start text-light blur-bg-white shadow">
            <div class="container p-4 pb-0">
                <section class="">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto d-flex align-items-center mt-3">
                            <img src="img/mixed_cards_isologo.png" class="img-fluid">
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Links perfilL</h6>
                            <p>
                                <a href="ver_perfil.php" class="text-white">Ver Perfil</a>
                            </p>
                            <p>
                                <a href="editar_perfil.php" class="text-white">Editar Perfil</a>
                            </p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Otros links
                            </h6>
                            <p>
                                <a href="cartera.php" class="text-white">Cartera</a>
                            </p>
                            <p>
                                <a href="inventario.php" class="text-white">Inventario</a>
                            </p>
                            <p>
                                <a href="mis_estadisticas.php" class="text-white">Mis estadisticas</a>
                            </p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fas fa-home mr-3"></i> Montevideo, Uruguay</p>
                            <p><i class="fas fa-envelope mr-3"></i> cobaltsys.soporte@gmail.com</p>
                        </div>
                    </div>
                </section>
                <hr class="my-3">
                <section class="p-3 pt-0">
                    <div class="row d-flex align-items-center">

                        <div class="col-md-7 col-lg-8 text-center text-md-start">

                            <div class="p-3">
                                © 2021 Copyright:
                                <a class="text-white" href="#">Cobalt Systems</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </footer>
    </div>
    <!-- Footer -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome Icons -->
    <script src="js/icons.js"></script>

    <!-- Ajax -->
    <script src="js/Ajax/ajax_sesion.js"></script>
    <script src="js/Ajax/ajax_cargar_modificaciones.js"></script>
    <script src="js/Ajax/ajax_cerrar_sesion.js"></script>
    <script src="js/Ajax/ajax_datos_usuario.js"></script>

    <!-- Scripts -->
    <script src="js/passwd_eye.js"></script>
    <script src="js/passwd_matching.js"></script>
    <script src="js/input_parameters.js"></script>
    <script src="js/popover.js"></script>
</body>

</html>