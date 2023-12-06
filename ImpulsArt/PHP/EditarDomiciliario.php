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

  $Fk_Identificacion = $_GET['id'];
  $select = "SELECT usuario.Pk_Identificacion, usuario.Email, usuario.Nombre, usuario.Apellidos, vehiculo.pk_placa, domiciliario.fk_placa, domiciliario.Salario, domiciliario.PkCod_domiciliario, domiciliario.EntregasPendientes, vehiculo.TipoVehiculo FROM usuario
  inner join domiciliario on usuario.Pk_Identificacion = domiciliario.Fk_identificacion
  inner join vehiculo on domiciliario.fk_placa = vehiculo.pk_placa
   where Fk_identificacion='".$Fk_Identificacion."'";
  $query = mysqli_query($conectar, $select);

  $mostrar = mysqli_fetch_assoc($query);
  $Nombre = $mostrar['Nombre'];
  $Apellido = $mostrar['Apellidos'];
  $Email = $mostrar['Email'];
  $TipoVehiculo = $mostrar['TipoVehiculo'];
  $Placa = $mostrar['pk_placa'];
  $PkCod_domiciliario = $mostrar['PkCod_domiciliario'];

?>

      <div class="formulario-registro">
        <h1>Editar Domiciliario</h1>
<!--Crear actualizar datos domiciliario-->
        <form action="ActualizarDatosDomiciliario.php" method="post">

        <div class="idDomiciliario">
            <input class="form-control" type="text" name="idDomiciliario" id="nombre" placeholder="Editar Nombre"  hidden value="<?php echo $PkCod_domiciliario; ?>">
        </div>

        <div class="nombre">
            <input class="form-control" type="text" name="placa" id="nombre" placeholder="Editar Nombre"  hidden value="<?php echo $Placa; ?>">
        </div>


        <div class="nombre">
            <input class="form-control" type="text" name="id" id="nombre" placeholder="Editar Nombre"  hidden value="<?php echo $Fk_Identificacion; ?>">
        </div>

        <br>

          <div class="nombre">
            <input class="form-control" type="text" name="Nombre" id="nombre" placeholder="Editar Nombre" value="<?php echo $Nombre; ?>">
        </div>

        <br>

        <div class="apellido">
            <input class="form-control" type="text" name="Apellidos" id="apellido" placeholder="Editar Apellido" value="<?php echo $Apellido; ?>">
        </div>

        <br>

        <div class="correo">
            <input class="form-control" type="email" name="Email" id="correo" placeholder="Editar Correo" value="<?php echo $Email; ?>">
        </div>

        <br>

        <div class="entregas">
            <input class="form-control" type="text" name="EntregasPendientes" id="entregas" placeholder="Editar Entregas Pendientes" value="<?php echo $Fk_Identificacion; ?>">
        </div>

        <br>

        <div class="TipoVehiculo">
        <select class="form-select" name="TipoVehiculo" aria-label="Default select example" value="<?php echo $TipoVehiculo; ?>">
              <option selected>Tipo de vehiculo</option>
              <option value="Automovil">Automovil</option>
              <option value="Camion">Camiones</option>
              <option value="Motocicleta">Motocicleta</option>
            </select> 
        </div>


        <br>

            <button type="submit">Confirmar edicion</button>
            <button type="button" class="bg-danger" onclick="RedirigirUsuario();">Cancelar</button>
</form>
    </div>
    
    <script>
    function RedirigirUsuario() {
      window.location.href = "GestionDomiciliario.php";
    }
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="JS/RedirigirPagina.js"></script>
</body>
</html>