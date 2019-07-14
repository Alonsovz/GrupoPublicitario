<?php
header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=reporteVentas.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query1="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    cl.contacto as contacto, cl.telefono as tel,cl.correo as correo,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*
    from detalleOrdenIP d
    inner join ordenTrabajoIP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle";
    $result1=mysqli_query($link, $query1);
    
    $query2="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    cl.contacto as contacto, cl.telefono as tel,cl.correo as correo,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*
    from detalleOrdenP d
    inner join ordenTrabajoP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle";
    $result2=mysqli_query($link, $query2);
    

    $query3="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    cl.contacto as contacto, cl.telefono as tel,cl.correo as correo,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*
    from detalleOrdenGR d
    inner join ordenTrabajoGR o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle";
	$result3=mysqli_query($link, $query3);
?>
<center><h1 style="margin:auto;">Reporte de ventas</h1>
<table class="ui table bordered" style="width:100%;">

    <tr style="border:1px solid white;text-align:center;background-color:black;color:white;" height="40">
    <th  style="border:1px solid white;width:5%;">Fecha</th>
    <th  style="border:1px solid white;width:6%;">Tipo DOC</th>
    <th  style="border:1px solid white;width:6%;">Tipo DOC</th>
    <th  style="border:1px solid white;width:10%;">Tipo PRO</th>
    <th  style="border:1px solid white;">Clasificaci&oacute;n</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Detalle</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">N NRC</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">NIT</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Cantidad</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Venta Gra</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Venta No</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">Ventas Ex</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">IVA</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">1%</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">Total</th>
    <th  style="text-align:center;border:1px solid white;">Estatus</th>
    <th  style="text-align:center;border:1px solid white;">Dias de morosidad</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">Total Cobrado</th>
    <th  style="text-align:center;border:1px solid white;">Fecha de Cobro</th>
    <th  style="text-align:center;border:1px solid white;">Nombre de contacto</th>
    <th  style="text-align:center;border:1px solid white;">Tel&eacute;fono</th>
    <th  style="text-align:center;border:1px solid white;">Correo</th>
</tr>
<?php
while ($row=mysqli_fetch_assoc($result1)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

            <?php   
                if($row["doc"]=="6"){
            ?>
                <td style="text-align:center;border:1px solid black;background-color:#8890F3;">Fac C</td>
            <?php
                }
                if($row["doc"]=="7"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#CB7CFE;">CCF</td>
            <?php
                }
                if($row["doc"]=="8"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#9CF4F7;">Nota C</td>
            <?php
                }
            ?>
            <td></td>
            <td style="text-align:center;border:1px solid black; background-color:#0B0678;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cantidad']);?></td>

            <?php
                if($row["tipoVenta"]=="Venta Gravada"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
                }
            ?>

            <?php
                if($row["tipoVenta"]=="Venta No Sujeta"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
                }
            ?>


            <?php
                if($row["tipoVenta"]=="Venta Exenta"){
                ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
                <?php
                }else{
     
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
            }
                        ?>



            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'] * 0.13;?></td>
            <td style="text-align:center;border:1px solid black;">$ 0.00</td>
            <td style="text-align:center;border:1px solid black;mso-number-format:'$ 0.00';"><?php  
            $precio =$row['precio']*0.13;
            $desc = $row["precio"]-$precio;
            echo $desc;
            ?></td>
            <?php
            if($row["estadoCobro"]=="1"){

            
            ?>
            <td style="text-align:center;border:1px solid black; background-color:#F8B97A">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black; background-color:#7AF882">Cobrado</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['contacto'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tel'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correo'];?></td>
        </tr>	

    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($result3)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

            <?php   
                if($row["doc"]=="6"){
            ?>
                <td style="text-align:center;border:1px solid black;background-color:#8890F3;">Fac C</td>
            <?php
                }
                if($row["doc"]=="7"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#CB7CFE;">CCF</td>
            <?php
                }
                if($row["doc"]=="8"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#9CF4F7;">Nota C</td>
            <?php
                }
            ?>
            <td></td>
            <td style="text-align:center;border:1px solid black; background-color:#5C1106;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cantidad']);?></td>

            <?php
                if($row["tipoVenta"]=="Venta Gravada"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
                }
            ?>

            <?php
                if($row["tipoVenta"]=="Venta No Sujeta"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
                }
            ?>


            <?php
                if($row["tipoVenta"]=="Venta Exenta"){
                ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
                <?php
                }else{
     
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
            }
                        ?>



            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'] * 0.13;?></td>
            <td style="text-align:center;border:1px solid black;">$ 0.00</td>
            <td style="text-align:center;border:1px solid black;mso-number-format:'$ 0.00';"><?php  
            $precio =$row['precio']*0.13;
            $desc = $row["precio"]-$precio;
            echo $desc;
            ?></td>
            <?php
            if($row["estadoCobro"]=="1"){

            
            ?>
            <td style="text-align:center;border:1px solid black; background-color:#F8B97A">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black; background-color:#7AF882">Cobrado</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['contacto'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tel'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correo'];?></td>
        </tr>	
    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($result2)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

            <?php   
                if($row["doc"]=="6"){
            ?>
                <td style="text-align:center;border:1px solid black;background-color:#8890F3;">Fac C</td>
            <?php
                }
                if($row["doc"]=="7"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#CB7CFE;">CCF</td>
            <?php
                }
                if($row["doc"]=="8"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#9CF4F7;">Nota C</td>
            <?php
                }
            ?>
            <td></td>
            <td style="text-align:center;border:1px solid black; background-color:#03440E;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cantidad']);?></td>

            <?php
                if($row["tipoVenta"]=="Venta Gravada"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
                }
            ?>

            <?php
                if($row["tipoVenta"]=="Venta No Sujeta"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
                }
            ?>


            <?php
                if($row["tipoVenta"]=="Venta Exenta"){
                ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>
                <?php
                }else{
     
            ?>
            <td style="text-align:center;border:1px solid black;">$0.00</td>
            <?php
            }
                        ?>



            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'] * 0.13;?></td>
            <td style="text-align:center;border:1px solid black;">$ 0.00</td>
            <td style="text-align:center;border:1px solid black;mso-number-format:'$ 0.00';"><?php  
            $precio =$row['precio']*0.13;
            $desc = $row["precio"]-$precio;
            echo $desc;
            ?></td>
            <?php
            if($row["estadoCobro"]=="1"){

            
            ?>
            <td style="text-align:center;border:1px solid black; background-color:#F8B97A">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black; background-color:#7AF882">Cobrado</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['contacto'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tel'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correo'];?></td>
        </tr>	

    <?php
}




?>
</table>
    </center>