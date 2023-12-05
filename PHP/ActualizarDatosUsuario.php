<?php

include_once "ConexionBD.php";

    $Pk_identificacion = $_POST['id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellidos'];
    $Email = $_POST['Email'];
    $Contrasena = $_POST['Contrasena'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $Direccion = $_POST['Direccion'];
    $Numero = $_POST['NumCelular'];
    
    $update = "UPDATE usuario set  Nombre='".$Nombre."',  Apellidos='".$Apellido."',  Email='".$Email."',  Contrasena='".$Contrasena."',  FechaNacimiento='".$FechaNacimiento."',  Direccion='".$Direccion."'  where Pk_identificacion='".$Pk_identificacion."'";
    $query = mysqli_query($conectar, $update);
    
    if($query){

        echo "Los datos se almacenaron exitosamente";
        echo "<br>";
        echo "<a href='GestionUsuario.php'>Ver Usuario</a>";
    
    }
    
    else{
    
        echo "Error al conectarse a la BD";
    
    }

?>