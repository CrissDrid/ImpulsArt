<?php

include_once "ConexionBD.php";

$fkCodProducto = $_GET['id'];

$deleteObra = "DELETE FROM obra WHERE PkCod_Producto = '$fkCodProducto'";
$deleteSubasta = "DELETE FROM subasta WHERE fkCodProducto = '$fkCodProducto'";

$queryDeleteObra = mysqli_query($conectar, $deleteObra);
$queryDeleteSubasta = mysqli_query($conectar, $deleteSubasta);

if($queryDeleteObra || $queryDeleteSubasta){

    echo "<script languaje='JavaScript'>
           alert('Se elimino correctamente de la base de datos');
           location.assign('GestionUsuario.php');
           </script>";

} 

else{

    echo "<script languaje='JavaScript'>
           alert('No se elimino de la base de datos');
           location.assign('GestionUsuario.php');
           </script>";

}

?>