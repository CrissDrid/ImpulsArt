<?php
include_once "ConexionBD.php";
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
    <script src="JS/Registro.js" defer></script>
  </head>
  <body>
    <header>
    <div class="container-fluid-1">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="titulo1">Impuls</h1>
            <h1 class="titulo2">Art</h1>
            <img class="pincel img-fluid" src="../Imagenes/cepillo-de-pintura.png" alt="">
          </div>
        </div>
      </div>
</header>

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