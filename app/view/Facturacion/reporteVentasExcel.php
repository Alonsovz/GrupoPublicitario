<?php
header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=reporteVentas.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();
    $mysqli = new mysqli('localhost','root','','grupopublicitario');
	$query1="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,v.nombre as vendedor,cl.*
    from detalleOrdenIP d
    inner join ordenTrabajoIP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join vendedores v on v.idVendedor = o.idVendedor
    inner join medidas m on m.idMedida = pm.idMedida where YEAR(curdate()) =
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<10 group by d.idOrden order by d.idOrden desc";
    $result1=mysqli_query($link, $query1);
    
    $query2="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,v.nombre as vendedor,cl.*
    
    from detalleOrdenP d
    inner join ordenTrabajoP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join vendedores v on v.idVendedor = o.idVendedor
    inner join medidas m on m.idMedida = pm.idMedida where YEAR(curdate()) =
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<10 group by d.idOrden order by d.idOrden desc";
    $result2=mysqli_query($link, $query2);
    

    $query3="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,
    v.nombre as vendedor, cl.*
    from detalleOrdenGR d
    inner join ordenTrabajoGR o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join vendedores v on v.idVendedor = o.idVendedor
    inner join medidas m on m.idMedida = pm.idMedida where YEAR(curdate()) =
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<10 group by d.idOrden order by d.idOrden desc";
	$result3=mysqli_query($link, $query3);
?>
<center><h1 style="margin:auto;">Reporte de ventas</h1>
<table class="ui table bordered" style="width:100%;">

    <tr style="border:1px solid white;text-align:center;background-color:black;color:white;" height="40">
    <th  style="border:1px solid white;width:5%;">Fecha</th>
    <th  style="border:1px solid white;width:6%;">Correlativo</th>
    <th  style="border:1px solid white;width:6%;">Tipo DOC</th>
    <th  style="border:1px solid white;width:6%;">No DOC</th>
    <th  style="border:1px solid white;width:6%;">Vendedor</th>
    <th  style="border:1px solid white;width:10%;">Tipo Venta</th>
    <th  style="border:1px solid white;width:10%;">Tipo PRO</th>
    <th  style="border:1px solid white;">Clasificaci&oacute;n</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Detalle</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">N NRC</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">NIT</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Venta Gra</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Venta No</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">Ventas Ex</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">IVA</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">1%</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">Total</th>
    <th  style="text-align:center;border:1px solid white;">Estatus</th>
    <th  style="text-align:center;border:1px solid white;">Abonos realizados</th>
    <th  style="text-align:center;border:1px solid white;">Dias de morosidad</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">Total Cobrado</th>
    <th  style="text-align:center;border:1px solid white;">Fecha de Cobro</th>
    <th  style="text-align:center;border:1px solid white;">Nombre de contacto</th>
    <th  style="text-align:center;border:1px solid white;">Tel&eacute;fono</th>
    <th  style="text-align:center;border:1px solid white;">Correo</th>
