<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            
            <font color="black" size="5px">
            <i class="list icon"></i> <i class="dollar icon"></i>
            Cuentas por Cobrar</font><font color="black" size="20px">.</font>
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
    
    <th  style="border:1px solid black;">Fecha</th>
    <th  style="border:1px solid black;">Tipo de documento</th>
    <th  style="border:1px solid black;">N° Doc</th>
    <th  style="border:1px solid black;">Tipo Producto</th>
    <th  style="border:1px solid black;">Clasificación</th>

    <th  style="text-align:center;border:1px solid black;">Nombre de Cliente</th>
    <th  style="text-align:center;border:1px solid black;">Detalle</th>
    <th  style="text-align:center;border:1px solid black;">Total Saldo</th>
    <th  style="text-align:center;border:1px solid white;color:white; background-color:black;">Cartera Corriente</th>
    <th  style="text-align:center;border:1px solid white;color:white; background-color:black;">1 a 30 días</th>
    <th  style="text-align:center;border:1px solid white;color:white; background-color:black;">31 a 60 días</th>
    <th  style="text-align:center;border:1px solid white;color:white; background-color:black;">61 a 90 días</th>
    <th  style="text-align:center;border:1px solid white;color:white; background-color:black;">61 a 90 días</th>
    <th  style="text-align:center;border:1px solid white;color:white; background-color:black;">91 a 180 días</th>    
    <th  style="text-align:center;border:1px solid white;color:white; background-color:black;">181 a 360 días</th>
    
</tr>


</table>
</div>