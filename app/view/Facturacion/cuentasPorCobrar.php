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
inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle
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
inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle");


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
inner join medidas m on m.idMedida = pm.idMedida group by d.idDetalle
");
?>

<br>
<div class="content" id="imp">
<br>
<table class="ui table bordered" style="width:100%;">

    <tr style="border:1px solid white;text-align:center;background-color:black;color:white;" height="40">
    <th  style="border:1px solid white;width:5%;">Fecha</th>
    <th  style="border:1px solid white;width:6%;">Tipo DOC</th>
    <th  style="border:1px solid white;width:10%;">Tipo PRO</th>
    <th  style="border:1px solid white;">Clasificación</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid white;width:10%;">Detalle</th>


    <th  style="text-align:center;border:1px solid white;width:8%;">Total</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">Cartera Corr</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">1 a 30 dias</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">31 a 60 dias</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">61 a 90 días</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">91 a 180 días</th>
    <th  style="text-align:center;border:1px solid white;width:8%;">181 a 360 días</th>
    <th  style="text-align:center;border:1px solid white;width:9%;"><i class="book icon"></i></th>

    
</tr>
<?php
while ($row=mysqli_fetch_assoc($listadoIP)) {
    ?>

    <?php
    if($row["deuda"]>0){
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
            <td style="text-align:center;border:1px solid black; background-color:#0B0678;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
           
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>

            <td style="text-align:center;border:1px solid black;"></td>

            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            
            <td style="text-align:center;border:1px solid black;">
             
             <button class="ui blue small icon button"
            deuda="<?php echo $row["deuda"];?>"
            pro="<?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?>" fechaFa="<?php echo $row['fechaCobro'];?>"
             id="<?php echo $row["idDetalle"]; ?>" idC="<?php echo $row["idC"]; ?>"
             onclick="enviarLibro(this)"><i class="send icon"></i></button>
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
    ?>
       <?php
    if($row["deuda"]>0){
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
            <td style="text-align:center;border:1px solid black; background-color:#03440E;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
           
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>

            <td style="text-align:center;border:1px solid black;"></td>

            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            
            <td style="text-align:center;border:1px solid black;">
             
             <button class="ui blue small icon button"
            deuda="<?php echo $row["deuda"];?>"
            pro="<?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?>" fechaFa="<?php echo $row['fechaCobro'];?>"
             id="<?php echo $row["idDetalle"]; ?>" idC="<?php echo $row["idC"]; ?>"
             onclick="enviarLibro(this)"><i class="send icon"></i></button>
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
    ?>
        <?php
    if($row["deuda"]>0){
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
            <td style="text-align:center;border:1px solid black; background-color:#5C1106;color:white"><?php echo $row['clasificacion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['cliente']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripciones'];?></td>
           
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['precio'];?></td>

            <td style="text-align:center;border:1px solid black;"></td>

            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            
            <td style="text-align:center;border:1px solid black;">
             
             <button class="ui blue small icon button"
            deuda="<?php echo $row["deuda"];?>"
            pro="<?php echo utf8_encode($row['productoFinal']." ".$row['acabado']);?>" fechaFa="<?php echo $row['fechaCobro'];?>"
             id="<?php echo $row["idDetalle"]; ?>" idC="<?php echo $row["idC"]; ?>"
             onclick="enviarLibro(this)"><i class="send icon"></i></button>
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

<div class="ui tiny modal" id="modalCobrar">
<div class="header" style="color:white;background-color:black">
Cobrar Venta.<br>
Producto :<a id="pro" style="color:yellow"></a><br>
Deuda : <a id="deu" style="color:yellow"></a><br>
Fecha de emisión de factura <a id="fechaFa" style="color:yellow"></a>
</div>
<div class="content">
<form class="ui form">
<input type="hidden" id="idCla" name="idCla">
<input type="hidden" id="idDetalle" name="idDetalle">
<label><i class="dollar icon"></i>Monto a cobrar</label>
<input type="text" id="monto" name="monto" placeholder="Monto a cobrar">
</form>
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
Deuda : <a id="deud" style="color:yellow"></a><br>
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
    

    if(idClasificacion==1){
        var idDetalle = $("#idDetalle").val();
        var monto = $("#monto").val();
        $.ajax({
                
                type: 'POST',
                url: '?1=RequisicionController&2=cobrarGF',
                data: {
                    idDetalle:idDetalle,
                    monto:monto,
                },
                success: function(r) {
                    if(r == 1) {
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
                },
                success: function(r) {
                    if(r == 1) {
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
                },
                success: function(r) {
                    if(r == 1) {
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

</script>