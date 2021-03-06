<?php
  require_once './vendor/autoload.php';
  $mysqli = new mysqli("localhost","root","","grupoPublicitario");
  $listado = $mysqli -> query ("select max(idOrden) as id from ordenTrabajoIP");

  $id="";
  while ($valores = mysqli_fetch_array($listado)) {

    $id =$valores["id"];
  }

  

 ?>

<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <a href="?1=OTController&2=granFormato" class="ui gray button" id="gr" style="color:black; font-weight:bold;width:32%;">
                    Gran Formato</a>

                    <a href="?1=OTController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;width:25%;">Impresión Digital</a>

                    <a href="?1=OTController&2=promocionales" class="ui red button" id="pro" style="font-weight:bold;width:32%;">Promocionales</a>

                    
                    <br><br>
            <font color="black" size="5px">
            <i class="calendar check outline icon"></i> <i class="cart arrow down icon"></i>
            Nueva Orden de Trabajo de Impresión digital </font><font color="black" size="20px">.</font>
            </div>
        </div>
</div>

<br>
<div class="content" style="text-align:center; border: 1px solid black; background-color: #DADAD4;">
<br>
<form class="ui form" style="font-size:15px;margin-left:20px;margin-right:20px; " id="frmOrden"  method="POST" enctype="multipart/form-data">
    <div class="field">
        <div class="fields">

            <div class="two wide field">
            <label><i class="list icon"></i>Correlativo:</label>
            <input type="text" name="correlativo" id="correlativo" value="<?php echo "OTIP00".$id; ?>" readonly>

            <input type="hidden" id="idUser" name="idUser" value=<?php echo '"'.$_SESSION['codigoUsuario'].'"'; ?>>
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha de la OT:</label>
            <input type="date" name="fechaOT" id="fechaOT">
            </div>

            <div class="four wide field">
            <label><i class="user icon"></i>Responsable de ingresar OT:</label>
            <input type="text" name="responsable" id="responsable" value=<?php echo '"'.$_SESSION['nombre'].' '."".' ' .$_SESSION['apellido'].'"'; ?> readonly>
            </div>

            

            <div class="four wide field">
            <label><i class="user icon"></i><i class="cart arrow down icon"></i>Cliente:</label>
            <select name="cliente" id="cliente" class="ui search dropdown">
            </select>
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha Entrega:</label>
            <input type="date" name="fechaEOT" id="fechaEOT">
            </div>

        </div>
    </div>

