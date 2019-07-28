<?php
header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=gastosRequisicion.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="
    select concat(u.nombre, u.apellido) as responsabl ,r.*, d.* ,p.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,format(d.total,2) as total,
format(d.total * 0.13,2) as iva, format((d.total * 0.13)+d.total,2) as totalCompra,pf.productoFinal,c.color,a.acabado,m.medida, 
cp.nombre as clasificacion, cp.idClasificacion as idCla
 from detalleRequisicion d
inner join requisiciones r on r.idRequisicion = d.idRequisicion
inner join proveedores p on p.idProveedor = r.idProveedor
inner join usuario u on u.codigoUsuario = r.responsable
inner join productoFinal pf on pf.idProductoFinal = d.idProductoFinal
inner join clasificacionProductos cp on cp.idProducto = pf.idProducto
inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
inner join colores c on c.idColor = d.color
inner join acabados a on a.idAcabado = d.acabado
inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
inner join medidas m on m.idMedida = pm.idMedida
where r.estado=5 group by d.idDetalle  order by d.idDetalle desc;";
    $result=mysqli_query($link, $query);
    
    
?>
<center><h1 style="margin:auto;">Base de compras(Requisici&oacute;n)</h1>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th  style="border:1px solid white;">Fecha</th>
    <th  style="border:1px solid white;">Responsable</th>
    <th  style="border:1px solid white;">Tipo de producto</th>
    <th  style="border:1px solid white;">Proveedor</th>
    <th  style="border:1px solid white;">Cod Proveedor</th>


    <th  style="text-align:center;border:1px solid white;">Tipo Compra</th>
    <th  style="text-align:center;border:1px solid white;">Tipo Doc</th>
    <th  style="text-align:center;border:1px solid white;">Tipo Pago</th>
    <th  style="text-align:center;border:1px solid white;">Condicion</th>
    <th  style="text-align:center;border:1px solid white;">Fecha de entrega</th>
    <th  style="text-align:center;border:1px solid white;">Clasificacion</th>
    <th  style="text-align:center;border:1px solid white;">Producto</th>
    <th  style="text-align:center;border:1px solid white;">Cantidad</th>
    <th  style="text-align:center;border:1px solid white;">Unidad de medida</th>
    <th  style="text-align:center;border:1px solid white;">Medidas</th>
    <th  style="text-align:center;border:1px solid white;">Color</th>
    <th  style="text-align:center;border:1px solid white;">Acabado</th>
    <th  style="text-align:center;border:1px solid white;">Descripcion</th>
    <th  style="text-align:center;border:1px solid white;">Precio</th>
    <th  style="text-align:center;border:1px solid white;">Sub total</th>
    <th  style="text-align:center;border:1px solid white;">13%</th>
    <th  style="text-align:center;border:1px solid white;">10%</th>
    <th  style="text-align:center;border:1px solid white;">Total</th>

   
    
    
</tr>

<?php
while ($row=mysqli_fetch_assoc($result)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['responsabl'];?></td>

            <?php
                if($row["idCla"]=="1"){
            ?>
            <td style="text-align:center;border:1px solid black;">Gran Formato</td>
            

            <?php
                }
               else if($row["idCla"]=="3"){
                    ?>
                    <td style="text-align:center;border:1px solid black;">Promocionales</td>
                    <?php
                }
               else if($row["idCla"]=="2"){
                    ?>
                    <td style="text-align:center;border:1px solid black;">Impresion digital</td>
                <?php
                }
                ?> 

            <td style="text-align:center;border:1px solid black;"><?php echo $row['nombre'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['idProveedor'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tipoCompra'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tipoDoc'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tipoPago'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['condicionCredito'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaEntrega'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['productoFinal'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['cantidad'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['medida'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['medidas'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['color'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['acabado'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripcion'];?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['precioUnitario'];?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['total'];?></td>
        </tr>	

    <?php
}


?>

</table>