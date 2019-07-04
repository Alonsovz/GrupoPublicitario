
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


        <div class="ui fullscreen modal" id="detallesProducto">
        <div class="header" style="background-color:black;color:white;">
        Inventario del producto: <a id="nameP" style="color:red;"></a>
        </div>
        <div class="scrolling content">
        <form class="ui form" style="font-size:16px;">
            <input type="hidden" id="IDtipoProducto" name="IDtipoProducto">


            <div class="field" id="tablaProductos">
            <div class="fields">
            
                
                <div class="sixteen wide field">
                    
                    <table class="ui selectable very compact celled table">
                    <thead>
                       <tr>
                           <th style="background-color:#C60D0D; color:white;"><label><i class="list icon"></i>Producto Final</label></th>
                           
                        </tr>
                        </thead>
                        <tbody style="background-color:#E4E4E7;">
                        <tr>
                            <td id="proFin"></td>
                        
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                </div>

                <div style="background-color:#EBEDEB;display:none;" id="verDe">
                    <div class="field">
                    <div class="fields">
                        <div class="sixteen wide field" id="title" style="display:none; font-weight: bold; font-size:18px; color: black;">
                <center>Detalles del producto: <a id="titleDe" style="font-weight: bold; font-size:18px; color: red;"></a></center>
                
                    <input type="hidden" id="idProductoF">

                    
                    </div>
                    
                    </div>
                </div>
                <div class="field">
                    <div class="fields">
                        <div class="sixteen wide field">
                        <div id="respuesta"></div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </form>
        </div>  
        <div class="actions">
        <button class="ui black deny button">Listo</button>
        </div>
        </div>
  
</div> 


<script src="./res/tablas/tablaImpresionInventario.js"></script>
<script>
    $(document).ready(function(){
    $("#imp").removeClass("ui black button");
    $("#imp").addClass("ui black basic button");;
    });


    var detalles =(ele)=>{
        var idProducto = $(ele).attr("id");
        $('#nameP').text($(ele).attr("nombre"));

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesProFinalInventario",
            data:{
                id:idProducto
            },
        success:function(r){
				$('#proFin').html(r);
			}
        });

      

        $('#detallesProducto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }



    var detallePro=(ele)=>{
    
    
    var idBtn = $(ele).attr("id");
        var idP = $(ele).attr("idP");
    
    $("#titleDe").text(idBtn);
    
    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesInventario",
            data:{
                idC:idP
            },
        success:function(r){
				$('#respuesta').html(r);
			}
        });

        $("#verDe").show(1000);
        $("#title").show(1000);

       

        
        
        

}
</script>





