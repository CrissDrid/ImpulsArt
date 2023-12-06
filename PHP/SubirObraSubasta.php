<?php

session_start();
include_once "ConexionBD.php";

$idUser = $_SESSION['id_user'];

$select = "SELECT * FROM usuario WHERE Pk_Identificacion ='$idUser'";
$query = mysqli_query($conectar, $select);
$datos = mysqli_fetch_assoc($query);

function mostrarOpcionesAdministrador() {
    ?>
    <li class="nav-item">
        <a class="nav-link" href="GestionUsuario.php">Gestionar usuarios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="PHP/GestionObraSubasta.php">Gestionar obras subasta</a>
    </li>
    <?php
}

?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ImpulsArt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="shortcut icon" href="Imagenes/cepillo-de-pintura.png">
  <link rel="stylesheet" href="../CSS/Estilo.css">
  <link rel="stylesheet" href="../CSS/EstiloSubirObra.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="../JS/Script.js" defer></script>
</head>

<body>
  <!-- Inicio del Header -->
  <div class="container-fluid-1">
    <div class="row">
      <div class="columna col-12 col-md-4 col-lg-4">
        <nav class="navbar navbar-dark ">
          <div>
            <button class="navbar-toggler ms-3" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon align-items-center"></span>
            </button>
            <div class="offcanvas offcanvas-start " id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">ImpulsArt</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                  aria-label="Close"></button>
              </div>
              <form class=" d-flex mt-4 me-2 ms-2" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button type="button" class="boton btn btn-primary"><i class="bi bi-search"></i></button>
              </form>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                          <a class="nav-link" href="SubirObra.php">Subir Obras</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Ventas.php">Carrito de Compras</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Compras.php">Mis Compras</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Seccion-subasta.php">Ingresar a la seccion subasta</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="SubirObraSubasta.php">Subastar obra</a>
                        </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <div class="columna col-12 col-md-4 col-lg-4 text-center titulo-container">
                        <h1 class="titulo1 ">Impuls</h1>
                        <h1 class="titulo2 ">Art</h1>
                        <img class="pincel img-fluid" src="../Imagenes/cepillo-de-pintura.png" alt="">
                    </div>

                    <div class="columna-link col-12 col-md-4 col-lg-4 ">
                      <ul class="nav nav-underline justify-content-end">
                      <li class="nav-item">
            <h5 class="text-white"><?php echo $datos['Nombre'] . " " . $datos['Apellidos']; ?></h5>
          </li>
          <h5 class="separacion">/</h6>

          <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="bi bi-person-circle icono-grande"></i>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="CerrarSesion.php">Cerrar sesion</a></li>
  </ul>
</div>
                    </div>
                    
                    </div>
    </div>
</div>
  </div>
  <!-- Fin del Header -->

  <!-- Inicio Contenido -->
  <div class="container">
    <div class="row-SubirObra">
      <div class="col-6">
        <div class="drag-area text-center">
          <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
          <header>Arrastrar y Soltar para Cargar Archivo</header>
          <form action="PHP/SubastarObraBD.php" method="post" enctype="multipart/form-data">
          <input type="file" name="imagen">
        </div>
      </div>
      <div class="col-6">
        <h1 class="texto mb-3">Agregar Obras</h1>
          <br>
          <div class="col-12">
            <label for="username" class="form-label">Nombre de la obra</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
                <div class="invalid-feedback">
                    Se requiere el nombre
                </div>
            </div>
        </div>

        <br>

        <div class="col-12">
            <label for="username" class="form-label">Precio minimo</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control" name="precioinicial" placeholder="$" required>
                <div class="invalid-feedback">
                    Se requiere el precio minimo de la obra
                </div>
            </div>
        </div>

        <br>

            <div class="col-12">
                <label for="firstName" class="form-label">Peso</label>
                <input type="text" class="form-control" name="peso" placeholder="Peso ejemplo: 5 kg" value="" required>
                <div class="invalid-feedback">
                    Se requiere el peso de tu obra
                </div>
            </div>

            <br>

        <div class="col-12">
          <label for="username" class="form-label">Tamaño</label>
          <div class="input-group has-validation">
              <input type="text" class="form-control" name="tamano" placeholder="Tamaño ejemplo: 40x80 cm" required>
              <div class="invalid-feedback">
                  Se requiere el tamaño de su obra
              </div>
          </div>
      </div>

      <br>

    <div class="col-12">
      <label for="username" class="form-label">Categoria de la obra</label>
      <div class="input-group has-validation">
          <input type="text" class="form-control" name="categoria" placeholder="Categoria (pintura, maqueta, ceramica, etc)" required>
          <div class="invalid-feedback">
              Se requiere la categoria de su obra
          </div>
      </div>
  </div>

  <br>

    <div class="col-12">
      <label for="username" class="form-label">Fecha finalizacion de su subasta</label>
      <div class="input-group has-validation">
          <input type="date" class="form-control" name="fechafinalizacion" placeholder="Tiempo" required>
          <div class="invalid-feedback">
              Se requiere saber cuando se acaba la subasta
          </div>
      </div>
  </div>

  <br>
        
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <button class="bot w-30 btn btn-primary" type="submit">Subastar obra</button>
    </div>
  </form>
</div>
    </div>
  </div>
  <!-- Fin Contenido -->


  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- Inicio del Footer -->
  <div class="container-fluid-1">
    <footer class="footer py-5">
      <div class="row">
        <div class="cont col-6 col-md-2 mb-4">
          <h5>Secciones</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Inicio</a>
            </li>
            <li class="nav-item mb-2"><a href="Ventas.html" class="nav-link p-0 text-body-secondary">Carrito
                de Compras</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">PQRS</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Perfil</a>
            </li>
          </ul>
        </div>

        <div class="iconos col-2 mb-4">
          <h5 class="Siguenos">Siguenos</h5>
          <br>
          <a href="Error500.html"><i class="icono bi bi-twitter-x"></i></a>
          <a href="Error500.html"><i class="icono bi bi-facebook"></i></a>
          <a href="Error404.html"><i class="icono bi bi-whatsapp"></i></a>
          <a href="Error404.html"><i class="icono bi bi-instagram"></i></a>
        </div>

        <div class="col-md-5 mb-4">
          <h5>Compra la membresia</h5>
          <p>Podras tener varios privilegios durante tus compras</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Comprar</button>
          </div>
        </div>

      </div>
      <br>
      <br>
      <div class="d-flex flex-column flex-sm-row justify-content-center  border-top">
        <p>© 2023 ImpulsArt Company, Inc.</p>
      </div>
    </footer>
  </div>
  <!-- Fin del Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>