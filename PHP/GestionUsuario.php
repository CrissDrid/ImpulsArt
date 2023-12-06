<?php

session_start();

include_once "ConexionBD.php";

$idUser = $_SESSION['id_user'];

$select = "SELECT * FROM usuario where Pk_Identificacion ='$idUser'";
$query = mysqli_query($conectar, $select);
$datos = mysqli_fetch_assoc($query);

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ImpulsArt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../Imagenes/cepillo-de-pintura.png">
    <link rel="stylesheet" href="../CSS/EstiloGestionUsuario.css">
    <link rel="stylesheet" href="../CSS/Estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="JS/Script.js" defer></script>
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

    <div class="row">

        <div class="col-4 col-12 col-md-4 ml-3">

        <button type="button" class="bot w-75 btn btn-success"  style="font-size: 35px;" onclick="RedirigirCrearUsuario()">Crear nuevo usuario +</button>

        </div>

        <div class="col-4 col-12 col-md-4 ml-3">
    
        </div>

        <div class="col-4 col-12 col-md-4 ml-3">

            <form action="GestionUsuario.php" method="get">
            <input class="form-control" type="text" name="busqueda" placeholder="Buscar por nombre o apellido" required>
            <br>
            <button type="submit" class="btn btn-outline-success" name="buscar">Buscar</button>
            </form>

            <br>

            <form action="GestionUsuario.php" method="get">
            <button name="MostrarTodo" type="submit" class="btn btn-outline-primary" style="position: relative; left: 100px; top: -63px;">Mostrar todos los registros</button>
          </form> 
          
        </div>

    </div>

    <div class="row">

        <div class="col-12">

        <table class="table text-center justify-content-center align-items-center">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>FechaNacimiento</th>
                    <th>Email</th>
                    <th>Numero Celular</th>
                    <th>Direccion</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
<?php
include_once "ConexionBD.php";

if (isset($_GET['buscar'])) {

    $buscar = $_GET['busqueda'];

    $select = "SELECT * FROM usuario WHERE Nombre LIKE '$buscar%' OR Apellidos LIKE '$buscar%' ORDER BY Pk_Identificacion";

    $query = mysqli_query($conectar, $select);

    while ($mostrar = mysqli_fetch_assoc($query)) {
        ?>
          <tr>
      <td><?php echo $mostrar['Pk_Identificacion']?></td>
      <td><?php echo $mostrar['Nombre']?></td>
      <td><?php echo $mostrar['Apellidos']?></td>
      <td><?php echo $mostrar['FechaNacimiento']?></td>
      <td><?php echo $mostrar['Email']?></td>
      <td><?php echo $mostrar['NumCelular']?></td>
      <td><?php echo $mostrar['Direccion']?></td>
      <td><?php echo $mostrar['Contrasena']?></td>
      <td>
        <div>
        <?php echo "<a class='btn btn-outline-primary' href='EditarUsuario.php?id=" . $mostrar['Pk_Identificacion'] . "'>EDITAR</a>";?>
        <?php echo "<a class='btn btn-outline-danger' href='EliminarUsuario.php?id=" . $mostrar['Pk_Identificacion'] . "'>BORRAR</a>";?>
       </div>
    </td>
   </tr>
        <?php
    }
}
    elseif (isset($_GET['MostrarTodo'])){

      $select = "SELECT * FROM usuario";
    $query = mysqli_query($conectar, $select);

    while ($mostrar = mysqli_fetch_assoc($query)) {
        ?>
           <tr>
      <td><?php echo $mostrar['Pk_Identificacion']?></td>
      <td><?php echo $mostrar['Nombre']?></td>
      <td><?php echo $mostrar['Apellidos']?></td>
      <td><?php echo $mostrar['FechaNacimiento']?></td>
      <td><?php echo $mostrar['Email']?></td>
      <td><?php echo $mostrar['NumCelular']?></td>
      <td><?php echo $mostrar['Direccion']?></td>
      <td><?php echo $mostrar['Contrasena']?></td>
      <td>
        <div>
        <?php echo "<a class='btn btn-outline-primary' href='EditarUsuario.php?id=" . $mostrar['Pk_Identificacion'] . "'>EDITAR</a>";?>
        <?php echo "<a class='btn btn-outline-danger' href='EliminarUsuario.php?id=" . $mostrar['Pk_Identificacion'] . "'>BORRAR</a>";?>
       </div>
    </td>
   </tr>
        <?php
    }

    }

 else {
    $select = "SELECT * FROM usuario";
    $query = mysqli_query($conectar, $select);

    while ($mostrar = mysqli_fetch_assoc($query)) {
        ?>
           <tr>
      <td><?php echo $mostrar['Pk_Identificacion']?></td>
      <td><?php echo $mostrar['Nombre']?></td>
      <td><?php echo $mostrar['Apellidos']?></td>
      <td><?php echo $mostrar['FechaNacimiento']?></td>
      <td><?php echo $mostrar['Email']?></td>
      <td><?php echo $mostrar['NumCelular']?></td>
      <td><?php echo $mostrar['Direccion']?></td>
      <td><?php echo $mostrar['Contrasena']?></td>
      <td>
        <div>
        <?php echo "<a class='btn btn-outline-primary' href='EditarUsuario.php?id=" . $mostrar['Pk_Identificacion'] . "'>EDITAR</a>";?>
        <?php echo "<a class='btn btn-outline-danger' href='EliminarUsuario.php?id=" . $mostrar['Pk_Identificacion'] . "'>BORRAR</a>";?>
       </div>
    </td>
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
<script>
function RedirigirCrearUsuario() {
  window.location.href = "../CrearUsuario.html";
}
</script>
    <script src="JS/RedirigirPagina.js"></script>
    <script src="JS/Pagina.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>