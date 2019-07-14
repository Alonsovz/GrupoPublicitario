<?php
  require_once './vendor/autoload.php';
  $mysqli = new mysqli('localhost','root','','grupopublicitario');
  $listado = $mysqli -> query ("select max(idOrden) as id from ordenTrabajoGR");

  $id="";
  while ($valores = mysqli_fetch_array($listado)) {

    $id =$valores["id"];
  }

  

 ?>

<div id="app">
    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <a href="?1=OTController&2=granFormato" class="ui gray button" id="gr" style="color:black; font-weight:bold;">
                    Gran Formato</a>

                    <a href="?1=OTController&2=impresion" class="ui black button" id="imp">Impresión Digital</a>

                    <a href="?1=OTController&2=promocionales" class="ui red button" id="pro">Promocionales</a>

                    
                    <br><br>

                    <font color="#848484" size="5px">
                    <i class="calendar check outline icon"></i> <i class="cart arrow down icon"></i>
                        Nueva Orden de Trabajo de Gran Formato </font><font color="black" size="20px">.</font>
                    </div>
            </div>
    </div>
    
<br>
<div class="content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
<br>
<form class="ui form" style="font-size:16px;margin-left:20px;margin-right:20px; " id="frmOrden"  method="POST" enctype="multipart/form-data">
    <div class="field">
        <div class="fields">

            <div class="three wide field">
            <label><i class="list icon"></i>Correlativo:</label>
            <input type="text" name="correlativo" id="correlativo" value="<?php echo "OTGF00".$id; ?>" readonly>

             <input type="hidden" id="idUser" name="idUser" value=<?php echo '"'.$_SESSION['codigoUsuario'].'"'; ?>>
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha de la OT:</label>
            <input type="date" name="fechaOT" id="fechaOT">
            </div>

            <div class="eight wide field">
            <label><i class="user icon"></i>Responsable:</label>
            <input type="text" name="responsable" id="responsable" value=<?php echo '"'.$_SESSION['nombre'].' '."".' ' .$_SESSION['apellido'].'"'; ?> readonly>
            </div>


            <div class="eight wide field">
            <label><i class="user icon"></i><i class="cart arrow down icon"></i>Cliente:</label>
            <select name="cliente" id="cliente" class="ui search dropdown">
            </select>
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha Entrega de la OT:</label>
            <input type="date" name="fechaEOT" id="fechaEOT">
            </div>

        </div>
    </div>

