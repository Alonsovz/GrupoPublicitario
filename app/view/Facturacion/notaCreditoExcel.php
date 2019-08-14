<?php



   

    $mysqli = new mysqli('localhost','root','','grupopublicitario');

    $encabezadoOrden = $mysqli -> query ("
    select o.*, DATE_FORMAT(o.fechaNota, '%d/%m/%Y') as fechaNota,
    DATE_FORMAT(o.fechaNotaAn, '%d/%m/%Y') as fechaNotaAn,
       c.nombre as nombreC,c.*
       from notaCredito o
       inner join clientes c on c.idCliente = o.idCliente
   where o.idNota=(select max(idNota) from notaCredito) group by idNota");

   $detalleOrden = $mysqli -> query ("
   select  d.* from detalleNota d
   inner join notaCredito o on o.idNota = d.idNota
   where o.idNota=(select max(idNota) from notaCredito)");

    $tipoCliente =  $mysqli -> query  ("select c.categoria as categoria from clientes c
    inner join notaCredito o on o.idCliente = c.idCliente
    where o.idNota=(select max(idNota) from notaCredito)");

    $cliente = $tipoCliente->fetch_assoc();

    $cliente = $cliente['categoria'];

    header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=notaCredito.xls');
   
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
        <th colspan="3"><?php echo $row["nombreC"] ?></th>
        <th>Fecha: <?php echo $row["fechaNota"] ?></th>
    </tr>
    <tr>
    <th colspan="3">Direccion: <?php echo utf8_decode($row["direccion"]) ?></th>
    <th>Registro No:</th>
    </tr>

    <tr>
    <th colspan="3">Municipio: </th>
    <th>Giro: <?php echo utf8_decode($row["giro"]) ?></th>
    </tr>

    <tr>
    <th colspan="3">Departamento: <?php echo utf8_decode($row["departamento"]) ?></th>
    <th>NIT: <?php echo utf8_decode($row["nit"]) ?></th>
   
    </tr>
    <tr>
    <th>N CFF ajus MOD: </th>
    <th>N remision: <?php echo utf8_decode($row["nNota"]) ?></th>
    <th>F. de nota de Rem: <?php echo utf8_decode($row["fechaNotaAn"]) ?></th>
    <th>Venta a cuenta de: <?php echo utf8_decode($row["ventaCuenta"]) ?></th>
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
        
        <?php echo $row["descripcion"] ?></td>
        <td><?php echo number_format($row["precioUni"] / $row["cantidad"],2)  ?></td>
        
        
        <td><?php
            $totalVentaNo += $row["ventasNo"];
            echo number_format($row["ventasNo"]); ?></td>

        


        
        <td><?php
            $totalVentaEx += $row["ventasEx"];
            echo number_format($row["ventasEx"]);?></td>
       

        
        <td><?php 
            $totalVentaGra += $row["ventasGra"];
            echo number_format($row["ventasGra"]); ?></td>
        
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

?>