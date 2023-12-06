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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../Imagenes/cepillo-de-pintura.png">
    <link rel="stylesheet" href="../CSS/Estilo.css">
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
                          <a class="nav-link" href="ImpulsArt.php">Inicio</a>
                        </li>
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
                        <?php
                        if (isset($_SESSION['id_user'])) {

                        $idUser = $_SESSION['id_user'];
                        $select = "SELECT * FROM usuario WHERE Pk_Identificacion ='$idUser'";
                        $query = mysqli_query($conectar, $select);

                        if ($query) {
                            $datos = mysqli_fetch_assoc($query);

                            if ($datos['TipoUsuario'] == 'administrador') {
                                mostrarOpcionesAdministrador();
                            }
                        }
                    }
                    ?>
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
<br>
<br>

<div class="container">

<div class="row">

<div class="col-4" style="position: relative; left: -18rem; ">

   <form action="GestionObraSubasta.php" method="get">
      <input class="form-control" type="text" name="busqueda" placeholder="Buscar por nombre o apellido" required>
      <br>
      <button type="submit" class="btn btn-outline-success" name="buscar">Buscar</button>
      </form>

      <br>

      <form action="GestionObraSubasta.php" method="get">
      <button name="MostrarTodo" type="submit" class="btn btn-outline-primary" style="position: relative; left: 100px; top: -63px;">Mostrar todos los registros</button>
    </form> 

 </div>

 <div class="col-4">

 </div>

<div class="col-4">

<a href="../Reportes/ReportesSubasta.php" class="btn btn-success">Opcion Reportes</a>

</div>

</div>

</div>

<?php

