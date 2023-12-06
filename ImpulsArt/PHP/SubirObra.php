<?php
require_once "ConexionBD.php";

// Obtener los valores del formulario
$nombreProd = $_POST["nombreProd"];
$costo = $_POST["costo"];
$peso = $_POST["peso"];
$tamaño = $_POST["tamaño"];
$cantidad = $_POST["cantidad"];
$categoria = $_POST["categoria"];
$descripcion = $_POST["descripcion"];

// Manejo de la imagen
if (isset($_FILES["imagine"])) {
    if ($_FILES["imagine"]["error"] == 0) {
        $file = $_FILES["imagine"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $r_prov = $file["tmp_name"];
        $size = $file["size"];

        // Validación del tipo y tamaño de la imagen
        $validExtensions = ["image/jpeg", "image/jpg", "image/png"];
        if (!in_array($tipo, $validExtensions) || $size > 3 * 1024 * 1024) {
            echo "ERROR, el archivo no es una imagen o excede el tamaño máximo permitido (3MB).";
            exit(); // Termina la ejecución del script si hay un error en la imagen
        }

        // Mover la imagen a la carpeta de destino
        $src = '../ObrasSubidas/' . $nombre;
        move_uploaded_file($r_prov, $src);
    } else {
        echo "Error al subir la imagen: " . $_FILES["imagine"]["error"];
        exit(); // Termina la ejecución del script si hay un error al subir la imagen
    }
} else {
    echo "No se proporcionó ninguna imagen.";
    exit(); // Termina la ejecución del script si no se proporciona ninguna imagen
}

// Consulta SQL para insertar los datos en la base de datos
$query = "INSERT INTO obra (NombreProducto, Costo, Peso, Tamano, Cantidad, categoria, descripcion, imagen)
              VALUES ('$nombreProd', '$costo','$peso', '$tamaño','$cantidad', '$categoria', '$descripcion', '$nombre')";

if (mysqli_query($conectar, $query)) {
    echo "Datos insertados correctamente.";
    echo "NombreProd: " . $nombreProd . "\n";
    echo "Costo: " . $costo . "\n";
    echo "Peso: " . $peso . "\n";
    echo "Tamano: " . $tamaño . "\n";
    echo "Cantidad: " . $cantidad . "\n";
    echo "Categoria: " . $categoria . "\n";
    echo "Descripcion: " . $descripcion . "\n";
    echo "Nombre de la imagen: " . $nombre . "\n";
} else {
    echo "Error al insertar datos: " . mysqli_error($conectar);
}
