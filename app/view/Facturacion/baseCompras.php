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
                <a href="" class="ui right floated green labeled icon button">
                    <i class="download icon"></i>
                    Descargar Excel
                </a>
            </div>
        </div>
      
</div>

<?php
require_once './vendor/autoload.php';
$mysqli = new mysqli('localhost','root','','grupoPublicitario');
$listado = $mysqli -> query ("select r.*, d.* ,p.* from detalleRequisicion d
inner join requisiciones r on r.idRequisicion = d.idRequisicion
inner join proveedores p on p.idProveedor = r.idProveedor
where r.estado=5;");
?>

<br>
<table class="ui table bordered">
    <tr style="color:white; background-color:black;border:1px solid white;text-align:center;" height="40">
    <th rowspan="2" style="border:1px solid white;">Correlativo</th>
    <th rowspan="2" style="border:1px solid white;">Fecha</th>
    <th rowspan="2" style="border:1px solid white;">No del compro</th>
    <th rowspan="2" style="border:1px solid white;">No registro</th>
    <th rowspan="2" style="border:1px solid white;">Ident de excel</th>
    <th rowspan="2" style="border:1px solid white;">Proveedor</th>

    <th colspan="3" style="text-align:center;border:1px solid white;">Compras Exentas</th>
    <th colspan="3" style="text-align:center;border:1px solid white;">Compras Gravadas</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Iva Crédito Fiscal</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Iva Per</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Ant Cuenta IVA ret.</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Total compras</th>
    <th rowspan="2" style="text-align:center;border:1px solid white;">Credito por retencion</th>

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
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"><?php echo $row['nombre'];?></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            <td style="text-align:center;border:1px solid black;"></td>
            
        </tr>	

    <?php
}


?>
</table>
</div>