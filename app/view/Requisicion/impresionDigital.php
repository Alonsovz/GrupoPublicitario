
<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <a href="?1=RequisicionController&2=granFormato" class="ui gray button" id="gr">Gran Formato</a>
            <a href="?1=RequisicionController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;">Impresión Digital</a>
            <a href="?1=RequisicionController&2=promocionales" class="ui red button" id="pro">Promocionales</a>
            <br><br>
            <font color="black" size="5px">
            <i class="calendar check outline icon"></i> <i class="list icon"></i>
            Requisición de productos de Impresión digital </font><font color="black" size="20px">.</font>
            </div>
        </div>
</div>


<div class="content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
    <br>
        <form class="ui form" style="font-size:14px;margin-left:20px;margin-right:20px;"  id="frmOrdenRequisicion" method="POST" enctype="multipart/form-data">
            <div class="field">
                <div class="fields">
                    <div class="four wide field">
                        <label><i class="calendar icon"></i>Fecha de la Requisición:</label>
                        <input type="date" name="fechaRe" id="fechaRe">
                        <input type="hidden" id="idUser" name="idUser" value=<?php echo '"'.$_SESSION['codigoUsuario'].'"'; ?>>
                    </div>

                    <div class="four wide field">
                        <label><i class="user icon"></i>Responsable:</label>
                        <input type="text" name="responsable" id="responsable" value=<?php echo '"'.$_SESSION['nombre'].' '."".' ' .$_SESSION['apellido'].'"'; ?> readonly>
                        <input type="hidden" id="idClasi" name="idClasi" value="2">
                    </div>

                    <div class="four wide field">
                        <label><i class="list icon"></i>Tipo de compra:</label>
                        <select name="tipoCompra" id="tipoCompra" class="ui dropdown">
                        <option value="Seleccione" set selected>Seleccione una opción</option>
                        <option value="Gravada">Gravada</option>
                        <option value="Exenta">Exenta</option>
                        <option value="No Gravada">No Gravada</option>
                        </select>
                        
                    </div>

                    <div class="four wide field">
                        <label><i class="user icon"></i><i class="truck icon"></i>Proveedor:</label>
                        <select name="proveedor" id="proveedor" class="ui search dropdown">
                        <option value="Seleccione" set selected>Seleccione una opción</option>
                        </select>
                        
                    </div>

                    <div class="four wide field" id="datosProveedor">
                            <label><i class="cart arrow down  icon"></i>Tipo de documento:</label>
                            <select name="tipoDocumento" id="tipoDocumento" class="ui search dropdown">
                        <option value="Seleccione" set selected>Seleccione una opción</option>
                        <option value="CCF">CCF</option>
                        <option value="Factura">Factura</option>
                        <option value="Honorarios">Honorarios</option>
                        <option value="Recibo">Recibo</option>
                        </select>
                  
                            </div>

                            <div class="four wide field">
                            <label><i class="dollar icon"></i>Condición de crédito:</label>
                             <input type="text" name="condicionCredito" id="condicionCredito" readonly>
                  
                            </div>

                            <div class="four wide field">
                                <label><i class="calendar icon"></i>Fecha de entrega</label>
                                <input type="date" name="fechaEntrega" id="fechaEntrega">
                            </div>

                </div>
            </div>


           <br>
            <div class="field" id="clasi" style="display:none">
            <div class="row title-bar" style="background-color:#918E8E; color:white;font-weight:bold; font-size:19px;">
            <div class="sixteen wide column">
                <div class="ui divider"></div>
                Detalles del producto
                <div class="ui divider"></div>
            </div>
            
                </div>
                <br>
                        <div class="fields">

                        <div class="three wide field">
                        <label><i class="chart bar icon"></i>Clasificación:</label>
                        <select name="clasificacion"  id="clasificacion" class="ui search dropdown">
                            
                        </select>
                        </div>

                        <div class="four wide field" id="producs" style="display:none;">
                        <label> <i class="pencil icon"></i>Producto Final: (Productos Disponibles)</label>
                        <select name="proFinalCmb"  id="proFinalCmb" class="ui search dropdown">
                        
                    
                        </select>
                        
                        </div>

                        <div class="two wide field" id="medi" style="display:none;">
                        <label><i class="arrows alternate icon"></i>Unidad de Medidad:</label>
                        <input type="text" name="unidadMedida" id="unidadMedida" readonly>
                        
                        </div>

                        <div class="three wide field" id="col" style="display:none;">
                        <label><i class="chart pie icon"></i>Color:</label>
                        <select name="colorCmb" id="colorCmb" class="ui search dropdown">
                        
                        </select>
                        </div>

                        <div class="four wide field" id="aca" style="display:none;">
                        <label><i class="podcast icon"></i>Acabado Final:</label>
                        <select name="acabadoCmb" id="acabadoCmb" class="ui search dropdown">
                        
                        </select>
                        </div>
                     </div>
                 
                <div class="ui divider"></div>
                 <div class="field" id="can" style="display:none">
                    <div class="fields">
                    <div class="four wide field"  >
                        <label><i class="podcast icon"></i>Cantidad en: <a id="canText"></a></label>
                        <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad a pedir">
                    </div>
                    

                    <div class="four wide field">
                        <label><i class="arrows alternate icon"></i>Medidas</label>
                        <input type="text" name="medidas" id="medidas" placeholder="Medidas">
                    </div>
                    

                    <div class="four wide field">
                        <label><i class="pencil icon"></i>Descripción</label>
                        <textarea rows="3" name="descripcion" id="descripcion" placeholder="Descripciones adicionales"></textarea>
                    </div>

                    <div class="four wide field">
                        <label><i class="dollar icon"></i>Precio</label>
                        <input type="text" name="precio" id="precio" placeholder="Precio">
                    </div>
                    
                    <div class="two wide field">
                        <label><br></label>
                        <a class="ui black  button" id="agregarCompra">Agregar</a>
                    </div>
                    </div>
                    
                 </div>
                 
                 </div>
                 
        </form>
        <hr>
        <div class="field" id="list" style="display:none;margin-left:10px;margin-right:10px;" >
                        <div class="fields">

                        <div class="sixteen wide field" style="font-size:16px;">
                        <br>
                        
                <form action="" class="ui form" id="frmLista" >
                        <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                        <th style="background-color: black; color:white; width:20%;"><i class="list icon"></i>Producto</th>
                                        <th style="background-color: black; color:white;"><i class="podcast icon"></i>Cantidad</th>
                                        <th style="background-color: black; color:white;"><i class="arrows alternate icon"></i>Medidas</th>
                                        <th style="background-color: black; color:white;"><i class="pencil icon"></i>Descipciones</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Precio</th>
                                        <th style="background-color: black; color:white;"><i class="trash icon"></i>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(lista, index) in listado">
                                    <td>  
                                    <textarea rows="3" v-model="lista.productoRe" name="nombreHer" id="nombreHer" readonly></textarea>
                                    </td>
                                   
                                    <td>  
                                    <input v-model="lista.cantidadRe" name="cantidadRe" id="cantidadRe" type="text" readonly>
                                    </td>

                                    <td>  
                                    <input v-model="lista.medidaRe" name="medidaRe" id="medidaRe" type="text" readonly>
                                    <input v-model="lista.idProducto" name="idProducto" id="idProducto" type="hidden" readonly>
                                    <input v-model="lista.idColor" name="idColor" id="idColor" type="hidden" readonly>
                                    <input v-model="lista.idAcabado" name="idAcabado" id="idAcabado" type="hidden" readonly>
                                    </td>

                                    <td>  
                                    <textarea rows="3"  v-model="lista.descriRe" name="descriRe" id="descriRe" readonly></textarea>
                                    </td>
                                    <td>  
                                    <input class="requerido" v-model="lista.precioRe" name="precioRe" id="precioRe" type="text"
                                     placeholder="Nombre completo" readonly>
                                    </td>
                                    
                                    <td>
                                    <center>
                    </form>
                              <a  @click="eliminarDetalle(index)" class="ui negative mini circular icon button"><i
                                  class="times icon"></i></a>
                                  </center>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                        </div>
                        <br>
                        <a class="ui green right floated button" id="guardarRequisicion">Realizar Pedido</a>
                        <br>
                         </div>
