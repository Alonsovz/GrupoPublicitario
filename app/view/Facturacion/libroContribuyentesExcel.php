<?php
header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=libroContribuyentes.xls');

	require_once('conexion.php');
	$conn=new Conexion();
    $link = $conn->conectarse();
    
    $mysqli = new mysqli('localhost','root','','grupopublicitario');
$listadoIP = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente
    from detalleOrdenIP d
    inner join ordenTrabajoIP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida
where d.estadoCobro=7 or d.estadoCobro=8 and YEAR(curdate()) = YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) 
 group by d.idOrden order by d.idOrden desc
");


$listadoP = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente
    from detalleOrdenP d
    inner join ordenTrabajoP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida
    where d.estadoCobro=7 or d.estadoCobro=8  and YEAR(curdate()) = YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW())
 group by d.idOrden order by d.idOrden desc");


$listadoGF = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente
    from detalleOrdenGR d
    inner join ordenTrabajoGR o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida 
where d.estadoCobro=7 or d.estadoCobro=8 and YEAR(curdate()) = YEAR(NOW()) 
AND MONTH(curdate())=MONTH(NOW())  group by d.idOrden order by d.idOrden desc
");

$totalVentasGraGR = 0;
$totalVentasExGR = 0;
$totalVentasNoSuGR = 0;
$totalVentasGraIP = 0;
$totalVentasExIP = 0;
$totalVentasNoSuIP = 0;
$totalVentasGraP = 0;
$totalVentasExP = 0;
$totalVentasNoSuP =0;
$ivaRetGR=0;
$ivaRetIP=0;
$ivaRetP=0;
$totalGR=0;
$totalIP=0;
$totalP=0;
$totalGRF=0;
$totalIPF=0;
$totalPF=0;
$debitoGR=0;
$debitoIP=0;
$debitoP=0;

?>
<center><h1 style="margin:auto;">Libro de Contribuyentes</h1>
<table class="ui table bordered">
<tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th rowspan="3" style="border:1px solid white;">N Correlativo</th>
    <th rowspan="3" style="border:1px solid white;">Fecha</th>  
    <th rowspan="3" style="border:1px solid white;">No. CORR. CCF</th>  
    <th rowspan="3" style="border:1px solid white;">No. COMP. DE RETENCION</th>  
    <th rowspan="3" style="border:1px solid white;">No. CORR. FORM. UNICO</th>  
    <th rowspan="3" style="border:1px solid white;">Cliente</th>
    <th colspan="8" style="text-align:center;border:1px solid white;text-align:center;">Operacion de ventas propias</th>
    <th rowspan="3" style="border:1px solid white;">IVA Retenido</th>
    <th rowspan="3" style="border:1px solid white;">Venta Total</th>
    <th rowspan="3" style="border:1px solid white;">Pago a Cuenta IVA 2%</th>

   
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th colspan="5" style="text-align:center;border:1px solid white;">Ventas propias</th>
    <th colspan="3" style="text-align:center;border:1px solid white;">Ventas a cuentas de terceros</th>

    </tr>
    
   
    
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    
      <th style="border:1px solid white;">Ventas Exentas</th>
      <th style="border:1px solid white;">Ventas No Sujetas</th>
      <th style="border:1px solid white;">Exportaciones</th>
      <th style="border:1px solid white;">Ventas Gravadas</th> 
      <th style="border:1px solid white;">Debito Fiscal</th>
  
      <th style="border:1px solid white;">Ventas Exentas</th>
      <th style="border:1px solid white;">Ventas Gravadas</th> 
      <th style="border:1px solid white;">Debito Fiscal</th>
    </tr>
    
    
</tr>

<?php
while ($row=mysqli_fetch_assoc($listadoIP)) {
    $idOrden = $row["idOrden"];

    $totalVentaGra = $mysqli -> query ("select format((sum(dp.precio) * 0.13) + sum(dp.precio),2) as ventasGR from detalleOrdenIP dp
           inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];


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
    ?>
       <tr style="text-align:center;border:1px solid black;">
        <td style="text-align:center;border:1px solid black;"><?php echo $row['correlativo']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['cliente']; ?></td>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2) ;?></td>

            

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2) ;?></td>

            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2) ;?></td>
            
            <td style="text-align:center;border:1px solid black;"> $ <?php 
            $debitoFiscal = $totalGR * 0.13;
           echo number_format($debitoFiscal,2) ;?></td>
             
             <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $ivaRe =$totalGR * 0.01;
            echo number_format($ivaRe,2);?></td>
            <?php
                }else{

                    $ivaRe=0;
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
             <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $total = ($totalEx + $totalGR + $totalNoS +  $debitoFiscal) - $ivaRe;
            echo number_format($total,2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            $total = $totalEx + $totalGR + $totalNoS + $debitoFiscal;
            echo number_format($total,2);?></td>
            <?php
                }
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
        </tr>		
                 
    <?php
    $ivaRetIP += $ivaRe;
   // $totalIP += $totalV;
    $totalVentasGraIP += $totalGR;
    $totalVentasExIP +=$totalEx;
    $totalVentasNoSuIP += $totalNoS;
    $totalIPF += $total;
    $debitoIP += $debitoFiscal;
}
?>

