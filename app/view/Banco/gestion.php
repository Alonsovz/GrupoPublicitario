<br><div id="app">
        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <font color="#B40431" size="6px">
                <i class="building icon"></i> <i class="dollar icon"></i>
                    Banco </font><font color="black" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated red labeled icon button" id="btnModalRegistro">
                    <i class="plus icon"></i>
                    Agregar
                </button>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <div class="ui divider"></div>
            </div>
        </div>

        </div>

        <div class="row">
            <div class="sixteen wide column">
                <table id="dtBanco" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: black; color:white;">N°</th>
                            <th style="background-color: black; color:white;">Monto</th>
                            <th style="background-color: black; color:white;">Tramite</th>
                            <th style="background-color: black; color:white;">Fecha</th>
                            <th style="background-color: black; color:white;">Fecha</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

<div class="ui  tiny modal" id="modalAgregarTramite">

<div class="header" style="background-color:black; color:white;" >
<i class="building icon"></i><i class="dollar icon"></i><i class="plus icon"></i> Agregar nuevo trámite de banco
</div>



<div class="content" class="ui equal width form" style="background-color:#F2F2F2; color:black;">
<form class="ui form">
<div class="field">
<div class="fields">
<div class="eight wide field">
<label><i class="dollar icon"></i>Monto</label>
<input type="text" id="monto" placeholder="$$ monto">
</div>

<div class="eight wide field">
<label><i class="folder icon"></i>Tipo de trámite</label>
    <select class="ui dropdown" id="tipoTramite" name="tipoTramite">
                <option value="seleccione" set selected>Seleccione una forma de pago</option>
                <option value="Comision de cuenta por tarjeta de credito">Comisión de cuentas con tarjeta de credito</option>
                <option value="Retiro">Retiro</option>
                <option value="Remesa">Remesa</option>
    </select>
</div>


</div>
</div>
</form>
</div>
<div class="actions">
<button class="ui red deny button">Cancelar</button>
<button class="ui black button" id="guardar">Guardar</button>
</div>

</div>

</div>
<script src="./res/tablas/tablaBanco.js"></script>
<script>
$(document).ready(function(){

    $('#monto').mask("###0.00", {reverse: true});
});

$('#btnModalRegistro').click(function() {
$('#modalAgregarTramite').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');

});

$("#guardar").click(function(){
    
    var monto = $("#monto").val();
    var tipoDoc = $("#tipoTramite").val();

    
        
        $.ajax({
                
                type: 'POST',
                url: '?1=RequisicionController&2=bancoR',
                data: {
                    monto:monto,
                    tipoDoc:tipoDoc,
                },
                success: function(r) {
                    if(r == 1) {
                        $("#modalAgregarTramite").modal('hide');
                        swal({
                            title: 'Trámite realizado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            
                            showConfirmButton: true,
                            }).then((result) => {
                                if(result.value){
                                    $('#dtBanco').DataTable().ajax.reload();
                                }
                            });
                        
                    } 
                }
            
        });
    
    

});

</script>