<div class="ui divider"></div><br>

    <div class="field">
        <div class="fields">

        <div class="four wide field">
            <label><i class="chart bar icon"></i>Clasificación:</label>
            <select name="clasificacionCmb"  id="clasificacionCmb" class="ui search dropdown">
           
            </select>
            </div>

            <div class="four wide field" id="producs" style="display:none;">
            <label> <i class="pencil icon"></i>Producto Final: </label>
            <select name="proFinalCmb"  id="proFinalCmb" class="ui search dropdown">
            
           
            </select>
            
            </div>

            <div class="two wide field" id="medi" style="display:none;">
            <label><i class="user icon"></i>Medida:</label>
            <input type="text" name="unidadMedida" id="unidadMedida" readonly>
            
            </div>

            <div class="three wide field" id="aca" style="display:none;">
            <label><i class="podcast icon"></i>Acabado:</label>
            <select name="acabadoCmb" id="acabadoCmb" class="ui search dropdown">
            
            </select>
            </div>

            <div class="three wide field" id="col" style="display:none;">
            <label><i class="chart pie icon"></i>Color:</label>
            <select name="colorCmb" id="colorCmb" class="ui search dropdown">
            
            </select>
            </div>

            

           


            

        </div>
    </div>

    <div class="ui divider"></div>

    <div class="field" style="display:none"  id="verDetalle">
        <div class="fields" >
        <div class="four wide field">
            <label><br></label>
            <a class="ui blue button" id="btnDetalle">Detalle del producto</a>
        </div>

        

      

        <div class="six wide field" id="prec" style="display:none;">
            <label><i class="dollar icon"></i>Precio sugerido:</label>
            <input type="text" id="precioU" name="precioU">
        </div>

        <div class="six wide field" id="ex" style="display:none;">
            <label><i class="arrows alternate icon"></i>Existencia</label>
            <input type="text" id="existencia" name="existencia" readonly>
        </div>

        </div>
        </div>

    <div class="ui divider"></div><br>

    <div class="field" id="otrosDatos" style="display:none;">
        <div class="fields">

        <div class="two wide field">
            <label><i class="pencil icon"></i>Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
            </select>
            </div>

            <div class="four wide field">
            <label><i class="arrows alternate vertical icon"></i>Tipo:</label>
            <input type="checkbox" name="tiro" id="tiro" value="Tiro"> Tiro &nbsp; &nbsp; &nbsp;
            <input type="checkbox" name="retiro" id="retiro" value="Retiro"> Retiro
            </div>

            

            <div class="five wide field">
            <label><i class="pencil icon"></i>Descripciones Adicionales:</label>
            <textarea rows="3" id="descripciones" name="descripciones" placeholder="Descripciones"></textarea>
            
            </div>

            <div class="four wide field">
            <label><i class="dollar icon"></i>Tipo de venta:</label>
            <select name="tipoVenta" id="tipoVenta" class="ui  dropdown">
            <option value="Seleccione" set selected>Seleccione una opción</option>
            <option value="Venta Exenta">Venta Exenta</option>
            <option value="Venta No Sujeta">Venta No Sujeta</option>
            <option value="Venta Gravada">Venta Gravada</option>
            </select>
            
            </div>


            <div class="four wide field">
            <label><i class="dollar icon"></i>Total sugerido:</label>
            <input type="text" name="precioTo" id="precioTo" placeholder="Total Sugerido">

          
            </div>

            <div class="four wide field">
            <label style=""><i class="dollar icon"></i>Precio a cobrar:</label>
            <input type="text" name="precio" id="precio" placeholder="Precio Final">
            
            </div>

            



        </div>
    </div>

    <div class="ui divider"></div><br>
    <div class="field" id="otrosDatos1" style="display:none;">
        <div class="fields">
        <div class="four wide field">
            <label><i class="user icon"></i>Vendida por:</label>
            <select name="vendedor" id="vendedor" class="ui search dropdown">
            </select>
            </div>

            <div class="four wide field">
            <label><i class="user icon"></i>Responsable en  producción OT:</label>
            <select name="respProduccion" id="respProduccion" class="ui search dropdown">
            </select>
            </div>

            <div class="two wide field">
            <label style="color:#DADAD4"><i class="dollar icon"></i>Precio:</label>
            <a class=" ui right floated black labeled icon button" id="agregarOT"> <i class="plus icon"></i>Agregar OT</a>
            
            </div>
        </div>
    </div>

    
    
</form>

