

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

            <div class="row title-bar">
            <div class="sixteen wide column">
            <a href="./app/view/Inventario/pdfGR.php" class="ui right floated green labeled icon button">
                    <i class="list icon"></i>
                    Inventario excel
            </a>
            </div>
        </div>
        
    
    
<div class="ui divider"></div>

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
  
  <div id="modalExistencia" class="ui tiny modal">
    <div class="header" style="color:white;background-color:black;">
        Definir existencia para el producto : <a id="proE" style="color:yellow"></a><br>
        Acabado : <a id="acaE" style="color:yellow"></a><br>
        Color : <a id="colE" style="color:yellow"></a><br>
        Medida : <a id="medE" style="color:yellow"></a>
    </div>
    <div class="content">
    <input type="hidden" id="colorE" name="colorE">
    <input type="hidden" id="acabadoE" name="acabadoE">
    <input type="hidden" id="productoE" name="productoE">
        <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="sixteen wide field">
                    <label><i class="arrows alternate icon"></i> Cantidad en existencia:</label>
                    <input type="text" id="exis" name="exis" placeholder="Definir existencia">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui black  button" id="btnE">Cancelar</button>
        <button class="ui red button" id="guardarE">Guardar</button>
    </div>
</div>


<div id="modalPrecio" class="ui tiny modal">
    <div class="header" style="color:white;background-color:black;">
        Definir precio para el producto : <a id="proP" style="color:yellow"></a><br>
        Acabado : <a id="acaP" style="color:yellow"></a><br>
        Color : <a id="colP" style="color:yellow"></a><br>
        Medida : <a id="medP" style="color:yellow"></a>
    </div>
    <div class="content">
    <input type="hidden" id="colorP" name="colorP">
    <input type="hidden" id="acabadoP" name="acabadoP">
    <input type="hidden" id="productoP" name="productoP">
        <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="sixteen wide field">
                    <label><i class="dollar icon"></i> Precio Unitario:</label>
                    <input type="text" id="precio" name="precio" placeholder="Definir Precio Unitario">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui black  button" id="btnP">Cancelar</button>
        <button class="ui red button" id="guardarP">Guardar</button>
    </div>
</div>

<div id="modalPrecioDes" class="ui tiny modal">
    <div class="header" style="color:white;background-color:black;">
        Definir precio de desperdicio para el producto : <a id="proPD" style="color:yellow"></a><br>
        Acabado : <a id="acaPD" style="color:yellow"></a><br>
        Color : <a id="colPD" style="color:yellow"></a><br>
        Medida : <a id="medPD" style="color:yellow"></a>
    </div>
    <div class="content">
    <input type="hidden" id="colorPD" name="colorPD">
    <input type="hidden" id="acabadoPD" name="acabadoPD">
    <input type="hidden" id="productoPD" name="productoPD">
        <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="sixteen wide field">
                    <label><i class="dollar icon"></i> Precio Unitario:</label>
                    <input type="text" id="precioD" name="precioD" placeholder="Definir Precio de desperdicio">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui black  button" id="btnPD">Cancelar</button>
        <button class="ui red button" id="guardarPD">Guardar</button>
    </div>
</div>

</div> 


