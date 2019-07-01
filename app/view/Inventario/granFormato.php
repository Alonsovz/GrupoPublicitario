

<div id="app">
    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <a href="?1=InventarioController&2=granFormato" class="ui gray button" id="gr" style="color:black; font-weight:bold;">
                    Gran Formato</a>

                    <a href="?1=InventarioController&2=impresion" class="ui black button" id="imp">Impresión Digital</a>

                    <a href="?1=InventarioController&2=promocionales" class="ui red button" id="pro">Promocionales</a>
                    <br><br>

                    <font color="#848484" size="5px">
                    <i class="calendar check outline icon"></i> <i class="list icon"></i>
                        Inventario de productos de Gran Formato </font><font color="black" size="20px">.</font>
                    </div>
            </div>
    </div>


        <div class="row">
            <div class="sixteen wide column">
                <table id="dtGranFormato" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #BDBDBD; color:black;">N°</th>
                            <th style="background-color: #BDBDBD; color:black;">Nombre del producto</th>
                            <th style="background-color: #BDBDBD; color:black;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="ui modal" id="detallesProducto">
        <div class="header" style="background-color:black;color:white;">
        Inventario del producto: <a id="nameP" style="color:red;"></a>
        </div>
        <div class="scrolling content">
            <table class="ui celled striped  table"  style="text-align:center; width:100%; margin:auto;" class="ui selectable very compact celled table" >
            <tr>
            <th style="background-color: #B40431; color:white;" height="50">Producto</th>
            <th style="background-color: #B40431; color:white;">Color</th>
            <th style="background-color: #B40431; color:white;">Acabado</th>
            <th style="background-color: #B40431; color:white;">Cantidad en existencia(Metros)</th>
            <th style="background-color: #B40431; color:white;">Precio Unitario</th>
            </tr>
            <tr>
            <td>LONA-BANNER</td>
            <td>Blanco</td>
            <td>De Fábrica</td>
            <td>20.5</td>
            <td>$0.50</td>
            </tr>

            <tr>
            <td>FilmBacklite</td>
            <td>De Fábrica</td>
            <td>BRILLANTE/GLOSSY</td>
            <td>15.5</td>
            <td>$0.75</td>
            </tr>
            </table>
        </div>  
        <div class="actions">
        <button class="ui black deny button">Listo</button>
        </div>
        </div>
  
</div> 


<script src="./res/tablas/tablaGranFormatoInventario.js"></script>
<script>
    $(document).ready(function(){
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
    });


    var detalles =(ele)=>{
        $('#nameP').text($(ele).attr("nombre"));
        $('#detallesProducto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }
</script>