</div>

    </div>

    
  
</div> 
<script>
var app = new Vue({
        el: "#app",
        data: {
            listado:[{
               productoRe: '',
                cantidadRe:'',
                medidasRe:'',
                descriRe:'',
                precioRe:'',
                idProducto:'',
                idColor:'',
                idAcabado:'',
            }],
        },
        methods: {
            eliminarDetalle(index) {
                this.listado.splice(index, 1);
            },
            
            guardarRequisicion() {

            if (this.listado.length) {

                $('#frmLista').addClass('loading');
                $.ajax({
                    type: 'POST',
                    data: {
                        lista: JSON.stringify(this.listado)
                    },
                    url: '?1=RequisicionController&2=guardarDetallesRequision',
                    success: function (r) {
                        $('#frmLista').removeClass('loading');
                        if (r == 1) {              
                        }
                        
                    }
                });
            }

            },


        }
    });
</script>
<script>
    $(document).ready(function(){
    
    app.eliminarDetalle(0);
    });

    $(document).ready(function(){
    var d = new Date();
    var n = d.getFullYear();

    var dia = String(d.getDate()).padStart(2, '0');
    var mes = String(d.getMonth() + 1).padStart(2, '0');

    var fecha = n + "-" + mes + "-" + dia;

    $("#fechaRe").val(fecha);
});


