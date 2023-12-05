<?php

include_once "ConexionBD.php";

$Pk_identificacion = $_GET['id'];

$deleteUser = "DELETE FROM usuario WHERE Pk_identificacion = '$Pk_identificacion';";

$queryDelete = mysqli_query($conectar, $deleteUser);

if($queryDelete){

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