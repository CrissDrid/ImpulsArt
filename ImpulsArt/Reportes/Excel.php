<?php

header("Content-type: application/xls");
header("Content-Disposition: attachment; filename = Reporte.xls");

?>

<table class="table text-center justify-content-center align-items-center">

<thead>
    <tr>
        <th>Nombre</th>
        <th>Fecha de finalizacion</th>
        <th>Fecha de inicio</th>
        <th>Categoria</th>
        <th>Ofertas ofrecidas</th>
        <th>Oferta mas alta</th>
    </tr>
</thead>

<tbody>
<?php
include_once "../PHP/ConexionBD.php";

if (isset($_GET['buscar'])) {

$buscar = $_GET['busqueda'];

$select = "SELECT COUNT(oferta.PkCod_oferta) as Montos, MAX(oferta.Monto) as MaxMonto, Peso, Tamano, categoria, descripcion, NombreProducto, fkCodProducto, FechaFinalizacion, FechaInicio from oferta
inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
WHERE FechaFinalizacion LIKE '$buscar%' or FechaInicio LIKE '$buscar%'
group by subasta.pkCodSubasta";

$query = mysqli_query($conectar, $select);

while ($mostrar = mysqli_fetch_assoc($query)) {
?>
<tr> 
<td><?php echo $mostrar['NombreProducto']?></td>
<td><?php echo $mostrar['FechaFinalizacion']?></td>
<td><?php echo $mostrar['FechaInicio']?></td>
<td><?php echo $mostrar['categoria']?></td>
<td><?php echo $mostrar['Montos']?></td>
<td><?php echo $mostrar['MaxMonto']?></td>
</tr>
<?php
}
}
elseif (isset($_GET['MostrarTodo'])){

$select = "SELECT COUNT(oferta.PkCod_oferta) as Montos, MAX(oferta.Monto) as MaxMonto, Peso, Tamano, categoria, descripcion, NombreProducto, fkCodProducto, FechaFinalizacion, FechaInicio from oferta
inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
group by subasta.pkCodSubasta";
$query = mysqli_query($conectar, $select);

while ($mostrar = mysqli_fetch_assoc($query)) {
?>
<tr>
<tr>
<td><?php echo $mostrar['NombreProducto']?></td>
<td><?php echo $mostrar['FechaFinalizacion']?></td>
<td><?php echo $mostrar['FechaInicio']?></td>
<td><?php echo $mostrar['categoria']?></td>
<td><?php echo $mostrar['Montos']?></td>
<td><?php echo $mostrar['MaxMonto']?></td>
</tr>
<?php
}

}

else {
$select = "SELECT COUNT(oferta.PkCod_oferta) as Montos, MAX(oferta.Monto) as MaxMonto, Peso, Tamano, categoria, descripcion, NombreProducto, fkCodProducto, FechaFinalizacion, FechaInicio from oferta
inner join subasta on oferta.fkcod_subasta = subasta.PkCodSubasta
inner join obra on subasta.fkCodProducto = obra.PkCod_Producto
group by subasta.pkCodSubasta";
$query = mysqli_query($conectar, $select);

while ($mostrar = mysqli_fetch_assoc($query)) {
?>
<tr>
<td><?php echo $mostrar['NombreProducto']?></td>
<td><?php echo $mostrar['FechaFinalizacion']?></td>
<td><?php echo $mostrar['FechaInicio']?></td>
<td><?php echo $mostrar['categoria']?></td>
<td><?php echo $mostrar['Montos']?></td>
<td><?php echo $mostrar['MaxMonto']?></td>
</tr>
<?php
}
}
?>
</tbody>

</table>