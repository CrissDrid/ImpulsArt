<?php
require_once 'ConexionBD.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombreProd = $_POST["nombreProd"];
    $costo = $_POST["costo"];
    $peso = $_POST["peso"];
    $tamaño = $_POST["tamaño"];
    $cantidad = $_POST["cantidad"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];

    // Query para insertar los datos en la base de datos
    $query = "INSERT INTO obra (NombreProducto, Costo, Peso, Tamano, Cantidad, categoria, descripcion)
    VALUES ('$nombreProd', '$costo','$peso', '$tamaño','$cantidad', '$categoria', '$descripcion')";

    // Ejecutar la consulta
    if (mysqli_query($conectar, $query)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conectar);
    }
} else {
    echo "Error: Método no permitido.";
}
?>
