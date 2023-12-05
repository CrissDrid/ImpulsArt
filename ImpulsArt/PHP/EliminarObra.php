<?php

include_once "ConexionBD.php";

$PkCod_Producto = $_GET['id'];

$deleteUser = "DELETE FROM obra WHERE PkCod_Producto = '$PkCod_Producto';";

$queryDelete = mysqli_query($conectar, $deleteUser);

if($queryDelete){

    echo "<script languaje='JavaScript'>
           alert('Se elimino correctamente de la base de datos');
           location.assign('GestionObras.php');
           </script>";

} 

else{

    echo "<script languaje='JavaScript'>
           alert('No se elimino de la base de datos');
           location.assign('GestionObras.php');
           </script>";

}

?>