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

<?php
  require_once './vendor/autoload.php';
  $mysqli = new mysqli("localhost","root","","grupoPublicitario");
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

      $totalReqRe = $require + $gastore;

   ?>

    <div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

        <button class="ui black button" style="width:22%;height:50px;" id="1"><i class="list icon"></i><i class="pencil icon"></i></button>

        <button class="ui blue button" style="width: 22%;height:50px;" id="4"><i class="truck icon"></i><i class="list icon"></i></button>

        <button class="ui red button" style="width: 22%;height:50px;" id="2"><i class="chart bar outline icon"></i><i class="cogs icon"></i></button>

        <button class="ui grey button" style="width: 22%;height:50px;" id="3"><i class="dollar icon"></i><i class="money bill icon"></i></button>
    </div>

    <div class="content" id="generales" style="border:1px solid black; width:100%;">
    <br>
    
    <form class="ui form">
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
    <form class="ui form">
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
    
    <button class="ui green button" id="OT">OT</button>
    <button class="ui purple button" id="Pro">Productos</button>

    <div id="OTContent" style="display:none;width:100%;">
    <br>
    <div id="donutchart" style="width:10%;"></div>
    </div>

    <div id="ProContent" style="display:none;width:90%;">
    <br>
    <div id="piechart_3d" style="width:10%;"></div>
    </div>


    <br>
    <br>
    </div>


    <div class="content" id="finanzas" style="border:1px solid black; width:100%;display:none;">
    <form class="ui form">
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
                        <input type="text" value="$ 200.00" readonly>
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
                         <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$50.00" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="dollar icon"></i><i class="dollar icon"></i>Ventas:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$300.00" readonly>
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
                         <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$150.00" readonly>
                        </div>
                     </div>
            </div>
        </div>

        <div class="ui divider"></div>
        </div>

        <div id="banco" style="display:none">
        <div class="field">

            <div class="fields">
                <div class="eight wide field" style="font-weight:bold;font-size:18px;color:green">
                    <i class="dollar icon"></i><i class="user icon"></i>Disponiblidad en banco ayer:
                </div>
                <div class="eight wide field">
                    <div class="ui input" style="width:40%;">
                        <input type="text" value="$ 200.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
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
                         <input type="text" value="$300.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
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
                        <input type="text" value="$150.00" readonly>
                        </div>
                    </div>
            </div>
            </div>

        <div class="ui divider"></div>
        </div>
        <br>

    </form>
    </div>


    <script>
    $(document).ready(function(){
    $("#1").removeClass("ui black button");
    $("#1").addClass("ui black basic button");
    $("#5").removeClass("ui green button");
        $("#5").addClass("ui green basic button");
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

    

    $("#Pro").click(function(){
        $("#ProContent").show(1000);
        $("#OTContent").hide();

        $("#OT").removeClass("ui green basic button");
        $("#OT").addClass("ui green  button");

        $("#Pro").removeClass("ui purple  button");
        $("#Pro").addClass("ui purple basic  button");
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

    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Estado', 'Cantidad'],
          ['Pen. aprobación Clien',     6],
          ['En Producción',      2],
          ['Por Facturar',  1],
          ['Por Cobrar', 1],
        ]);

        var options = {
            title: 'Estados de OT',
          
         chartArea:
         {left:0,top:20,width:'100%',height:'100%'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Producto', 'Cantidad'],
          ['Lb13oz',     11],
          ['FilmBacklite',      2],
          ['Laminador Film',  2],
          ['Vinil Banner', 2],
          ['Coroplas 4MM',    7]
        ]);

        var options = {
         title: 'Productos mas vendidos',
         is3D: true,
         chartArea:
         {left:20,top:20,width:'100%',height:'100%'}
        };
        

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>