$(function() {
        

        var option = '';
        var proveedor = '<?php echo $proveedores?>';

        $.each(JSON.parse(proveedor), function() {
            option = `<option value="${this.idProveedor}">${this.nombre}</option>`;

            $('#proveedor').append(option);
        });
    });
</script>

<script type="text/javascript">
	$(document).ready(function(){
		

		$('#proveedor').change(function(){
            $('#condicionCredito').val('');
            $('#tipoDocumento').dropdown('set selected', "Seleccione");
            recargarLista3();
            recargarLista4();
		});

      
        $('#clasificacion').change(function(){
           recargarLista();
		});

        $('#proFinalCmb').change(function(){
            recargarListaColores();
            recargarListaAcabados();
            recargarListaMedidas();
            $("#can").show(1000);
		});
	})
</script>

<script type="text/javascript">
	function recargarLista3(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=proveedorCondicion",
			data:"idPro=" + $('#proveedor option:selected').val(),
			success:function(r){
				$('#condicionCredito').val(r);
                $('#datosProveedor').show(1000);
			}
		});
	}


    function recargarLista4(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=proveedorProductos",
			data:"idPro=" + $('#proveedor option:selected').val(),
			success:function(r){
                $('#clasi').show(1000);
				$('#clasificacion').html(r);
                
			}
		});
	}

   
    
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=productoFinalGr",
			data:"idPro=" + $('#clasificacion').val(),
			success:function(r){
                $('#proFinalCmb').html(r);
                $("#producs").show(1000);
               
			}
		});
	}
</script>

<script type="text/javascript">
	function recargarListaAcabados(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=acabado",
			data:"idPro=" + $('#proFinalCmb option:selected').text(),
			success:function(r){
				$('#acabadoCmb').html(r);
			}
		});
	}
</script>



<script type="text/javascript">
	function recargarListaColores(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=color",
			data:"idPro=" + $('#proFinalCmb option:selected').text(),
			success:function(r){
				$('#colorCmb').html(r);
			}
		});
    }
</script>
<script type="text/javascript">
	function recargarListaMedidas(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=unidadMedida",
			data:"idPro=" + $('#proFinalCmb option:selected').text(),
			success:function(r){
                $('#unidadMedida').val(r);
                $("#medi").show(1000);
                $("#col").show(1000);
                $("#aca").show(1000);
                $('#canText').text(r);
			}
		});
	}

    $("#agregarCompra").click(function(){
        $("#list").show(1000);
            var producto ="Clasificación: "+ $("#proFinalCmb option:selected").text() + "\nColor: "+ $("#colorCmb option:selected").text()+ "\nAcabado: " + $("#acabadoCmb option:selected").text();
            var cantidad = $("#cantidad").val();
            var medidas = $("#medidas").val();
            var desc = $("#descripcion").val();
            var precio = $("#precio").val();
            var color= $("#colorCmb option:selected").val();
            var idPro =$("#proFinalCmb option:selected").val();
            var acabado = $("#acabadoCmb option:selected").val();

        app.listado.push({
            productoRe: producto,
            cantidadRe:cantidad,
            medidaRe : medidas,
            descriRe:desc,
            precioRe:precio,
            idProducto : idPro,
            idColor: color,
            idAcabado : acabado,
        }),

        
        $("#cantidad").val('');
        $("#medidas").val('');
        $("#descripcion").val('');
        $("#precio").val('');
    });

$("#guardarRequisicion").click(function(){
    alertify.confirm("¿Desea registrar la requisición?",
        function(){
            
            const form = $('#frmOrdenRequisicion');

            const datosFormulario = new FormData(form[0]);
     
    
        $.ajax({
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            url: '?1=RequisicionController&2=registrarEncabezado',
            data: datosFormulario,
            success: function(r) {
                if(r == 1) {
                    app.guardarRequisicion();
                    swal({
                        title: 'Registrada',
                        text: 'Petición de requisición guardada con éxito',
                        type: 'success',
                        showConfirmButton: true

                    }).then((result) => {
                        if (result.value) {
                           
                            location.reload();
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


<script>

$(document).ready(function(){
    $("#imp").removeClass("ui black button");
    $("#imp").addClass("ui black basic button");;
    });

</script>
