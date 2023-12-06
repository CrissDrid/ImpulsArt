<?php
require_once "ConexionBD.php";

$pk_identificacion = $_POST["ids"];
$nombre = $_POST["nombres"];
$email = $_POST["correo"];
$apellidos = $_POST["apellidos"];
$contrasena = $_POST["contrasena"];
$fechanacimiento = $_POST["fecha_nacimiento"];
$direccion = $_POST["direccion"];
$numcelular = $_POST["Numero"];
$salario = $_POST ["salario"];

$IngPlaca = $_POST["placa"];
$IngMarca = $_POST["marca"];
$TipVehiculo = $_POST ["TipoVehiculo"];
$Model = $_POST ["modelo"];


$insert1 = "INSERT INTO usuario (Pk_Identificacion, Nombre, Email,  Apellidos, Contrasena, FechaNacimiento, Direccion, NumCelular) VALUES ('$pk_identificacion', '$nombre', '$email', '$apellidos', '$contrasena', '$fechanacimiento', '$direccion', '$numcelular')";
$insert2 = "INSERT INTO vehiculo (pk_placa, marca, TipoVehiculo, modelo) VALUES ('$IngPlaca', '$IngMarca', '$TipVehiculo', '$Model')";
$insert3 = "INSERT INTO domiciliario (Salario, EntregasPendientes, fk_placa, Fk_identificacion) VALUES ('$salario', 0, '$IngPlaca', $pk_identificacion)";

$query1 = mysqli_query($conectar, $insert1);
$query2 = mysqli_query($conectar, $insert2);
$query3 = mysqli_query($conectar, $insert3);

if($query1 && $query2 && $query3){

    echo "Los datos se almacenaron exitosamente";
    echo "<a href='GestionDomiciliario.php'>Ver Usuario</a>";
}

else{

    echo "Error al conectarse a la BD";

}

?>