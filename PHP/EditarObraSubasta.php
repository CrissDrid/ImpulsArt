<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>ImpulsArt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="Imagenes/cepillo-de-pintura.png">
    <link rel="stylesheet" href="../CSS/Estilo.css">
    <link rel="stylesheet" href="../CSS/EstilosObra.css">
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

    <div class="container-fluid-1">
        <div class="row">
            <div class="columna col-12 col-md-4 col-lg-4">
              <nav class="navbar navbar-dark ">
                <div>
                  <button class="navbar-toggler ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon align-items-center"></span>
                  </button>
                  <div class="offcanvas offcanvas-start " id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">ImpulsArt</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <form class=" d-flex mt-4 me-2 ms-2" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button type="button" class="boton btn btn-primary"><i class="bi bi-search"></i></button>
                      </form>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                          <a class="nav-link" href="ImpulsArt.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="SubirObra.html">Subir Obras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="Ventas.html">Carrito de Compras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="Compras.html">Mis Compras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="Seccion-subasta.html">Ingresar a la seccion subasta</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="SubirObraSubasta.html">Subastar obra</a>
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
                        <img class="pincel img-fluid" src="Imagenes/cepillo-de-pintura.png" alt="">
                    </div>

                    <div class="columna-link col-12 col-md-4 col-lg-4 ">
                      <ul class="nav nav-underline justify-content-end">
                        <li class="nav-item">
                          <a class="nav-link link-light" href="#">Registrarse </a>
                        </li>
                        <h5 class="separacion">/</h6>
                        <li class="nav-item">
                          <a class="nav-link link-light" href="#"> Iniciar Sesion</a>
                        </li>
                      </ul>
                      <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <!-- Contenido principal aquí -->
                            </div>
                            <div class="col-md-3">
                                <div class="icon-container d-flex justify-content-end align-items-center">
                                    <a href="Ventas.html" class="icon-link">
                                        <i class="icon bi bi-cart-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
    </div>
</div>
<br>
<br>

<?php

include_once "ConexionBD.php";

$fk_CodProducto = $_GET['id'];
$select = "SELECT NombreProducto, Costo, Peso, Tamano, categoria, FechaFinalizacion from obra
inner join subasta on obra.PkCod_Producto = subasta.fkCodProducto
where fkCodProducto='".$fk_CodProducto."'";
$query = mysqli_query($conectar, $select);

$mostrar = mysqli_fetch_assoc($query);
$Nombre = $mostrar['NombreProducto'];
$Precio = $mostrar['Costo'];
$Peso = $mostrar['Peso'];
$Tamano = $mostrar['Tamano'];
$Categoria = $mostrar['categoria'];
$FechaFinalizacion = $mostrar['FechaFinalizacion'];

?>



<div class="row justify-content-end">
    <div class="col-md-7 order-md-2">
        <div class="contenedor container">
            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <h1 class="texto mb-3">Editar obra en subasta</h1>
                    <form action="ActualizarDatosSubasta.php" method="post">

                    <input type="hidden" name="id" value="<?php echo $fk_CodProducto; ?>">

                        <div class="col-12">
                            <label for="username" class="form-label">Nombre de la obra</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo $Nombre ?>" required>
                                <div class="invalid-feedback">
                                    Se requiere el nombre
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="col-12">
                            <label for="username" class="form-label">Precio minimo</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="precioinicial" placeholder="$" value="<?php echo $Precio ?>" required>
                                <div class="invalid-feedback">
                                    Se requiere el precio minimo de la obra
                                </div>
                            </div>
                        </div>

                        <br>

                            <div class="col-12">
                                <label for="firstName" class="form-label">Peso</label>
                                <input type="text" class="form-control" name="peso" placeholder="Peso ejemplo: 5 kg" value="<?php echo $Peso ?>" required>
                                <div class="invalid-feedback">
                                    Se requiere el peso de tu obra
                                </div>
                            </div>

                            <br>

                        <div class="col-12">
                          <label for="username" class="form-label">Tamaño</label>
                          <div class="input-group has-validation">
                              <input type="text" class="form-control" name="tamano" placeholder="Tamaño ejemplo: 40x80 cm" value="<?php echo $Tamano ?>" required>
                              <div class="invalid-feedback">
                                  Se requiere el tamaño de su obra
                              </div>
                          </div>
                      </div>

                      <br>

                    <div class="col-12">
                      <label for="username" class="form-label">Categoria de la obra</label>
                      <div class="input-group has-validation">
                          <input type="text" class="form-control" name="categoria" placeholder="Categoria (pintura, maqueta, ceramica, etc)" value="<?php echo $Categoria ?>" required>
                          <div class="invalid-feedback">
                              Se requiere la categoria de su obra
                          </div>
                      </div>
                  </div>

                  <br>

                    <div class="col-12">
                      <label for="username" class="form-label">Fecha finalizacion de su subasta</label>
                      <div class="input-group has-validation">
                          <input type="date" class="form-control" name="fechafinalizacion" placeholder="Tiempo" value="<?php echo $FechaFinalizacion ?>" required>
                          <div class="invalid-feedback">
                              Se requiere saber cuando se acaba la subasta
                          </div>
                      </div>
                  </div>

                  <br>
                        
                    <br>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-primary" type="submit">Editar obra en subasta</button>
                        <a href="GestionObraSubasta.php" class="btn btn-danger">Cancelar</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="col-md-5 order-md-1">
      <svg class="imagen bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="JS/checkout.js" defer></script>
<script src="JS/Script.js" defer></script>

  </body>
</html>