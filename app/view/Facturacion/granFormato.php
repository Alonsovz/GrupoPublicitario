<div id="app">
    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <a href="?1=FacturacionController&2=granFormato" class="ui gray button" id="gr" style="color:black; font-weight:bold;width:32%;">
                    Gran Formato</a>

                    <a href="?1=FacturacionController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;width:25%;">Impresión Digital</a>

                    <a href="?1=FacturacionController&2=promocionales" class="ui red button" id="pro" style="font-weight:bold;width:32%;">Promocionales</a>
                    <br><br>

                    <font color="#848484" size="5px">
                    <i class="calendar check outline icon"></i> <i class="dollar icon"></i>
                        Órdenes de Trabajo por facturar de Gran Formato </font><font color="black" size="20px">.</font>
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
    <form class="ui form">
            <label>N° de DOC:</label>
            <input type="text" name="nDoc" id="nDoc" placeholder="N° de DOC">
        </form>
    <center>
    <br><br>
    <input type="hidden" id="idOT">
    <div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">
    <button class="ui red button" id="facturaConsumidor">
    Factura consumidor Final
    </button>

    <button class="ui black button" id="creditoFiscal">
    Crédito Fiscal
    </button>

    <button class="ui gray button" id="notaCredito">
    Nota de crédito
    </button>

    <button class="ui green button" id="otro">
    <br>
    Otro
    <br>
    </button>

    </div>
    </center>
    </div>
    <div class="actions">
    <button class="ui blue deny button">
    Cancelar
    </button>
    </div>
</div>

</div>
<script src="./res/tablas/tablaFacturarGR.js"></script>
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
                        $('#frmVerDetalles input[name="correlativo"]').val(dat.correlativo);
                        $('#frmVerDetalles input[name="fechaOT"]').val(dat.fechaOT);
                        $('#frmVerDetalles input[name="fechaEOT"]').val(dat.fechaEntrega);
                        $('#frmVerDetalles input[name="responsable"]').val(dat.nombre);
                        $('#frmVerDetalles input[name="respProduccion"]').val(dat.respProduccion);
                        $('#frmVerDetalles input[name="vendedor"]').val(dat.vendedor);
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
    $("#gr").removeClass("ui gray button");
    $("#gr").addClass("ui gray basic button");
    });


    var detalles=(ele)=>{
    var id = $(ele).attr("id");
    $('#idDetalle').val($(ele).attr("id")); 
            $('#corr').text($(ele).attr("correlativo"));
          app.cargarDatos();

          $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesOTGR",
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


$("#facturaConsumidor").click(function(){
    var idOT=$('#idOT').val();
    var nDoc = $("#nDoc").val();
    $.ajax({
        
        type: 'POST',
        url: '?1=FacturacionController&2=facturaConsumidorGR',
        data: {idOT:idOT,
                nDoc:nDoc,
        },
        success: function(r) {
            if(r == 11) {
                $('#modalTipoFactura').modal('hide');
                $('#dtProduccionGR').DataTable().ajax.reload();
                swal({
                    title: 'Se imprimirá la factura consumidor final',
                    type: 'warning',
                    showConfirmButton: true,

                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: './app/view/Facturacion/facturaIP.php',
                            data: {
                                idOrden : idOT,
                            },
                            success: function(r) {
                        window.location.href="./app/view/Facturacion/facturaGR.php?idOrden="+idOT;
                            } 
                            
                        });
                        location.reload();
                    }
                }); 
                
            } 
        }
    });
});


$("#creditoFiscal").click(function(){
    var idOT=$('#idOT').val();
    var nDoc = $("#nDoc").val();
    $.ajax({
        
        type: 'POST',
        url: '?1=FacturacionController&2=CFFGR',
        data: {idOT:idOT,
                nDoc:nDoc,
        },
        success: function(r) {
            if(r == 11) {
                $('#modalTipoFactura').modal('hide');
                $('#dtProduccionGR').DataTable().ajax.reload();
                swal({
                    title: 'Se imprimirá el CFF',
                    type: 'warning',
                    showConfirmButton: true,

                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: './app/view/Facturacion/facturaIP.php',
                            data: {
                                idOrden : idOT,
                            },
                            success: function(r) {
                        window.location.href="./app/view/Facturacion/cffGR.php?idOrden="+idOT;
                            } 
                            
                        });
                    }
                }); 
                
            } 
        }
    });
});

$("#notaCredito").click(function(){
    var idOT=$('#idOT').val();
    var nDoc = $("#nDoc").val();

    $.ajax({
        
        type: 'POST',
        url: '?1=FacturacionController&2=notaCreGR',
        data: {idOT:idOT,
                nDoc:nDoc,
        },
        success: function(r) {
            if(r == 11) {
                $('#modalTipoFactura').modal('hide');
                $('#dtProduccionGR').DataTable().ajax.reload();
                swal({
                    title: 'Se imprimirá la nota de crédito',
                    type: 'warning',
                    showConfirmButton: true,

                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: './app/view/Facturacion/facturaIP.php',
                            data: {
                                idOrden : idOT,
                            },
                            success: function(r) {
                        window.location.href="./app/view/Facturacion/notaCreGR.php?idOrden="+idOT;
                            } 
                            
                        });
                    }
                }); 
                
            } 
        }
    });
});


$("#otro").click(function(){
    var idOT=$('#idOT').val();
    var nDoc = $("#nDoc").val();

    $.ajax({
        
        type: 'POST',
        url: '?1=FacturacionController&2=otroGR',
        data: {idOT:idOT,
                nDoc:nDoc,
        },
        success: function(r) {
            if(r == 11) {
                $('#modalTipoFactura').modal('hide');
                $('#dtProduccionGR').DataTable().ajax.reload();
                swal({
                    title: 'Se imprimirá el documento',
                    type: 'warning',
                    showConfirmButton: true,

                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: './app/view/Facturacion/facturaIP.php',
                            data: {
                                idOrden : idOT,
                            },
                            success: function(r) {
                        window.location.href="./app/view/Facturacion/cffGR.php?idOrden="+idOT;
                            } 
                            
                        });
                    }
                }); 
                
            } 
        }
    });
});
</script>