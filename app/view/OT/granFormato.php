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
            <input type="text" name="correlativo" id="correlativo" value="<?php echo "OTGR00".$id; ?>" readonly>

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

<div class="ui divider"></div><br>

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
    </div>

    <div class="ui divider"></div><br>

    <div class="field">
        <div class="fields">

        <div class="two wide field">
            <label><i class="user icon"></i>Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad">
            
            </div>

            


            <div class="two wide field">
            <label><i class="arrows alternate vertical icon"></i>Altura:</label>
            <input type="text" name="altura" id="altura">
            </div>

            <div class="two wide field">
            <label><i class="arrows alternate horizontal icon"></i>Base:</label>
            <input type="text" name="base" id="base">
            </div>

            <div class="three wide field">
            <label><i class="arrows alternate icon"></i>MTS 2 Imp:</label>
            <input type="text" name="cuadrosImp" id="cuadrosImp">
            </div>

            

            <div class="seven wide field">
            <label><i class="arrows alternate icon"></i>Ubicación:</label>
            <input type="checkbox" name="ubicacion" value="Arriba"> Arriba &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Abajo"> Abajo &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Izquierda"> Izquierda &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Centro"> Centro &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Derecha"> Derecha &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Alrrededor"> Alrrededor &nbsp;&nbsp;&nbsp;
            </div>


        </div>
    </div>

    <div class="field">
        <div class="fields">
            <div class="three wide field">
            <label><i class="arrows alternate horizontal icon"></i>Ancho:</label>
            <input type="text" name="ancho" id="ancho">
            </div>

            <div class="three wide field">
            <label><i class="arrows alternate icon"></i>Longitud:</label>
            <input type="text" name="longitud" id="longitud">
            </div>

            <div class="three wide field">
            <label><i class="arrows alternate horizontal icon"></i>Ancho de material:</label>
            <input type="text" name="anchoMaterial" id="anchoMaterial">
            </div>

            <div class="three wide field">
            <label><i class="folder icon"></i>Copias:</label>
            <input type="text" name="copias" id="copias">
            </div>

            <div class="three wide field">
            <label><i class="list icon"></i>MTS2:</label>
            <input type="text" name="mts2" id="mts2">
            </div>

            <div class="three wide field">
            <label><i class="trash icon"></i>Desperdicio:</label>
            <input type="text" name="desperdicio" id="desperdicio">
            </div>
        </div>
        </div>

    <div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">

        <div class="six wide field">
            <label><i class="pencil icon"></i>Descripciones Adicionales:</label>
            <textarea rows="3" id="descripciones" name="descripciones"></textarea>
            
            </div>

            <div class="three wide field">
            <label><i class="dollar icon"></i>Precio:</label>
            <input type="text" name="precio" id="precio">
            
            </div>

            <div class="seven wide field">
            <label style="color:#F3F3F1"><i class="dollar icon"></i>Precio:</label>
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
                                        <th style="background-color: black; color:white;width:7%;"><i class="podcast icon"></i>Cantidad</th>
                                        <th style="background-color: black; color:white;width:20%;"><i class="arrows alternate icon"></i>Detalles Generales</th>
                                        <th style="background-color: black; color:white;"><i class="arrows alternate icon"></i>Def. Medida</th>
                                        <th style="background-color: black; color:white;"><i class="arrows alternate icon"></i>Imp + Desperdicio</th>
                                        <th style="background-color: black; color:white;"><i class="pencil icon"></i>Descipciones</th>
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
                                    <input v-model="lista.ubicRe" name="ubicRe" id="ubicRe" type="hidden" readonly>
                                    </td>
                                    <td>  
                                    <textarea rows="3" v-model="lista.defMedidas" name="defMedidas" id="defMedidas" readonly></textarea>
                                    <input v-model="lista.anchoRe" name="anchoRe" id="anchoRe" type="hidden" readonly>
                                    <input v-model="lista.longitudRe" name="longitudRe" id="longitudRe" type="hidden" readonly>
                                    <input v-model="lista.anchoMatRe" name="anchoMatRe" id="anchoMatRe" type="hidden" readonly>
                                    </td>
                                    <td>  
                                    <textarea rows="3" v-model="lista.impDesper" name="impDesper" id="impDesper" readonly></textarea>

                                    <input v-model="lista.copiasRe" name="copiasRe" id="copiasRe" type="hidden" readonly>
                                    <input v-model="lista.mtsDes" name="mtsDes" id="mtsDes" type="hidden" readonly>
                                    <input v-model="lista.despRe" name="despRe" id="despRe" type="hidden" readonly>
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
                copiasRe:'',
                mtsDes:'',
                despRe:'',
                ubicRe:'',
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
</script>
<script type="text/javascript">
	function recargarLista1(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=unidadMedida",
			data:"idPro=" + $('#proFinalCmb option:selected').text(),
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
			data:"idPro=" + $('#proFinalCmb option:selected').text(),
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
			data:"idPro=" + $('#proFinalCmb option:selected').text(),
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

            $("#cuadrosImp").val(totalMetros);
    });

    $("#agregarOT").click(function(){
        $("#list").show(1000);
            var producto ="Clasificación: "+ $("#proFinalCmb option:selected").text() + "\nColor: "+ $("#colorCmb option:selected").text()+ "\nAcabado: " + $("#acabadoCmb option:selected").text();
            var cantidad = $("#cantidad").val();
            var desc = $("#descripciones").val();
            var precio = $("#precio").val();
            var color= $("#colorCmb option:selected").val();
            var idPro =$("#proFinalCmb option:selected").val();
            var acabado = $("#acabadoCmb option:selected").val();
            var detallesPro1 = "Altura: "+ $("#altura").val() + "\nBase: "+ $("#base").val()+ "\nMT2 impresión: " + $("#cuadrosImp").val()+ "\nUbicación: " + $("input:checkbox[name=ubicacion]:checked").val();
            var defMed = "Ancho: "+ $("#ancho").val() + "\nLongitud: "+ $("#longitud").val()+ "\nAncho Material: " + $("#anchoMaterial").val();
            var impD = "Copias: "+ $("#copias").val() + "\nMTS2: "+ $("#mts2").val()+ "\nDesperdicio: " + $("#desperdicio").val();
            var altu = $("#altura").val();
            var bas = $("#base").val();
            var cuadrosIm = $("#cuadrosImp").val();
            var anch = $("#ancho").val();
            var long = $("#longitud").val();
            var anchoM = $("#anchoMaterial").val();
            var cop = $("#copias").val();
            var mt = $("#mts2").val();
            var des = $("#desperdicio").val();
            var ubic =$("input:checkbox[name=ubicacion]:checked").val();

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
            copiasRe:cop,
             mtsDes:mt,
            despRe:des,
            ubicRe:ubic,
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


