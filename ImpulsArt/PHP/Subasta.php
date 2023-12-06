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
    <link rel="stylesheet" href="../CSS/EstiloSubasta.css">
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

<div class="container-fluid">

   <div class="row text-start">

      <div class="col-4 col-12 col-md-4 mx-auto">
         <img src="../Imagenes/Img 4.jpg" class="img-thumbnail d-flex w-auto align-items-center mx-auto" alt="obra">
      </div>

      <?php
      include_once "ConexionBD.php";

     $FkCodProducto = $_GET['id']; 

     //SELECT DEL PRODUCTO

     $selectObra = "SELECT * FROM obra WHERE PkCod_Producto = '$FkCodProducto'";
     $queryObra = mysqli_query($conectar, $selectObra);

     $mostrarObra = mysqli_fetch_assoc($queryObra);
     $peso = $mostrarObra['Peso'];
     $nombre = $mostrarObra['NombreProducto'];
     $tamano = $mostrarObra['Tamano'];
     $categoria = $mostrarObra['categoria'];
     $descripcion = $mostrarObra['descripcion'];

     //SELECT DEL PRODUCTO

     //-----------------------------------------------------------------------------------//

     //SELECT MAX OFERTA

     $selectOferta = "SELECT MAX(oferta.Monto) as MaxMonto from oferta
     inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
     inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
     WHERE PkCod_Producto = '$FkCodProducto'";
     $queryOferta = mysqli_query($conectar, $selectOferta);

     $mostrarOferta = mysqli_fetch_assoc($queryOferta);

     $OfertaMax = $mostrarOferta['MaxMonto'];

     //SELECT MAX OFERTA

      //-----------------------------------------------------------------------------------//

      //SELECT MAX MONTOS

     $selectMontos = "SELECT COUNT(oferta.PkCod_oferta) as Montos from oferta
     inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
     inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
     WHERE PkCod_Producto = '$FkCodProducto'";
     $queryMontos = mysqli_query($conectar, $selectMontos);

     $mostrarMontos = mysqli_fetch_assoc($queryMontos);

     $OfertaMax = $mostrarMontos['Montos'];

     //SELECT MAX MONTOS

     //-----------------------------------------------------------------------------------//

     //SELECT VALIDAR PRECIO INICIAL

     $selectPrecio = "SELECT PrecioInicial from subasta
     inner join oferta on subasta.PkCodSubasta = oferta.fkcod_subasta
     inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
     WHERE PkCod_Producto = '$FkCodProducto'";
     $queryPrecio = mysqli_query($conectar, $selectPrecio);

     $mostrarPrecio = mysqli_fetch_assoc($queryPrecio);

     $PrecioInicial = $mostrarPrecio['PrecioInicial'];

     //SELECT VALIDAR PRECIO INICIAL

    //-----------------------------------------------------------------------------------//

     

      echo "
        <div class='col-4 col-12 col-md-4'>
        <h1>{$mostrarObra['NombreProducto']}</h1>
        <br>
        <h5>Datos de la obra:</h5>
        <br>
        <h5>Peso: {$mostrarObra['Peso']}</h5>
        <br>
        <h5>Tamaño: {$mostrarObra['Tamano']}</h5>
      </div>

      <div class='col-4 col-12 col-md-4 ml-3' id='texto-tiempo'>
         <h5 class='text-danger' id='tiempo'>Tiempo restante: 2:30 hr</h5>
         <br>
         <h5>Categoria: {$mostrarObra['categoria']}</h5>
         <br>
         <h5>Descripcion: {$mostrarObra['descripcion']}</h5>
      </div>
   
   </div>

   <div class='row'>

    <div class='col-4 col-12 col-md-4 ml-3'>

    </div>

    <div class='col-8 col-12 col-md-4 ml-3 text-center d-flex w-50'>

    </div>
    
    </div>

    <br>
    <br>

   <div class='row'>

       <div class='col-4 col-12 col-md-4 ml-3 text-center'>
  
       </div>

       <div id='div-seccion-montos' class='col-8 col-12 col-md-4 ml-3 text-center d-flex'>

        <div id='d-flex' id='numero-montos'>
           <h2><i id='icono-monto' class='bi bi-currency-exchange align-top'></i><p id='numero'>{$mostrarMontos['Montos']}</p>Montos</h2>
         </div>

         <div id='d-flex'>
           <h2 id='precio-monto-alto'><i id='icono-monto-alto' class='bi bi-clipboard2-data-fill'></i><p id='oferta-alta'>La mas alta</p>{$mostrarOferta['MaxMonto']}</h2>
         </div>

         <div id='d-flex'>
          <img src='../imagenes/mazo.png' class='img-thumbnail d-flex w-100 align-items-center' alt='mazo'>
        </div>

       </div>
       
       </div>
        
       <br>";
       ?>

       <div class="row text-center">

        <div class="col-4 col-12 col-md-4 ml-3">
        
        <h1>Lista de montos:</h1>
        <br>

        <table class="table text-center justify-content-center align-items-center">

          <thead>
            <tr>
                <th>Nombre</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>

        <tbody>

        <?php

        //-----------------------------------------------------------------------------------//

        //SELECT LISTA DE MONTOS

        $selectLista = "SELECT usuario.Nombre, oferta.Monto, oferta.FechaOferta, oferta.HoraOferta 
        FROM usuario
        INNER JOIN oferta ON usuario.Pk_Identificacion = oferta.Fk_Identificacion
        INNER JOIN subasta ON oferta.fkcod_subasta = subasta.pkCodSubasta
        INNER JOIN obra ON subasta.fkCodProducto = obra.PkCod_Producto
        WHERE obra.PkCod_Producto = '$FkCodProducto'";
      $queryLista = mysqli_query($conectar, $selectLista);

      //SELECT LISTA DE MONTOS

      //-----------------------------------------------------------------------------------//

        while ($mostrarLista = mysqli_fetch_assoc($queryLista)) {
          
        ?>

      <tr>
        <td><?php echo $mostrarLista['Nombre']?></td>
        <td><?php echo $mostrarLista['Monto']?></td>
        <td><?php echo $mostrarLista['FechaOferta']?></td>
        <td><?php echo $mostrarLista['HoraOferta']?></td>
     </tr>
          <?php

      }
         ?>

      </tbody>
      </table>

        </div>

        <?php

      echo "
        <div id='div-seccion-montos' class ='col-8 col-12 col-md-4 ml-3'>

          <div id='montos-ofertas'>

            <form action='' method='post'>

              <h2 id='d-flex'>Tu monto actual:</h2>
              
              <input type='number' id='monto-actual' class='form-control' placeholder='$ 0 COP' min='{$mostrarPrecio['PrecioInicial']}' required>
              <button type='submit' class='btn text-white bg-success' style='position: relative; margin-left: 20px;'>Ingresar oferta</button>
              <br>
              <br>
              <br>

              <div class='d-flex' style='position: relative; left: 105px;'>

              <h5 class='text-center text-danger' style='position: relative; left: 90px; margin-right: 15px; top: -5px;'>Atencion:</h5>
              <p class='text-center' style='position: relative; left: 90px;'>Su monto debe tener un valor minimo de {$mostrarPrecio['PrecioInicial']}'</p>

              </div>

            <br>
            <br>
              
            </form>

          </div>

        </div>

      </div>";

      ?>
      

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>