<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            
            <font color="black" size="5px">
            <i class="list icon"></i> <i class="dollar icon"></i>
            Libro de ventas a consumidor final</font><font color="black" size="20px">.</font>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <a href="./app/view/Facturacion/libroConsumidorExcel.php" class="ui right floated green labeled icon button">
                    <i class="download icon"></i>
                    Descargar Excel
                </a>
            </div>
        </div>
        
</div>

<?php
require_once './vendor/autoload.php';
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
where d.estadoCobro=6 and YEAR(curdate()) = YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) 
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
where d.estadoCobro=6  and YEAR(curdate()) = YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW())
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
where d.estadoCobro=6 and YEAR(curdate()) = YEAR(NOW()) 
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
?>

<br>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th rowspan="2" style="border:1px solid white;">Correlativo</th>
    <th rowspan="2" style="border:1px solid white;">Dia</th>
   

    <th colspan="4" style="text-align:center;border:1px solid white;">Ventas por cuenta Propia</th>
    
    
    <th rowspan="2" style="border:1px solid white;">IVA Retenido</th>
    <th rowspan="2" style="border:1px solid white;">Venta Total</th>
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
      <th style="border:1px solid white;">Ventas Exentas</th>
      <th style="border:1px solid white;">Ventas No Sujetas</th>
      <th style="border:1px solid white;">Ventas Gravadas Loc</th> 
      <th style="border:1px solid white;">Total Ventas</th>
     
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

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2) ;?></td>

            

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2) ;?></td>

           
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2) ;?></td>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $debitoFiscal = $totalGR * 0.01;

            $totalV = ($totalGR + $totalEx + $totalNoS);

            echo number_format($totalV,2);
            ?></td>
            <?php
                }else{   
            ?>
           <td style="text-align:center;border:1px solid black;">$ <?php 
           $totalV = $totalGR + $totalEx + $totalNoS;

            echo number_format($totalV,2);?></td>
            <?php
                }
            ?>

<?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $debitoFiscal = $totalGR * 0.01;

            $ivaRe = $debitoFiscal;

            echo number_format($ivaRe,2);
            ?></td>
            <?php
                }else{   
            ?>
           <td style="text-align:center;border:1px solid black;">$ <?php 
           $ivaRe = 0;

           echo number_format($ivaRe,2);?></td>
            <?php
                }
            ?>


<?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = ($totalGR + $totalEx + $totalNoS)-$ivaRe;

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
        </tr>
    <?php
    $ivaRetIP += $ivaRe;
    $totalIP += $totalV;
    $totalVentasGraIP += $totalGR;
    $totalVentasExIP +=$totalEx;
    $totalVentasNoSuIP += $totalNoS;
    $totalIPF += $total;
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

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2) ;?></td>

            

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2) ;?></td>

           
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2) ;?></td>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $debitoFiscal = $totalGR * 0.01;

            $totalV = ($totalGR + $totalEx + $totalNoS);

            echo number_format($total,2);
            ?></td>
            <?php
                }else{   
            ?>
           <td style="text-align:center;border:1px solid black;">$ <?php 
           $totalV = $totalGR + $totalEx + $totalNoS;

            echo number_format($totalV,2);?></td>
            <?php
                }
            ?>

<?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $debitoFiscal = $totalGR * 0.01;

            $ivaRe = $debitoFiscal;

            echo number_format($ivaRe,2);
            ?></td>
            <?php
                }else{   
            ?>
           <td style="text-align:center;border:1px solid black;">$ <?php 
           $ivaRe = 0;

           echo number_format($ivaRe,2);?></td>
            <?php
                }
            ?>


<?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = ($totalGR + $totalEx + $totalNoS)-$ivaRe;

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
        </tr>
    <?php
    $ivaRetGR += $ivaRe;
    $totalGR += $totalV;
    $totalGRF += $total;
    $totalVentasGraGR += $totalGR;
    $totalVentasExGR +=$totalEx;
    $totalVentasNoSuGR += $totalNoS;
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

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2) ;?></td>

            

            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2) ;?></td>

           
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2) ;?></td>

            <?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $debitoFiscal = $totalGR * 0.01;

            $totalV = ($totalGR + $totalEx + $totalNoS);

            echo number_format($totalV,2);
            ?></td>
            <?php
                }else{   
            ?>
           <td style="text-align:center;border:1px solid black;">$ <?php 
           $totalV = $totalGR + $totalEx + $totalNoS;

            echo number_format($totalV,2);?></td>
            <?php
                }
            ?>

<?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
            $debitoFiscal = $totalGR * 0.01;

            $ivaRe = $debitoFiscal;

            echo number_format($ivaRe,2);
            ?></td>
            <?php
                }else{   
            ?>
           <td style="text-align:center;border:1px solid black;">$ <?php 
           $ivaRe = 0;

           echo number_format($ivaRe,2);?></td>
            <?php
                }
            ?>


<?php
                if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php
                $debitoFiscal = $totalGR * 0.01;

                $total = ($totalGR + $totalEx + $totalNoS) - $ivaRe;

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
        </tr>
    <?php
    $ivaRetP += $ivaRe;
    $totalP += $totalV;
    $totalPF += $total;
    $totalVentasGraP += $totalGR;
    $totalVentasExP +=$totalEx;
    $totalVentasNoSuP += $totalNoS;
}

?>

<tfoot>
<td style="text-align:center;border:1px solid black; background-color:#8EF777;font-weight:bold;" colspan="2">Totales</td>

<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentasExGR + $totalVentasExIP + $totalVentasExP,2);?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentasNoSuGR + $totalVentasNoSuIP + $totalVentasNoSuP,2);?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentasGraGR + $totalVentasGraIP + $totalVentasGraP,2); ?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php 
$totalVenta = $totalVentasExGR + $totalVentasExIP + $totalVentasExP + $totalVentasNoSuGR + $totalVentasNoSuIP + $totalVentasNoSuP + $totalVentasGraGR + $totalVentasGraIP + $totalVentasGraP;
echo number_format($totalVenta,2); ?></td>

<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($ivaRetIP + $ivaRetGR + $ivaRetP,2); ?></td>

<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalPF + $totalIPF + $totalGRF,2); ?></td>

</tfoot>
</table>
</div>