<div class="field" id="list" style="display:none;margin-left:10px;margin-right:10px;" >
                        <div class="fields">

                        <div class="sixteen wide field" style="font-size:16px;">
                        <br>
                        
                <form action="" class="ui form" id="frmLista" >
                        <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                        <th style="background-color: black; color:white;width:20%;"><i class="list icon"></i>Producto</th>
                                        <th style="background-color: black; color:white;"><i class="podcast icon"></i>Cantidad</th>
                                        <th style="background-color: black; color:white;"><i class="pencil icon"></i>Tipo</th>
                                        <th style="background-color: black; color:white;"><i class="pencil icon"></i>Descipciones</th>
                                        <th style="background-color: black; color:white;"><i class="pencil icon"></i>Tipo Venta</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Precio sin IVA</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Precio Final</th>
                                        <th style="background-color: black; color:white;"><i class="trash icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(lista, index) in listado">
                                    <td>  
                                    <textarea rows="3" v-model="lista.productoRe" name="nombreHer" id="nombreHer" readonly></textarea>
                                    <input v-model="lista.idProducto" name="idProducto" id="idProducto" type="hidden" readonly>
                                    <input v-model="lista.idColor" name="idColor" id="idColor" type="hidden" readonly>
                                    <input v-model="lista.idAcabado" name="idAcabado" id="idAcabado" type="hidden" readonly>
                                    </td>
                                   
                                    <td>  
                                    <input v-model="lista.cantidadRe" name="cantidadRe" id="cantidadRe" type="text" readonly>
                                    </td>

                                    <td>  
                                    <input v-model="lista.tipoRe" name="tipoRe" id="tipoRe" type="text" readonly>
                                    </td>
                                   

                                    <td>  
                                    <textarea rows="3"  v-model="lista.descriRe" name="descriRe" id="descriRe" readonly></textarea>
                                    </td>
                                    <td>  
                                    <input v-model="lista.tipoVentaRe" name="tipoVentaRe" id="tipoVentaRe" type="text" readonly>
                                    </td>
                                    <td>  
                                    <input class="requerido" v-model="lista.precioReSin" name="precioReSin" id="precioReSin" type="text" readonly>
                                    </td>
                                    <td>  
                                    <input class="requerido" v-model="lista.precioRe" name="precioRe" id="precioRe" type="text" readonly>
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
                        <a class="ui green right floated button" id="guardarOT">Guardar OT</a>
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
                detallesPro:'',
                descriRe:'',
                precioRe:'',
                precioReSin:'',
                idProducto:'',
                idColor:'',
                idAcabado:'',
                tipoRe:'',
                tipoVentaRe:'',
            }],
        },
        methods: {
            eliminarDetalle(index) {
                this.listado.splice(index, 1);
            },
            
            guardarDetalleOT() {

            if (this.listado.length) {

                $('#frmLista').addClass('loading');
                $.ajax({
                    type: 'POST',
                    data: {
                        lista: JSON.stringify(this.listado)
                    },
                    url: '?1=OTController&2=guardarDetallesOTIP',
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
    $("#imp").removeClass("ui black button");
    $("#imp").addClass("ui black basic button");
    $('#precioTo').mask("###0.00", {reverse: true});
    $('#precio').mask("###0.00", {reverse: true});
    $('#precioU').mask("###0.00", {reverse: true});
    
    app.eliminarDetalle(0);
    });

    $("#btnDetalle").click(function(){
        var idPro = $('#proFinalCmb option:selected').val();
        var idColor = $('#colorCmb option:selected').val();
        var idAcabado = $('#acabadoCmb option:selected').val();

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=precioUnitario",
			data:{
                idPro : idPro,
                idColor : idColor,
                idAcabado : idAcabado,
            },
			success:function(r){
                $('#precioU').val(r);
                $("#prec").show(1000);
                $("#otrosDatos").show(1000);
                $("#otrosDatos1").show(1000);
                
			}
        });
        
        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=existencia",
			data:{
                idPro : idPro,
                idColor : idColor,
                idAcabado : idAcabado,
            },
			success:function(r){
                $('#existencia').val(r);
                $("#ex").show(1000);
                
			}
		});
    });
</script>
<script>
$(document).ready(function(){
    var d = new Date();
    var n = d.getFullYear();

    var dia = String(d.getDate()).padStart(2, '0');
    var mes = String(d.getMonth() + 1).padStart(2, '0');

    var fecha = n + "-" + mes + "-" + dia;

    $("#fechaOT").val(fecha);
});



$(function() {
        

        var option = '';
        var cliente = '<?php echo $clientes?>';

        $.each(JSON.parse(cliente), function() {
            option = `<option value="${this.idCliente}">${this.nombre}</option>`;

            $('#cliente').append(option);
        });
    });

    $(function() {
        

        var option = '';
        var produc = '<?php echo $productos?>';

        $.each(JSON.parse(produc), function() {
            option = `<option value="${this.idProducto}">${this.nombre}</option>`;

            $('#clasificacionCmb').append(option);
        });
    });

    $(function() {
        

        var option = '';
        var user = '<?php echo $usuarios?>';

        $.each(JSON.parse(user), function() {
            option = `<option value="${this.codigoUsuario}">${this.nombre} ${this.apellido}</option>`;

            $('#respProduccion').append(option);
        });
    });

    $(function() {
        

        var option = '';
        var vendedor = '<?php echo $vendedores?>';

        $.each(JSON.parse(vendedor), function() {
            option = `<option value="${this.idVendedor}">${this.nombre}</option>`;

            $('#vendedor').append(option);
        });
    });



</script>

