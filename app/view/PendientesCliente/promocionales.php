<div id="app">
<div class="ui grid">
        <div class="row">
        <div class="titulo">
        <a href="?1=PenClientesController&2=granFormatoPendiente" class="ui gray button" id="gr" style="color:black; font-weight:bold;width:32%;">
                    Gran Formato</a>

                    <a href="?1=PenClientesController&2=impresionPendiente" class="ui black button" id="imp" style="font-weight:bold;width:25%;">Impresión Digital</a>

                    <a href="?1=PenClientesController&2=promocionalesPendiente" class="ui red button" id="pro" style="font-weight:bold;width:32%;">Promocionales</a>
                    <br><br>
                <font color="#B40431" size="5px">
                <i class="calendar check outline icon"></i> <i class="pencil icon"></i>
                    Órdenes de Trabajo de Productos Promocionales pendientesde aprobación del cliente </font><font color="black" size="20px">.</font>
                </div> 
        </div>

</div>
<div class="row">
            <div class="sixteen wide column">
                <table id="dtProduccionP" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        <th style="background-color: #B40431; color:white;">N</th>
                            <th style="background-color: #B40431; color:white;">Correlativo</th>
                            <th style="background-color: #B40431; color:white;">Fecha OT</th>
                            <th style="background-color: #B40431; color:white;">Fecha Entrega</th>
                            <th style="background-color: #B40431; color:white;">Responsable</th>
                            <th style="background-color: #B40431; color:white;">Cliente</th>
                            
                            <th style="background-color: #B40431; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="verDetalles" class="ui fullscreen modal">
<div class="header" style="background-color:#B40431; color:white;">
Detalles de la OT : <a id="corr" style="background-color:white; color:black;"></a>
</div>
<div class="scrolling content" style="background-color:#EBEAE8;">
<form id="frmVerDetalles" class="ui form">
<input type="hidden" id="idDetalle" name="idDetalle">

<div class="field">
<div class="fields">
<div class="three wide field">
            <label><i class="list icon"></i>Correlativo:</label>
            <input type="text" name="correlativo" id="correlativo" readonly>

            
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha de la OT:</label>
            <input type="text" name="fechaOT" id="fechaOT" readonly>
            </div>

            


            <div class="eight wide field">
            <label><i class="user icon"></i><i class="cart arrow down icon"></i>Cliente:</label>
            <input type="text" name="cliente" id="cliente" readonly>
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha de Entrega de OT:</label>
            <input type="text" name="fechaEOT" id="fechaEOT" readonly>
            </div>
</div>
</div>

<div class="field">
    <div class="fields">
    <div class="eight wide field">
            <label><i class="user icon"></i>Ingresó la orden:</label>
            <input type="text" name="responsable" id="responsable"  readonly>
            </div>

            <div class="eight wide field">
            <label><i class="user icon"></i>Vendió la orden:</label>
            <input type="text" name="vendedor" id="vendedor"  readonly>
            </div>

            <div class="eight wide field">
            <label><i class="user icon"></i>Encargado en produccción:</label>
            <input type="text" name="respProduccion" id="respProduccion"  readonly>
            </div>
    </div>
</div>
<br>
<div class="field">
                <div class="fields">
                
                    <div class="sixteen wide field">
                    <hr><br>
                    <a style="color:black;font-size:22px;font-weight:bold;text-align:center;">Detalles de la OT</a>
                    <br><br><hr><br>
                    <div id="detalles"></div>
                    </div>
                </div>
</div>




</form>

</div>
<div class="actions">
<button class="ui black deny button">Cerrar</button>
</div>
</div>


<div class="ui tiny modal" id="modalFinalizar">
<div class="header" style="background-color:#BDBDBD; color:black;">
Aprobar la OT : <a id="co" style="background-color:#BDBDBD; color:red;"></a>
</div>
                <div class="content" style="text-align:center;">
                    <h3>¿Desea aprobar la Orden de Trabajo?</h3>
                    <form action="" class="ui equal width form">
                        <div class="fields">
                            <div  class="field">
                                <input type="hidden" name="idFin" id="idFin">
                            </div>
                        </div>
                    </form>        
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right red button" id="btnFinalizar">
                    Aprobar
                    </button>
                </div>
