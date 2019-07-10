<?php
header("Content-Type: text/html;charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=gastosOficinas.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="select g.*,DATE_FORMAT(g.fecha, '%d/%m/%Y') as fecha, CONCAT('$',format(g.precio,2)) as precio,
    go.nombre as gasto,p.nombre as proveedor,p.idProveedor as idP,p.condicionCredito,concat(u.nombre,' ', u.apellido) as nombre from gastos g
           inner join gastosOficina go on go.idGasto = g.idGasto
           inner join proveedoresGastos p on p.idGasto = g.idGasto
           inner join usuario u on u.codigoUsuario = g.reponsable
            where g.estado=2 order by fecha asc;";
	$result=mysqli_query($link, $query);
?>
<center><h1 style="margin:auto;">Base de compras(Gastos de oficina)</h1>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th style="border:1px solid white;">Fecha</th>
    <th style="border:1px solid white;">Responsable</th>
    <th style="border:1px solid white;">Gasto</th>
    <th style="border:1px solid white;">Proveedor</th>
    <th style="border:1px solid white;">Cod. Proveedor</th>
    <th style="border:1px solid white;">Tipo Compra</th>
    <th style="border:1px solid white;">Tipo Doc</th>
    <th style="border:1px solid white;">Condicion</th>
    <th style="border:1px solid white;">Descripcion</th>
    <th style="border:1px solid white;">Precio</th>
</tr>

<?php
while ($row=mysqli_fetch_assoc($result)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['nombre'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php  echo $row['gasto'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['proveedor'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['idP'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tipoCompra'];?></td>
            <?php
            if($row["tipoDoc"]=="CFF"){

            ?>
            <td style="text-align:center;border:1px solid black;background-color:#BFF2C8;"><?php echo $row['tipoDoc'];?></td>
            <?php

            }else{
    
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['tipoDoc'];?></td>
            <?php
            }

            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['condicionCredito'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['descripcion'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['precio'];?></td>
            
        </tr>	

    <?php
}


?>
</table>
    </center>