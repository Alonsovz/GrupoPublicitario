<?php

if($_GET["idOrden"]){

    $idOrden = $_GET["idOrden"];

    $mysqli = new mysqli('localhost','root','','grupopublicitario');

    $encabezadoOrden = $mysqli -> query ("
    select o.*,o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC,c.*, concat(us.nombre,' ', us.apellido) as respProduccion, v.nombre as vendedor,DATE_FORMAT(d.fechaFactura, '%d/%m/%Y') as fechaFactura
       from ordenTrabajoGR o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join detalleOrdenGR d on d.idOrden = o.idOrden
       inner join usuario us on us.codigoUsuario = o.idResponsablePro
       inner join vendedores v on v.idVendedor = o.idVendedor
       inner join clientes c on c.idCliente = o.cliente
   where o.idOrden=".$idOrden." group by idOrden");

   $detalleOrden = $mysqli -> query ("
   select  d.*, p.productoFinal as productoFin,a.acabado as acabado, c.color as color, format(d.precio,2) as precioF 
     from detalleOrdenGR d
   inner join ordenTrabajoGR o on o.idOrden = d.idOrden
   inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
   inner join acabados a on a.idAcabado = d.idAcabado
   inner join colores c on c.idColor = d.idColor
    where o.idOrden=".$idOrden."");



    header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=CFF.xls');
   
?>
<h1 style="color:white">Ventas</h1>
<h1 style="color:white">Ventas</h1>
<h1 style="color:white">Ventas</h1>
<h1 style="color:white">Ventas</h1>

    <table style="width:100%;">
    <?php  while($row=mysqli_fetch_assoc($encabezadoOrden)){?>
    <tr>    
        <th style="margin-left:50px;"><?php echo $row["nombreC"] ?></th>
        <th>Fecha: <?php echo $row["fechaFactura"] ?></th>
    </tr>
    <tr>
    <th>Direccion: <?php echo utf8_decode($row["direccion"]) ?></th>
    <th>Registro No:</th>
    </tr>
    <tr>
    <th rowspan=2>Departamento: <?php echo utf8_decode($row["departamento"]) ?></th>
    <tr>
    <th>Giro: <?php echo utf8_decode($row["giro"]) ?></th>
    <th>NIT: <?php echo utf8_decode($row["nit"]) ?></th>
    </tr>
    </tr>
    <tr>
    <th>Venta a cuenta de: </th>
    <th>Cond. de la operacion:</th>
    </tr>
    <tr>
    <th>No de Nota remision anterior:</th>
    <th>Fecha de nota de remision anterior</th>
    </tr>

    <?php 
    }
    ?>
    </table>

    <br>
    <table>
    <tr>
    <th>Cant</th>
    <th>Descripcion</th>
    <th>Precio Unitario</th>
    <th>Ventas no Suj</th>
    <th>Ventas Exentas</th>
    <th>Ventas Gravadas</th>
    </tr>

    <table >
    <?php  while($row=mysqli_fetch_assoc($detalleOrden)){?>
    <tr>    
        <td style="margin-left:50px;"><?php echo $row["cantidad"] ?></td>
        <td>
        <?php echo $row["productoFin"] ?>,<?php echo $row["acabado"] ?>,<?php echo $row["color"] ?><br>
        <?php echo $row["descripciones"] ?></td>
        <td><?php echo number_format($row["precio"] / $row["cantidad"],2)  ?></td>
        
        <?php if($row["tipoVenta"] == "Venta No Sujeta"){ ?>
        <td><?php echo $row["precio"] ?></td>
        <?php 
        }else{?>
        <td></td>
        <?php }?>


        <?php if($row["tipoVenta"] == "Venta Exenta"){ ?>
        <td><?php echo $row["precio"] ?></td>
        <?php 
        }else{?>
        <td></td>
        <?php }?>

        <?php if($row["tipoVenta"] == "Venta Gravada"){ ?>
        <td><?php echo $row["precio"] ?></td>
        <?php 
        }else{?>
        <td></td>
        <?php }?>
    </tr>

    <?php 
    }
    ?>
    </table>

<?php
}
?>