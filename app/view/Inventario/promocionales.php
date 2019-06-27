
<div id="app">
<div class="ui grid">
        <div class="row">
        <div class="titulo">
                    <a href="?1=InventarioController&2=granFormato" class="ui gray button" id="gr">Gran Formato</a>
                    <a href="?1=InventarioController&2=impresion" class="ui black button" id="imp">Impresión Digital</a>
                    <a href="?1=InventarioController&2=promocionales" class="ui red button" id="pro" style="font-weight:bold;">Promocionales</a>
                    <br><br>
                <font color="#B40431" size="5px">
                <i class="calendar check outline icon"></i> <i class="list icon"></i>
                   Inventario de Productos promocionales </font><font color="black" size="20px">.</font>
                </div>
        </div>

</div>

</div>

<script>
    $(document).ready(function(){
    $("#pro").removeClass("ui red button");
    $("#pro").addClass("ui red basic button");;
    });

</script>

