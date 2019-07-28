<?php
  require_once './vendor/autoload.php';
  $mysqli = new mysqli('localhost','root','','grupopublicitario');
  $ordenGRC = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoGR where estado=1 and idOrden!=1 ");
  $ordenIPC = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoIP where estado=1 and idOrden!=1 ");
  $ordenPC = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoP where estado=1 and idOrden!=1 ");

  $fila1 = $ordenGRC->fetch_assoc();
    $OTGRC = $fila1['total'];

    $fila2 = $ordenIPC->fetch_assoc();
    $OTIPC = $fila2['total'];

    $fila3 = $ordenPC->fetch_assoc();
    $OTPC = $fila3['total'];

    $OTPenClientes = $OTGRC + $OTIPC + $OTPC;

    $ordenGRP = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoGR where estado=2 and idOrden!=1 ");
  $ordenIPP = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoIP where estado=2 and idOrden!=1 ");
  $ordenPP = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoP where estado=2 and idOrden!=1 ");

  $fila4 = $ordenGRP->fetch_assoc();
    $OTGRP = $fila4['total'];

    $fila5 = $ordenIPP->fetch_assoc();
    $OTIPP = $fila5['total'];

    $fila6 = $ordenPP->fetch_assoc();
    $OTPP = $fila6['total'];

    $OTPro = $OTGRP + $OTIPP + $OTPP;

    $ordenGRF = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoGR where estado=3 and idOrden!=1 ");
  $ordenIPF = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoIP where estado=3 and idOrden!=1 ");
  $ordenPF = $mysqli -> query ("select count(idOrden) as total from ordenTrabajoP where estado=3 and idOrden!=1 ");

  $fila7 = $ordenGRF->fetch_assoc();
    $OTGRF = $fila7['total'];

    $fila8 = $ordenIPF->fetch_assoc();
    $OTIPF = $fila8['total'];

    $fila9 = $ordenPF->fetch_assoc();
    $OTPF = $fila9['total'];

    $OTFac = $OTGRF + $OTIPF + $OTPF;

    $req = $mysqli -> query ("select count(idRequisicion) as total from requisiciones where estado=1");
      $fila10 = $req->fetch_assoc();
      $requi = $fila10['total'];
  
      $gas = $mysqli -> query ("select count(idDetalle) as total from gastos where estado=1");
      $fila11 = $gas->fetch_assoc();
      $gasto = $fila11['total'];

      $totalReq = $requi + $gasto;


      $reqre = $mysqli -> query ("select count(idRequisicion) as total from requisiciones where estado=2");
      $fila12 = $reqre->fetch_assoc();
      $require = $fila12['total'];
  
      $regas = $mysqli -> query ("select count(idDetalle) as total from gastos where estado=2");
      $fila13 = $regas->fetch_assoc();
      $gastore = $fila13['total'];

      $totalReqRe = $require;


      $pagosEf = $mysqli -> query ("select format(sum(monto),2) as pago from pagos where tipoPago='Efectivo' and fechaPago=curdate()");
      $fila14 = $pagosEf->fetch_assoc();
      $pagosEfectivo = $fila14['pago'];

      $gastosEf = $mysqli -> query ("select format(sum(precio),2) as gasto from gastos where estado=2 and fecha=curdate()");
      $fila15 = $gastosEf->fetch_assoc();
      $gastos = $fila15['gasto'];


      $com = $mysqli -> query ("select format(sum(total),2) as compras from detalleRequisicion d
      inner join requisiciones r on r.idRequisicion = d.idRequisicion
      where r.fechaEntrega=curdate() and d.estado=2");
      $fila16 = $com->fetch_assoc();
      $compras = $fila16['compras'];

      $totalDia =  $pagosEfectivo - ($gastos + $compras) ;

      $cobro = $mysqli -> query ("select format(sum(monto),2) as pago from pagos where fechaPago=curdate()");
      $fila17 = $cobro->fetch_assoc();
      $cobrado = $fila17['pago'];

      $cobroMes = $mysqli -> query ("select format(sum(monto),2) as cobros  from pagos where YEAR(curdate()) = YEAR(NOW())
      AND MONTH(curdate()) = MONTH(NOW())");
      $fila18 = $cobroMes->fetch_assoc();
      $cobradoMes = $fila18['cobros'];

      $patroMes = $mysqli -> query ("select format(sum(monto),2) as cobros  from pagos where YEAR(curdate()) = YEAR(NOW())
      AND MONTH(curdate()) = MONTH(NOW()) and tipoPago = 'Patrocinio'");
      $fila19 = $patroMes->fetch_assoc();
      $patrocinioMes = $fila19['cobros'];

      $cffGr = $mysqli -> query ("select format(sum(precio),2) as ventaCFF from detalleOrdenGR d
      inner join ordenTrabajoGR o on o.idOrden = d.idOrden 
      where o.estado = 7  and d.fechaFactura = curdate()");
      $fila20 = $cffGr->fetch_assoc();
      $cffGrT = $fila20['ventaCFF'];

      $cffIP = $mysqli -> query ("select format(sum(precio),2) as ventaCFF from detalleOrdenIP d
      inner join ordenTrabajoIP o on o.idOrden = d.idOrden 
      where o.estado = 7  and d.fechaFactura = curdate()");
      $fila21 = $cffIP->fetch_assoc();
      $cffIPT = $fila21['ventaCFF'];

      $cffP = $mysqli -> query ("select format(sum(precio),2) as ventaCFF from detalleOrdenP d
      inner join ordenTrabajoP o on o.idOrden = d.idOrden 
      where o.estado = 7  and d.fechaFactura = curdate()");
      $fila21 = $cffP->fetch_assoc();
      $cffPT = $fila21['ventaCFF'];

      $totalVentasCFF = $cffGrT + $cffIPT + $cffPT;

      $facGr = $mysqli -> query ("select format(sum(precio),2) as ventaCFF from detalleOrdenGR d
      inner join ordenTrabajoGR o on o.idOrden = d.idOrden 
      where o.estado = 6  and d.fechaFactura = curdate()");
      $fila20 = $facGr->fetch_assoc();
      $facGrT = $fila20['ventaCFF'];

      $facIP = $mysqli -> query ("select format(sum(precio),2) as ventaCFF from detalleOrdenIP d
      inner join ordenTrabajoIP o on o.idOrden = d.idOrden 
      where o.estado = 6  and d.fechaFactura = curdate()");
      $fila21 = $facIP->fetch_assoc();
      $facIPT = $fila21['ventaCFF'];

      $facP = $mysqli -> query ("select format(sum(precio),2) as ventaCFF from detalleOrdenP d
      inner join ordenTrabajoP o on o.idOrden = d.idOrden 
      where o.estado = 6  and d.fechaFactura = curdate()");
      $fila21 = $facP->fetch_assoc();
      $facPT = $fila21['ventaCFF'];

      $totalVentasFac = $facGrT + $facIPT + $facPT;


      $ret = $mysqli -> query ("select format(sum(monto),2) as retiro from banco where fecha = curdate() and tipoTramite='Retiro'");
      $fila22 = $ret->fetch_assoc();
      $retiro = $fila22['retiro'];

      $rem = $mysqli -> query ("select format(sum(monto),2) as remesa from banco where fecha = curdate() and tipoTramite='Remesa'");
      $fila23 = $rem->fetch_assoc();
      $remesa = $fila23['remesa'];

      $com = $mysqli -> query ("select format(sum(monto),2) as comision from banco where fecha = curdate()
       and tipoTramite='Comision de cuenta por tarjeta de credito'");
      $fila24 = $com->fetch_assoc();
      $comision = $fila24['comision'];


      $cobroTarjeta = $mysqli -> query ("select format(sum(monto),2) as cobros  from pagos where fechaPago= curdate()
       and tipoPago = 'Tarjeta de credito'");
      $fila25 = $cobroTarjeta->fetch_assoc();
      $cobroTarjetaT = $fila25['cobros'];

      $cobroCheque= $mysqli -> query ("select format(sum(monto),2) as cobros  from pagos where fechaPago= curdate()
       and tipoPago = 'Cheque'");
      $fila26 = $cobroCheque->fetch_assoc();
      $cobroChequeT = $fila26['cobros'];

      $otroGR = $mysqli -> query ("select format(sum(precio),2) as ventaOtro from detalleOrdenGR d
      inner join ordenTrabajoGR o on o.idOrden = d.idOrden 
      where o.estado = 9  and d.fechaFactura = curdate()");
      $fila27 = $otroGR->fetch_assoc();
      $otroGRT = $fila27['ventaOtro'];

      $otroIP = $mysqli -> query ("select format(sum(precio),2) as ventaOtro from detalleOrdenIP d
      inner join ordenTrabajoIP o on o.idOrden = d.idOrden 
      where o.estado = 9  and d.fechaFactura = curdate()");
      $fila28 = $otroIP->fetch_assoc();
      $otroIPT = $fila28['ventaOtro'];

      $otroP = $mysqli -> query ("select format(sum(precio),2) as ventaOtro from detalleOrdenP d
      inner join ordenTrabajoP o on o.idOrden = d.idOrden 
      where o.estado = 9  and d.fechaFactura = curdate()");
      $fila29 = $otroP->fetch_assoc();
      $otroPT = $fila29['ventaOtro'];

      $dispAyEf = $mysqli -> query ("select *, format(monto,2) as remanente  from remanente where tipo = 1
      and id= (select max(id) from remanente where tipo=1)");
      $fila30 = $dispAyEf->fetch_assoc();
      $dispAyEfec = $fila30['remanente'];

      $dispAyBa = $mysqli -> query ("select *, format(monto,2) as remanente  from remanente where tipo = 2 
      and id= (select max(id) from remanente where tipo=2)");
      $fila30 = $dispAyBa->fetch_assoc();
      $dispAyBan = $fila30['remanente'];

      $pres = $mysqli -> query ("select monto as presupuesto from presupuesto");
      $fila31 = $pres->fetch_assoc();
      $presupuesto = $fila31['presupuesto'];


      $ventasGF = $mysqli -> query ("select format(sum(precio),2) as ventaGR from detalleOrdenGR 
      where YEAR(curdate()) = YEAR(NOW())
      AND MONTH(curdate()) = MONTH(NOW())");
      $fila32 = $ventasGF->fetch_assoc();
      $ventasGFTotal = $fila32['ventaGR'];

      $ventasP = $mysqli -> query ("select format(sum(precio),2) as ventaP from detalleOrdenP
      where YEAR(curdate()) = YEAR(NOW())
      AND MONTH(curdate()) = MONTH(NOW())");
      $fila33 = $ventasP->fetch_assoc();
      $ventasPTotal = $fila33['ventaP'];

      $ventasIP = $mysqli -> query ("select format(sum(precio),2) as ventaIP from detalleOrdenIP
      where YEAR(curdate()) = YEAR(NOW())
      AND MONTH(curdate()) = MONTH(NOW())");
      $fila34 = $ventasIP->fetch_assoc();
      $ventasIPTotal = $fila34['ventaIP'];

      $otroTotal = $otroPT + $otroIPT + $otroGRT;

      $totalVentas = $totalVentasCFF + $totalVentasFac + $otroTotal;

      $disponibilidadEfectivo = ($pagosEfectivo  + $remesa + $dispAyEfec) -$retiro - $gastos - $compras;

      $disponibilidadBanco = ($cobroChequeT  + $cobroTarjetaT + $dispAyBan + $remesa) -$comision - $retiro;

      $totalVentasFinal = $ventasGFTotal + $ventasIPTotal + $ventasPTotal;

      $diferencia = $presupuesto - $totalVentasFinal;
   ?>


<style>
    body {
        overflow: hidden;
    }
</style>

<script>
$(function() {
    overflowRestore();
});
</script>

<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">
<a   style="width: 45%;" class="ui blue button" id="btnMenu">
        <h4>Menú</h4>
        <div class="ui divider"></div>
        <i class="list icon"></i><i class="user icon"></i>
</a>

<a   style="width: 45%;" class=" ui orange button" id="btnFinanzas">
        <h4>Finanzas</h4>
        <div class="ui divider"></div>
        <i class="dollar icon"></i><i class="user icon"></i>
</a>

</div>
<div class="ui divider"></div>

<div id="menu" style="width:100%;">
<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <a href="?1=ClientesController&2=gestion"  style="width: 20%;" class="tiles-tiles ui red inverted segment">
        <h4>Clientes</h4>
        <div class="ui divider"></div>
        <i class="dollar icon"></i><i class="user icon"></i>
    </a>

    <a href="?1=ProveedoresController&2=gestion" style="width: 28%;"  class="tiles-tiles ui black inverted segment">
        <h4>Proveedores</h4>
        <div class="ui divider"></div>
        <i class="truck icon"></i><i class="user icon"></i>
    </a>

    <a href="?1=UsuarioController&2=gestion" style="width: 24%;"  class="tiles-tiles ui grey inverted segment">
        <h4>Recursos Humanos</h4>
        <div class="ui divider"></div>
        <i class="lock icon"></i><i class="user icon"></i>
    </a>

   <a style="width: 24%;" href="?1=ProductosController&2=granFormato" class="tiles-tiles ui red inverted segment">
        <h4>Gestión de productos</h4>
        <div class="ui divider"></div>
        <i class="shipping cart icon"></i>
    </a>
</div>


<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <a href="?1=InventarioController&2=granFormato"  style="width: 24%;" class="tiles-tiles ui grey inverted segment">
        <h4>Inventario</h4>
        <div class="ui divider"></div>
        <i class="calendar check icon"></i><i class="list icon"></i>
    </a>

    <a href="?1=OTController&2=granFormato" style="width: 24%;"  class="tiles-tiles ui red inverted segment">
        <h4>Nueva OT</h4>
        <div class="ui divider"></div>
        <i class="plus icon"></i><i class="list icon"></i>
    </a>

    <a href="?1=ProduccionController&2=granFormato" style="width: 24%;"  class="tiles-tiles ui black inverted segment">
        <h4>OT en Producción</h4>
        <div class="ui divider"></div>
        <i class="cogs icon"></i><i class="list icon"></i>
    </a>

   <a style="width: 24%;" href="?1=FacturacionController&2=granFormato" class="tiles-tiles ui grey inverted segment">
        <h4>OT por facturar</h4>
        <div class="ui divider"></div>
        <i class="print icon"></i><i class="list icon"></i>
    </a>
</div>
</div>



<div id="finanza" style="display:none;width:100%;">
<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

        <button class="ui black button" style="width:22%;height:50px;" id="1"><i class="list icon"></i><i class="pencil icon"></i></button>

        <button class="ui blue button" style="width: 22%;height:50px;" id="4"><i class="truck icon"></i><i class="list icon"></i></button>

        <button class="ui red button" style="width: 22%;height:50px;" id="2"><i class="chart bar outline icon"></i><i class="cogs icon"></i></button>

        <button class="ui grey button" style="width: 22%;height:50px;" id="3"><i class="dollar icon"></i><i class="money bill icon"></i></button>
    </div>
    <br>
    <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated orange labeled icon button" id="finalizar" style="display:none">
                    <i class="save icon"></i>
                    Finalizar día
                </button>
                
            </div>
        </div>
        <br><br>
        
        <div class="content" style=" width:100%;color:white; background-color:black; ">
        <form class="ui form" >
        <div class="field">
        <div class="fields">
        <div class="five wide field" >
        <label style="color:white;">Presupuesto del mes:</label>
        <input type="text" id="presupuesto" value="<?php  echo "$". number_format($presupuesto,2); ?>" readonly>
       
        </div>
        <div class="two wide field">
        <br>
        <a class="ui yellow button" id="cambiarPres">Cambiar</a>
        </div>
        <div class="five wide field">
        <label style="color:white;">Vendido durante el mes</label>
        <input type="text" id="vendido" value="<?php  echo "$". $totalVentasFinal; ?>" readonly>
        </div>
        <div class="five wide field">
        <label style="color:white;">Faltante para alcanzar el presupuesto</label>
        <input type="text" id="diferencia" value="<?php  echo "$". $diferencia; ?>" readonly>
        
        </div>
        
        </div>
        </div>
        </form>
        </div>

    <div class="content" id="generales" style="border:1px solid black; width:100%;">
    <br>
    <br>
    
        
    <form class="ui form" style="margin-right:10px; margin-left:10px; "> 
    <h3>Datos generales del día (OT):</h3>
    <div class="ui divider"></div>
       
        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="user icon"></i>OT pendientes de aprobación del cliente:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:20%;">
                         <input type="text" value="<?php  echo $OTPenClientes; ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>
        <div class="ui divider"></div>
       <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="cogs icon"></i>OT en producción:
                    </div>
                    <div class="eight wide field">
                    <div class="ui input" style="width:20%;">
                     <input type="text" value="<?php  echo $OTPro; ?>" readonly>
                    </div>
                    </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="print icon"></i>OT por facturar:
                    </div>
                    <div class="eight wide field">
                    <div class="ui input" style="width:20%;">
                     <input type="text" value="<?php  echo $OTFac; ?>" readonly>
                    </div>
                    </div>
            </div>
        </div>

    </form>
    <br>
    </div>

    <div class="content" id="requisiciones" style="border:1px solid black; width:100%;display:none;">
    <br>
    <form class="ui form" style="margin-right:10px; margin-left:10px; ">
    <h3>Datos generales del día (Requisiciones):</h3>
    <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                <div class="eight wide field">
                    <i class="pencil icon"></i>Pendientes de aprobación:
                </div>
                <div class="eight wide field">
                    <div class="ui input" style="width:20%;">
                        <input type="text" value="<?php  echo $totalReq; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="truck icon"></i>Pendientes de recibir:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:20%;">
                         <input type="text" value="<?php  echo $totalReqRe; ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>
        <br>

    </form>

    </div>

    <div class="content" id="graficas" style="border:1px solid black; width:100%;display:none;">
    <h2>Datos gráficamente:</h2>
    
    <h3>Productos</h3>

    <div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

<button class="ui purple button" style="width:32%;height:40px;margin-left:10px; " id="gr">GF</button>

<button class="ui green button" style="width: 32%;height:40px;" id="ip">ID</button>

<button class="ui brown button" style="width: 32%;height:40px;margin-right:10px; " id="p">P</button>

</div>
    

    <div id="gfContent" style="display:none;width:100%;margin-right:10px; margin-left:10px; ">
    <br>
    <div id="donutchartGF" style="width:10%;"></div>
    </div>

    <div id="ipContent" style="display:none;width:90%;margin-right:10px; margin-left:10px; ">
    <br>
    <div id="piechart_3dIP" style="width:10%;"></div>
    </div>

    <div id="pContent" style="display:none;width:90%;margin-right:10px; margin-left:10px; ">
    <br>
    <div id="piechart_3dP" style="width:10%;"></div>
    </div>


    <br>
    <br>
    </div>


    <div class="content" id="finanzas" style="border:1px solid black; width:100%;display:none;">
    <form class="ui form" style="margin-right:10px; margin-left:10px; ">
    <h3>Datos financieros:</h3>
    <div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

        <a class="ui green button" style="width:22%;height:40px;" id="5">Hoy</a>

        <a class="ui purple button" style="width: 22%;height:40px;" id="6">Ventas</a>

        <a class="ui olive button" style="width: 22%;height:40px;" id="7">Banco</a>

        <a class="ui brown button" style="width: 22%;height:40px;" id="8">CxC</a>
    </div>

    <div id="hoy">
    <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                <div class="eight wide field" style="font-weight:bold;font-size:18px;color:green">
                    <i class="dollar icon"></i><i class="user icon"></i>Disponiblidad en efectivo ayer:
                </div>
                <div class="eight wide field">
                    <div class="ui input" style="width:40%;">
                        <input type="text"   value="<?php echo "$". $dispAyEfec; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Recuperación de ventas en efectivo:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="<?php echo "$". $pagosEfectivo; ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Retiro de banco efectivo:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" id="retiroBanco"  value="<?php echo "$". $retiro ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>
        

        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="share icon"></i>Gastos:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="<?php echo "$". $gastos; ?>" readonly >
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Compras:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="<?php echo "$". $compras; ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Remesa banco efectivo:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" id="remesaBanco" value="<?php echo "$". $remesa ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field" style="font-weight:bold;font-size:18px;color:blue">
                        <i class="dollar icon"></i><i class="arrow alternate circle down icon"></i>Disponibilidad efectivo hoy:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" id="disponibleEfectivo" value="<?php echo  number_format( $disponibilidadEfectivo,2) ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>

        </div>

        <br><br>
        <div id="ventas" style="display:none">
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Ventas con CFF:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="<?php echo "$" . $totalVentasCFF ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Ventas con Factura:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="<?php echo "$" . $totalVentasFac ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Otros:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="<?php echo "$" . $otroTotal ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>

        <div class="field">

        <div class="fields">
        <div class="eight wide field" style="font-weight:bold;font-size:18px;color:blue">
                    <i class="dollar icon"></i><i class="dollar icon"></i>Total de ventas:
                </div>

                <div class="eight wide field">
                    <div class="ui input" style="width:40%;">
                    <input type="text" value="<?php echo "$" . $totalVentas ?>" readonly>
                    </div>
                </div>
        </div>
        </div>

        
        </div>

        <div id="banco" style="display:none">
        <div class="field">

            <div class="fields">
                <div class="eight wide field" style="font-weight:bold;font-size:18px;color:green">
                    <i class="dollar icon"></i><i class="user icon"></i>Disponiblidad en banco ayer:
                </div>
                <div class="eight wide field">
                    <div class="ui input" style="width:40%;">
                        <input type="text"  value="<?php echo "$". $dispAyBan; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>

            <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Recuperación de cuentas con cheque:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text" value="<?php echo "$". $cobroChequeT ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

            <div class="ui divider"></div>

            <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Recuperación de cuentas con tarjeta de crédito:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text" value="<?php echo "$". $cobroTarjetaT ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Comisión de cuentas con tarjeta de crédito:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text"  value="<?php echo "$". $comision ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Remesas:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text" value="<?php echo "$". $remesa ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Retiros:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text" value="<?php echo "$". $retiro ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field" style="font-weight:bold;font-size:18px;color:blue">
                        <i class="dollar icon"></i><i class="arrow alternate circle down icon"></i>Disponibilidad banco hoy:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" id="disponibleBanco" value="<?php echo  number_format($disponibilidadBanco,2) ?>" readonly>
                        </div>
                     </div>
            </div>
        </div>


        </div>

        <div id="cxc" style="display:none">
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Recuperación de cuentas por (hoy):
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text" value="<?php echo "$". $cobrado; ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Recuperación de cuentas por (mes):
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text" value="<?php echo "$". $cobradoMes; ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>

        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Patrocinio:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                        <input type="text" value="<?php echo "$". $patrocinioMes; ?>" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>
        </div>
        <br>

    </form>
    
    </div>
</div>

<div class="ui tiny modal" id="modalPresupuesto" >
  <div class="header" style="color:white; background-color:black;">
  Modificar presupuesto del mes
  </div>
  <div class="content">
<form class="ui form">
<div class="field">
<div class="fields">
<div class="sixteen wide field">
<label>Presupuesto del mes</label>
<input type="text" id="montoPres" name="montoPres">
</div>
</div>
</div>
</form>
</div>
<div class="actions">
<button class="ui red deny button">Cancelar</button>
<button class="ui black button" id="guardarPres">Guardar</button>
</div>
  </div>

  <script>
    $(document).ready(function(){
    $("#1").removeClass("ui black button");
    $("#1").addClass("ui black basic button");
    $("#5").removeClass("ui green button");
        $("#5").addClass("ui green basic button");
        $("#btnMenu").removeClass("ui blue button");
        $("#btnMenu").addClass("ui blue basic button");

       
        
        $('#montoPres').mask("###0.00", {reverse: true});
        
        var tiempo = new Date();
        var hora = tiempo.getHours();
var minuto = tiempo.getMinutes();

        var horaReal = hora +":"+ minuto;

       // alert(horaReal);

        if(horaReal >= "18:00"){
            $("#finalizar").css("display","block")
        }
    });

    $('#cambiarPres').click(function() {
        $('#modalPresupuesto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');

       $("#montoPres").val($("#presupuesto").val());
    });

   $("#finalizar").click(function(){
    alertify.confirm("¿Desea guardar los datos?",
        function(){

    var diponBanco = $("#disponibleBanco").val();
    var disponEfectivo = $("#disponibleEfectivo").val();

    $.ajax({
               
                type: 'POST',
                url: '?1=RequisicionController&2=cerrarDia',
                data: {
                    banco : diponBanco ,
                    efectivo : disponEfectivo,
                },
                success: function(r) {
                    if(r == 11) {
                    
                        swal({
                            title: 'Listo',
                            text: 'Datos guardados',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                            
                               location.reload();
                               
                            }
                        }); 
                        
                    } 
                }
        });
    },
        function(){
            //$("#modalCalendar").modal('toggle');
            alertify.error('Cancelado');
            
        }); 
   });

    $("#5").click(function(){
        $("#hoy").show(1000);
        $("#ventas").hide(1000);
        $("#banco").hide(1000);
        $("#cxc").hide(1000);
       
        $("#5").removeClass("ui green  button");
        $("#5").addClass("ui green basic button");

        $("#6").removeClass("ui purple basic button");
        $("#6").addClass("ui purple  button");

        $("#7").removeClass("ui olive basic button");
        $("#7").addClass("ui olive  button");

        $("#8").removeClass("ui brown basic button");
        $("#8").addClass("ui brown  button");
    });

    $("#6").click(function(){
        $("#hoy").hide(1000);
        $("#ventas").show(1000);
        $("#banco").hide(1000);
        $("#cxc").hide(1000);
       
        $("#5").removeClass("ui green basic button");
        $("#5").addClass("ui green button");

        $("#6").removeClass("ui purple button");
        $("#6").addClass("ui purple basic button");

        $("#7").removeClass("ui olive basic button");
        $("#7").addClass("ui olive  button");

        $("#8").removeClass("ui brown basic button");
        $("#8").addClass("ui brown  button");
    });

    $("#7").click(function(){
        $("#hoy").hide(1000);
        $("#ventas").hide(1000);
        $("#banco").show(1000);
        $("#cxc").hide(1000);
       
        $("#5").removeClass("ui green basic button");
        $("#5").addClass("ui green button");

        $("#6").removeClass("ui purple basic button");
        $("#6").addClass("ui purple  button");

        $("#7").removeClass("ui olive button");
        $("#7").addClass("ui olive basic button");

        $("#8").removeClass("ui brown basic button");
        $("#8").addClass("ui brown  button");
    });

    $("#btnFinanzas").click(function(){
    $("#btnFinanzas").removeClass("ui orange button");
        $("#btnFinanzas").addClass("ui orange basic button");

        
        $("#menu").hide();
        $("#finanza").show(1000);

        $("#btnMenu").removeClass("ui blue basic button");
        $("#btnMenu").addClass("ui blue button");
    });

    $("#btnMenu").click(function(){

        $("#btnMenu").removeClass("ui blue  button");
        $("#btnMenu").addClass("ui blue  basic button");

    $("#btnFinanzas").removeClass("ui orange basic button");
        $("#btnFinanzas").addClass("ui orange  button");

        $("#finanza").hide();
        $("#menu").show(1000);

        
    });

    $("#8").click(function(){
        $("#hoy").hide(1000);
        $("#ventas").hide(1000);
        $("#banco").hide(1000);
        $("#cxc").show(1000);
       
        $("#5").removeClass("ui green basic button");
        $("#5").addClass("ui green button");

        $("#6").removeClass("ui purple basic button");
        $("#6").addClass("ui purple  button");

        $("#7").removeClass("ui olive basic button");
        $("#7").addClass("ui olive  button");

        $("#8").removeClass("ui brown button");
        $("#8").addClass("ui brown basic button");
    });

    $("#OT").click(function(){
        $("#OTContent").show(1000);
        $("#ProContent").hide();

        $("#OT").removeClass("ui green button");
        $("#OT").addClass("ui green basic button");

        $("#Pro").removeClass("ui purple basic button");
        $("#Pro").addClass("ui purple  button");
    });

    

    $("#gr").click(function(){
        $("#gfContent").show(1000);
        $("#ipContent").hide();
        $("#pContent").hide();
        
        $("#p").removeClass("ui brown basic button");
        $("#p").addClass("ui brown  button");

        $("#ip").removeClass("ui green basic button");
        $("#ip").addClass("ui green  button");

        $("#gr").removeClass("ui purple  button");
        $("#gr").addClass("ui purple basic button");

        });

        $("#ip").click(function(){
            $("#ipContent").show(1000);
            $("#gfContent").hide();
            $("#pContent").hide();
            
            $("#p").removeClass("ui brown basic button");
            $("#p").addClass("ui brown  button");

            $("#ip").removeClass("ui green  button");
            $("#ip").addClass("ui green basic button");

            $("#gr").removeClass("ui purple basic button");
            $("#gr").addClass("ui purple  button");

        });

        $("#p").click(function(){
        $("#pContent").show(1000);
        $("#ipContent").hide();
        $("gfContent").hide();
        
        $("#p").removeClass("ui brown  button");
        $("#p").addClass("ui brown basic button");

        $("#ip").removeClass("ui green basic button");
        $("#ip").addClass("ui green  button");

        $("#gr").removeClass("ui purple basic button");
        $("#gr").addClass("ui purple button");

        });


    $("#1").click(function(){
        $("#1").removeClass("ui black  button");
        $("#1").addClass("ui black basic button");

        $("#2").removeClass("ui red basic button");
        $("#2").addClass("ui red  button");

        $("#3").removeClass("ui grey basic button");
        $("#3").addClass("ui grey button");

        $("#4").removeClass("ui blue basic button");
        $("#4").addClass("ui blue  button");

        $("#generales").show(1000);
        $("#finanzas").hide();
        $("#graficas").hide();
        $("#requisiciones").hide();
    });

    $("#2").click(function(){
        $("#1").removeClass("ui black basic button");
        $("#1").addClass("ui black button");

        $("#2").removeClass("ui red button");
        $("#2").addClass("ui red basic button");

        $("#3").removeClass("ui grey basic button");
        $("#3").addClass("ui grey button");

        $("#4").removeClass("ui blue basic button");
        $("#4").addClass("ui blue  button");

        $("#graficas").show(1000);
        $("#finanzas").hide();
        $("#generales").hide();
        $("#requisiciones").hide();

    });

    

    $("#3").click(function(){
        $("#1").removeClass("ui black basic  button");
        $("#1").addClass("ui black  button");

        $("#2").removeClass("ui red basic button");
        $("#2").addClass("ui red  button");

        $("#3").removeClass("ui grey  button");
        $("#3").addClass("ui grey  basic button");

        $("#4").removeClass("ui blue basic button");
        $("#4").addClass("ui blue  button");

        $("#finanzas").show(1000);
        $("#generales").hide();
        $("#graficas").hide();
        $("#requisiciones").hide();
    });

    $("#4").click(function(){
        $("#1").removeClass("ui black basic  button");
        $("#1").addClass("ui black  button");

        $("#2").removeClass("ui red basic button");
        $("#2").addClass("ui red  button");

        $("#3").removeClass("ui grey basic button");
        $("#3").addClass("ui grey   button");

        $("#4").removeClass("ui blue  button");
        $("#4").addClass("ui blue  basic button");


        $("#finanzas").hide();
        $("#generales").hide();
        $("#graficas").hide();
        $("#requisiciones").show(1000);
    });


    $('#guardarPres').click(function() {

alertify.confirm("¿Desea modificar el presupuesto?",
    function(){
        
     var monto = $("#montoPres").val();
 
    $.ajax({
    
        type: 'POST',
        url: '?1=UsuarioController&2=modificarPres',
        data: {monto:monto,
        },
        success: function(r) {
            if(r == 1) {
                $('#modalPresupuesto').modal('hide');
                swal({
                    title: 'Modificado',
                    text: 'Presupuesto guardado con éxito',
                    type: 'success',
                    showConfirmButton: true,

                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                }); 
                
            } 
        }
    });
},
    function(){
        //$("#modalCalendar").modal('toggle');
        alertify.error('Cancelado');
        
    }); 

    });

    </script>
<?php
 require_once './vendor/autoload.php';
 $con = new mysqli('localhost','root','','grupopublicitario');
$sql="select p.productoFinal as producto,count(d.idProductoFinal) as cantidad from detalleOrdenGR d
inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
 group by d.idProductoFinal ORDER BY cantidad DESC LIMIT 10";
$res=$con->query($sql);

$Cantidad=mysqli_num_rows($res);

$ingresos=null;
$i=1;

if ($Cantidad==1) {
  while ($fila=$res->fetch_assoc()) {
   $ingresos[$i]=$fila['cantidad'];
   $i++;
  }
}


?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Producto', 'Cantidad'],
          <?php
          while ($fila=$res->fetch_assoc()) {
          echo "['".$fila["producto"]."',".$fila["cantidad"]."],";
         // ['Work',     11],

          }
          ?>
        ]);

        var options = {
            title: '10 Productos mas vendidos de Gran Formato',
          
         chartArea:
         {left:0,top:20,width:'100%',height:'100%'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartGF'));
        chart.draw(data, options);
      }
    </script>



<?php
 require_once './vendor/autoload.php';
 $con = new mysqli('localhost','root','','grupopublicitario');
$sql="select p.productoFinal as producto,count(d.idProductoFinal) as cantidad from detalleOrdenIP d
inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
 group by d.idProductoFinal ORDER BY cantidad DESC LIMIT 10";
$res=$con->query($sql);

$Cantidad=mysqli_num_rows($res);

$ingresos=null;
$i=1;

if ($Cantidad==1) {
  while ($fila=$res->fetch_assoc()) {
   $ingresos[$i]=$fila['cantidad'];
   $i++;
  }
}


?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Producto', 'Cantidad'],
          <?php
          while ($fila=$res->fetch_assoc()) {
          echo "['".$fila["producto"]."',".$fila["cantidad"]."],";
         // ['Work',     11],

          }
          ?>
        ]);

        var options = {
         title: '10 Productos mas vendidos de Impresión digital',
         is3D: true,
         chartArea:
         {left:20,top:20,width:'100%',height:'100%'}
        };
        

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3dIP'));

        chart.draw(data, options);
      }
    </script>


<?php
 require_once './vendor/autoload.php';
 $con = new mysqli('localhost','root','','grupopublicitario');
$sql="select p.productoFinal as producto,count(d.idProductoFinal) as cantidad from detalleOrdenP d
inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
 group by d.idProductoFinal ORDER BY cantidad DESC LIMIT 10";
$res=$con->query($sql);

$Cantidad=mysqli_num_rows($res);

$ingresos=null;
$i=1;

if ($Cantidad==1) {
  while ($fila=$res->fetch_assoc()) {
   $ingresos[$i]=$fila['cantidad'];
   $i++;
  }
}


?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Producto', 'Cantidad'],
          <?php
          while ($fila=$res->fetch_assoc()) {
          echo "['".$fila["producto"]."',".$fila["cantidad"]."],";
         // ['Work',     11],

          }
          ?>
        ]);

        var options = {
         title: '10 Productos mas vendidos promocionales',
         is3D: true,
         chartArea:
         {left:20,top:20,width:'100%',height:'100%'}
        };
        

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3dP'));

        chart.draw(data, options);
      }
    </script>
