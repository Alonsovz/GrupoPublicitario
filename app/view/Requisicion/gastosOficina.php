<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <a href="?1=RequisicionController&2=granFormato" class="ui gray button" id="gr">Gran Formato</a>
            <a href="?1=RequisicionController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;">Impresión Digital</a>
            <a href="?1=RequisicionController&2=promocionales" class="ui red button" id="pro">Promocionales</a>
            <a href="?1=RequisicionController&2=gastosOficina" class="ui blue button" id="gastosOf">Gastos de Oficina</a>
            <br><br>
            <font color="black" size="5px">
            <i class="plus icon"></i> <i class="folder icon"></i>
            Gastos de Oficina </font><font color="black" size="20px">.</font>
            </div>
        </div>
</div>

<br>
<div class="content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
    <form class="ui form" style="font-size:16px;margin-left:20px;margin-right:20px;" >
        <div class="field">
            <div class="fields">
                <div class="six wide field">
                
                <label><i class="pencil icon"></i> Gasto: </label>
                <input type="text" id="gasto" name="gasto">
                </div>

                <div class="six wide field">
                        <label><i class="pencil icon"></i>Descripción: </label>
                        <textarea rows="3" name="descripcion" id="descripcion" placeholder="Descripciones adicionales"></textarea>
                </div>

                <div class="six wide field">
                        <label><i class="dollar icon"></i>Precio: </label>
                        <input type="text" name="precio" id="precio" placeholder="Precio">
                </div>
            </div>
        </div>
    </form>
</div>
</div>

<script>

$(document).ready(function(){
    $("#gastosOf").removeClass("ui blue button");
    $("#gastosOf").addClass("ui blue basic button");
    });

</script>