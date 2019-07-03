<div id="app">
<div class="ui grid">
        <div class="row">
        <div class="titulo">
        <a href="?1=RequisicionController&2=pendAprobarGF" class="ui gray button" id="gr" style="color:black; font-weight:bold;">
                    Gran Formato</a>

                    <a href="?1=RequisicionController&2=pendAprobarIP" class="ui black button" id="imp">Impresión Digital</a>

                    <a href="?1=RequisicionController&2=pendAprobarP" class="ui red button" id="pro">Promocionales</a>
                    <a href="?1=RequisicionController&2=pendAprobarGastos" class="ui blue button" id="gast">Gastos de Oficina</a>
                    <br><br>
                <font color="black" size="5px">
                <i class="user icon"></i> <i class="list icon"></i>
                   Gastos de oficina pendientes de aprobación</font><font color="black" size="20px">.</font>
                </div>

                <div class="row">
            <div class="sixteen wide column">
                <table id="dtPenPagoGF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #110991; color:white;">N°</th>
                            <th style="background-color: #110991; color:white;">Gasto</th>
                            <th style="background-color: #110991; color:white;">Fecha</th>  
                            <th style="background-color: #110991; color:white;">Precio</th>
                            <th style="background-color: #110991; color:white;">Acciones</th> 
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="ui  modal" id="modalDetalles">
    <div class="header">
    Detalles de solicitud de gasto de oficina
    </div>
    
    
    <div class="scrolling content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
    <br>
        <form class="ui form" style="font-size:16px;" id="frmOrdenRequisicion" method="POST" enctype="multipart/form-data">
            <div class="field">
                <div class="fields">

                <div class="eight wide field">
                        <label><i class="list icon"></i>Gasto:</label>
                        <input type="text" name="gasto" id="gasto"  readonly>
                        
                    </div>

                    <div class="eight wide field">
                        <label><i class="user icon"></i>Descripción:</label>
                        <textarea rows="3" name="descripcion" id="descripcion"  readonly></textarea>
                    </div>

                    </div>
            </div>
            <div class="field">
                <div class="fields">
                    <div class="eight wide field">
                        <label><i class="calendar icon"></i>Fecha de la Requisición:</label>
                        <input type="text" name="fechaRe" id="fechaRe" readonly>
                        <input type="hidden" id="idRequisicion" name="idRequisicion">
                    </div>

                    <div class="eight wide field">
                        <label><i class="user icon"></i><i class="dollar icon"></i>Precio:</label>
                        <input type="text" name="precio" id="precio"  readonly>
                        
                    </div>

                    

                </div>
            </div>

            

    </form> 
    </div>
    <div class="actions">
    
    <?php if($_SESSION["descRol"] == 'Propietario') { ?>
    <button class="ui red button" id="btnAprobar">Aprobar</button>
    <button class="ui grey  button" id="btnRechazar">Rechazar</button>
    
    <?php } ?>
    
    <br><br>
    <hr>
    <br><br>
    <button class="ui black deny button">Cancelar</button>
    </div>
</div>

</div>
<script src="./res/tablas/tablaPenAproGastos.js"></script>
<script>
    $(document).ready(function(){
    $("#gast").removeClass("ui blue button");
    $("#gast").addClass("ui blue basic button");;
    });

    var detalles=(ele)=>{
       var id= $(ele).attr("id");
    
       $("#fechaRe").val($(ele).attr("fecha"));
       $("#gasto").val($(ele).attr("gasto"));
       $("#precio").val($(ele).attr("precio"));
       $("#descripcion").val($(ele).attr("descripcion"));
       $("#idRequisicion").val($(ele).attr("id"));

       
       $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    }

    $("#btnAprobar").click(function(){
        alertify.confirm("¿Desea aprobar la solicitud de gasto de oficina?",
            function(){
                var id = $("#idRequisicion").val();
            $.ajax({
			type:"POST",
			url:"?1=RequisicionController&2=aprobarGasto",
            data:{
                id:id
            },
        success:function(r){
            
                    if(r == 1) {
                        $('#modalDetalles').modal('hide');
                        swal({
                            title: 'Guardado',
                            text: 'Gasto aprobado',
                            type: 'success',
                            showConfirmButton: true
                        }).then((result) => {
                            $('#dtPenPagoGF').DataTable().ajax.reload();
                        }); 
                        
                        
                    } 
			}
        });

            },
            function(){
               
                alertify.error('Cancelado');
                
            }); 
    });


    $("#btnRechazar").click(function(){
        alertify.confirm("¿Desea rechazar la solicitud de gasto de oficina?",
            function(){
                var id = $("#idRequisicion").val();
            $.ajax({
			type:"POST",
			url:"?1=RequisicionController&2=rechazarGasto",
            data:{
                id:id
            },
        success:function(r){
            
                    if(r == 1) {
                        $('#modalDetalles').modal('hide');
                        swal({
                            title: 'Guardado',
                            text: 'Gasto rechazado',
                            type: 'warning',
                            showConfirmButton: true

                        }).then((result) => {
                            $('#dtPenPagoGF').DataTable().ajax.reload();
                        }); 
                        
                        
                    } 
			}
        });

            },
            function(){
               
                alertify.error('Cancelado');
                
            }); 
    });
    </script>