include_once "ConexionBD.php";

    if(isset($_GET['buscar'])){

    $buscar = $_GET['busqueda'];

    $select = "SELECT Peso, Tamano, categoria, descripcion, NombreProducto, fkCodProducto, FechaFinalizacion from subasta
    inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
    WHERE NombreProducto LIKE '$buscar%'";

    $query = mysqli_query($conectar, $select);

    while($mostrar = mysqli_fetch_assoc($query)){

      ?>

    <div class="container">

    <div class="row">

       <div class="col-12">

       <a class="btn text-white" style="position: relative; margin-left: 2.5rem; top: 2.8rem; background: blueviolet;">Editar</a>
       <a class="btn text-white" style="position: relative; margin-left: 1rem; top: 2.8rem; background: blueviolet;">Eliminar</a>

       </div>
       
    </div>

</div>

<div class="container obra" style="position: relative; margin-top: -5rem;">

        <div class="row"> 

      <div class="col-12">

        <h5 class="TituloObra"><?php echo $mostrar['NombreProducto']; ?></h5>

        <div class="contenedor-foto">

          <img src="../Imagenes/Img 7.jpg" alt="Descripción de la imagen">

        </div>

        <a class="btn text-white"  href="Subasta.php?id=<?php echo $mostrar['fkCodProducto']; ?>" style="margin-left: 4.5rem; background: blueviolet;">Ver curso de la subasta</a>

      </div>

    </div>

    <div class="row">

      <div class="col-4">
        
      </div>

      <div class="col-4">

        <div class="d-flex">
          <h5 class="informacion">Peso:</h5>
          <h5><?php echo $mostrar['Peso']; ?></h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Tamaño:</h5>
          <h5><?php echo $mostrar['Tamano']; ?></h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Categoria:</h5>
          <h5><?php echo $mostrar['categoria']; ?></h5>
        </div>

        <br>

      </div>

      <div class="col-4">

      <div class="d-flex">
          <h5 class="informacion">Montos:</h5>
          <h5>8</h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Oferta mas alta:</h5>
          <h5>50000</h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Fecha finalizacion:</h5>
          <h5><?php echo $mostrar['FechaFinalizacion']; ?></h5>
        </div>

         <br>

      </div>

    </div>  
    
</div>

  <?php

    }

  }

  elseif (isset($_GET['MostrarTodo'])){

    $select = "SELECT Peso, Tamano, categoria, descripcion, fkCodProducto, NombreProducto, FechaFinalizacion from subasta
    inner join obra on subasta.fkCodProducto = obra.PkCod_Producto";
    $query = mysqli_query($conectar, $select);


    while($mostrar = mysqli_fetch_assoc($query)){

      ?>

    <div class="container">

    <div class="row">

       <div class="col-12">

       <a class="btn text-white" style="position: relative; margin-left: 2.5rem; top: 2.8rem; background: blueviolet;">Editar</a>
       <a class="btn text-white" style="position: relative; margin-left: 1rem; top: 2.8rem; background: blueviolet;">Eliminar</a>

       </div>
       
    </div>

</div>

<div class="container obra" style="position: relative; margin-top: -5rem;">

        <div class="row"> 

      <div class="col-12">

        <h5 class="TituloObra"><?php echo $mostrar['NombreProducto']; ?></h5>

        <div class="contenedor-foto">

          <img src="../Imagenes/Img 7.jpg" alt="Descripción de la imagen">

        </div>

        <a class="btn text-white" style="margin-left: 4.5rem; background: blueviolet;">Ver curso de la subasta</a>

      </div>

    </div>

    <div class="row">

      <div class="col-4">
        
      </div>

      <div class="col-4">

        <div class="d-flex">
          <h5 class="informacion">Peso:</h5>
          <h5><?php echo $mostrar['Peso']; ?></h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Tamaño:</h5>
          <h5><?php echo $mostrar['Tamano']; ?></h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Categoria:</h5>
          <h5><?php echo $mostrar['categoria']; ?></h5>
        </div>

        <br>

      </div>

      <div class="col-4">

      <div class="d-flex">
          <h5 class="informacion">Montos:</h5>
          <h5>8</h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Oferta mas alta:</h5>
          <h5>50000</h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Fecha finalizacion:</h5>
          <h5><?php echo $mostrar['FechaFinalizacion']; ?></h5>
        </div>

         <br>

      </div>

    </div>  
    
</div>

  <?php

    }

  }

  else{

    $select = "SELECT Peso, Tamano, categoria, descripcion, fkCodProducto, NombreProducto, FechaFinalizacion from subasta
    inner join obra on subasta.fkCodProducto = obra.PkCod_Producto";
    $query = mysqli_query($conectar, $select);


    while($mostrar = mysqli_fetch_assoc($query)){

      ?>

    <div class="container">

    <div class="row">

       <div class="col-12">

       <a class="btn text-white" style="position: relative; margin-left: 2.5rem; top: 2.8rem; background: blueviolet;">Editar</a>
       <a class="btn text-white" style="position: relative; margin-left: 1rem; top: 2.8rem; background: blueviolet;">Eliminar</a>

       </div>
       
    </div>

</div>

<div class="container obra" style="position: relative; margin-top: -5rem;">

        <div class="row"> 

      <div class="col-12">

        <h5 class="TituloObra"><?php echo $mostrar['NombreProducto']; ?></h5>

        <div class="contenedor-foto">

          <img src="../Imagenes/Img 7.jpg" alt="Descripción de la imagen">

        </div>

        <a class="btn text-white" style="margin-left: 4.5rem; background: blueviolet;">Ver curso de la subasta</a>

      </div>

    </div>

    <div class="row">

      <div class="col-4">
        
      </div>

      <div class="col-4">

        <div class="d-flex">
          <h5 class="informacion">Peso:</h5>
          <h5><?php echo $mostrar['Peso']; ?></h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Tamaño:</h5>
          <h5><?php echo $mostrar['Tamano']; ?></h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Categoria:</h5>
          <h5><?php echo $mostrar['categoria']; ?></h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Tiempo restante:</h5>
          <h5>2:45 hr</h5>
        </div>

        <br>

      </div>

      <div class="col-4">

      <div class="d-flex">
          <h5 class="informacion">Montos:</h5>
          <h5>8</h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Oferta mas alta:</h5>
          <h5>50000</h5>
        </div>

        <br>

        <div class="d-flex">
          <h5 class="informacion">Fecha finalizacion:</h5>
          <h5><?php echo $mostrar['FechaFinalizacion']; ?></h5>
        </div>

         <br>

      </div>

    </div>  
    
</div>

  <?php

    }

  }

  ?>

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
    <div class="container-fluid-1">
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