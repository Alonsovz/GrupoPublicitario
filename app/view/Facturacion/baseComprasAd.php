<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            
            
            <font color="black" size="5px">
            <i class="list icon"></i> <i class="dollar icon"></i>
            Base de Datos de Gastos de Oficina </font><font color="black" size="20px">.</font>
            </div>
        </div>
        <div class="row title-bar">
            <div class="sixteen wide column">
                <a href="./app/view/Facturacion/baseGastosExcel.php" class="ui right floated green labeled icon button">
                    <i class="download icon"></i>
                    Descargar Excel
                </a>
            </div>
        </div>
      
</div>

<?php
require_once './vendor/autoload.php';
$mysqli = new mysqli('localhost','root','','grupoPublicitario');
$listado = $mysqli -> query ("select g.*,DATE_FORMAT(g.fecha, '%d/%m/%Y') as fecha, CONCAT('$',format(g.precio,2)) as precio,
go.nombre as gasto,p.nombre as proveedor,p.idProveedor as idP,p.condicionCredito,concat(u.nombre,' ', u.apellido) as nombre from gastos g
       inner join gastosOficina go on go.idGasto = g.idGasto
       inner join proveedoresGastos p on p.idGasto = g.idGasto
       inner join usuario u on u.codigoUsuario = g.reponsable
        where g.estado=2 order by fecha asc;");
?>

<br>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th style="border:1px solid white;">Fecha</th>
    <th style="border:1px solid white;">Responsable</th>
    <th style="border:1px solid white;">Gasto</th>
    <th style="border:1px solid white;">Proveedor</th>
    <th style="border:1px solid white;">Cód. Proveedor</th>
    <th style="border:1px solid white;">Tipo Compra</th>
    <th style="border:1px solid white;">Tipo Doc</th>
    <th style="border:1px solid white;">Tipo Pago</th>
    <th style="border:1px solid white;">Condición</th>
    <th style="border:1px solid white;">Descripción</th>
    <th style="border:1px solid white;">Precio</th>
    
</tr>

<?php
while ($row=mysqli_fetch_assoc($listado)) {
    ?>
        <tr style="text-align:center;border:1px solid black;">
            <td style="text-align:center;border:1px solid black;"><?php echo $row['fecha']; ?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['nombre']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['gasto']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['proveedor']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['idP'];?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['tipoCompra']);?></td>
            <?php
            if($row["tipoDoc"]=="CFF"){

            ?>
            <td style="text-align:center;border:1px solid black;background-color:#BFF2C8;"><?php echo utf8_encode($row['tipoDoc']);?></td>
            <?php

            }else{
    
            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['tipoDoc']);?></td>
            <?php
            }

            ?>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['tipoPago']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['condicionCredito']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo utf8_encode($row['descripcion']);?></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['precio'];?></td>
            
        </tr>	

    <?php
}


?>
</table>
</div>

<script>
var enviar=(ele)=>{
    alert($(ele).attr("id"));
}
</script>