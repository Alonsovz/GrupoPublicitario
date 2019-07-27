<?php

if($_GET["idOrden"]){

    $idOrden = $_GET["idOrden"];

    $mysqli = new mysqli("shareddb-o.hosting.stackcp.net","grupoPub","12345678*","grupoPublicitario-313039a314");

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


    $tipoCliente =  $mysqli -> query  ("select c.categoria as categoria from clientes c
    inner join ordenTrabajoGR o on o.cliente = c.idCliente
    where o.idOrden  =".$idOrden."");

    $cliente = $tipoCliente->fetch_assoc();

    $cliente = $cliente['categoria'];

    header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=CFF.xls');
  
    $totalVentaEx =0;
    $totalVentaGra = 0;
    $totalVentaNo =0;
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
    <th>Registro No: <?php echo utf8_decode($row["nrc"]) ?></th>
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
        <td><?php
            $totalVentaNo += $row["precio"];
            echo $row["precio"] ?></td>

        <?php 
        }else{?>
        <td></td>
        <?php }?>


        <?php if($row["tipoVenta"] == "Venta Exenta"){ ?>
        <td><?php
            $totalVentaEx += $row["precio"];
             echo $row["precio"] ?></td>
        <?php 
        }else{?>
        <td></td>
        <?php }?>

        <?php if($row["tipoVenta"] == "Venta Gravada"){ ?>
        <td><?php 
            $totalVentaGra += $row["precio"];
            echo $row["precio"] ?></td>
        <?php 
        }else{?>
        <td></td>
        <?php }?>
    </tr>

    <?php 
    }
    ?>
    </table>
    <br><br>
    <table>
    <tr>
    <th style="width:50%">
    
 
   </th>

   <th>
   <th>
   <table>
        <tr>
            <td>Sumas-Venta GR</td><td><?php echo  "$". number_format($totalVentaGra,2)?></td>
            
        </tr>

        <tr>
        <td>13% IVA</td><td><?php
        $iva = $totalVentaGra  * 0.13;
        echo "$". number_format($iva,2)?></td>
        </tr>

        <tr>
            <td>Sub-Total</td><td>
            <?php echo "$". number_format( $iva +$totalVentaGra,2)?>
            </td>
            
        </tr>
        
        <tr>
        <?php
            if($cliente == "Gran Contribuyente" && $totalVentaGra>=100.00){
        ?>
        <?php
        $ivaRet = $totalVentaGra * 0.01;
        ?>
        <td>(-)IVA RETENIDO</td><td><?php echo "$". number_format( $ivaRet,2)?></td>

        <?php
            }else{
                $ivaRet =0;
        ?>
            <td>(-)IVA RETENIDO</td><td><?php echo "$". number_format( $ivaRet,2)?></td>
            <?php } ?>
        </tr>

        <tr>
        <td>Ventas No Sujetas</td><td><?php echo "$". number_format($totalVentaNo,2)?></td>
        </tr>

        <tr>
            <td>Ventas Exentas</td><td><?php echo "$". number_format($totalVentaEx,2)?></td>
        </tr>
        
        <tr>
        <td>Total</td><td><?php 
        $totalFac = ($totalVentaGra + $totalVentaEx + $totalVentaNo +$iva) - $ivaRet;
         echo "$". number_format($totalFac,2) ?></td>


        </tr>

    
    </table>
   
   <tr>
   <tr>
   </th>
   <th style="width:50%">
   <?php
   include("funcion.php");
 echo $pagado =strtoupper (NumeroLetra($totalFac));

?>
 
   </th>
   </tr>
   </table>
   

<?php
}
?>