<?php
while ($row=mysqli_fetch_assoc($listadoP)) {

    $idOrden = $row["idOrden"];

    $totalVentaGra = $mysqli -> query ("select format((sum(dp.precio) * 0.13) + sum(dp.precio),2) as ventasGR from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];


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
    
    ?>
         <tr style="text-align:center;border:1px solid black;">
        <td style="text-align:center;border:1px solid black;"><?php echo $row['correlativo']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['cliente']; ?></td>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2) ;?></td>

            

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2) ;?></td>

            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2) ;?></td>
            
            <td style="text-align:center;border:1px solid black;"> $ <?php 
            $debitoFiscal = $totalGR * 0.13;
           echo number_format($debitoFiscal,2) ;?></td>
             
             <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $ivaRe =$totalGR * 0.01;
            echo number_format($ivaRe,2);?></td>
            <?php
                }else{

                    $ivaRe=0;
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            
            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $total = ($totalEx + $totalGR + $totalNoS +  $debitoFiscal) - $ivaRe;
            echo number_format($total,2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            $total = $totalEx + $totalGR + $totalNoS + $debitoFiscal;
            echo number_format($total,2);?></td>
            <?php
                }
            ?>

            <td style="text-align:center;border:1px solid black;">--</td>
        </tr>		


    <?php
    $ivaRetP += $ivaRe;
   // $totalP += $totalV;
    $totalPF += $total;
    $totalVentasGraP += $totalGR;
    $totalVentasExP +=$totalEx;
    $totalVentasNoSuP += $totalNoS;
    $debitoP += $debitoFiscal;
}
?>

<?php
while ($row=mysqli_fetch_assoc($listadoGF)) {
    $idOrden = $row["idOrden"];

    $totalVentaGra = $mysqli -> query ("select format((sum(dp.precio) * 0.13) + sum(dp.precio),2) as ventasGR from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];


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
    ?>
         <tr style="text-align:center;border:1px solid black;">
        <td style="text-align:center;border:1px solid black;"><?php echo $row['correlativo']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['cliente']; ?></td>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2) ;?></td>

            

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2) ;?></td>

            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2) ;?></td>
            <td style="text-align:center;border:1px solid black;"> $ <?php 
            $debitoFiscal = $totalGR * 0.13;
            echo number_format($debitoFiscal,2) ;?></td>
             
             <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $ivaRe =$totalGR * 0.01;
            echo number_format($ivaRe,2);?></td>
            <?php
                }else{

                    $ivaRe=0;
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
              <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $total = ($totalEx + $totalGR + $totalNoS +  $debitoFiscal) - $ivaRe;
            echo number_format($total,2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php 
            $total = $totalEx + $totalGR + $totalNoS + $debitoFiscal;
            echo number_format($total,2);?></td>
            <?php
                }
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
        </tr>		


    <?php
    $ivaRetGR += $ivaRe;
  //  $totalGR += $totalV;
    $totalGRF += $total;
    $totalVentasGraGR += $totalGR;
    $totalVentasExGR +=$totalEx;
    $totalVentasNoSuGR += $totalNoS;
    $debitoGR += $debitoFiscal;
}
?>

<tfoot>
<td style="text-align:center;border:1px solid black; background-color:#8EF777;font-weight:bold;" colspan="6">Totales</td>

<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentasExGR + $totalVentasExIP + $totalVentasExP,2);?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentasNoSuGR + $totalVentasNoSuIP + $totalVentasNoSuP,2);?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">--</td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentasGraGR + $totalVentasGraIP + $totalVentasGraP,2); ?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($debitoGR + $debitoIP + $debitoP,2); ?></td>
<td style="text-align:center;border:1px solid black;">--</td>
<td style="text-align:center;border:1px solid black;">--</td>
<td style="text-align:center;border:1px solid black;">--</td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($ivaRetGR + $ivaRetIP + $ivaRetP,2); ?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalGRF + $totalIPF + $totalPF,2); ?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">--</td>
</tfoot>
</table>
    </center>