</tr>
<?php
while ($row=mysqli_fetch_assoc($result1)) {
    $idOrden = $row["idOrden"];
    $idDetalle = $row["idDetalle"];

    $totalVentaGra = $mysqli -> query ("select format(sum(dp.precio),2) as ventasGR from detalleOrdenIP dp
           inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];

            $totalVentaIVA = $mysqli -> query ("select format(sum(dp.precio) * 0.13 ,2) as ventasGR from detalleOrdenIP dp
           inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalIVA = $totalVentaIVA->fetch_assoc();

            $totalIVA = $totalIVA['ventasGR'];


            $totalVentaEx = $mysqli -> query ("select format(sum(dp.precio),2) as ventasEx from detalleOrdenIP dp
           inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Exenta' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalEx = $totalVentaEx->fetch_assoc();
            $totalEx = $totalEx['ventasEx'];

            $totalVentaNoS= $mysqli -> query ("select format(sum(dp.precio),2) as ventasNoS from detalleOrdenIP dp
           inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta No Sujeta' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalNoS = $totalVentaNoS->fetch_assoc();
            $totalNoS = $totalNoS['ventasNoS'];

            $pagosIP= $mysqli -> query ("select *, format(monto,2) as monto,DATE_FORMAT(fechaPago, '%d/%m/%Y') as fechaPago from pagos
            where idClasificacion= 2 and idDetalle =".$idDetalle."");

    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correlativo']; ?></td>
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
                if($row["doc"]=="9"){
                    ?>
                    <td style="text-align:center;border:1px solid black;background-color:#FAF75D;">Otro</td>
                    <?php
                        }
                ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nDoc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_decode($row['vendedor']);?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            
            <td style="text-align:center;border:1px solid black; background-color:#0B0678;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['descripciones']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>

            
            
            
        <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalGR,2);?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalNoS,2);?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalEx,2);?></td>

            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalIVA,2);?></td>


            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = $debitoFiscal;

                echo number_format($total,2);
            ?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
           $total = 0;

            echo number_format($total,2);?></td>
            <?php
                }
            ?>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

                echo number_format($total,2);
            ?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
           $total = $totalGR + $totalEx + $totalNoS;

            echo number_format($total,2);?></td>
            <?php
                }
            ?>
            
            
            <?php
            if($total - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black; background-color:#F8B97A">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black; background-color:#7AF882">Cobrado</td>
            <?php
            }
            ?>

            <td  style="text-align:center;border:1px solid black">
            
                <table class="ui table">
                <tr style="border:1px solid white;text-align:center;background-color:#19C72E;color:white;">
                            <th>Monto</th>
                            <th>Tipo de pago</th>
                            <th>Fecha de pago</th>
                        
                        </tr>

            <?php
                while ($row1=mysqli_fetch_assoc($pagosIP)) {
                    ?>
                    <tr>
                            <td style="text-align:center;border:1px solid black;"> $<?php echo utf8_encode($row1["monto"]);?></td>
                            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row1["tipoPago"]);?></td>
                            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row1["fechaPago"]);?></td>
                    </tr>
                    <?php
                }
            ?>
                </table>
               <br>
            </td>

            <?php
            if($total - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">0</td>
            <?php
            }
            ?>
            
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['contacto'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['telefono'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correo'];?></td>
        </tr>

    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($result3)) {
    $idOrden = $row["idOrden"];
    $idDetalle = $row["idDetalle"];

    $totalVentaGra = $mysqli -> query ("select format(sum(dp.precio),2) as ventasGR from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];

            $totalVentaIVA = $mysqli -> query ("select format(sum(dp.precio) * 0.13 ,2) as ventasGR from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalIVA = $totalVentaIVA->fetch_assoc();

            $totalIVA = $totalIVA['ventasGR'];


            $totalVentaEx = $mysqli -> query ("select format(sum(dp.precio),2) as ventasEx from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Exenta' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalEx = $totalVentaEx->fetch_assoc();
            $totalEx = $totalEx['ventasEx'];

            $totalVentaNoS= $mysqli -> query ("select format(sum(dp.precio),2) as ventasNoS from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta No Sujeta' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalNoS = $totalVentaNoS->fetch_assoc();
            $totalNoS = $totalNoS['ventasNoS'];

            $pagosGR= $mysqli -> query ("select *, format(monto,2) as monto,DATE_FORMAT(fechaPago, '%d/%m/%Y') as fechaPago from pagos
            where idClasificacion= 1 and idDetalle =".$idDetalle."");
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correlativo']; ?></td>
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
                if($row["doc"]=="9"){
                    ?>
                    <td style="text-align:center;border:1px solid black;background-color:#FAF75D;">Otro</td>
                    <?php
                        }
                ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nDoc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_decode($row['vendedor']);?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            
            <td style="text-align:center;border:1px solid black; background-color:#03440E;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['descripciones']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>

            
            
            
        <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalGR,2);?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalNoS,2);?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalEx,2);?></td>

            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalIVA,2);?></td>


            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = $debitoFiscal;

                echo number_format($total,2);
            ?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
           $total = 0;

            echo number_format($total,2);?></td>
            <?php
                }
            ?>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

                echo number_format($total,2);
            ?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
           $total = $totalGR + $totalEx + $totalNoS;

            echo number_format($total,2);?></td>
            <?php
                }
            ?>
            
            
            <?php
            if($total - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black; background-color:#F8B97A">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black; background-color:#7AF882">Cobrado</td>
            <?php
            }
            ?>

            <td  style="text-align:center;border:1px solid black">
                        <table>
                        
                        
                        <tr style="border:1px solid white;text-align:center;background-color:#2C22A4;color:white;">
                            <th>Monto</th>
                            <th>Tipo de pago</th>
                            <th>Fecha de pago</th>
                        
                        </tr>

                    <?php
                        while ($row1=mysqli_fetch_assoc($pagosGR)) {
                            ?>
                            <tr>
                            <td style="text-align:center;border:1px solid black;"> $<?php echo utf8_encode($row1["monto"]);?></td>
                            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row1["tipoPago"]);?></td>
                            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row1["fechaPago"]);?></td>
                            </tr>
                            <?php
                        }
                    ?>
                        </table>
                        <br>
                    </td>

            <?php
            if($total - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">0</td>
            <?php
            }
            ?>
            
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['contacto'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['telefono'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correo'];?></td>
        </tr>
	

    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($result2)) {
    $idOrden = $row["idOrden"];
    $idDetalle = $row["idDetalle"];

    $totalVentaGra = $mysqli -> query ("select format(sum(dp.precio),2) as ventasGR from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];

            $totalVentaIVA = $mysqli -> query ("select format(sum(dp.precio) * 0.13 ,2) as ventasGR from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalIVA = $totalVentaIVA->fetch_assoc();

            $totalIVA = $totalIVA['ventasGR'];


            $totalVentaEx = $mysqli -> query ("select format(sum(dp.precio),2) as ventasEx from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Exenta' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalEx = $totalVentaEx->fetch_assoc();
            $totalEx = $totalEx['ventasEx'];

            $totalVentaNoS= $mysqli -> query ("select format(sum(dp.precio),2) as ventasNoS from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta No Sujeta' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalNoS = $totalVentaNoS->fetch_assoc();
            $totalNoS = $totalNoS['ventasNoS'];

            $pagosP= $mysqli -> query ("select *, format(monto,2) as monto,DATE_FORMAT(fechaPago, '%d/%m/%Y') as fechaPago from pagos
            where idClasificacion= 3 and idDetalle =".$idDetalle."");
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correlativo']; ?></td>
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
                if($row["doc"]=="9"){
                    ?>
                    <td style="text-align:center;border:1px solid black;background-color:#FAF75D;">Otro</td>
                    <?php
                        }
                ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nDoc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['vendedor']);?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            
            <td style="text-align:center;border:1px solid black; background-color:#5C1106;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['descripciones']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>

            
            
            
        <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalGR,2);?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalNoS,2);?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalEx,2);?></td>

            <td style="text-align:center;border:1px solid black;">$ <?php 
            echo number_format($totalIVA,2);?></td>


            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = $debitoFiscal;

                echo number_format($total,2);
            ?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
           $total = 0;

            echo number_format($total,2);?></td>
            <?php
                }
            ?>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

                echo number_format($total,2);
            ?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
           $total = $totalGR + $totalEx + $totalNoS;

            echo number_format($total,2);?></td>
            <?php
                }
            ?>
            
            
            <?php
            if($total - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black; background-color:#F8B97A">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black; background-color:#7AF882">Cobrado</td>
            <?php
            }
            ?>

            <td  style="text-align:center;border:1px solid black">
                    <table>
                    <tr style="border:1px solid white;text-align:center;background-color:#D33647;color:white;">
                            <th>Monto</th>
                            <th>Tipo de pago</th>
                            <th>Fecha de pago</th>
                        
                    </tr>

                <?php
                    while ($row1=mysqli_fetch_assoc($pagosP)) {
                        ?>
                        <tr>
                        <td style="text-align:center;border:1px solid black;"> $<?php echo utf8_encode($row1["monto"]);?></td>
                        <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row1["tipoPago"]);?></td>
                        <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row1["fechaPago"]);?></td>
                        </tr>
                        <?php
                    }
                ?>
                    </table>
                    <br>
                </td>

               

            <?php
            if($total - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">0</td>
            <?php
            }
            ?>
            
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['contacto'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['telefono'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correo'];?></td>
        </tr>


    <?php
}




?>
</table>
    </center>