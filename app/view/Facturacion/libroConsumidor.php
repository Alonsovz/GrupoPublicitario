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
                <a href="" class="ui right floated green labeled icon button">
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
format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC
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
where d.estadoCobro=6 group by d.idDetalle order by d.idDetalle desc
");


$listadoP = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC
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
where d.estadoCobro=6 group by d.idDetalle order by d.idDetalle desc");


$listadoGF = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro,
format(d.precio - d.totalCobro,2) as deuda,t.*,cp.idClasificacion as idC
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
where d.estadoCobro=6 group by d.idDetalle order by d.idDetalle desc
");
?>

<br>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
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
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

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
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
        </tr>
    <?php
}

?>

<?php
while ($row=mysqli_fetch_assoc($listadoGF)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

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
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
        </tr>
    <?php
}

?>

<?php
while ($row=mysqli_fetch_assoc($listadoP)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

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
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
        </tr>
    <?php
}

?>


</table>
</div>