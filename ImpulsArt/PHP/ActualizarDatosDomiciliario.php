<?php

include_once "ConexionBD.php";

    $Pk_identificacion = $_POST['id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellidos'];
    $Email = $_POST['Email'];
    $TipoVehiculo = $_POST['TipoVehiculo'];
    $Placa = $_POST['placa'];
    $PkCod_domiciliario = $_POST['idDomiciliario'];
    $EntregasPendientes = $_POST['EntregasPendientes'];
    
    $updateUsuario = "UPDATE usuario set  Nombre='".$Nombre."',  Apellidos='".$Apellido."',  Email='".$Email."' WHERE PK_Identificacion ='".$Pk_identificacion."' ";
    $updateVehiculo = "UPDATE vehiculo set  TipoVehiculo='".$TipoVehiculo."' WHERE pk_placa ='".$Placa."'";
    $updateDomiciliario = "UPDATE domiciliario set fk_placa = '".$Placa."', EntregasPendientes ='".$EntregasPendientes."' WHERE Fk_identificacion = '".$Pk_identificacion."'";
    
    $query1 = mysqli_query($conectar, $updateUsuario);
    $query2 = mysqli_query($conectar, $updateVehiculo);
    $query3 = mysqli_query($conectar, $updateDomiciliario);
    
    if($query1 || $query2 || $query3){

        echo "Los datos se almacenaron exitosamente";
        echo "<br>";
        echo "<a href='GestionDomiciliario.php'>Ver Usuario</a>";
    
    }
    
    else{
    
        echo "Error al conectarse a la BD";
    
    }

?>