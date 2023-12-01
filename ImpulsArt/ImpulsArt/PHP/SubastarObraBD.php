<?php
require_once "ConexionBD.php";

$nombreObra = $_POST["nombre"];
$precioinicial = $_POST["precioinicial"];
$peso = $_POST["peso"];
$tamano = $_POST["tamano"];
$categoria = $_POST["categoria"];
$fechafinalizacion = $_POST["fechafinalizacion"];
$duracionsubasta = $_POST["duracionsubasta"];

$insertObra = "INSERT INTO subasta (precioInicial, FechaInicio, fechafinalizacion, duracionsubasta, FkCod_Obra) VALUES ('$precioinicial', CURDATE(), '$fechafinalizacion', '$duracionsubasta', (SELECT MAX(PkCod_Obra) FROM obra))";
$insertSubasta = "INSERT INTO obra (nombreObra, peso, tamano, categoria) VALUES ('$nombreObra', '$peso', '$tamano', '$categoria')"; 

$queryObra = mysqli_query($conectar, $insertObra);
$querySubasta = mysqli_query($conectar, $insertSubasta);

if($queryObra && $querySubasta){

    echo "Los datos se almacenaron exitosamente";

}

else{

    echo "Error al conectarse a la BD";

}

?>