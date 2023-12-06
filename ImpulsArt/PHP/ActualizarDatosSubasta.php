<?php

include_once "ConexionBD.php";

    $fk_CodProducto = $_POST['id'];
    $Nombre = $_POST['nombre'];
    $Precio = $_POST['precioinicial'];
    $Peso = $_POST['peso'];
    $Tamano = $_POST['tamano'];
    $Categoria = $_POST['categoria'];
    $FechaFinalizacion = $_POST['fechafinalizacion']; 
    
    $updateObra = "UPDATE obra set  NombreProducto='".$Nombre."',  Costo='".$Precio."',  Peso='".$Peso."',  Tamano='".$Tamano."',  categoria='".$Categoria."'
    where PkCod_Producto='".$fk_CodProducto."'";

    $updateSubasta = "UPDATE subasta set FechaFinalizacion='". $FechaFinalizacion."'
    where fkCodProducto='".$fk_CodProducto."'";

    $queryObra = mysqli_query($conectar, $updateObra);
    $querySubasta = mysqli_query($conectar, $updateSubasta);
    
    if($queryObra || $querySubasta){

        echo "Los datos se almacenaron exitosamente";
        echo "<br>";
        echo "<a href='GestionObraSubasta.php'>Ver obras en subasta</a>";
    
    }
    
    else{
    
        echo "Error al conectarse a la BD";
    
    }

?>