<script type="text/javascript">
	$(document).ready(function(){
		
        $('#unidadMedida').val("");

		$('#clasificacionCmb').change(function(){
            recargarLista();
            $('#unidadMedida').val("");
            $("#medi").hide(1000);
                $("#col").hide(1000);
                $("#aca").hide(1000);
            
        });
        

        $("#cantidad").keyup(function(){
            var can = $(this).val();
            var precio = $("#precioU").val();

            var total = can * precio;

            $("#precioTo").val(total.toFixed(2));
        });

        $("#calcIva").click(function(){
    	var precio = $("#precioTo").val();
      
      var iva = precio * 0.13;
      
      var total = parseFloat(precio) + parseFloat(iva);
      
      $("#precio").val(total.toFixed(2));
    });
	});
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=productoFinalGr",
			data:"idPro=" + $('#clasificacionCmb').val(),
			success:function(r){
                $('#proFinalCmb').html(r);
                $("#producs").show(1000);
               
			}
		});
	}
</script>


<script type="text/javascript">
	$(document).ready(function(){
	
		$('#proFinalCmb').change(function(){
			recargarLista1();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista1(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=unidadMedida",
			data:"idPro=" + $('#proFinalCmb option:selected').val(),
			success:function(r){
                $('#unidadMedida').val(r);
                $("#medi").show(1000);
                $("#col").show(1000);
                $("#aca").show(1000);
			}
		});
	}
</script>


<script type="text/javascript">
	$(document).ready(function(){
		

		$('#proFinalCmb').change(function(){
            recargarLista2();
            recargarLista3();
            $('#unidadMedida').val("");
		});
	})
</script>
<script type="text/javascript">
	function recargarLista2(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=acabado",
			data:"idPro=" + $('#proFinalCmb option:selected').val(),
			success:function(r){
                $('#acabadoCmb').html(r);
                $("#verDetalle").show();
			}
		});
	}
</script>



<script type="text/javascript">
	function recargarLista3(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=color",
			data:"idPro=" + $('#proFinalCmb option:selected').val(),
			success:function(r){
				$('#colorCmb').html(r);
			}
		});
    }
    


    $("#guardarOT").click(function(){
        alertify.confirm("¿Desea guardar la Orden de Trabajo?",
            function(){

                const form = $('#frmOrden');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=OTController&2=guardarOTIP',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        app.guardarDetalleOT();
                        swal({
                            title: 'OT registrada',
                            text: 'Guardado con éxito',
                            type: 'success',
                            
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                            
                                    location.reload();
                              window.open('?1=OTController&2=imprimirFacturaIPP','_blank');
                                return false;
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


    $("#agregarOT").click(function(){
        $("#list").show(1000);
            var producto ="Clasificación: "+ $("#proFinalCmb option:selected").text() + "\nColor: "+ $("#colorCmb option:selected").text()+ "\nAcabado: " + $("#acabadoCmb option:selected").text();
            var cantidad = $("#cantidad").val();
            var desc = $("#descripciones").val();
            var precio = $("#precio").val();
            var precioSin = $("#precioTo").val();
            var color= $("#colorCmb option:selected").val();
            var idPro =$("#proFinalCmb option:selected").val();
            var acabado = $("#acabadoCmb option:selected").val();

            var tip = "";
            var tipoV = $("#tipoVenta option:selected").val();

            if( $('#tiro').prop('checked')  &&  $('#retiro').prop('checked') ){
                var tip= "Tiro y Retiro";
            }

           else  if($('#retiro').prop('checked')){
                var tip= "Retiro";
            }

           else if($('#tiro').prop('checked')){
                var tip= "Tiro";
            }
            

            app.listado.push({
                productoRe: producto,
                cantidadRe:cantidad,
                descriRe:desc,
                precioRe:precio,
                idProducto : idPro,
                idColor: color,
                idAcabado : acabado,
                tipoRe:tip,
                tipoVentaRe:tipoV,
                precioReSin:precioSin,
            }),

        
        $("#cantidad").val('');       
        $("#descripciones").val('');
        $("#precio").val('');
        $("#precioTo").val('');
        $("input:checkbox[name=tiro]").prop("checked", false);
        $("input:checkbox[name=retiro]").prop("checked", false);
    });
</script>




