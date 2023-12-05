<?php

include_once "ConexionBD.php";

    $Pk_identificacion = $_POST['id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellidos'];
    $Email = $_POST['Email'];
    $TipoVehiculo = $_POST['TipoVehiculo'];
    $Placa = $_POST['placa'];
    $PkCod_domiciliario = $_POST['idDomiciliario'];
    
    $updateUsuario = "UPDATE usuario set  Nombre='".$Nombre."',  Apellidos='".$Apellido."',  Email='".$Email."' WHERE PK_Identificacion ='".$Pk_identificacion."' ";
    $updateVehiculo = "UPDATE vehiculo set  TipoVehiculo='".$TipoVehiculo."' WHERE pk_placa ='".$Placa."' ";
    $query1 = mysqli_query($conectar, $updateUsuario);
    $query2 = mysqli_query($conectar, $updateVehiculo);
    
    if($query1 || $query2){

        echo "Los datos se almacenaron exitosamente";
        echo "<br>";
        echo "<a href='GestionDomiciliario.php'>Ver Usuario</a>";
    
    }
    
    else{
    
        echo "Error al conectarse a la BD";
    
    }

?>