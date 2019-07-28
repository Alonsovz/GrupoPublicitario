<div id="app">
    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <a href="?1=RequisicionController&2=pendRecibirGF" class="ui gray button" id="gr" style="color:black; font-weight:bold;width:20%;font-size:12px;">
                    Gran Formato</a>

                    <a href="?1=RequisicionController&2=pendRecibirIP" class="ui black button" id="imp" style="font-weight:bold;width:24%;font-size:12px;">Impresión Digital</a>

                    <a href="?1=RequisicionController&2=pendRecibirP" class="ui red button" id="pro" style="font-weight:bold;width:27%;font-size:12px;">Promocionales</a>
                    <a href="?1=RequisicionController&2=gastosAprobados" class="ui blue button" id="gast" style="font-weight:bold;width:20%;font-size:12px;">Gastos de Oficina</a>
                    <br><br>

                    <font color="#848484" size="5px">
                    <i class="user icon"></i> <i class="list icon"></i>
                        Requisición de productos de Gran Formato pendientes de recibir</font><font color="black" size="20px">.</font>
                    </div>
            </div>

            <div class="row">
            <div class="sixteen wide column">
                <table id="dtPenPagoGF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #BDBDBD; color:black;">N°</th>
                            <th style="background-color: #BDBDBD; color:black;">Fecha de Req</th>
                            <th style="background-color: #BDBDBD; color:black;">Responsable</th>  
                            <th style="background-color: #BDBDBD; color:black;">Tipo Compra</th> 
                            <th style="background-color: #BDBDBD; color:black;">Proveedor</th>
                            <th style="background-color: #BDBDBD; color:black;">Tipo Doc</th>
                            <th style="background-color: #BDBDBD; color:black;">Fecha Entrega</th>
                            <th style="background-color: #BDBDBD; color:black;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<div class="ui fullscreen modal" id="modalDetalles">
    <div class="header">
    Detalles de solicitud de requisición
    </div>
    
    
    <div class="scrolling content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
    <br>
        <form class="ui form" style="font-size:16px;" id="frmOrdenRequisicion" method="POST" enctype="multipart/form-data">
            <div class="field">
                <div class="fields">
                    <div class="four wide field">
                        <label><i class="calendar icon"></i>Fecha de la Requisición:</label>
                        <input type="text" name="fechaRe" id="fechaRe" readonly>
                        <input type="hidden" id="idUser" name="idUser">
                        <input type="hidden" id="idClasi" name="idClasi" value="1">
                        <input type="hidden" id="id" name="id">
                    </div>

                    <div class="four wide field">
                        <label><i class="user icon"></i>Responsable:</label>
                        <input type="text" name="responsable" id="responsable"  readonly>
                    </div>

                    <div class="four wide field">
                        <label><i class="list icon"></i>Tipo de compra:</label>
                        <input type="text" name="tipoCompra" id="tipoCompra"  readonly>
                        
                    </div>

                    <div class="four wide field">
                        <label><i class="user icon"></i><i class="truck icon"></i>Proveedor:</label>
                        <input type="text" name="proveedor" id="proveedor"  readonly>
                        
                    </div>

                    <div class="four wide field">
                            <label><i class="cart arrow down  icon"></i>Tipo de documento:</label>
                            <input type="text" name="tipoDocumento" id="tipoDocumento"  readonly>
                  
                            </div>

                            <div class="four wide field">
                            <label><i class="dollar icon"></i>Condición de crédito:</label>
                             <input type="text" name="condicionCredito" id="condicionCredito" readonly>
                  
                            </div>

                            <div class="four wide field">
                                <label><i class="calendar icon"></i>Fecha de entrega</label>
                                <input type="text" name="fechaEntrega" id="fechaEntrega">
                            </div>

                </div>
            </div>

            <div class="field">
                <div class="fields">
                
                    <div class="sixteen wide field">
                    <hr><br>
                    <a style="color:black;font-size:22px;font-weight:bold;text-align:center;">Detalles de requisición</a>
                    <br><br><hr><br>
                    <div id="detalles"></div>
                    </div>
                </div>
            </div>

    </form> 
    </div>
    <div class="actions">
    
    
    <button class="ui black deny button">Cancelar</button>
    </div>
    </div>

    <div class="ui tiny modal" id="modalRecibir">
        <div class="header" style="color:white;background-color:black;">
            Producto: <a id="prT" style="color:yellow"></a><br>
            Color: <a id="coT"  style="color:yellow"></a><br>
            Acabado: <a id="acT"  style="color:yellow"></a><br>
            Cantidad: <a id="caT"  style="color:yellow"></a>
        </div>
        <div class="content">
            <input type="hidden" id="idP" name="idP">
            <input type="hidden" id="idD" name="idD">
            <input type="hidden" id="idR" name="idR">
            <input type="hidden" id="color" name="color">
            <input type="hidden" id="acabado" name="acabado">
            <input type="hidden" id="cantidad" name="cantidad">
            <input type="hidden" id="precio" name="precio">
            <input type="hidden" id="precioIn" name="precioIn">
            <h3>¿Recibir producto?</h3>
        </div>
        <div class="actions">
            <button id="btnCa" class="ui red button">Cancelar</button>
            <button id="btnRe" class="ui black button">Recibir</button>
        </div>
    </div>


    <div class="ui tiny modal" id="modalFinalizar">
        <div class="header" style="color:white;background-color:black;">
            Finalizar requisición
        </div>
        <div class="content">
            <input type="hidden" id="idRe" name="idRe">
            
            <h3>¿Completar requisción?</h3>

            <form class="ui form">
                <div class="field">
                <div class="fields">
                <div class="eight wide field">
            <label><i class="dollar icon"></i>Tipo de pago</label>
            <select class="ui dropdown" id="tipoPago" name="tipoPago">
            <option value="seleccione" set selected>Seleccione una forma de pago</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Cheque">Cheque</option>
            <option value="Tarjeta de credito">Tarjeta de credito</option>
            <option value="Patrocinio">Patrocinio</option>
            <option value="Comision">Comisión</option>
            <option value="Otros">Otros</option>
            </select>
        </div>
                </div>
                </div>
                
            </form>
        </div>
        <div class="actions">
            <button  class="ui red deny button">Cancelar</button>
            <button id="btnCom" class="ui black button">Completar</button>
        </div>
    </div>

