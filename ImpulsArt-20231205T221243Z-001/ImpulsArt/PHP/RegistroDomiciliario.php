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

$IngPlaca = $_POST["placa"];
$IngMarca = $_POST["marca"];
$TipVehiculo = $_POST ["TipoVehiculo"];
$Model = $_POST ["modelo"];


$insert1 = "INSERT INTO usuario (pk_Identificacion, nombre, email, apellidos, contrasena, fechanacimiento, direccion, numcelular) VALUES ('$pk_identificacion', '$nombre', '$email', '$apellidos', '$contrasena', '$fechanacimiento', '$direccion', '$numcelular')";
$insert2 = "INSERT INTO vehiculo (pk_placa, marca, TipoVehiculo, modelo) VALUES ('$IngPlaca', '$IngMarca', '$TipVehiculo', '$Model')";
$query1 = mysqli_query($conectar, $insert1);
$query2 = mysqli_query($conectar, $insert2);
if($query1 || $query2){

    echo "Los datos se almacenaron exitosamente";

}

else{

    echo "Error al conectarse a la BD";

}

?>