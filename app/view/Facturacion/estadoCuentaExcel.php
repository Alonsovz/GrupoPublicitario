<?php

if($_GET["idCliente"] && $_GET ["nombre"]){

    $idCliente = $_GET["idCliente"] ;
    $nombreCliente =$_GET ["nombre"];
    $nrc =$_GET ["nrc"];
    $direccion =$_GET ["direccion"];
    $nit =$_GET ["nit"];
    $telefono =$_GET ["telefono"];
    $contacto = $_GET ["contacto"];
    $correo = $_GET ["correo"];
    $fecha = $_GET ["fecha"];

    header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=estadoCuenta'.$nombreCliente.'.xls');

	require_once('conexion.php');
	$conn=new Conexion();
    $link = $conn->conectarse();
    
    $mysqli = new mysqli("shareddb-o.hosting.stackcp.net","grupoPub","12345678*","grupoPublicitario-313039a314");

    $listadoIP = $mysqli -> query ("select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,cl.*
    from detalleOrdenIP d
    inner join ordenTrabajoIP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida where YEAR(curdate()) =
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 and o.cliente = ".$idCliente." group by d.idOrden order by d.idOrden desc");
 
    
     $listadoP = $mysqli -> query ("select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,cl.*
    from detalleOrdenP d
    inner join ordenTrabajoP o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida where YEAR(curdate()) =
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 and o.cliente = ".$idCliente."  group by d.idOrden order by d.idOrden desc");
    
    

     $listadoGF = $mysqli -> query ("select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,cl.*
    from detalleOrdenGR d
    inner join ordenTrabajoGR o on o.idOrden = d.idOrden
    inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
    inner join clasificacionProductos cp on cp.idProducto = p.idProducto
    inner join tipoProductos t on t.idClasificacion = cp.idClasificacion
    inner join colores c on c.idColor = d.idColor
    inner join acabados a on a.idAcabado = d.idAcabado
    inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
    inner join clientes cl on cl.idCliente = o.cliente
    inner join medidas m on m.idMedida = pm.idMedida where YEAR(curdate()) =
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 and o.cliente = ".$idCliente."  group by d.idOrden order by d.idOrden desc");
    
    
   
    
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
    $totalSaldoGR =0;
    $totalSaldoIP =0;
    $totalSaldoP =0;
?>
<center><h1 style="margin:auto;">Estado de cuenta de <?php echo $nombreCliente; ?></h1>

<table>
<tr>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>

<tr style="font-weight:bold; border:1px solid black;">
<br><br>
<td  style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">Correlativo:</td><td style="text-align:left;"><?php echo $idCliente; ?></td>
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">NRC:</td><td><?php echo $nrc; ?></td>
</tr>

<tr style="font-weight:bold; border:1px solid black;">
<br><br>
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">Nombre de Cliente:</td><td><?php echo utf8_decode($nombreCliente); ?></td>
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">NIT:</td><td><?php echo $nit; ?></td>
</tr>

<tr style="font-weight:bold; border:1px solid black;">
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">Direccion:</td><td><?php echo utf8_decode( $direccion); ?></td>
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">Telefono:</td><td><?php echo utf8_decode($telefono); ?></td>
</tr>

<tr style="font-weight:bold; border:1px solid black;">
<br><br>
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">Contacto:</td><td><?php echo utf8_decode($contacto); ?></td>
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">Correo:</td><td><?php echo utf8_decode($correo); ?></td>
</tr>
<tr style="font-weight:bold; border:1px solid black;">
<br><br>
<td style="font-weight:bold; border:1px solid black;background-color:#9BF79E;color:black;">Estado a fecha:</td><td style="text-align:left;"><?php echo $fecha; ?></td>

</tr>
</table>

    <br><br>

<table class="ui table bordered" >

    <tr style="border:1px solid white;text-align:center;background-color:black;color:white;" height="40">
    <th style="border:1px solid white;width:10%;">Fecha</th>
    <th style="border:1px solid white;width:3%;">Tipo DOC</th>
    <th style="border:1px solid white;width:10%;">N DOC</th>
    <th style="border:1px solid white;width:10%;">Tipo PRO</th>
    <th style="border:1px solid white;">Clasificaci&oacute;n</th>
    
    <th style="text-align:center;border:1px solid white;width:15%;">Monto</th>
    <th style="text-align:center;border:1px solid white;width:15%;">Venta no Sujeta</th>
    <th style="text-align:center;border:1px solid white;width:15%;">Venta exenta</th>
    <th style="text-align:center;border:1px solid white;width:15%;">IVA</th>
    <th style="text-align:center;border:1px solid white;width:15%;">1%</th>
    <th style="text-align:center;border:1px solid white;width:15%;">Total</th>
    <th style="text-align:center;border:1px solid white;width:15%;">Abonos</th>
    <th style="text-align:center;border:1px solid white;width:15%;">Saldo</th>
    <th style="text-align:center;border:1px solid white;width:15%;">Dias de morosidad</th>
    <th style="text-align:center;border:1px solid white;width:15%;">Estatus</th>
</tr>
<?php
while ($row=mysqli_fetch_assoc($listadoIP)) {
    $idOrden = $row["idOrden"];

    $totalVentaGra = $mysqli -> query ("select format((sum(dp.precio) * 0.13) + sum(dp.precio),2) as ventasGR from detalleOrdenIP dp
      inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
       where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

       $totalGR = $totalVentaGra->fetch_assoc();

       $totalGR = $totalGR['ventasGR'];

       $totalVentaIVA = $mysqli -> query ("select format(sum(dp.precio) * 0.13 ,2) as ventasGR from detalleOrdenIP dp
      inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
       where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

       $totalIVA = $totalVentaIVA->fetch_assoc();

       $totalIVA = $totalIVA['ventasGR'];


       $totalVentaEx = $mysqli -> query ("select format(sum(dp.precio),2) as ventasEx from detalleOrdenIP dp
      inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
       where dp.tipoVenta='Venta Exenta' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

       $totalEx = $totalVentaEx->fetch_assoc();
       $totalEx = $totalEx['ventasEx'];

       $totalVentaNoS= $mysqli -> query ("select format(sum(dp.precio),2) as ventasNoS from detalleOrdenIP dp
      inner join ordenTrabajoIP op on op.idOrden = dp.idOrden
       where dp.tipoVenta='Venta No Sujeta' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

       $totalNoS = $totalVentaNoS->fetch_assoc();
       $totalNoS = $totalNoS['ventasNoS'];

     
           if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
       
           $debitoFiscal = $totalGR * 0.01;

           $totalC = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

           
       
           }else{
               $debitoFiscal =0;
      $totalC = $totalGR + $totalEx + $totalNoS;
           }


       

if($totalC - $row["totalCobro"]>0){
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
       <td style="text-align:center;border:1px solid black;"></td>
       <td style="text-align:center;border:1px solid black; background-color:#0B0678;color:white"><?php echo $row['clasificacion'];?></td>
       <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>

       
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2);?></td>

       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR * 0.13,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($debitoFiscal,2);?></td>
       
       <td style="text-align:center;border:1px solid black;">$ <?php echo number_format($totalC,2);?></td>
       <td style="text-align:center;border:1px solid black;">$<?php echo number_format($row['totalCobro'],2);?></td>
       <td style="text-align:center;border:1px solid black;">$<?php
       $totalSaIP = $totalC - $row['totalCobro'];

       echo number_format($totalSaIP ,2);?></td>
       <?php
            if($totalC - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">0</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#F8B97A;">Por Cobrar</td>
       </tr>


            <?php
            }
            $totalSaldoIP+= $totalSaIP;
            ?>	
                 
    <?php
    
}
?>

<?php
while ($row=mysqli_fetch_assoc($listadoP)) {

    $idOrden = $row["idOrden"];

    $totalVentaGra = $mysqli -> query ("select format((sum(dp.precio) * 0.13) + sum(dp.precio),2) as ventasGR from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];

            $totalVentaIVA = $mysqli -> query ("select format(sum(dp.precio) * 0.13 ,2) as ventasGR from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalIVA = $totalVentaIVA->fetch_assoc();

            $totalIVA = $totalIVA['ventasGR'];


            $totalVentaEx = $mysqli -> query ("select format(sum(dp.precio),2) as ventasEx from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden 
            where dp.tipoVenta='Venta Exenta' and dp.idOrden =".$idOrden."  and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalEx = $totalVentaEx->fetch_assoc();
            $totalEx = $totalEx['ventasEx'];

            $totalVentaNoS= $mysqli -> query ("select format(sum(dp.precio),2) as ventasNoS from detalleOrdenP dp
           inner join ordenTrabajoP op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta No Sujeta' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalNoS = $totalVentaNoS->fetch_assoc();
            $totalNoS = $totalNoS['ventasNoS'];

            if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            
                $debitoFiscal = $totalGR * 0.01;

                $totalC = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

                
            
                }else{
           $totalC = $totalGR + $totalEx + $totalNoS;
                }
    if($totalC - $row["totalCobro"]>0){
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
       <td style="text-align:center;border:1px solid black;"></td>
       <td style="text-align:center;border:1px solid black; background-color:#5C1106;color:white"><?php echo $row['clasificacion'];?></td>
       <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>

       
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2);?></td>

       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR * 0.13,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($debitoFiscal,2);?></td>
       
       <td style="text-align:center;border:1px solid black;">$ <?php echo number_format($totalC,2);?></td>
       <td style="text-align:center;border:1px solid black;">$<?php echo number_format($row['totalCobro'],2);?></td>
       <td style="text-align:center;border:1px solid black;">$<?php
       $totalSaP = $totalC - $row['totalCobro'];

       echo number_format($totalSaP ,2);?></td>
       <?php
            if($totalC - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">0</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#F8B97A;">Por Cobrar</td>
       </tr>
            <?php
            }
            $totalSaldoP+= $totalSaP;
            ?>


    <?php
    
}
?>

<?php
while ($row=mysqli_fetch_assoc($listadoGF)) {
    $idOrden = $row["idOrden"];

    $totalVentaGra = $mysqli -> query ("select format((sum(dp.precio) * 0.13) + sum(dp.precio),2) as ventasGR from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalGR = $totalVentaGra->fetch_assoc();

            $totalGR = $totalGR['ventasGR'];

            $totalVentaIVA = $mysqli -> query ("select format(sum(dp.precio) * 0.13 ,2) as ventasGR from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Gravada' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalIVA = $totalVentaIVA->fetch_assoc();

            $totalIVA = $totalIVA['ventasGR'];


            $totalVentaEx = $mysqli -> query ("select format(sum(dp.precio),2) as ventasEx from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta Exenta' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalEx = $totalVentaEx->fetch_assoc();
            $totalEx = $totalEx['ventasEx'];

            $totalVentaNoS= $mysqli -> query ("select format(sum(dp.precio),2) as ventasNoS from detalleOrdenGR dp
           inner join ordenTrabajoGR op on op.idOrden = dp.idOrden
            where dp.tipoVenta='Venta No Sujeta' and dp.idOrden =".$idOrden." and op.cliente = ".$idCliente." group by dp.idOrden");

            $totalNoS = $totalVentaNoS->fetch_assoc();
            $totalNoS = $totalNoS['ventasNoS'];

            if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            
                $debitoFiscal = $totalGR * 0.01;

                $totalC = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

                
            
                }else{
           $totalC = $totalGR + $totalEx + $totalNoS;
                }

    if($totalC - $row["totalCobro"]>0){
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
       <td style="text-align:center;border:1px solid black;"></td>
       <td style="text-align:center;border:1px solid black; background-color:#03440E;color:white"><?php echo $row['clasificacion'];?></td>
       <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>

       
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalNoS,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalEx,2);?></td>

       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalGR * 0.13,2);?></td>
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($debitoFiscal,2);?></td>
       
       <td style="text-align:center;border:1px solid black;">$ <?php echo number_format($totalC,2);?></td>
       <td style="text-align:center;border:1px solid black;">$<?php echo number_format($row['totalCobro'],2);?></td>
       <td style="text-align:center;border:1px solid black;">$<?php
       $totalSaGR = $totalC - $row['totalCobro'];

       echo number_format($totalSaGR ,2);?></td>
       <?php
            if($totalC - $row['totalCobro'] >0){

            
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">0</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#F8B97A;">Por Cobrar</td>
       </tr>
            <?php
            }
            $totalSaldoGR+= $totalSaGR;
            ?>
	


    <?php
   
}
?>
<tfoot>
<td style="text-align:right;border:1px solid black;background-color:#ACAEAB; font-weight:bold; font-size:17px;" colspan="12">Total a cobrar</td>
<td style="text-align:center;border:1px solid black; font-weight:bold; font-size:17px;">$ <?php echo number_format($totalSaldoGR + $totalSaldoIP + $totalSaldoP,2);?></td>
</tfoot>
</table>
</center>
<?php

}else{
echo "no";
}


	