</div>
<script src="./res/tablas/tablaPenRecibirGF.js"></script>
    <script>
    $(document).ready(function(){
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
 
    });

    var detalles=(ele)=>{
       var id= $(ele).attr("id");
    
       $("#id").val(id);
       $("#fechaRe").val($(ele).attr("fecha"));
       $("#responsable").val($(ele).attr("responsable"));
       $("#tipoCompra").val($(ele).attr("tipoCompra"));
       $("#proveedor").val($(ele).attr("proveedor"));
       $("#tipoDocumento").val($(ele).attr("tipoDoc"));
       $("#condicionCredito").val($(ele).attr("condicionCredito"));
       $("#fechaEntrega").val($(ele).attr("fechaEntrega"));


       $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesRequisicionAp",
            data:{
                id:id
            },
        success:function(r){
				$('#detalles').html(r);
			}
        });
       $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }


    var finalizar=(ele)=>{
       var id= $(ele).attr("id");
    
       $("#idRe").val(id);
       
       $('#modalFinalizar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }


    var recibir=(ele)=>{
       var idP= $(ele).attr("idPr");
       var idD= $(ele).attr("idD");
       var color= $(ele).attr("color");
       var acabado= $(ele).attr("acabado");
       var cantidad= $(ele).attr("cantidad");
       var precio= $(ele).attr("precio");
      
    
      $("#idP").val(idP);
      $("#idD").val(idD);
      $("#color").val(color);
      $("#acabado").val(acabado);
      $("#cantidad").val(cantidad);
      $("#precio").val(precio);
     
      $("#idR").val($("#id").val());


      $("#prT").text($(ele).attr("pro"));
      $("#coT").text($(ele).attr("co"));
      $("#acT").text($(ele).attr("ac"));
      $("#caT").text($(ele).attr("cantidad") +" "+$(ele).attr("me"));

      $("#modalRecibir").modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }

    $("#btnCa").click(function(){
       
        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesRequisicionAp",
            data:{
                id:$("#id").val()
            },
        success:function(r){
				$('#detalles').html(r);
			}
        });
       $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    });

    $("#btnRe").click(function(){



      $.ajax({
			type:"POST",
			url:"?1=RequisicionController&2=recibir",
            data:{
                idP:$("#idP").val(),
                color: $("#color").val(),
                acabado :$("#acabado").val(),
                cantidad :$("#cantidad").val(),
                precio : $("#precio").val(),
                idD :$("#idD").val(),
            },
        success:function(r){
            if(r == 1) {
                $('#detalles').html('');
                        $('#modalRecibir').modal('hide');
                        swal({
                            title: 'Producto Recibido',
                            text: 'Agregado al inventario',
                            type: 'success',
                            showConfirmButton: true

                        }).then((result) => {
                            if(result.value){
                                $.ajax({
                            type:"POST",
                            url:"?1=Funciones&2=verDetallesRequisicionAp",
                            data:{
                                id:$("#id").val()
                            },
                        success:function(r){
                                $('#detalles').html(r);
                                
                            }
                        });
                        $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            }
                           
                         
                        }); 
                        
                        
                    } 
			}
        });
      
    });


    $("#btnCom").click(function(){



$.ajax({
      type:"POST",
      url:"?1=RequisicionController&2=finalizarRe",
      data:{
          idRe:$("#idRe").val(),
          tipoPago:$("#tipoPago").val(),
      },
  success:function(r){
      if(r == 1) {
         
                  $('#modalFinalizar').modal('hide');
                  swal({
                      title: 'Requisición finalizada',
                      type: 'success',
                      showConfirmButton: true

                  }).then((result) => {
                      if(result.value){
                        $('#dtPenPagoGF').DataTable().ajax.reload();
                    }
                     
                   
                  }); 
                  
                  
              } 
      }
  });

});


    
    </script>