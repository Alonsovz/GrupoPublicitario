<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            <a href="?1=RequisicionController&2=rechazadasGF" class="ui gray button" id="gr" style="color:black; font-weight:bold;width:20%;font-size:12px;">
                    Gran Formato</a>

                    <a href="?1=RequisicionController&2=rechazadasIP" class="ui black button" id="imp" style="font-weight:bold;width:24%;font-size:12px;">Impresión Digital</a>

                    <a href="?1=RequisicionController&2=rechazadasP" class="ui red button" id="pro" style="font-weight:bold;width:27%;font-size:12px;">Promocionales</a>
                    <a href="?1=RequisicionController&2=gastosRechazados" class="ui blue button" id="gast" style="font-weight:bold;width:20%;font-size:12px;">Gastos de Oficina</a>
                    <br><br>
            <font color="black" size="5px">
            <i class="user icon"></i> <i class="list icon"></i>
            Requisición de productos de  Impresión digital rechazadas</font><font color="black" size="20px">.</font>
            </div>
            
            <div class="row">
            <div class="sixteen wide column">
                <table id="dtPenPagoGF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #BDBDBD; color:black;">N°</th>
                            <th style="background-color: #BDBDBD; color:black;">Fecha de Req</th>
                            <th style="background-color: #BDBDBD; color:black;">Responsable</th>  
                            <th style="background-color: #BDBDBD; color:black;">Tipo Compra</th> 
                            <th style="background-color: #BDBDBD; color:black;">Proveedor</th>
                            <th style="background-color: #BDBDBD; color:black;">Tipo Doc</th>
                            <th style="background-color: #BDBDBD; color:black;">Fecha Entrega</th>
                            <th style="background-color: #BDBDBD; color:black;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<div class="ui fullscreen modal" id="modalDetalles">
    <div class="header">
    Detalles de solicitud de requisición
    </div>
    
    
    <div class="scrolling content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
    <br>
        <form class="ui form" style="font-size:16px;" id="frmOrdenRequisicion" method="POST" enctype="multipart/form-data">
            <div class="field">
                <div class="fields">
                    <div class="four wide field">
                        <label><i class="calendar icon"></i>Fecha de la Requisición:</label>
                        <input type="text" name="fechaRe" id="fechaRe" readonly>
                        <input type="hidden" id="idRequisicion" name="idRequisicion">
                    </div>

                    <div class="four wide field">
                        <label><i class="user icon"></i>Responsable:</label>
                        <input type="text" name="responsable" id="responsable"  readonly>
                    </div>

                    <div class="four wide field">
                        <label><i class="list icon"></i>Tipo de compra:</label>
                        <input type="text" name="tipoCompra" id="tipoCompra"  readonly>
                        
                    </div>

                    <div class="four wide field">
                        <label><i class="user icon"></i><i class="truck icon"></i>Proveedor:</label>
                        <input type="text" name="proveedor" id="proveedor"  readonly>
                        
                    </div>

                    <div class="four wide field">
                            <label><i class="cart arrow down  icon"></i>Tipo de documento:</label>
                            <input type="text" name="tipoDocumento" id="tipoDocumento"  readonly>
                  
                            </div>

                            <div class="four wide field">
                            <label><i class="dollar icon"></i>Condición de crédito:</label>
                             <input type="text" name="condicionCredito" id="condicionCredito" readonly>
                  
                            </div>

                            <div class="four wide field">
                                <label><i class="calendar icon"></i>Fecha de entrega</label>
                                <input type="text" name="fechaEntrega" id="fechaEntrega">
                            </div>

                </div>
            </div>

            <div class="field">
                <div class="fields">
                
                    <div class="sixteen wide field">
                    <hr><br>
                    <a style="color:black;font-size:22px;font-weight:bold;text-align:center;">Detalles de requisición</a>
                    <br><br><hr><br>
                    <div id="detalles"></div>
                    </div>
                </div>
            </div>

    </form> 
    </div>
    <div class="actions">
    
    <button class="ui black deny button">Cancelar</button>
    </div>
</div>



</div>

<script src="./res/tablas/tablaRechazadasIP.js"></script>
<script>
$(document).ready(function(){
    $("#imp").removeClass("ui black button");
    $("#imp").addClass("ui black basic button");;
    });

   
    </script>
