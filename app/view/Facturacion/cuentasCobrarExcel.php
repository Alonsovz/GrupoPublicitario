<?php
header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=cuentasPorCobrar.xls');

	require_once('conexion.php');
	$conn=new Conexion();
    $link = $conn->conectarse();
    
    $mysqli = new mysqli('localhost','root','','grupopublicitario');

	$query1="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,cl.*,
    v.nombre as vendedor
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
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 group by d.idOrden order by d.idOrden desc";
    $result1=mysqli_query($link, $query1);
    
    $query2="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,cl.*,
    v.nombre as vendedor
    
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
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 group by d.idOrden order by d.idOrden desc";
    $result2=mysqli_query($link, $query2);
    

    $query3="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
    DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
    o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
    TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
    format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC,cl.categoria as tipoCliente,cl.*,
    v.nombre as vendedor
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
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 group by d.idOrden order by d.idOrden desc";
    $result3=mysqli_query($link, $query3);
    
   
    

?>
<center><h1 style="margin:auto;">Libro de Cuentas Por Cobrar</h1>
<table class="ui table bordered" >

    <tr style="border:1px solid white;text-align:center;background-color:black;color:white;" height="40">
    <th rowspan="2"  style="border:1px solid white;width:5%;">Fecha</th>
    <th rowspan="2"  style="border:1px solid white;width:5%;">Correlativo</th>
    <th rowspan="2"  style="border:1px solid white;width:6%;">Tipo DOC</th>
    <th rowspan="2"  style="border:1px solid white;width:6%;">N DOC</th>
    <th rowspan="2" style="border:1px solid white;width:6%;">Vendedor</th>
    <th rowspan="2"  style="border:1px solid white;width:10%;">Tipo PRO</th>
    <th rowspan="2"  style="border:1px solid white;">Clasificaci&oacute;n</th>
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:10%;">Nombre Cliente</th>
    
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:8%;">Total</th>
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:8%;">Deuda</th>
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:8%;">Cartera Corr</th>
    <th colspan="5" style="text-align:center;border:1px solid white;">Morosidad (D&iacute;as)</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Abonos realizados </th>

    
    

    
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;">
    <th  style="text-align:center;border:1px solid white;width:8%;">1 a 30 </th>
    <th  style="text-align:center;border:1px solid white;width:8%;">31 a 60 </th>
    <th  style="text-align:center;border:1px solid white;width:8%;">61 a 90 </th>
    <th  style="text-align:center;border:1px solid white;width:8%;">91 a 180 </th>
    <th  style="text-align:center;border:1px solid white;width:10%;">181 a 360</th>
    </tr>
    

    
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

     
           if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
       
           $debitoFiscal = $totalGR * 0.01;

           $totalC = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

           
       
           }else{
      $totalC = $totalGR + $totalEx + $totalNoS;
           }

           $pagosIP= $mysqli -> query ("select *, format(monto,2) as monto,DATE_FORMAT(fechaPago, '%d/%m/%Y') as fechaPago from pagos
           where idClasificacion= 2 and idDetalle =".$idDetalle."");
       

if($totalC - $row["totalCobro"]>0){
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
       ?>
       <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nDoc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['vendedor']);?></td>
       <td style="text-align:center;border:1px solid black; background-color:#0B0678;color:white"><?php echo $row['clasificacion'];?></td>
       <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>
       <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
       
       <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalC,2);?></td>

       <td style="text-align:center;border:1px solid black;">$ <?php echo number_format($totalC - $row["totalCobro"],2) ; ?></td>

       <?php
           if($row["diasMoro"]<="30"){
       ?>
       <td style="text-align:center;border:1px solid black;">$ <?php
       echo number_format($totalC,2);?></td>
       <?php
           }else{

           
       ?>
       <td style="text-align:center;border:1px solid black;">--</td>
       <?php
           }
       ?>
       <?php
           if($row["diasMoro"]>="1" and $row["diasMoro"]<="30"){
       ?>
       <td style="text-align:center;border:1px solid black;"><?php
        echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
       <?php
           }else{

           
       ?>
       <td style="text-align:center;border:1px solid black;">--</td>
       <?php
           }
       ?>
       <?php
           if($row["diasMoro"]>"30" and $row["diasMoro"]<="60"){
       ?>
       <td style="text-align:center;border:1px solid black;"><?php
        echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
       <?php
           }else{

           
       ?>
       <td style="text-align:center;border:1px solid black;">--</td>
       <?php
           }
       ?>
       <?php
           if($row["diasMoro"]>"61" and $row["diasMoro"]<="90"){
       ?>
       <td style="text-align:center;border:1px solid black;"><?php
         echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
       <?php
           }else{  
       ?>
       <td style="text-align:center;border:1px solid black;">--</td>
       <?php
           }
       ?>
       <?php
           if($row["diasMoro"]>"91" and $row["diasMoro"]<="180"){
       ?>
       <td style="text-align:center;border:1px solid black;"><?php
         echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
       <?php
           }else{  
       ?>
       <td style="text-align:center;border:1px solid black;">--</td>
       <?php
           }
       ?>
       <?php
           if($row["diasMoro"]>"180" and $row["diasMoro"]<="360"){
       ?>
       <td style="text-align:center;border:1px solid black;"><?php
         echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
       <?php
           }else{  
       ?>
       <td style="text-align:center;border:1px solid black;">--</td>
       <?php
           }
       ?>
       
       <td  style="text-align:center;border:1px solid black">
                    <table>
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
       
       
       </tr>


            <?php
            }
            ?>
    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($result3)) {
    $idOrden = $row["idOrden"];

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

            if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            
                $debitoFiscal = $totalGR * 0.01;

                $totalC = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

                
            
                }else{
           $totalC = $totalGR + $totalEx + $totalNoS;
                }

                $pagosGR= $mysqli -> query ("select *, format(monto,2) as monto,DATE_FORMAT(fechaPago, '%d/%m/%Y') as fechaPago from pagos
            where idClasificacion= 1 and idDetalle =".$idDetalle."");

    if($totalC - $row["totalCobro"]>0){
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro']; ?><br></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['correlativo']; ?><br></td>
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
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nDoc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['vendedor']);?></td>
            <td style="text-align:center;border:1px solid black; background-color:#03440E;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            
           
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalC,2);?></td>
            <td style="text-align:center;border:1px solid black;">$ <?php echo number_format($totalC - $row["totalCobro"],2) ; ?></td>
            <?php
                if($row["diasMoro"]<="30"){
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php
            echo number_format($totalC,2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>

            <?php
                if($row["diasMoro"]>="1" and $row["diasMoro"]<="30"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
              echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"30" and $row["diasMoro"]<="60"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
             echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"61" and $row["diasMoro"]<="90"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
              echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{  
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"91" and $row["diasMoro"]<="180"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
              echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{  
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"180" and $row["diasMoro"]<="360"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
              echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{  
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
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
            
            
            </tr>

            <?php
            }
            ?>

    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($result2)) {
    $idOrden = $row["idOrden"];

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

            if($totalGR>="100.00" and $row["tipoCliente"]=="Gran Contribuyente"){
            
                $debitoFiscal = $totalGR * 0.01;

                $totalC = ($totalGR + $totalEx + $totalNoS)-$debitoFiscal;

                
            
                }else{
           $totalC = $totalGR + $totalEx + $totalNoS;
                }

                $pagosP= $mysqli -> query ("select *, format(monto,2) as monto,DATE_FORMAT(fechaPago, '%d/%m/%Y') as fechaPago from pagos
            where idClasificacion= 3 and idDetalle =".$idDetalle."");

    if($totalC - $row["totalCobro"]>0){
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
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nDoc']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['vendedor']);?></td>
            <td style="text-align:center;border:1px solid black; background-color:#5C1106;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
           
            
            <td style="text-align:center;border:1px solid black;"> $ <?php echo number_format($totalC,2);?></td>
            
        <td style="text-align:center;border:1px solid black;">$ <?php echo number_format($totalC - $row["totalCobro"],2) ; ?></td>

        <?php
                if($row["diasMoro"]<="30"){
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php
            echo number_format($totalC,2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>

            <?php
                if($row["diasMoro"]>="1" and $row["diasMoro"]<="30"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
             echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"30" and $row["diasMoro"]<="60"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
              echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"61" and $row["diasMoro"]<="90"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
             echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{  
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"91" and $row["diasMoro"]<="180"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
              echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{  
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <?php
                if($row["diasMoro"]>"180" and $row["diasMoro"]<="360"){
            ?>
            <td style="text-align:center;border:1px solid black;"><?php
             echo $row["diasMoro"] . " dias <br>$".number_format($totalC - $row["totalCobro"],2);?></td>
            <?php
                }else{  
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
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
            
            
            </tr>
            <?php
            }
            ?>

    <?php
}




?>
</table>
    </center>