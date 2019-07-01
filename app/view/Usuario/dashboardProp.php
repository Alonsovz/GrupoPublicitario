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
        <div class="field">

            <div class="fields">
                <div class="eight wide field">
                    <i class="pencil icon"></i>Ventas realizadas:
                </div>
                <div class="eight wide field">
                    <div class="ui input" style="width:20%;">
                        <input type="text" value="10" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                    <div class="eight wide field">
                        <i class="user icon"></i>OT pendientes de aprobación del cliente:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:20%;">
                         <input type="text" value="2" readonly>
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
                     <input type="text" value="3" readonly>
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
                     <input type="text" value="2" readonly>
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
                        <input type="text" value="3" readonly>
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
                         <input type="text" value="2" readonly>
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
    <div class="ui divider"></div>
        <div class="field">

            <div class="fields">
                <div class="eight wide field" style="font-weight:bold;font-size:18px;color:green">
                    <i class="dollar icon"></i><i class="user icon"></i>Disponiblidad:
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
                        <i class="dollar icon"></i><i class="reply icon"></i>Ventas:
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
                    <div class="eight wide field" style="font-weight:bold;font-size:18px;color:blue">
                        <i class="dollar icon"></i><i class="arrow alternate circle down icon"></i>Total:
                    </div>

                    <div class="eight wide field">
                        <div class="ui input" style="width:40%;">
                         <input type="text" value="$300.00" readonly>
                        </div>
                     </div>
            </div>
        </div>
        <br>

    </form>
    </div>


    <script>
    $(document).ready(function(){
    $("#1").removeClass("ui black button");
    $("#1").addClass("ui black basic button");
 
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