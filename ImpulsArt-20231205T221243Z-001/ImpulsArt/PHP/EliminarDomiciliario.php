<?php

include_once "ConexionBD.php";

$PkCod_domiciliario = $_GET['id'];

$deleteUser = "DELETE FROM domiciliario WHERE PkCod_domiciliario = '$PkCod_domiciliario';";

$queryDelete = mysqli_query($conectar, $deleteUser);

if($queryDelete){

    echo "<script languaje='JavaScript'>
           alert('Se elimino correctamente de la base de datos');
           location.assign('GestionDomiciliario.php');
           </script>";

} 

else{

    echo "<script languaje='JavaScript'>
           alert('No se elimino de la base de datos');
           location.assign('GestionDomiciliario.php');
           </script>";

}

?>