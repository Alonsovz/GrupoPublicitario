<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            
            
            <font color="black" size="5px">
            <i class="list icon"></i> <i class="dollar icon"></i>
            Base de Compras-Gastos</font><font color="black" size="20px">.</font>
            </div>
        </div>
        <div class="row title-bar">
            <div class="sixteen wide column">
                <a href="./app/view/Facturacion/baseComprasExcel.php" class="ui right floated green labeled icon button">
                    <i class="download icon"></i>
                    Descargar Excel
                </a>
            </div>
        </div>
      
</div>

<?php
require_once './vendor/autoload.php';
$mysqli = new mysqli('localhost','root','','grupoPublicitario');
$listado = $mysqli -> query ("
select r.*, d.* ,p.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,format(d.total,2) as total,
format(d.total * 0.13,2) as iva, format((d.total * 0.13)+d.total,2) as totalCompra
 from detalleRequisicion d
inner join requisiciones r on r.idRequisicion = d.idRequisicion
inner join proveedores p on p.idProveedor = r.idProveedor
where r.estado=5 order by d.idDetalle desc;");

$totalVentEx=0;
$totalVentGR=0;
$totalIvaRet=0;
$totalVentas=0;
?>

<br>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th rowspan="2" style="border:1px solid white;">Correlativo</th>
    <th rowspan="2" style="border:1px solid white;">Fecha</th>
    <th rowspan="2" style="border:1px solid white;">Proveedor</th>

    <th colspan="3" style="text-align:center;border:1px solid white;">Compras Exentas</th>
    <th colspan="3" style="text-align:center;border:1px solid white;">Compras Gravadas</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Iva Crédito Fiscal</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Iva Per</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Ant Cuenta IVA ret.</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Total compras</th>


    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
      <th style="border:1px solid white;">Locales</th>
      <th style="border:1px solid white;">Import.</th>
      <th style="border:1px solid white;">Inter.</th>
  
      <th style="border:1px solid white;">Locales</th>
      <th style="border:1px solid white;">Import.</th>
      <th style="border:1px solid white;">Inter.</th>
    </tr>
    
    
</tr>

<?php
while ($row=mysqli_fetch_assoc($listado)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['idRequisicion']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['nombre'];?></td>
            <?php
                if($row["tipoCompra"]=="Exenta"){
                    $totalVentExe =$row['total'];
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['total'];?></td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }else{

                    $totalVentExe = 0;
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>

           
            <?php
                if($row["tipoCompra"]=="Gravada"){
                    $totalVentGra =$row['total'];
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['total'];?></td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }else{
                    $totalVentGra =0;
                
            ?>
           <td style="text-align:center;border:1px solid black;">--</td>
           <td style="text-align:center;border:1px solid black;">--</td>
           <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            
            <?php
                if($row["tipoCompra"]=="Gravada"){
                    $totalIvaRete =$row['iva'];
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['iva'];?></td>
            <?php
                }else{ 
                    $totalIvaRete =0;
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <?php
                if($row["tipoCompra"]=="Gravada"){
                    $totalVentasP =$row['totalCompra'];
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['totalCompra'];?></td>
            <?php
                }else{ 
                    $totalVentasP =$row['total'];
            ?>
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['total'];?></td>
            <?php
                }
            ?>
           
            
        </tr>	

    <?php
    $totalVentEx += $totalVentExe;
    $totalVentGR += $totalVentGra;
    $totalIvaRet += $totalIvaRete;
    $totalVentas += $totalVentasP;
}


?>
<tfoot>
<td style="text-align:center;border:1px solid black; background-color:#8EF777;font-weight:bold;" colspan="3">Totales</td>

<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentEx,2);?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">--</td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">--</td>

<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentGR,2);?></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">--</td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">--</td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalIvaRet,2);?></td>

<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;"></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;"></td>
<td style="text-align:center;border:1px solid black;background-color:#DEE1DE;font-weight:bold;">$<?php echo number_format($totalVentas,2);?></td>
</tfoot>
</table>
</div>