
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

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated green labeled icon button" id="btnListaGastos">
                    <i class="list icon"></i>
                    Lista de Gastos
                </button>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <div class="ui divider"></div>
            </div>
        </div>

</div>

<br>
<div class="content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
    <form class="ui form" style="font-size:16px;margin-left:20px;margin-right:20px;" id="frmGasto" method="POST" enctype="multipart/form-data">
        <div class="field">
            <div class="fields">
                <div class="six wide field">
                
                <label><i class="pencil icon"></i> Gasto: </label>
                <select id="gastosCmb" name="gastosCmb" class="ui search dropdown">
                <option value="seleccione" set selected>Seleccione una opción</option>
                </select>
                </div>

                <div class="six wide field">
                        <label><i class="pencil icon"></i>Descripción: </label>
                        <textarea rows="3" name="descripcion" id="descripcion" placeholder="Descripciones adicionales"></textarea>
                </div>

                <div class="six wide field">
                        <label><i class="calendar icon"></i>Fecha: </label>
                        <input type="date" name="fecha" id="fecha" >
                </div>

                <div class="six wide field">
                        <label><i class="dollar icon"></i>Precio: </label>
                        <input type="text" name="precio" id="precio" placeholder="Precio">
                </div>

                
            </div>
            
        </div>

        <div class="field">
            <div class="fields">
                <div class="sixteen wide field">
                <a class="ui right floated blue labeled icon button" id="btnGuardar">
                    <i class="save icon"></i>
                   Solicitar gasto
                </a>
                </div>
            </div>
        </div>
        
    </form>
</div>

<div class="ui modal" id="modalListado">
<div class="header" style="font-size:18px; text-align:center; background-color:#110991;font-weight:bold; color:white;">
<i class="list icon"></i> Lista de gastos de oficina GP 
</div>
<div class="scrolling content" style="background-color:#EBEAE8;">
<form class="ui form">
<div class="field">
    <div class="fields">
        <div class="eight wide field">
            <div id="detallesGastos">
            </div>
        </div>
        <div class="eight wide field">
            <a class="ui blue button" id="btnNuevoG"><i class="plus icon"></i> Nuevo Gasto</a>
            <div id="newGasto" style="display:none;">
            <br>
            <label style="font-size:17px; font-weight:bold;"><i class="list icon"></i> Nombre:</label>
            <input type="text" id="nuGasto" name="nuGasto" placeholder="Nombre del gasto">
            <br><br>
            <a class="ui yellow button" id="guardarGasto"><i class="save icon"></i>Guardar</a>
            </div>

        </div>
    </div>
</div>
</form>

</div>

<div class="actions">
<button class="ui black deny button" id="btnListoC">Listo</button>
</div>

</div>
</div>

<script>

$(document).ready(function(){
    $("#gastosOf").removeClass("ui blue button");
    $("#gastosOf").addClass("ui blue basic button");
    $('#precio').mask("###0.00", {reverse: true});
    $("#btnNuevoG").click(function(){
    $("#newGasto").show(1000);
});

$("#btnListoC").click(function(){
   location.reload();
});

$("#guardarGasto").click(function(){
    var gasto= $("#nuGasto").val();

                 $.ajax({
                    type: 'POST',
                    data: {
    
                        gasto : gasto,
                        idClas:1,
                    },
                    url: '?1=RequisicionController&2=guardarGasto',
                    success: function (r) {
                       
                        if (r == 1) {
                            swal({
                             title: 'Gasto registrado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                   
                                    $('#detallesGastos').html('');
                                    $.ajax({
                                    type:"POST",
                                    url:"?1=Funciones&2=gastosOficina",
                                    data:{
                                        idCla:1
                                    },
                                success:function(r){
                                        $('#detallesGastos').html(r);
                                        $("#newGasto").hide(1000);
                                        $("#nuGasto").val('');
                                    }
                                });
                                }
                            });           
                        }
                        
                    }
                });
});





    $(function() {
        

        var option = '';
        var gasto = '<?php echo $gastos?>';

        $.each(JSON.parse(gasto), function() {
            option = `<option value="${this.idGasto}">${this.nombre}</option>`;

            $('#gastosCmb').append(option);
        });
    });

    });

    $("#btnListaGastos").click(function(){
       
        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=gastosOficina",
            data:{
                idCla:1
            },
        success:function(r){
				$('#detallesGastos').html(r);
			}
        });
        $('#modalListado').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');

    });


    var eliminarGasto=(ele)=>{
       
       var idGasto = $(ele).attr("id");
       var nombreGasto=$(ele).attr("nombre");

       alertify.confirm("¿Desea eliminar el gasto de  "+nombreGasto+" la lista?",
           function(){
            var gasto= $("#nuGasto").val();

                    $.ajax({
                    type: 'POST',
                    data: {

                        idGasto : idGasto,
                       
                    },
                    url: '?1=RequisicionController&2=quitarGasto',
                    success: function (r) {
                        
                        if (r == 1) {
                            swal({
                                title: 'Gasto eliminado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                    
                                    $('#detallesGastos').html('');
                                    $.ajax({
                                    type:"POST",
                                    url:"?1=Funciones&2=gastosOficina",
                                    data:{
                                        idCla:1
                                    },
                                success:function(r){
                                        $('#detallesGastos').html(r);
                                       
                                    }
                                });
                                }
                            });           
                        }
                        
                    }
                    });
           },
           function(){
              
               alertify.error('Cancelado');
               
           }); 
      
   }


   $('#btnGuardar').click(function() {
            ;
            alertify.confirm("¿Desea realizar la solicitud  para el gasto de oficina?",
        function(){
           
            const form = $('#frmGasto');

            const datosFormulario = new FormData(form[0]);
     
    
        $.ajax({
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            url: '?1=RequisicionController&2=guardarGastoReq',
            data: datosFormulario,
            success: function(r) {
                if(r == 1) {
                   
                    swal({
                        title: 'Solicitud enviada',
                        text: 'Movida a pendientes de aprobación',
                        type: 'success',
                        showConfirmButton: true,

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
            //$("#modalCalendar").modal('toggle');
            alertify.error('Cancelado');
            
        }); 
    
        });
</script>