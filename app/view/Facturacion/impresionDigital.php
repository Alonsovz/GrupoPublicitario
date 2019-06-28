<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <a href="?1=FacturacionController&2=granFormato" class="ui gray button" id="gr">Gran Formato</a>
            <a href="?1=FacturacionController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;">Impresión Digital</a>
            <a href="?1=FacturacionController&2=promocionales" class="ui red button" id="pro">Promocionales</a>
            <br><br>
            <font color="black" size="5px">
            <i class="calendar check outline icon"></i> <i class="dollar icon"></i>
            Órdenes de Trabajo por facturar de Impresión digital </font><font color="black" size="20px">.</font>
            </div>
        </div>
</div>

<div class="row">
            <div class="sixteen wide column">
                <table id="dtProduccionIP" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        <th style="background-color: black; color:white;">N</th>
                            <th style="background-color: black; color:white;">Correlativo</th>
                            <th style="background-color: black; color:white;">Fecha OT</th>
                            <th style="background-color: black; color:white;">Fecha Entrega</th>
                            <th style="background-color: black; color:white;">Responsable</th>
                            <th style="background-color: black; color:white;">Cliente</th>
                            <th style="background-color: black; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

 <div id="verDetalles" class="ui fullscreen modal">
<div class="header" style="background-color:black; color:white;">
Detalles de la OT : <a id="corr" style="background-color:black; color:red;"></a>
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

<div class="ui tiny modal" id="modalTipoFactura">
    <div class="header" style="background-color:#BDBDBD; color:black;">
    Tipo de Factura a imprimir para la orden: <a id="ordenCorr" style="background-color:#BDBDBD; color:red;"></a>
    </div>
    <div class="content">
    <center>
    <input type="hidden" id="idOT">
    <button class="ui red button" id="facturaConsumidor">
    Factura consumidor Final
    </button>

    <button class="ui black button" id="creditoFiscal">
    Crédito Fiscal
    </button>
    </center>
    </div>
    <div class="actions">
    <button class="ui blue deny button">
    Cancelar
    </button>
    </div>
</div>

</div>
<script src="./res/tablas/tablaFacturarIP.js"></script>
<script>

var app = new Vue({
        el: "#app",
        data: {
        },
        methods: {
            
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=ProduccionController&2=cargarDatosIP&id=" + id)
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
    $("#imp").removeClass("ui black button");
    $("#imp").addClass("ui black basic button");;
    });

    var detalles=(ele)=>{
    var id = $(ele).attr("id");
    $('#idDetalle').val($(ele).attr("id")); 
            $('#corr').text($(ele).attr("correlativo"));
          app.cargarDatos();

          $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesOTIP",
            data:{
                id:id
            },
        success:function(r){
				$('#detalles').html(r);
			}
        });
        $('#verDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                
}

var factura=(ele)=>{
   
   $('#idOT').val($(ele).attr("id"));
   $('#ordenCorr').text($(ele).attr("correlativo"));
   $('#modalTipoFactura').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
}
</script>