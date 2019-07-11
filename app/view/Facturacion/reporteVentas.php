<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <button id="GFbtn" class="ui  blue labeled icon button">
                    <i class="list icon"></i>
                   Gran Formato
                </button>

                <button id="impbtn" class="ui orange labeled icon button">
                    <i class="list icon"></i>
                   Impresión digital
                </button>

                <button id="Pbtn" class="ui  red labeled icon button">
                    <i class="list icon"></i>
                   Promocionales
                </button>
            <br><br>
            <font color="black" size="5px">
            <i class="list icon"></i> <i class="dollar icon"></i>
            Reporte de Ventas</font><font color="black" size="20px">.</font>
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
TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro
from detalleOrdenIP d
inner join ordenTrabajoIP o on o.idOrden = d.idOrden
inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
inner join colores c on c.idColor = d.idColor
inner join acabados a on a.idAcabado = d.idAcabado
inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
inner join clientes cl on cl.idCliente = o.cliente
inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle
");


$listadoP = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro,format(d.totalCobro,2) as totalCobro
 from detalleOrdenP d
inner join ordenTrabajoP o on o.idOrden = d.idOrden
inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
inner join colores c on c.idColor = d.idColor
inner join acabados a on a.idAcabado = d.idAcabado
inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
inner join clientes cl on cl.idCliente = o.cliente
inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle");


