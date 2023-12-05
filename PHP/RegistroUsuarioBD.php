<?php
require_once "ConexionBD.php";

$pk_identificacion = $_POST["id"];
$nombre = $_POST["nombre"];
$email = $_POST["correo"];
$apellidos = $_POST["apellido"];
$contrasena = $_POST["contrasena"];
$fechanacimiento = $_POST["fechanacimiento"];
$direccion = $_POST["direccion"];
$numcelular = $_POST["numero"];

$insert = "INSERT INTO usuario (pk_Identificacion, nombre, email, apellidos, contrasena, fechanacimiento, direccion, numcelular) VALUES ('$pk_identificacion', '$nombre', '$email', '$apellidos', '$contrasena', '$fechanacimiento', '$direccion', '$numcelular')";

$query = mysqli_query($conectar, $insert);

if($query){

    echo "Los datos se almacenaron exitosamente";

}

else{

    echo "Error al conectarse a la BD";

}

?>