<?php
require_once "ConexionBD.php";

$nombreObra = $_POST["nombre"];
$precioinicial = $_POST["precioinicial"];
$peso = $_POST["peso"];
$tamano = $_POST["tamano"];
$categoria = $_POST["categoria"];
$fechafinalizacion = $_POST["fechafinalizacion"];
$imagen = "";

if(isset($_FILES['imagen'])){

    $archivo = $_FILES['imagen'];
    $nombreArchivo = $archivo['name'];
    $tipoArchivo = $archivo['type'];
    $rutaProvisional = $archivo['tmp_name'];
    $tamaño = $archivo['size'];
    $resolucion = getimagesize($rutaProvisional);
    $width = $resolucion[0];
    $heigth = $resolucion[1];
    $ubicacion = "../Imagenes/";

    if($tipoArchivo != 'image/jpg' && $tipoArchivo != 'image/jpeg' && $tipoArchivo != 'image/png' && $tipoArchivo != 'image/gif'){

        echo "<script languaje='JavaScript'>
           alert('Formato de imagen no valida')
           location.assign('../SubirObraSubasta.html');
           </script>";

    }

    elseif ($tamaño > 3*1024*1024){

        echo "<script languaje='JavaScript'>
           alert('El tamaño de la imagen supera lo permitido')
           location.assign('../SubirObraSubasta.html');
           </script>";

    }

    else{

        $guardar = $ubicacion.$nombreArchivo;
        move_uploaded_file($rutaProvisional, $guardar);
        $imagen = "../Imagenes/".$nombreArchivo;

    }

}

$queryCodigoProducto = "SELECT MAX(PkCod_Producto) as maxCodigo FROM obra";
$resultCodigoProducto = mysqli_query($conectar, $queryCodigoProducto);
$rowCodigoProducto = mysqli_fetch_assoc($resultCodigoProducto);
$codigoProducto = $rowCodigoProducto['maxCodigo'];

$insertObra = "INSERT INTO obra (NombreProducto, peso, tamano, categoria, imagen) VALUES ('$nombreObra', '$peso', '$tamano', '$categoria', '$imagen')"; 
$insertSubasta = "INSERT INTO subasta (precioInicial, FechaInicio, fechafinalizacion, fkCodProducto) VALUES ('$precioinicial', CURDATE(), '$fechafinalizacion', '$codigoProducto')";

$queryObra = mysqli_query($conectar, $insertObra);
$querySubasta = mysqli_query($conectar, $insertSubasta);

if($queryObra && $querySubasta){

    echo "Los datos se almacenaron exitosamente";

}

else{

    echo "Error al conectarse a la BD";

}

?>