<script src="./res/tablas/tablaGranFormatoInventario.js"></script>
<script>
    $(document).ready(function(){
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
    $('#precio').mask("###0.00", {reverse: true});
    $('#precioD').mask("###0.00", {reverse: true});
    $('#exis').mask("###0.00", {reverse: true});
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
        $("#idProductoF").val(idP);
    $("#titleDe").text(idBtn);
    
    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesInventarioGR",
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

$("#btnE").click(function(){

   
        var idP =  $("#idProductoF").val();;
    
    $("#titleDe").text();
    
    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesInventarioGR",
            data:{
                idC:idP
            },
        success:function(r){
				$('#respuesta').html(r);
			}
        });

        $("#verDe").show(1000);
        $("#title").show(1000);
        $('#detallesProducto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


$("#btnP").click(function(){

   
var idP =  $("#idProductoF").val();;

$("#titleDe").text();

$.ajax({
    type:"POST",
    url:"?1=Funciones&2=verDetallesInventarioGR",
    data:{
        idC:idP
    },
success:function(r){
        $('#respuesta').html(r);
    }
});

$("#verDe").show(1000);
$("#title").show(1000);
$('#detallesProducto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

var agregarExistencia=(ele)=>{
    var id = $(ele).attr("id");
    var idColor = $(ele).attr("idColor");
    var idAcabado = $(ele).attr("idAcabado");

    $("#proE").text($("#titleDe").text());
    $("#colE").text($(ele).attr("color"));
    $("#acaE").text($(ele).attr("acabado"));
    $("#medE").text($(ele).attr("medida"));

    $("#colorE").val(idColor);
    $("#acabadoE").val(idAcabado);
    $("#productoE").val(id);
    $('#modalExistencia').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
}


$("#guardarE").click(function(){
    
  var idColor=  $("#colorE").val();
   var idAcabado= $("#acabadoE").val();
   var id= $("#productoE").val();
   var exis = $("#exis").val();

    alertify.confirm("¿Desea guardar la existencia para el producto: " +$("#proE").text()+ "  Acabado: " + $("#acaE").text() + "  Color: " + $("#colE").text() + "?",
            function(){
    $.ajax({
			type:"POST",
			url:"?1=InventarioController&2=definirExistencia",
            data:{
                id:id,
                idColor:idColor,
                idAcabado:idAcabado,
                exis:exis,
            },
            success: function(r) {
                    if(r == 1) {
                        $('#modalExistencia').modal('hide');
                        $('#respuesta').html('');
                        swal({
                            title: 'Existencia actualizada',
                            text: 'Guardado con éxito',
                            type: 'success',
                            
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                            
                                    var idP =  $("#idProductoF").val();;
                                
                                $("#titleDe").text();
                                
                                $.ajax({
                                        type:"POST",
                                        url:"?1=Funciones&2=verDetallesInventarioGR",
                                        data:{
                                            idC:idP
                                        },
                                    success:function(r){
                                            $('#respuesta').html(r);
                                        }
                                    });

                                    $("#verDe").show(1000);
                                    $("#title").show(1000);
                                    $('#detallesProducto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                               
                            }
                        }); 
                        
                    } 
                }
        });

    },
            function(){
               
                alertify.error('Cancelado');
                
            }); 
    
});



var agregarPrecio=(ele)=>{
    var id = $(ele).attr("id");
    var idColor = $(ele).attr("idColor");
    var idAcabado = $(ele).attr("idAcabado");

    $("#proP").text($("#titleDe").text());
    $("#colP").text($(ele).attr("color"));
    $("#acaP").text($(ele).attr("acabado"));
    $("#medP").text($(ele).attr("medida"));


    $("#colorP").val(idColor);
    $("#acabadoP").val(idAcabado);
    $("#productoP").val(id);
    $('#modalPrecio').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
}
    

var agregarPrecioDesper=(ele)=>{
    var id = $(ele).attr("id");
    var idColor = $(ele).attr("idColor");
    var idAcabado = $(ele).attr("idAcabado");

    $("#proPD").text($("#titleDe").text());
    $("#colPD").text($(ele).attr("color"));
    $("#acaPD").text($(ele).attr("acabado"));
    $("#medPD").text($(ele).attr("medida"));


    $("#colorPD").val(idColor);
    $("#acabadoPD").val(idAcabado);
    $("#productoPD").val(id);
    $('#modalPrecioDes').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
}
    


$("#guardarP").click(function(){
    
    var idColor=  $("#colorP").val();
     var idAcabado= $("#acabadoP").val();
     var id= $("#productoP").val();
     var precio = $("#precio").val();
  
      alertify.confirm("¿Desea guardar el precio para el producto: " +$("#proP").text()+ "  Acabado: " + $("#acaP").text() + "  Color: " + $("#colP").text() + "?",
              function(){
      $.ajax({
              type:"POST",
              url:"?1=InventarioController&2=definirPrecio",
              data:{
                  id:id,
                  idColor:idColor,
                  idAcabado:idAcabado,
                  precio:precio,
              },
              success: function(r) {
                      if(r == 1) {
                        $('#modalPrecio').modal('hide');
                          $('#respuesta').html('');
                          swal({
                              title: 'Precio actualizado',
                              text: 'Guardado con éxito',
                              type: 'success',
                              
                              showConfirmButton: true,
                              }).then((result) => {
                                  if (result.value) {
                              
                                      var idP =  $("#idProductoF").val();;
                                  
                                  $("#titleDe").text();
                                  
                                  $.ajax({
                                          type:"POST",
                                          url:"?1=Funciones&2=verDetallesInventarioGR",
                                          data:{
                                              idC:idP
                                          },
                                      success:function(r){
                                              $('#respuesta').html(r);
                                          }
                                      });
  
                                      $("#verDe").show(1000);
                                      $("#title").show(1000);
                                      $('#detallesProducto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                                 
                              }
                          }); 
                          
                      } 
                  }
          });
  
      },
              function(){
                 
                  alertify.error('Cancelado');
                  
              }); 
      
  });


  $("#guardarPD").click(function(){
    
    var idColor=  $("#colorPD").val();
     var idAcabado= $("#acabadoPD").val();
     var id= $("#productoPD").val();
     var precio = $("#precioD").val();
  
      alertify.confirm("¿Desea guardar el precio de desperdicio para el producto: " +$("#proPD").text()+ "  Acabado: " + $("#acaPD").text() + "  Color: " + $("#colPD").text() + "?",
              function(){
      $.ajax({
              type:"POST",
              url:"?1=InventarioController&2=definirPrecioDes",
              data:{
                  id:id,
                  idColor:idColor,
                  idAcabado:idAcabado,
                  precio:precio,
              },
              success: function(r) {
                      if(r == 1) {
                        $('#modalPrecioDes').modal('hide');
                          $('#respuesta').html('');
                          swal({
                              title: 'Precio actualizado',
                              text: 'Guardado con éxito',
                              type: 'success',
                              
                              showConfirmButton: true,
                              }).then((result) => {
                                  if (result.value) {
                              
                                      var idP =  $("#idProductoF").val();;
                                  
                                  $("#titleDe").text();
                                  
                                  $.ajax({
                                          type:"POST",
                                          url:"?1=Funciones&2=verDetallesInventarioGR",
                                          data:{
                                              idC:idP
                                          },
                                      success:function(r){
                                              $('#respuesta').html(r);
                                          }
                                      });
  
                                      $("#verDe").show(1000);
                                      $("#title").show(1000);
                                      $('#detallesProducto').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                                 
                              }
                          }); 
                          
                      } 
                  }
          });
  
      },
              function(){
                 
                  alertify.error('Cancelado');
                  
              }); 
      
  });
</script>
  

