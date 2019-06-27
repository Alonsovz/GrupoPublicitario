<div id="app">
    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <a href="?1=OTController&2=granFormatoEliminadas" class="ui gray button" id="gr" style="color:black; font-weight:bold;">
                    Gran Formato</a>

                    <a href="?1=OTController&2=impresionEliminadas" class="ui black button" id="imp">Impresión Digital</a>

                    <a href="?1=OTController&2=promocionalesEliminadas" class="ui red button" id="pro">Promocionales</a>
                    <br><br>

                    <font color="#848484" size="5px">
                    <i class="calendar check outline icon"></i> <i class="trash icon"></i>
                        Órdenes de Trabajo eliminadas de Gran Formato </font><font color="black" size="20px">.</font>
                    </div>
            </div>
    </div>
<br>
    <div class="row">
            <div class="sixteen wide column">
                <table id="dtProduccionGR" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        <th style="background-color: #BDBDBD; color:black;">N</th>
                            <th style="background-color: #BDBDBD; color:black;">Correlativo</th>
                            <th style="background-color: #BDBDBD; color:black;">Fecha OT</th>
                            <th style="background-color: #BDBDBD; color:black;">Fecha Entrega</th>
                            <th style="background-color: #BDBDBD; color:black;">Responsable</th>
                            <th style="background-color: #BDBDBD; color:black;">Cliente</th>
                            <th style="background-color: #BDBDBD; color:black;">Tipo Producto</th>
                            <th style="background-color: #BDBDBD; color:black;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

<div id="verDetalles" class="ui fullscreen modal">
<div class="header" style="background-color:#BDBDBD; color:black;">
Detalles de la OT : <a id="corr" style="background-color:#BDBDBD; color:red;"></a>
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
            <label><i class="user icon"></i>Responsable:</label>
            <input type="text" name="responsable" id="responsable"  readonly>
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
<br>
<div class="ui divider"></div>
<br>
<div class="field">
<div class="fields">
<div class="four wide field">
            <label><i class="chart bar icon"></i>Clasificación:</label>
            <input type="text" name="clasificacionCmb"  id="clasificacionCmb" readonly>
         
            </div>

            <div class="four wide field">
            <label> <i class="pencil icon"></i>Producto Final:</label>
            <input type="text"  name="proFinalCmb"  id="proFinalCmb" readonly>
            
            </div>

            <div class="four wide field">
            <label><i class="arrows alternate icon"></i>Unidad de Medidad:</label>
            <input type="text" name="unidadMedida" id="unidadMedida" readonly>
            </div>
            <div class="four wide field">
            <label><i class="chart pie icon"></i>Color:</label>
            <input type="text"  name="colorCmb" id="colorCmb" readonly>
            </div>

            <div class="four wide field">
            <label><i class="podcast icon"></i>Acabado Final:</label>
            <input type="text"  name="acabadoCmb" id="acabadoCmb" readonly>
            </div>
</div>
</div>

<br>
<div class="ui divider"></div>
<br>
<div class="field">
<div class="fields">
<div class="four wide field">
            <label><i class="user icon"></i>Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad" readonly>
            
            </div>

            
            <div class="four wide field">
            <label><i class="arrows alternate vertical icon"></i>Alto:</label>
            <input type="text" name="alto" id="alto" readonly>
            </div>

            <div class="four wide field">
            <label><i class="arrows alternate horizontal icon"></i>Ancho:</label>
            <input type="text" name="ancho" id="ancho" readonly>
            </div>

            <div class="four wide field">
            <label><i class="arrows alternate icon"></i>Cuadrados de Imp:</label>
            <input type="text" name="cuadrosImp" id="cuadrosImp" readonly>
            </div>

            

            <div class="four wide field">
            <label><i class="arrows alternate icon"></i>Ubicación:</label>
            <input type="text" name="ubicacion" id="ubicacion" readonly>
    
            </div>
</div>
</div>


<br>
<div class="ui divider"></div>
<br>
<div class="field">
<div class="fields">
<div class="eight wide field">
            <label><i class="pencil icon"></i>Descripciones Adicionales:</label>
            <textarea rows="2" id="descripciones" name="descripciones" readonly></textarea>
            
            </div>
<div class="eight wide field" style="background-color:#F9C4D5;">
            <label><i class="trash icon"></i>Razón de Eliminado:</label>
            <textarea rows="2" id="descripcionesEl" name="descripcionesEl" readonly></textarea>
            <br>
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
Finalizar la OT : <a id="co" style="background-color:#BDBDBD; color:red;"></a>
</div>
                <div class="content" style="text-align:center;">
                    <h3>¿Desea finalizar la Orden de Trabajo?</h3>
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
                        Finalizar
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
<script src="./res/tablas/tablaEliminadaGR.js"></script>
<script>

var app = new Vue({
        el: "#app",
        data: {
        },
        methods: {
            
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=ProduccionController&2=cargarDatosGR&id=" + id)
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
                        $('#frmVerDetalles input[name="clasificacionCmb"]').val(dat.producto);
                        $('#frmVerDetalles input[name="proFinalCmb"]').val(dat.productoFinal);
                        $('#frmVerDetalles input[name="colorCmb"]').val(dat.color);
                        $('#frmVerDetalles input[name="unidadMedida"]').val(dat.medida);
                        $('#frmVerDetalles input[name="acabadoCmb"]').val(dat.acabado);
                        $('#frmVerDetalles input[name="cantidad"]').val(dat.cantidad);
                        $('#frmVerDetalles input[name="alto"]').val(dat.alto);
                        $('#frmVerDetalles input[name="ancho"]').val(dat.ancho);
                        $('#frmVerDetalles input[name="cuadrosImp"]').val(dat.cuadrosImp);
                        $('#frmVerDetalles input[name="ubicacion"]').val(dat.ubicacion);
                        $('#frmVerDetalles textarea[name="descripciones"]').val(dat.descripciones);
                        $('#frmVerDetalles textarea[name="descripcionesEl"]').val(dat.descripcionesE);
                        
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
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
    });


var detalles=(ele)=>{
    $('#verDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalle').val($(ele).attr("id"));
            $('#corr').text($(ele).attr("correlativo"));
          app.cargarDatos();
            
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
              
                url: '?1=OTController&2=finalizarOrdenGR',
                data: {id:id,},
                success: function(r) {
                    if(r == 1) {
                        $("#modalFinalizar").modal('hide');
                        swal({
                            title: 'OT finalizada',
                            text: 'Movida a órdenes por cobrar',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                    $('#dtProduccionGR').DataTable().ajax.reload();
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
              
                url: '?1=OTController&2=eliminarOrdenGR',
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
                                    $('#dtProduccionGR').DataTable().ajax.reload();
                            }
                        }); 
                        
                    } 
                }
            
        });
});
</script>