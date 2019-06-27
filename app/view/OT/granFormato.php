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
           <option value="Seleccione" set selected>Seleccione una opción</option>
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
            <label><i class="arrows alternate vertical icon"></i>Alto:</label>
            <input type="text" name="alto" id="alto">
            </div>

            <div class="two wide field">
            <label><i class="arrows alternate horizontal icon"></i>Ancho:</label>
            <input type="text" name="ancho" id="ancho">
            </div>

            <div class="three wide field">
            <label><i class="arrows alternate icon"></i>Cuadrados de Imp:</label>
            <input type="text" name="cuadrosImp" id="cuadrosImp" readonly>
            </div>

            

            <div class="seven wide field">
            <label><i class="arrows alternate icon"></i>Ubicación:</label>
            <input type="checkbox" name="ubicacion" value="Arriba"> Arriba &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Abajo"> Abajo &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Izquierda"> Izquierda &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Centro"> Centro &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="ubicacion" value="Derecha"> Derecha &nbsp;&nbsp;&nbsp;
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
            <a class=" ui right floated green labeled icon button" id="guardarOT"> <i class="save icon"></i>Guardar OT</a>
            
            </div>
        </div>
    </div>
</form>
</div>
</div>


<script>
    $(document).ready(function(){
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
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

            var alto = $("#alto").val();
            var ancho = $("#ancho").val();

            var metros = alto * ancho;

            var totalMetros = metros * cantidad;

            var unidad = $("#unidadMedida").val();

            $("#cuadrosImp").val(totalMetros + " " +unidad);
    });
</script>


