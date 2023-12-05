<?php
include_once "ConexionBD.php";

$nombreProd = $_POST["nombreProd"];
$costo = $_POST["costo"];
$peso = $_POST["peso"];
$tamaño = $_POST["tamaño"];
$cantidad = $_POST["cantidad"];
$categoria = $_POST["categoria"];
$descripcion = $_POST["descripcion"];

$update = "UPDATE obra set NombreProducto='".$nombreProd."', Costo='".$costo."', Peso='".$peso."', Tamano='".$tamaño."', Cantidad='".$cantidad."', categoria='".$categoria."', descripcion='".$descripcion."'";

if($query){

    echo "Los datos se almacenaron exitosamente";
    echo "<br>";
    echo "<a href='GestioObras.php'>Ver Obras</a>";

}

else{

    echo "Error al conectarse a la BD";

}
?>