</div>

<div class="ui tiny modal" id="modalEliminar">
<div class="header" style="background-color:#BDBDBD; color:black;">
Eliminat la OT : <a id="cor" style="background-color:#BDBDBD; color:red;"></a>
</div>
                <div class="content" style="text-align:center;background-color:#EBEAE8;">
                    <h3>¿Desea eliminar la Orden de Trabajo?</h3>
                    <div class="ui divider"></div>
                    <form action="" class="ui equal width form">
                        <div class="fields">
                            <div  class="field">
                                <input type="hidden" name="idEliminar" id="idEliminar">
                                <label style="font-size:17px;"><i class="pencil icon"></i> Observación:</label>
                                <textarea rows="3" name="descripcionesE" id="descripcionesE" placeholder="Razón de eliminado"></textarea>
                            </div>
                        </div>
                    </form>        
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right red button" id="btnEliminar">
                        Eliminar
                    </button>
                </div>
</div>
</div>
<script src="./res/tablas/tablaPenClientesP.js"></script>
<script>

var app = new Vue({
        el: "#app",
        data: {
        },
        methods: {
            
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=ProduccionController&2=cargarDatosP&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);
                       // this.campos_editar[0].val=dat.imagen;
                        $('#frmVerDetalles input[name="correlativo"]').val(dat.correlativo);
                        $('#frmVerDetalles input[name="fechaOT"]').val(dat.fechaOT);
                        $('#frmVerDetalles input[name="fechaEOT"]').val(dat.fechaEntrega);
                        $('#frmVerDetalles input[name="responsable"]').val(dat.nombre);
                        $('#frmVerDetalles input[name="cliente"]').val(dat.nombreC);
                        $('#frmVerDetalles input[name="respProduccion"]').val(dat.respProduccion);
                        $('#frmVerDetalles input[name="vendedor"]').val(dat.vendedor);
                        
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
        }
    });
</script>

<script>
    $(document).ready(function(){
    $("#pro").removeClass("ui red button");
    $("#pro").addClass("ui red basic button");;
    });

    var detalles=(ele)=>{
    var id = $(ele).attr("id");
    $('#idDetalle').val($(ele).attr("id")); 
            $('#corr').text($(ele).attr("correlativo"));
          app.cargarDatos();

          $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesOTP",
            data:{
                id:id
            },
        success:function(r){
				$('#detalles').html(r);
			}
        });
        $('#verDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                
}

var finalizar=(ele)=>{
    $('#modalFinalizar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idFin').val($(ele).attr("id"));
            $('#co').text($(ele).attr("correlativo"));
        
            
}

var eliminar=(ele)=>{
    $('#modalEliminar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(ele).attr("id"));
            $('#cor').text($(ele).attr("correlativo"));
        
            
}

$("#btnFinalizar").click(function(){
        var id=$("#idFin").val();
    $.ajax({
              
                url: '?1=OTController&2=aprobarOrdenP',
                data: {id:id,},
                success: function(r) {
                    if(r == 1) {
                        $("#modalFinalizar").modal('hide');
                        swal({
                            title: 'OT aprobada',
                            text: 'Movida a producción',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                    $('#dtProduccionP').DataTable().ajax.reload();
                            }
                        }); 
                        
                    } 
                }
            
        });
});

$("#btnEliminar").click(function(){
        var id=$("#idEliminar").val();
        var descripciones =$("#descripcionesE").val();
    $.ajax({
              
                url: '?1=OTController&2=eliminarOrdenP',
                data: {id:id,
                    descripciones:descripciones,
                },
                success: function(r) {
                    if(r == 1) {
                        $("#modalEliminar").modal('hide');
                        swal({
                            title: 'OT eliminada',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                    $('#dtProduccionP').DataTable().ajax.reload();
                            }
                        }); 
                        
                    } 
                }
            
        });
});
</script>