

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
  
</div> 


<script src="./res/tablas/tablaGranFormatoInventario.js"></script>
<script>
    $(document).ready(function(){
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
    });


    var detalles =(ele)=>{
       
    }
</script>


