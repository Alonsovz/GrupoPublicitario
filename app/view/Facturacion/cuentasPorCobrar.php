<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <font color="black" size="5px">
            <i class="list icon"></i> <i class="dollar icon"></i>
            Cuentas por cobrar</font><font color="black" size="20px">.</font>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <a href="./app/view/Facturacion/cuentasCobrarExcel.php" class="ui right floated green labeled icon button">
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
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 group by d.idOrden order by d.idOrden desc
");


$listadoP = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
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
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 group by d.idOrden order by d.idOrden desc");


$listadoGF = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
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
     YEAR(NOW()) AND MONTH(curdate())=MONTH(NOW()) and o.estado>5 and o.estado<9 group by d.idOrden order by d.idOrden desc
");
?>

<br>
<div class="content">
<br>
<table class="ui table bordered" style="width:100%;">

    <tr style="border:1px solid white;text-align:center;background-color:black;color:white;" height="40">
    <th rowspan="2"  style="border:1px solid white;width:5%;">Fecha</th>
    <th rowspan="2"  style="border:1px solid white;width:6%;">Tipo DOC</th>
    <th rowspan="2"  style="border:1px solid white;width:10%;">Tipo PRO</th>
    <th rowspan="2"  style="border:1px solid white;">Clasificación</th>
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:10%;">Nombre Cliente</th>
    
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:8%;">Total</th>
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:8%;">Deuda</th>
    <th rowspan="2"  style="text-align:center;border:1px solid white;width:8%;">Cartera Corr</th>
    <th colspan="5" style="text-align:center;border:1px solid white;">Morosidad (Días)</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;width:5%;"><i class="book icon"></i></th>

    
    

    
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;">
    <th  style="text-align:center;border:1px solid white;width:8%;">1 a 30 </th>
    <th  style="text-align:center;border:1px solid white;width:8%;">31 a 60 </th>
    <th  style="text-align:center;border:1px solid white;width:8%;">61 a 90 </th>
    <th  style="text-align:center;border:1px solid white;width:8%;">91 a 180 </th>
    <th  style="text-align:center;border:1px solid white;width:10%;">181 a 360</th>
    </tr>
    

    
</tr>
<?php
while ($row=mysqli_fetch_assoc($listadoIP)) {
    $idOrden = $row["idOrden"];

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

     
            

    if($totalC - $row["totalCobro"]>0){
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro']; ?></td>

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
            
            <td style="text-align:center;border:1px solid black;">
             
            <button class="ui green small icon button"
            deuda="<?php echo number_format($totalC - $row['totalCobro'],2);?>"
            pro="<?php echo utf8_encode($row['productoFinal']);?>" fechaFa="<?php echo $row['fechaCobro'];?>"
             id="<?php echo $row["idDetalle"]; ?>" idC="<?php echo $row["idC"]; ?>"
             onclick="cobrar(this)"><i class="dollar icon"></i></button>
             </td>
            
            
            </tr>

            <?php
            }
            ?>
    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($listadoGF)) {
    $idOrden = $row["idOrden"];

    $totalVentaGra = $mysqli -> query ("select  format(sum(dp.precio),2) as ventasGR from detalleOrdenGR dp
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

    if($totalC - $row["totalCobro"]>0){
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro']; ?></td>

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
            
            <td style="text-align:center;border:1px solid black;">
             
            <button class="ui green small icon button"
            deuda="<?php echo number_format($totalC - $row['totalCobro'],2);?>"
            pro="<?php echo utf8_encode($row['productoFinal']);?>" fechaFa="<?php echo $row['fechaCobro'];?>"
             id="<?php echo $row["idDetalle"]; ?>" idC="<?php echo $row["idC"]; ?>"
             onclick="cobrar(this)"><i class="dollar icon"></i></button>
             </td>
            
            
            </tr>

            <?php
            }
            ?>

    <?php
}




?>

<?php
while ($row=mysqli_fetch_assoc($listadoP)) {
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
    if($totalC - $row["totalCobro"]>0){
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro']; ?></td>

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
            
            <td style="text-align:center;border:1px solid black;">
             
            <button class="ui green small icon button"
            deuda="<?php echo number_format($totalC - $row['totalCobro'],2);?>"
            pro="<?php echo utf8_encode($row['productoFinal']);?>" fechaFa="<?php echo $row['fechaCobro'];?>"
             id="<?php echo $row["idDetalle"]; ?>" idC="<?php echo $row["idC"]; ?>"
             onclick="cobrar(this)"><i class="dollar icon"></i></button>
             </td>
            
            
            </tr>

            <?php
            }
            ?>

    <?php
}




?>
</table>
</div>

<div class="ui  modal" id="modalCobrar">
<div class="header" style="color:white;background-color:black">
Cobrar Venta.<br>
Producto :<a id="pro" style="color:yellow"></a><br>
Deuda : $ <a id="deu" style="color:yellow"></a><br>
Fecha de emisión de factura <a id="fechaFa" style="color:yellow"></a>
</div>
<div class="content" style="background-color:#BDBCBD">
<form class="ui form">
<div class="field">
    <div class="fields">
        <div class="eight wide field">
            <input type="hidden" id="idCla" name="idCla">
            <input type="hidden" id="idDetalle" name="idDetalle">
            <label><i class="dollar icon"></i>Monto a cobrar</label>
            <input type="text" id="monto" name="monto" placeholder="Monto a cobrar">
        </div>
        <div class="eight wide field">
            <label><i class="dollar icon"></i>Tipo de pago</label>
            <select class="ui dropdown" id="tipoPago" name="tipoPago">
            <option value="seleccione" set selected>Seleccione una forma de pago</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Cheque">Cheque</option>
            <option value="Tarjeta de credito">Tarjeta de credito</option>
            <option value="Patrocinio">Patrocinio</option>
            <option value="Comision">Comisión</option>
            <option value="Otros">Otros</option>
            </select>
        </div>
    </div>
</div>
</form>
<div class="ui divider"></div>
<a style="color:black; background-color:white;font-size:22px;font-weight:bold;">Historial de pagos</a>
<a id="pagos"></a>

</div>
<div class="actions">
<button class="ui red deny button">Cancelar</button>
<button class="ui black button" id="btnCobrar">Cobrar</button>
</div>
</div>


<div class="ui tiny modal" id="modalEnviar">
<div class="header" style="color:white;background-color:black">
Enviar a libro.<br>
Producto :<a id="prod" style="color:yellow"></a><br>
Deuda : $ <a id="deud" style="color:yellow"></a><br>
Fecha de emisión de factura <a id="fechaFac" style="color:yellow"></a>
</div>
<div class="content">
<form class="ui form">
<input type="hidden" id="idClas" name="idClas">
<input type="hidden" id="idDetalles" name="idDetalles">

</form>
</div>
<div class="actions">
<button class="ui red deny button">Cancelar</button>
<button class="ui black button" id="btnEnviar">Enviar</button>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $('#monto').mask("###0.00", {reverse: true});
});
$("#GFbtn").click(function(){
    $("#GF").show(100);
    $("#imp").hide(100);
    $("#pro").hide(100);
});

