<?php 

session_start();

include_once "ConexionBD.php";
  
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
  
$select = "SELECT * FROM usuario WHERE Email = '{$correo}' AND Contrasena = '{$contraseña}'";
            $query = mysqli_query($conectar, $select);

$mostrar = mysqli_num_rows($query);

if($mostrar){

    $datos = mysqli_fetch_assoc($query);
    $permiso = $datos['TipoUsuario'];

    $_SESSION['id_user'] = $datos['Pk_Identificacion'];

    if($permiso == 'administrador'){

        
        header('Location: ImpulsArt(administrador).php');
        exit();

    }

    elseif($permiso == 'usuario comun'){

        header('Location: ImpulsArt.php');
        exit();

    }

    else{

        echo "<script languaje='JavaScript'>
           alert('Permiso o rol no encontrados');
           location.assign('../IniciarSesion.html');
           </script>";

    }

}

else{

    echo "<script languaje='JavaScript'>
           alert('El correo y/o contraseña son incorrectos');
           location.assign('../IniciarSesion.html');
           </script>";

}

?>