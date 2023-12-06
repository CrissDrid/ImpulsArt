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
    <link rel="stylesheet" href="../CSS/EstiloRegistro.css">
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

<?php

  $Pk_identificacion = $_GET['id'];
  $select = "SELECT * FROM usuario where Pk_identificacion='".$Pk_identificacion."'";
  $query = mysqli_query($conectar, $select);

  $mostrar = mysqli_fetch_assoc($query);
  $Nombre = $mostrar['Nombre'];
  $Apellido = $mostrar['Apellidos'];
  $Email = $mostrar['Email'];
  $Contrasena = $mostrar['Contrasena'];
  $FechaNacimiento = $mostrar['FechaNacimiento'];
  $Direccion = $mostrar['Direccion'];
  $Numero = $mostrar['NumCelular'];

?>

      <div class="formulario-registro">
        <h1>Editar usuario</h1>

        <form action="ActualizarDatosUsuario.php" method="post">

        <div class="cedula">
            <input class="form-control" type="number" name="id" id="nombre" placeholder="Editar Cedula"  value="<?php echo $Pk_identificacion; ?>" required>
        </div>

        <br>

          <div class="nombre">
            <input class="form-control" type="text" name="Nombre" id="nombre" placeholder="Editar Nombre" value="<?php echo $Nombre; ?>" required>
        </div>

        <br>

        <div class="apellido">
            <input class="form-control" type="text" name="Apellidos" id="apellido" placeholder="Editar Apellido" value="<?php echo $Apellido; ?>" required>
        </div>

        <br>

        <div class="correo">
            <input class="form-control" type="email" name="Email" id="correo" placeholder="Editar Correo" value="<?php echo $Email; ?>" required>
        </div>

        <br>

        <div class="contrasena">
            <input class="form-control" type="password" name="Contrasena" id="contrasena" placeholder="Editar Contraseña" value="<?php echo $Contrasena; ?>" required>
        </div>

        <br>

        <div class="fecha_nacimiento">
            <input class="form-control" type="date" name="FechaNacimiento" id="fecha_nacimiento" placeholder="Editar Fecha de Nacimiento" value="<?php echo $FechaNacimiento; ?>" required>
        </div>

        <br>

        <div class="direccion">
            <input class="form-control" type="text" name="Direccion" id="direccion" placeholder="Editar direccion" value="<?php echo $Direccion; ?>" required>
        </div>

        <br>

        <div class="Numero">
            <input class="form-control" type="text" name="NumCelular" id="Numero" placeholder="Editar numero telefonico" value="<?php echo $Numero; ?>" required>
        </div>

        <br>

            <button type="submit">Confirmar edicion</button>
            <button type="button" class="bg-danger" onclick="RedirigirUsuario();">Cancelar</button>
</form>
    </div>
    
    <script>
    function RedirigirUsuario() {
      window.location.href = "GestionUsuario.php";
    }
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="JS/RedirigirPagina.js"></script>
</body>
</html>