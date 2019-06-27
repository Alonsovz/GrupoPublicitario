
<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <a href="?1=InventarioController&2=granFormato" class="ui gray button" id="gr">Gran Formato</a>
            <a href="?1=InventarioController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;">Impresión Digital</a>
            <a href="?1=InventarioController&2=promocionales" class="ui red button" id="pro">Promocionales</a>
            <br><br>
            <font color="black" size="5px">
            <i class="calendar check outline icon"></i> <i class="list icon"></i>
            Inventario de productos de Impresión digital </font><font color="black" size="20px">.</font>
            </div>
        </div>
</div>


</div>


<script>

$(document).ready(function(){
    $("#imp").removeClass("ui black button");
    $("#imp").addClass("ui black basic button");;
    });

</script>