$listadoGF = $mysqli -> query ("
select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio,o.*,
DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fecha,cl.nombre as cliente,cl.nrc as nrc,cl.nit as nit,
o.estado as doc, DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaCobro,
TIMESTAMPDIFF(DAY, d.fechaFactura, curdate()) AS diasMoro ,format(d.totalCobro,2) as totalCobro
  from detalleOrdenGR d
inner join ordenTrabajoGR o on o.idOrden = d.idOrden
inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
inner join colores c on c.idColor = d.idColor
inner join acabados a on a.idAcabado = d.idAcabado
inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
inner join clientes cl on cl.idCliente = o.cliente
inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle
");
?>

<br>
<div class="content" id="imp" style="display:none;">
<h1>Reporte de ventas de Productos Impresión digital</h1>
<table class="ui table bordered" style="width:100%;">

    <tr style="border:1px solid black;text-align:center;background-color:black;color:white;" height="40">
    <th  style="border:1px solid black;">Fecha</th>
    <th  style="border:1px solid black;">Tipo DOC</th>
    <th  style="border:1px solid black;">Clasificación</th>
    <th  style="text-align:center;border:1px solid black;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid black;">Detalle</th>
    <th  style="text-align:center;border:1px solid black;">N° NRC</th>
    <th  style="text-align:center;border:1px solid black;">N° NIT</th>
    <th  style="text-align:center;border:1px solid black;">Cantidad</th>

    <th  style="text-align:center;border:1px solid black;">Precio</th>
    <th  style="text-align:center;border:1px solid black;">Estatus</th>
    <th  style="text-align:center;border:1px solid black;">Dias de morosidad</th>
    <th  style="text-align:center;border:1px solid black;">Total Cobrado</th>
    <th  style="text-align:center;border:1px solid black;">Fecha de Cobro</th>
    <th  style="text-align:center;border:1px solid black;"><i class="book icon"></i></th>

    
</tr>
<?php
while ($row=mysqli_fetch_assoc($listadoIP)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

            <?php   
                if($row["doc"]=="6"){
            ?>
                <td style="text-align:center;border:1px solid black;background-color:#BFF2C8;">Factura C</td>
            <?php
                }
                if($row["doc"]=="7"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#F49F78;">CCF</td>
            <?php
                }
                if($row["doc"]=="8"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#94B5F9;">Nota C</td>
            <?php
                }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cantidad']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['precio'];?></td>

            <?php
            if($row["estadoCobro"]=="1"){

            
            ?>
            <td style="text-align:center;border:1px solid black;">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">Cobrado</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><button class="ui purple small icon button"><i class="send icon"></i></button></td>
        </tr>	

    <?php
}




?>
</table>
</div>


<div class="content" id="GF" style="">
<h1>Reporte de ventas de Productos de Gran Formato</h1>
<table class="ui table bordered" style="width:100%;">

    <tr style="border:1px solid black;text-align:center;background-color:#053392;color:white;" height="40">
    <th  style="border:1px solid black;">Fecha</th>
    <th  style="border:1px solid black;">Tipo DOC</th>
    <th  style="border:1px solid black;">Clasificación</th>
    <th  style="text-align:center;border:1px solid black;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid black;">Detalle</th>
    <th  style="text-align:center;border:1px solid black;">N° NRC</th>
    <th  style="text-align:center;border:1px solid black;">N° NIT</th>
    <th  style="text-align:center;border:1px solid black;">Cantidad</th>

    <th  style="text-align:center;border:1px solid black;">Precio</th>
    <th  style="text-align:center;border:1px solid black;">Estatus</th>
    <th  style="text-align:center;border:1px solid black;">Dias de morosidad</th>
    <th  style="text-align:center;border:1px solid black;">Total Cobrado</th>
    <th  style="text-align:center;border:1px solid black;">Fecha de Cobro</th>
    <th  style="text-align:center;border:1px solid black;"><i class="book icon"></i></th>

    
</tr>
<?php
while ($row=mysqli_fetch_assoc($listadoGF)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

            <?php   
                if($row["doc"]=="6"){
            ?>
                <td style="text-align:center;border:1px solid black;background-color:#BFF2C8;">Factura C</td>
            <?php
                }
                if($row["doc"]=="7"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#F49F78;">CCF</td>
            <?php
                }
                if($row["doc"]=="8"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#94B5F9;">Nota C</td>
            <?php
                }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cantidad']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['precio'];?></td>

            <?php
            if($row["estadoCobro"]=="1"){

            
            ?>
            <td style="text-align:center;border:1px solid black;">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">Cobrado</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><button class="ui purple small icon button"><i class="send icon"></i></button></td>
        </tr>	

    <?php
}




?>
</table>
</div>

<div class="content" id="pro" style="display:none;">
<h1>Reporte de ventas de Productos Promocionales</h1>
<table class="ui table bordered" style="width:100%;">
    <tr style="border:1px solid black;text-align:center;background-color:#C40340;color:white;" height="40">
    <th  style="border:1px solid black;">Fecha</th>
    <th  style="border:1px solid black;">Tipo DOC</th>
    <th  style="border:1px solid black;">Clasificación</th>
    <th  style="text-align:center;border:1px solid black;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid black;">Detalle</th>
    <th  style="text-align:center;border:1px solid black;">N° NRC</th>
    <th  style="text-align:center;border:1px solid black;">N° NIT</th>
    <th  style="text-align:center;border:1px solid black;">Cantidad</th>

    <th  style="text-align:center;border:1px solid black;">Precio</th>
    <th  style="text-align:center;border:1px solid black;">Estatus</th>
    <th  style="text-align:center;border:1px solid black;">Dias de morosidad</th>
    <th  style="text-align:center;border:1px solid black;">Total Cobrado</th>
    <th  style="text-align:center;border:1px solid black;">Fecha de Cobro</th>
    <th  style="text-align:center;border:1px solid black;"><i class="book icon"></i></th>

    
</tr>
<?php
while ($row=mysqli_fetch_assoc($listadoP)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>

            <?php   
                if($row["doc"]=="6"){
            ?>
                <td style="text-align:center;border:1px solid black;background-color:#BFF2C8;">Factura C</td>
            <?php
                }
                if($row["doc"]=="7"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#F49F78;">CCF</td>
            <?php
                }
                if($row["doc"]=="8"){
            ?>
            <td style="text-align:center;border:1px solid black;background-color:#94B5F9;">Nota C</td>
            <?php
                }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nrc']);?></td>
            
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nit']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cantidad']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['precio'];?></td>

            <?php
            if($row["estadoCobro"]=="1"){

            
            ?>
            <td style="text-align:center;border:1px solid black;">Pendiente</td>
            <?php
            }else{

            ?>
            <td style="text-align:center;border:1px solid black;">Cobrado</td>
            <?php
            }
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['diasMoro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['totalCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fechaCobro'];?></td>
            <td style="text-align:center;border:1px solid black;"><button class="ui purple small icon button"><i class="send icon"></i></button></td>
        </tr>	

    <?php
}




?>
</table>
</div>

</div>
<script>
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
</script>