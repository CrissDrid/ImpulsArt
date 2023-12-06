<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ImpulsArt</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../Imagenes/cepillo-de-pintura.png">
    <link rel="stylesheet" href="../CSS/EstiloGestionObraSubasta.css">
    <link rel="stylesheet" href="../CSS/Estilo.css">
    <link rel="stylesheet" href="../CSS/EstiloReporte.css" media="print" media="pdf">
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
    <div class="container-fluid-1 Desaparecer">
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
                          <a class="nav-link" href="ImpulsArt.php">Inicio</a>
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
                        <img class="pincel img-fluid" src="../Imagenes/cepillo-de-pintura.png" alt="">
                    </div>

                    <div class="columna-link col-12 col-md-4 col-lg-4 ">
                      <ul class="nav nav-underline justify-content-end">
                        <li class="nav-item">
                          <a class="nav-link link-light" href="Registrarse.html">Registrarse </a>
                        </li>
                        <h5 class="separacion">/</h6>
                        <li class="nav-item">
                          <a class="nav-link link-light" href="IniciarSesion.html"> Iniciar Sesion</a>
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

<div class="container-fluid">

    <div class="row Desaparecer">

        <div class="col-4 col-12 col-md-4 ml-3">

        <a class="Desaparecer btn btn-warning" onclick="window.print()">Imprimir+</a>
        <a class="Desaparecer btn btn-success" href="Excel.php">Exportar Excel+</a>

        </div>

        <div class="col-4 col-12 col-md-4 ml-3">
    
        </div>

        <div class="col-4 col-12 col-md-4 ml-3">

            <form action="ReportesSubasta.php" method="get">
            <input class="form-control" type="text" name="busqueda" placeholder="Buscar por fecha de inicio o fecha de finalizacion de la subasta" required>
            <br>
            <button type="submit" class="btn btn-outline-success" name="buscar">Buscar</button>
            </form>

            <br>

            <form action="ReportesSubasta.php" method="get">
            <button name="MostrarTodo" type="submit" class="btn btn-outline-primary" style="position: relative; left: 100px; top: -63px;">Mostrar todos los registros</button>
          </form> 
          
          <a class="btn btn-danger" href="../PHP/GestionObraSubasta.php" style="position: relative; left: 350px; top: -100px;">Regresar</a>

        </div>

    </div>

    <div class="row">

        <div class="col-12">

        <table class="table text-center justify-content-center align-items-center">

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de finalizacion</th>
                    <th>Fecha de inicio</th>
                    <th>Categoria</th>
                    <th>Ofertas ofrecidas</th>
                    <th>Oferta mas alta</th>
                </tr>
            </thead>

            <tbody>
<?php

include_once "../PHP/ConexionBD.php";

if (isset($_GET['buscar'])) {

    $buscar = $_GET['busqueda'];

    $select = "SELECT COUNT(oferta.PkCod_oferta) as Montos, MAX(oferta.Monto) as MaxMonto, Peso, Tamano, categoria, descripcion, NombreProducto, fkCodProducto, FechaFinalizacion, FechaInicio from oferta
    inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
    inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
    WHERE FechaFinalizacion LIKE '$buscar%' or FechaInicio LIKE '$buscar%'
    group by subasta.pkCodSubasta";

    $query = mysqli_query($conectar, $select);

    while ($mostrar = mysqli_fetch_assoc($query)) {
        ?>
          <tr> 
      <td><?php echo $mostrar['NombreProducto']?></td>
      <td><?php echo $mostrar['FechaFinalizacion']?></td>
      <td><?php echo $mostrar['FechaInicio']?></td>
      <td><?php echo $mostrar['categoria']?></td>
      <td><?php echo $mostrar['Montos']?></td>
      <td><?php echo $mostrar['MaxMonto']?></td>
   </tr>
        <?php
    }
}
    elseif (isset($_GET['MostrarTodo'])){

      $select = "SELECT COUNT(oferta.PkCod_oferta) as Montos, MAX(oferta.Monto) as MaxMonto, Peso, Tamano, categoria, descripcion, NombreProducto, fkCodProducto, FechaFinalizacion, FechaInicio from oferta
      inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
      inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
      group by subasta.pkCodSubasta";
      $query = mysqli_query($conectar, $select);

    while ($mostrar = mysqli_fetch_assoc($query)) {
        ?>
           <tr>
           <tr>
      <td><?php echo $mostrar['NombreProducto']?></td>
      <td><?php echo $mostrar['FechaFinalizacion']?></td>
      <td><?php echo $mostrar['FechaInicio']?></td>
      <td><?php echo $mostrar['categoria']?></td>
      <td><?php echo $mostrar['Montos']?></td>
      <td><?php echo $mostrar['MaxMonto']?></td>
   </tr>
        <?php
    }

    }

 else {
    $select = "SELECT COUNT(oferta.PkCod_oferta) as Montos, MAX(oferta.Monto) as MaxMonto, Peso, Tamano, categoria, descripcion, NombreProducto, fkCodProducto, FechaFinalizacion, FechaInicio from oferta
    inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
    inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
    group by subasta.pkCodSubasta";
    $query = mysqli_query($conectar, $select);

    while ($mostrar = mysqli_fetch_assoc($query)) {
        ?>
           <tr>
      <td><?php echo $mostrar['NombreProducto']?></td>
      <td><?php echo $mostrar['FechaFinalizacion']?></td>
      <td><?php echo $mostrar['FechaInicio']?></td>
      <td><?php echo $mostrar['categoria']?></td>
      <td><?php echo $mostrar['Montos']?></td>
      <td><?php echo $mostrar['MaxMonto']?></td>
   </tr>
        <?php
    }
}
?>
</tbody>

</table>

</div>

    </div>

  </div>

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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid-1 Desaparecer">
      <footer class="py-5 w-100">
        <div class="row">
          <div class="cont col-6 col-md-2 mb-4">
            <h5>Secciones</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Inicio</a></li>
              <li class="nav-item mb-2"><a href="Ventas.html" class="nav-link p-0 text-body-secondary">Carrito de Compras</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">PQRS</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Perfil</a></li>
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
            <form>
              <h5>Compra la membresia</h5>
              <p>Podras tener varios privilegios durante tus compras</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Comprar</button>
              </div>
            </form>
          </div>

        </div>
        <br>
        <br>
        <div class="d-flex flex-column flex-sm-row justify-content-center border-top">
          <p>© 2023 ImpulsArt Company, Inc.</p>
        </div>
      </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>