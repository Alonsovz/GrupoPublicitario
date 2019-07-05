<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=inventarioGranForm.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="select i.*,c.*,a.*,m.*, format(i.precioUnitario,2) as precioUni, format(i.cantidadExistencia,2) as cantidadExis,
    p.*,cp.nombre as nombre from inventario i
        inner join productosDetalle pc on pc.idProductoFinal = i.idProducto
        inner join colores c on c.idColor = i.idColor
        inner join acabados a on a.idAcabado = i.idAcabado
        inner join medidas m on m.idMedida = pc.idMedida
        inner join productoFinal p on p.idProductoFinal = pc.idProductoFinal
        inner join clasificacionProductos cp on cp.idProducto = p.idProducto
        where cp.idClasificacion=1
        group by i.idProducto,i.idColor,i.idAcabado";
	$result=mysqli_query($link, $query);
?>
<center><h1 style="margin:auto;">Inventario de productos de Gran Formato</h1>
<table border="1" style="margin:auto;">
    <tr >
    <th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Clasificacion</th>
    <th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Producto Final</th>
    <th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Acabado</th>
	<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Color</th>
	<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Unidad de Medida</th>
	<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Existencia</th>
	<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Precio Unitario</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
                    <td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['productoFinal'];?></td>
					<td><?php echo $row['acabado']; ?></td>
					<td><?php echo $row['color']; ?></td>
					<td><?php echo $row['medida']; ?></td>
                    <td ><?php echo $row['cantidadExistencia']; ?></td>
                    <td style="mso-number-format:'$ 0.00';"><?php echo $row['precioUnitario']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>
    </center>