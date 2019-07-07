<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            
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
$listado = $mysqli -> query ("select r.*, d.* ,p.* from detalleRequisicion d
inner join requisiciones r on r.idRequisicion = d.idRequisicion
inner join proveedores p on p.idProveedor = r.idProveedor
where r.estado=5;");
?>

<br>
<table class="ui table bordered">
    <tr style="border:1px solid black;text-align:center;" height="40">
    
    <th  style="border:1px solid black;">Tipo de Producto</th>
    <th  style="border:1px solid black;">Clasificación</th>
    <th  style="text-align:center;border:1px solid black;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid black;">Detalle</th>
    <th  style="text-align:center;border:1px solid black;">N° NRC</th>
    <th  style="text-align:center;border:1px solid black;">N° NIT</th>
    <th  style="text-align:center;border:1px solid black;">Cantidad</th>

    <th  style="text-align:center;border:1px solid black;">IVA</th>
    <th  style="text-align:center;border:1px solid black;">Estatus</th>
    <th  style="text-align:center;border:1px solid black;">Dias de morosidad</th>
    <th  style="text-align:center;border:1px solid black;">Total Cobrado</th>
    <th  style="text-align:center;border:1px solid black;">Fecha de Cobro</th>
    <th  style="text-align:center;border:1px solid black;">Estatus</th>
    <th  style="text-align:center;border:1px solid black;"><i class="book icon"></i></th>

    
</tr>


</table>
</div>