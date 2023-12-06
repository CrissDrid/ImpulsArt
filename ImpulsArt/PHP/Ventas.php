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
    <link rel="shortcut icon" href="Imagenes/cepillo-de-pintura.png">
    <link rel="stylesheet" href="../CSS/Estilo.css">
    <link rel="stylesheet" href="../CSS/EstilosVentas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="../JS/checkout.js" defer></script>
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

<div class="container">
<main>
<div class="row g-5">
  <div class="col-md-5 col-lg-4 order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="texto">Carrito de Compras</span>
      <span class="cant badge rounded-pill">2</span>
    </h4>
    <ul class="list-group mb-3">
      <li class="list-group-item d-flex justify-content-between lh-sm">
        <div>
          <h6 class="my-0">Autorretrato</h6>
          <small class="text-body-secondary">Adaptacion del Autorretrato de Van Gohg</small>
        </div>
        <span class="text-body-secondary">$120.000</span>
      </li>
      <li class="list-group-item d-flex justify-content-between lh-sm">
        <div>
          <h6 class="my-0">Florero</h6>
          <small class="text-body-secondary">Florero hecho en arcilla cocida al horno</small>
        </div>
        <span class="text-body-secondary">$60.000</span>
      </li>
      <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
        <div class="text-success">
          <h6 class="my-0">Codigo Descuento</h6>
          <small>XYWMS</small>
        </div>
        <span class="text-success">−$10.000</span>
      </li>
      <li class="list-group-item d-flex justify-content-between">
        <span>Total (COP)</span>
        <strong>$170.000</strong>
      </li>
    </ul>

    <form class="card p-2">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Codigo Promocion">
        <button type="submit" class="bot btn btn-secondary">Buscar</button>
      </div>
    </form>
  </div>
  <div class="col-md-7 col-lg-8">
    <h1 class="texto mb-3">Compras</h1>
    <form class="needs-validation" novalidate>
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="firstName" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
          <div class="invalid-feedback">
            Se requiere el nombre
          </div>
        </div>

        <br>

        <div class="col-sm-6">
          <label for="lastName" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
          <div class="invalid-feedback">
            Se requiere el apellido
          </div>
        </div>

        <br>

        <div class="col-12">
          <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
        <br>
        <br>

        <div class="col-md-5">
          <label for="country" class="form-label">País</label>
          <select class="form-select" id="country" required>
            <option value="">Seleccionar</option>
            <option>Colombia</option>
          </select>
          <div class="invalid-feedback">
            Selecciona un pais porfavor
          </div>
        </div>

        <br>

        <div class="col-md-4">
          <label for="state" class="form-label">Departamento</label>
          <select class="form-select" id="state" required>
            <option value="">Seleccionar</option>
            <option>Barranquilla</option>
            <option>Bogotá D.C</option>
            <option>Medellin</option>
            <option>Villavicencio</option>
            <option>Yopal</option>
          </select>
          <div class="invalid-feedback">
            Selecciona un departamento porfavor
          </div>
        </div>

        <br>

        <div class="col-md-3">
          <label for="zip" class="form-label">Codigo Postal</label>
          <input type="text" class="form-control" id="zip" placeholder="" required>
          <div class="invalid-feedback">
            Codigo Postal requerido
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="check form-check">
        <input type="checkbox" class="form-check-input" id="same-address">
        <label class="form-check-label" for="same-address">Desea que se le envie recibo al e-mail</label>
      </div>

      <br>

      <div class="check form-check">
        <input type="checkbox" class="form-check-input" id="save-info">
        <label class="form-check-label" for="save-info">Recordar mi informacion</label>
      </div>  
      <br>
      <br>
      <h4 class="mb-3">Metodo de Pago</h4>

      <div class="my-3">
        <div class="form-check">
          <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
          <label class="form-check-label" for="credit">Tarjeta Credito</label>
        </div>
        <div class="form-check">
          <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
          <label class="form-check-label" for="debit">Tarjeta Debito</label>
        </div>
        <div class="form-check">
          <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
          <label class="form-check-label" for="paypal">PayPal</label>
        </div>
        <div class="form-check">
          <input id="contra" name="paymentMethod" type="radio" class="form-check-input" required>
          <label class="form-check-label" for="paypal">Pago Contraentrega</label>
        </div>
        <div class="form-check">
          <input id="fisico" name="paymentMethod" type="radio" class="form-check-input" required>
          <label class="form-check-label" for="paypal">Pago Punto Fisico</label>
        </div>
      </div>

      <div class="row gy-3">
        <div class="col-md-6">
          <label for="cc-name" class="form-label">Nombre de la Tarjeta</label>
          <input type="text" class="form-control" id="cc-name" placeholder="" required>
          <small class="text-body-secondary">Nombre del propietario de la tarjeta</small>
          <div class="invalid-feedback">
            Name on card is required
          </div>
        </div>

        <div class="col-md-6">
          <label for="cc-number" class="form-label">Numero de la Tarjeta</label>
          <input type="text" class="form-control" id="cc-number" placeholder="" required>
          <div class="invalid-feedback">
            Credit card number is required
          </div>
        </div>

        <div class="col-md-3">
          <label for="cc-expiration" class="form-label">Fecha de Expiration</label>
          <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
          <div class="invalid-feedback">
            Expiration date required
          </div>
        </div>

        <div class="col-md-3">
          <label for="cc-cvv" class="form-label">CVV</label>
          <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
          <div class="invalid-feedback">
            Security code required
          </div>
        </div>
      </div>
      <br>
      <br>
      <hr class="my-4">
      <br>


      <button class="bot w-100 btn btn-primary btn-lg" type="submit">Pagar</button>
      <br>
      <br>
      <br>
      <br>
  </div>
</div>
</main>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>