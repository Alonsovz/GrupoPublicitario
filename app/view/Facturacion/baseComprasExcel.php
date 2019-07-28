<?php
header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=gastosRequisicion.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="
    select r.*, d.* ,p.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,format(d.total,2) as total,
format(d.total * 0.13,2) as iva, format((d.total * 0.13)+d.total,2) as totalCompra
 from detalleRequisicion d
inner join requisiciones r on r.idRequisicion = d.idRequisicion
inner join proveedores p on p.idProveedor = r.idProveedor
where r.estado=5 and r.tipoDoc = 'CCF' order by d.idDetalle desc;";
    $result=mysqli_query($link, $query);
    
    
?>
<center><h1 style="margin:auto;">Base de compras(Requisici&oacute;n)</h1>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th rowspan="2" style="border:1px solid white;">Correlativo</th>
    <th rowspan="2" style="border:1px solid white;">Fecha</th>
    <th rowspan="2" style="border:1px solid white;">N del Compro.</th>
    <th rowspan="2" style="border:1px solid white;">N de registro</th>
    <th rowspan="2" style="border:1px solid white;">Ident. de Excel</th>
    <th rowspan="2" style="border:1px solid white;">Proveedor</th>
    <th rowspan="2" style="border:1px solid white;">Tipo Pago</th>

    <th colspan="3" style="text-align:center;border:1px solid white;">Compras Exentas</th>
    <th colspan="3" style="text-align:center;border:1px solid white;">Compras Gravadas</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Iva Cr&eacute;dito Fiscal</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Iva Per</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Ant Cuenta IVA ret.</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Total compras</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Cre. por ret IVA a No Domicilio</th>


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
while ($row=mysqli_fetch_assoc($result)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['idRequisicion']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha'];?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['nombre'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tipoPago'];?></td>
            <?php
                if($row["tipoCompra"]=="Exenta"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['total'];?></td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }else{

                
            ?>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>

           
            <?php
                if($row["tipoCompra"]=="Gravada"){
            ?>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['total'];?></td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }else{

                
            ?>
           <td style="text-align:center;border:1px solid black;">--</td>
           <td style="text-align:center;border:1px solid black;">--</td>
           <td style="text-align:center;border:1px solid black;">--</td>
            <?php
                }
            ?>
            
            
            <td style="text-align:center;border:1px solid black;">$ <?php echo $row['iva'];?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"> $ <?php echo $row['totalCompra'];?></td>
            <td style="text-align:center;border:1px solid black;"></td>
           
            
        </tr>	
        <tfoot>
<td style="text-align:center;border:1px solid black; background-color:#8EF777;font-weight:bold;" colspan="7">Totales</td>

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
    <?php
}


?>

</table>