$("#impbtn").click(function(){
    $("#GF").hide(100);
    $("#imp").show(100);
    $("#pro").hide(100);
});

$("#Pbtn").click(function(){
    $("#GF").hide(100);
    $("#imp").hide(100);
    $("#pro").show(100);
});


var cobrar=(ele)=>{
    $("#fechaFa").text($(ele).attr("fechaFa"));
    $("#pro").text($(ele).attr("pro"));
    $("#deu").text($(ele).attr("deuda"));
    $("#idCla").val($(ele).attr("idC"));
    $("#idDetalle").val($(ele).attr("id"));

    var idC = $(ele).attr("idC");
    var idDetalle = $(ele).attr("id");

    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=historialPagos",
            data:{
                idC:idC,
                idDetalle : idDetalle,
            },
        success:function(r){
				$('#pagos').html(r);
			}
        });

    $("#modalCobrar").modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
}



var enviarLibro=(ele)=>{
    $("#fechaFac").text($(ele).attr("fechaFa"));
    $("#prod").text($(ele).attr("pro"));
    $("#deud").text($(ele).attr("deuda"));
    $("#idClas").val($(ele).attr("idC"));
    $("#idDetalles").val($(ele).attr("id"));
    $("#modalEnviar").modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
}


$("#btnCobrar").click(function(){
    
    var idClasificacion = $("#idCla").val();
    var tipoPago = $("#tipoPago").val();

    if(idClasificacion==1){

        
        var idDetalle = $("#idDetalle").val();
        var monto = $("#monto").val();
        
        $.ajax({
            
                type: 'POST',
                url: '?1=RequisicionController&2=cobrarGF',
                data: {
                    idDetalle:idDetalle,
                    monto:monto,
                    tipoPago:tipoPago,
                },
                success: function(r) {
                    if(r == 11) {
                        $("#modalCobrar").modal('hide');
                        swal({
                            title: 'Cobro guardado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            
                            showConfirmButton: true,
                            }).then((result) => {
                                if(result.value){
                                    location.reload();
                                }
                            });
                        
                    } 
                }
            
        });
    }
    if(idClasificacion==2){
        var idDetalle = $("#idDetalle").val();
        var monto = $("#monto").val();
        $.ajax({
                
                type: 'POST',
                url: '?1=RequisicionController&2=cobrarIP',
                data: {
                    idDetalle:idDetalle,
                    monto:monto,
                    tipoPago:tipoPago,
                },
                success: function(r) {
                    if(r == 11) {
                        $("#modalCobrar").modal('hide');
                        swal({
                            title: 'Cobro guardado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            
                            showConfirmButton: true,
                            }).then((result) => {
                                if(result.value){
                                    location.reload();
                                }
                            });
                        
                    } 
                }
            
        });
    }

    if(idClasificacion==3){
        var idDetalle = $("#idDetalle").val();
        var monto = $("#monto").val();
        $.ajax({
                
                type: 'POST',
                url: '?1=RequisicionController&2=cobrarP',
                data: {
                    idDetalle:idDetalle,
                    monto:monto,
                    tipoPago:tipoPago,
                },
                success: function(r) {
                    if(r == 11) {
                        $("#modalCobrar").modal('hide');
                        swal({
                            title: 'Cobro guardado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            
                            showConfirmButton: true,
                            }).then((result) => {
                                if(result.value){
                                    location.reload();
                                }
                            });
                        
                    } 
                }
            
        });
    }
    

});



$("#btnEnviar").click(function(){
    
    var idClasificacion = $("#idClas").val();
    var idDetalle = $("#idDetalles").val();
    var tipoDoc = $("#tipoD").val();

    
        
        $.ajax({
                
                type: 'POST',
                url: '?1=RequisicionController&2=enviarLibro',
                data: {
                    idDetalle:idDetalle,
                    idClasificacion:idClasificacion,
                    tipoDoc:tipoDoc,
                },
                success: function(r) {
                    if(r == 1) {
                        $("#modalEnviar").modal('hide');
                        swal({
                            title: 'Enviado a '+$("#tipoLibro").text(),
                            text: 'Guardado con éxito',
                            type: 'success',
                            
                            showConfirmButton: true,
                            }).then((result) => {
                                if(result.value){
                                    location.reload();
                                }
                            });
                        
                    } 
                }
            
        });
    
    

});

</script>