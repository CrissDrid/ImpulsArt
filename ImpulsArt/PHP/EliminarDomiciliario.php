<?php

include_once "ConexionBD.php";

$Pk_Identificacion = $_GET['id'];

$deleteUser = "DELETE usuario, domiciliario, vehiculo FROM usuario
JOIN domiciliario ON usuario.Pk_Identificacion = domiciliario.Fk_identificacion
JOIN vehiculo ON domiciliario.fk_placa = vehiculo.pk_placa
WHERE usuario.Pk_Identificacion = '$Pk_Identificacion'";

$queryDelete = mysqli_query($conectar, $deleteUser);

if ($queryDelete) {
    echo "Los datos se eliminaron exitosamente";
    echo "<br>";
    echo "<a href='GestionDomiciliario.php'>Ver Usuario</a>";
} else {
    echo "<script language='JavaScript'>
           alert('No se eliminó de la base de datos');
           location.assign('GestionDomiciliario.php');
           </script>";
}

?>