<div class="ui divider"></div>

    <div class="field">
        <div class="fields">

            <div class="three wide field">
            <label><i class="chart bar icon"></i>Clasificación:</label>
            <select name="clasificacionCmb"  id="clasificacionCmb" class="ui search dropdown">
           
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

            <div class="four wide field" id="aca" style="display:none;">
            <label><i class="podcast icon"></i>Acabado Final:</label>
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
            <input type="text" id="precioU" name="precioU" readonly>
        </div>

        <div class="six wide field" id="ex" style="display:none;">
            <label><i class="arrows alternate icon"></i>Existencia</label>
            <input type="text" id="existencia" name="existencia" readonly>
        </div>

        <div class="six wide field" id="precioDesDiv" style="display:none;">
            <label><i class="dollar icon"></i>Precio por desperdicio</label>
            <input type="text" id="precioDesp" name="precioDesp">
        </div>

        </div>
        </div>

    <div class="ui divider"></div><br>

    <div class="field">
        <div class="fields">

        <div class="two wide field" style="background-color:#C3F99E">
            <label><i class="user icon"></i>Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad">
            
            </div>

            
            <div class="two wide field" style="background-color:#C3F99E">
            <label><i class="arrows alternate horizontal icon"></i>Base:</label>
            <input type="text" name="base" id="base">
            </div>

            <div class="two wide field" style="background-color:#C3F99E">
            <label><i class="arrows alternate vertical icon"></i>Altura:</label>
            <input type="text" name="altura" id="altura">
            </div>

        
       

            <div class="three wide field" style="background-color:#B2BAF5">
            <label><i class="arrows alternate horizontal icon"></i>Ancho:</label>
            <input type="text" name="ancho" id="ancho">
            </div>

            <div class="three wide field" style="background-color:#B2BAF5">
            <label><i class="arrows alternate icon"></i>Longitud:</label>
            <input type="text" name="longitud" id="longitud">
            </div>

            <div class="three wide field" style="background-color:#B2BAF5">
            <label><i class="arrows alternate horizontal icon"></i>Ancho de material:</label>
            <input type="text" name="anchoMaterial" id="anchoMaterial">
            </div>

            <div class="three wide field" style="background-color:#F5D5B2">
            <label><i class="arrows alternate icon"></i>MTS 2 Imp:</label>
            <input type="text" name="cuadrosImp" id="cuadrosImp" readonly>
            </div>
        
            

            

            <div class="three wide field" style="background-color:#F99F9E">
            <label><i class="trash icon"></i>Desperdicio:</label>
            <input type="text" name="desperdicio" id="desperdicio" readonly>
            </div>

        </div>
    </div>
    <div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">
        

        <div class="three wide field" style="background-color:#E29EF9">
            <label><i class="arrows alternate icon"></i>Ojetes:</label>
            <input type="number" id="ojeteAr" name="ojeteAr" placeholder="Arriba">
        </div>
        <div class="three wide field" style="background-color:#E29EF9">
            <label><i class="arrows alternate icon"></i><br></label>
            <input type="number" id="ojeteAb" name="ojeteAb" placeholder="Abajo">
        </div>
        <div class="three wide field" style="background-color:#E29EF9">
            <label><i class="arrows alternate icon"></i><br></label>
            <input type="number" id="ojeteIz" name="ojeteIz" placeholder="Izquierda">
        </div>
        <div class="three wide field" style="background-color:#E29EF9">
            <label><i class="arrows alternate icon"></i><br></label>
            <input type="number" id="ojeteDe" name="ojeteDe" placeholder="Derecha">
        </div>

        <div class="three wide field">
            <label><i class="arrows alternate icon"></i>Troquel:</label>
            <input type="checkbox" name="troquel" value="Si" id="troquel"> Si
            
        </div>

        <div class="three wide field">
            <label><i class="arrows alternate icon"></i>Hacer Arte:</label>
            <input type="text" id="arte" name="arte" placeholder="Monto $$">
            
        </div>


        </div>
        </div>

    <div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">

        

        <div class="four wide field">
            <label><i class="pencil icon"></i>Descripciones Adicionales:</label>
            <textarea rows="3" id="descripciones" name="descripciones"></textarea>
            
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

            <div class="three wide field">
            <label><i class="dollar icon"></i>Total sugerido:</label>
            <input type="text" name="precioTo" id="precioTo">
            
            </div>

            <div class="three wide field">
            <label style=""><i class="dollar icon"></i>Precio a cobrar:</label>
            <input type="text" name="precioS" id="precio" >
            
            </div>

            <div class="three wide field">
            
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
                                        <th style="background-color: black; color:white;width:15%;"><i class="list icon"></i>Producto</th>
                                        <th style="background-color: black; color:white;width:7%;"><i class="podcast icon"></i>Cantidad</th>
                                        <th style="background-color: black; color:white;width:10%;"><i class="arrows alternate icon"></i>Detalles Generales</th>
                                        <th style="background-color: black; color:white;"><i class="arrows alternate icon"></i>Def. Medida</th>
                                        <th style="background-color: black; color:white;"><i class="arrows alternate icon"></i>Imp + Desperdicio</th>
                                        <th style="background-color: black; color:white;width:20%;"><i class="pencil icon"></i>Descipciones</th>
                                        <th style="background-color: black; color:white;width:10%;"><i class="dollar icon"></i>Tipo Venta</th>
                                        <th style="background-color: black; color:white;width:7%;"><i class="dollar icon"></i>Precio</th>
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
                                    <textarea rows="4" v-model="lista.detallesPro" name="detallesPro" id="detallesPro" readonly></textarea>

                                    <input v-model="lista.alturaRe" name="alturaRe" id="alturaRe" type="hidden" readonly>
                                    <input v-model="lista.baseRe" name="baseRe" id="baseRe" type="hidden" readonly>
                                    <input v-model="lista.cuadrosImpr" name="cuadrosImpr" id="cuadrosImpr" type="hidden" readonly>
                                    </td>
                                    <td>  
                                    <textarea rows="3" v-model="lista.defMedidas" name="defMedidas" id="defMedidas" readonly></textarea>
                                    <input v-model="lista.anchoRe" name="anchoRe" id="anchoRe" type="hidden" readonly>
                                    <input v-model="lista.longitudRe" name="longitudRe" id="longitudRe" type="hidden" readonly>
                                    <input v-model="lista.anchoMatRe" name="anchoMatRe" id="anchoMatRe" type="hidden" readonly>
                                    </td>
                                    <td>  
                                    <textarea rows="3" v-model="lista.impDesper" name="impDesper" id="impDesper" readonly></textarea>

                                    <input v-model="lista.mtsDes" name="mtsDes" id="mtsDes" type="hidden" readonly>
                                    <input v-model="lista.despRe" name="despRe" id="despRe" type="hidden" readonly>
                                    </td>
                                   

                                    <td>  
                                    <textarea rows="5"  v-model="lista.descriRe" name="descriRe" id="descriRe" readonly></textarea>
                                    </td>
                                    <td>  
                                    <textarea rows="3" class="requerido" v-model="lista.tipoVentaRe" name="tipoVentaRe" id="tipoVentaRe"
                                     readonly></textarea>
                                    </td>
                                    <td>  
                                    <input class="requerido" v-model="lista.precioRe" name="precioRe" id="precioRe" type="text"
                                     readonly>
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
                idProducto:'',
                idColor:'',
                idAcabado:'',
                impDesper:'',
                defMedidas:'',
                alturaRe:'',
                baseRe:'',
                cuadrosImpr:'',
                anchoMatRe:'',
                anchoRe:'',
                longitudRe:'',
                mtsDes:'',
                despRe:'',
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
                    url: '?1=OTController&2=guardarDetallesOT',
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
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
    app.eliminarDetalle(0);
    $('#base').mask("###0.00", {reverse: true});
    $('#altura').mask("###0.00", {reverse: true});
    $('#anchoMaterial').mask("###0.00", {reverse: true});
    $('#longitud').mask("###0.00", {reverse: true});
    $('#ancho').mask("###0.00", {reverse: true});
    $('#arte').mask("###0.00", {reverse: true});
    $('#precio').mask("###0.00", {reverse: true});
    });

    $("#ancho").keyup(function(){
        var ancho = $(this).val();

        $("#longitud").val($("#base").val());
    });

    $("#altura").keyup(function(){
        var altura = $(this).val();

        $("#longitud").val(altura);
    });

    $("#desperdicio").click(function(){
        
        var ancho1 = $("#anchoMaterial").val();

        var precioDes = $("#precioDesp").val();
        var cantidad = $("#cantidad").val();
        var mts2 = $("#cuadrosImp").val();

        var desperdicio = ancho1-mts2;

        var totalDinero = desperdicio * precioDes;


        $("#desperdicio").val(totalDinero.toFixed(2));

        
    });

    

    $("#precioTo").click(function(){
        var precioPorMetro = $("#precioU").val();
        var cantidad = $("#cantidad").val();
        var precioDes = $("#desperdicio").val();
        var ojeteAr = $("#ojeteAr").val();
        var ojeteAb = $("#ojeteAb").val();
        var ojeteIz = $("#ojeteIz").val();
        var ojeteDe = $("#ojeteDe").val();

        if($("#arte").val() == ""){
            var arte = 0.00;
        }else{
            var arte = $("#arte").val();
        }
       

        var totalOjetes= parseFloat(ojeteAr) + parseFloat(ojeteAb) + parseFloat(ojeteIz) + parseFloat(ojeteDe);

        var cobroOjetes = totalOjetes * 0.25;

        var totalDinero = parseFloat(precioPorMetro) + parseFloat(precioDes);
        var totalCobro = totalDinero * cantidad;

            if( $('#troquel').prop('checked') ) {
                var cobrar = parseFloat(totalCobro) + parseFloat(cobroOjetes) + 0.04 + parseFloat(arte);
            }else{
                var cobrar = parseFloat(totalCobro) + parseFloat(cobroOjetes) + parseFloat(arte);
            }

       

        $("#precioTo").val(cobrar.toFixed(2));
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
	})
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

    $("")
    

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
                $("#precS").show(1000);
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

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=precioDes",
			data:{
                idPro : idPro,
                idColor : idColor,
                idAcabado : idAcabado,
            },
			success:function(r){
                $('#precioDesp').val(r);
                $("#precioDesDiv").show(1000);
                
			}
		});
    });
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
                $("#verDetalle").show();
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
                url: '?1=OTController&2=guardarOTGR',
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
                               window.open('?1=OTController&2=ImprimirFacturaGR','_blank');
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


    $("#cuadrosImp").click(function(){
            var cantidad = $("#cantidad").val();

            var alto = $("#altura").val();
            var ancho = $("#base").val();

            var metros = alto * ancho;

            var totalMetros = metros * cantidad;

            var unidad = $("#unidadMedida").val();

            $("#cuadrosImp").val(totalMetros.toFixed(2));
    });

    $("#agregarOT").click(function(){
        $("#list").show(1000);
            var producto ="Clasificación: "+ $("#proFinalCmb option:selected").text() + "\nColor: "+ $("#colorCmb option:selected").text()+ "\nAcabado: " + $("#acabadoCmb option:selected").text();
            var cantidad = $("#cantidad").val();

            if( $('#troquel').prop('checked') ) {
                var troquel = "Si";
            }else{
                var troquel = "No";
            }

            if( $('#arte').val()== "" ) {
                var arte = "No";
            }else{
                var arte = "Si";
            }

            if($('#ojeteAr').val()== ""){
                var ojeteAr = "";
            }else{
                var ojeteAr = "Ojetes Ar: "+ $("#ojeteAr").val();
            }

            if($('#ojeteAb').val()== ""){
                var ojeteAb = "";
            }else{
                var ojeteAb = ", Ab: "+ $("#ojeteAb").val();
            }

            if($('#ojeteIz').val()== ""){
                var ojeteIz = "";
            }else{
                var ojeteIz = ", Izq: "+ $("#ojeteIz").val();
            }

            if($('#ojeteD').val()== ""){
                var ojeteD = "";
            }else{
                var ojeteD = ", Der: "+ $("#ojeteDe").val();
            }

            

            var desc = $("#descripciones").val() + "\nTroquel: "+ troquel+ ", Hacer Arte: "+ arte + ",\n"+ ojeteAr +" "+ ojeteAb +" "+ ojeteIz +" "+ ojeteD ;
            var precio = $("#precio").val();
            var color= $("#colorCmb option:selected").val();
            var idPro =$("#proFinalCmb option:selected").val();
            var acabado = $("#acabadoCmb option:selected").val();
            var detallesPro1 = "Altura: "+ $("#altura").val() + "\nBase: "+ $("#base").val()+ "\nMT2 impresión: " + $("#cuadrosImp").val();
            var defMed = "Ancho: "+ $("#ancho").val() + "\nLongitud: "+ $("#longitud").val()+ "\nAncho Material: " + $("#anchoMaterial").val();
            var altu = $("#altura").val();
            var bas = $("#base").val();
            var cuadrosIm = $("#cuadrosImp").val();
            var anch = $("#ancho").val();
            var long = $("#longitud").val();
            var anchoM = $("#anchoMaterial").val();
            var des = $("#desperdicio").val();
            var tipoV=$("#tipoVenta option:selected").val();

            var mtsDesp = parseFloat(anchoM) - parseFloat(cuadrosIm);
            var impD = "Desperdicio: $" + $("#desperdicio").val()+"\nMts2 de despercio: "+ mtsDesp;
           
            

           

        app.listado.push({
            productoRe: producto,
            cantidadRe:cantidad,
            detallesPro : detallesPro1,
            descriRe:desc,
            precioRe:precio,
            idProducto : idPro,
            idColor: color,
            idAcabado : acabado,
            defMedidas : defMed,
            impDesper:impD,
            alturaRe : altu,
            baseRe: bas,
            cuadrosImpr: cuadrosIm,
            anchoRe: anch,
            longitudRe:long,
            anchoMatRe:anchoM,
            despRe:des,
            mtsDes:mtsDesp,
            tipoVentaRe:tipoV,
        }),

        
        $("#cantidad").val('');       
        $("#descripciones").val('');
        $("#precio").val('');
        $("#altura").val('');
        $("#base").val('');
        $("#cuadrosImp").val('');
        $("#ancho").val('');
        $("#longitud").val('');
        $("#anchoMaterial").val('');
        $("#copias").val('');
        $("#mts2").val('');
        $("#desperdicio").val('');
        $("input:checkbox[name=ubicacion]").prop("checked", false);
    });


</script>


