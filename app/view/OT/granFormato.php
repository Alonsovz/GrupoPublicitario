<?php
  require_once './vendor/autoload.php';
  $mysqli = new mysqli("localhost","root","","grupoPublicitario");
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
                    <a href="?1=OTController&2=granFormato" class="ui gray button" id="gr" style="color:black; font-weight:bold;width:32%;">
                    Gran Formato</a>

                    <a href="?1=OTController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;width:25%;">Impresión Digital</a>

                    <a href="?1=OTController&2=promocionales" class="ui red button" id="pro" style="font-weight:bold;width:32%;">Promocionales</a>

                    
                    <br><br>

                    <font color="#848484" size="5px">
                    <i class="calendar check outline icon"></i> <i class="cart arrow down icon"></i>
                        Nueva Orden de Trabajo de Gran Formato </font><font color="black" size="20px">.</font>
                    </div>
            </div>
    </div>
    
<br>
<div class="content" style="text-align:center; border: 1px solid black; background-color: #DADAD4;">
<br>
<form class="ui form" style="font-size:15px;margin-left:20px;margin-right:20px; " id="frmOrden"  method="POST" enctype="multipart/form-data">
    <div class="field">
        <div class="fields">

            <div class="two wide field">
            <label><i class="list icon"></i>Correlativo:</label>
            <input type="text" name="correlativo" id="correlativo" value="<?php echo "OTGF00".$id; ?>" readonly>

             <input type="hidden" id="idUser" name="idUser" value=<?php echo '"'.$_SESSION['codigoUsuario'].'"'; ?>>
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha de la OT:</label>
            <input type="date" name="fechaOT" id="fechaOT">
            </div>

            <div class="four wide field">
            <label><i class="user icon"></i>Responsable de ingresar OT:</label>
            <input type="text" name="responsable" id="responsable" value=<?php echo '"'.$_SESSION['nombre'].' '."".' ' .$_SESSION['apellido'].'"'; ?> readonly>
            </div>

            


            <div class="four wide field">
            <label><i class="user icon"></i><i class="cart arrow down icon"></i>Cliente:</label>
            <select name="cliente" id="cliente" class="ui search dropdown">
            </select>
            </div>

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha Entrega:</label>
            <input type="date" name="fechaEOT" id="fechaEOT">
            </div>

        </div>
    </div>

<div class="ui divider"></div>

    <div class="field">
        <div class="fields">

            <div class="four wide field">
            <label><i class="chart bar icon"></i>Clasificación:</label>
            <select name="clasificacionCmb"  id="clasificacionCmb" class="ui search dropdown">
           
            </select>
            </div>

            <div class="four wide field" id="producs" style="display:none;">
            <label> <i class="pencil icon"></i>Producto Final:</label>
            <select name="proFinalCmb"  id="proFinalCmb" class="ui search dropdown">
              
           
            </select>
            
            </div>

            <div class="two wide field" id="medi" style="display:none;">
            <label><i class="arrows alternate icon"></i>Medida:</label>
            <input type="text" name="unidadMedida" id="unidadMedida" readonly>
            
            </div>

            <div class="three wide field" id="aca" style="display:none;">
            <label><i class="podcast icon"></i>Acabado:</label>
            <select name="acabadoCmb" id="acabadoCmb" class="ui search dropdown">
            
            </select>
            </div>

            <div class="three wide field" id="col" style="display:none;">
            <label><i class="chart pie icon"></i>Color:</label>
            <select name="colorCmb" id="colorCmb" class="ui search dropdown">
            
            </select>
            </div>

            
              

        </div>
    </div>


    <div class="ui divider"></div>

    <div class="field" style="display:none"  id="verDetalle">
        <div class="fields" >
        <div class="four wide field">
            <label><br></label>
            <a class="ui blue button" id="btnDetalle">Detalle del producto</a>
        </div>

      

        <div class="six wide field" id="prec" style="display:none;">
            <label><i class="dollar icon"></i>Precio sugerido:</label>
            <input type="text" id="precioU" name="precioU" >
        </div>

        <div class="six wide field" id="ex" style="display:none;">
            <label><i class="arrows alternate icon"></i>Existencia</label>
            <input type="text" id="existencia" name="existencia" readonly>
        </div>

        <div class="six wide field" id="precioDesDiv" style="display:none;">
            <label><i class="dollar icon"></i>Precio por desperdicio</label>
            <input type="text" id="precioDesp" name="precioDesp">
        </div>

        </div>
        </div>

    <div class="ui divider"></div><br>
    <div id="datos" style="display:none">
    <div class="field">
        <div class="fields">

        <div class="two wide field" style="background-color:#F9FCBB">
            <label><i class="pencil icon"></i>Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
            
            </div>

            
            <div class="two wide field" style="background-color:#F9FCBB">
            <label><i class="arrows alternate horizontal icon"></i>Base:</label>
            <input type="text" name="base" id="base" placeholder="Base">
            </div>

            <div class="two wide field" style="background-color:#F9FCBB">
            <label><i class="arrows alternate vertical icon"></i>Altura:</label>
            <input type="text" name="altura" id="altura" placeholder="Altura">
            </div>

        
       

            <div class="three wide field" style="background-color:#84DFD4">
            <label><i class="arrows alternate horizontal icon"></i>Ancho:</label>
            <input type="text" name="ancho" id="ancho" placeholder="Ancho">
            </div>

            <div class="three wide field" style="background-color:#84DFD4">
            <label><i class="arrows alternate icon"></i>Longitud:</label>
            <input type="text" name="longitud" id="longitud" placeholder="Longitud">
            </div>

            <div class="three wide field" style="background-color:#84DFD4">
            <label><i class="arrows alternate horizontal icon"></i>Ancho de material:</label>
            <input type="text" name="anchoMaterial" id="anchoMaterial" placeholder="Ancho Material">
            </div>

            <div class="three wide field" style="background-color:#F2F768">
            <label><i class="file icon"></i>Copias:</label>
            <input type="text" name="copias" id="copias" placeholder="Copias">
            </div>

            <div class="three wide field" style="background-color:#C3F9B8">
            <label><i class="arrows alternate icon"></i>MTS 2 Imp:</label>
            <input type="text" name="cuadrosImp" id="cuadrosImp" readonly placeholder="Mt2 Impresión">
            </div>
        
            

            

            <div class="three wide field" style="background-color:#D7EAFC">
            <label><i class="trash icon"></i>Desperdicio:</label>
            <input type="text" name="desperdicio" id="desperdicio" placeholder="Desperdicio">
            </div>

        </div>
    </div>
    <div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">
        
        <div class="three wide field" style="background-color:#070244;">
        <br>
            <label style=" color:white;"><i class="circle outline icon"></i> Ojetes</label>
            
        </div>
        <div class="three wide field" style="background-color:#A09AEA">
            <label>Arriba</label>
            <input type="number" id="ojeteAr" name="ojeteAr" placeholder="Arriba" value="0">
        </div>
        <div class="three wide field" style="background-color:#A09AEA">
            <label>Abajo<br></label>
            <input type="number" id="ojeteAb" name="ojeteAb" placeholder="Abajo" value="0">
        </div>
        <div class="three wide field" style="background-color:#A09AEA">
            <label>Izquierda<br></label>
            <input type="number" id="ojeteIz" name="ojeteIz" placeholder="Izquierda" value="0">
        </div>
        <div class="three wide field" style="background-color:#A09AEA">
            <label>Derecha<br></label>
            <input type="number" id="ojeteDe" name="ojeteDe" placeholder="Derecha" value="0">
        </div>

        <div class="three wide field">
            <label><i class="arrows alternate icon"></i>Troquel:</label>
            <input type="checkbox" name="troquel" value="Si" id="troquel"> Si
            
        </div>

        <div class="three wide field">
            <label><i class="arrows alternate icon"></i>Hacer Arte:</label>
            <input type="text" id="arte" name="arte" placeholder="Monto $$">
            
        </div>


        </div>
        </div>
        <div class="ui divider"></div><br>
        <div class="field">
        <div class="fields">
        <div class="three wide field" style="background-color:#7514A0;">
        
            <label style=" color:white;"><i class="arrows alternate icon"></i>Varillas, tubos y fundas</label>
            <select name="tipoTubo" id="tipoTubo" class="ui dropdown">
                <option value="7" set selected>Seleccione una opción</option>
                <option value="1">Varilla</option>
                <option value="2">Tubo metálico</option>
                <option value="3">Tubo PVC</option>
                <option value="4">Funda para varilla</option>
                <option value="5">Funda para tubo</option>
            </select>
            <br><br>
        </div>
        <div class="three wide field" style="background-color:#E29EF9">
            <label>Arriba</label>
            <input type="checkbox" id="varillaAr" name="varillaAr" value="arriba">
        </div>
        <div class="three wide field" style="background-color:#E29EF9">
            <label>Abajo<br></label>
            <input type="checkbox" id="varillaAb" name="varillaAb"  value="abajo">
        </div>
        <div class="four wide field" style="background-color:#E29EF9">
            <label>Izquierda y derecha<br></label>
            <input type="checkbox" id="varillaIzD" name="varillaIzD"  value="izquierda">
        </div>
        <div class="three wide field" style="background-color:#E29EF9">
            <label>Alrrededor<br></label>
            <input type="checkbox" id="varillaAlrre" name="varillaAlrre"  value="alrrededor">
            
        </div>
        

        <div class="one wide field" style="background-color:#DADAD4;">
        
        <label style=" color:#DADAD4;"><i class="cut icon"></i>Corte</label>
        
        </div>

        <div class="three wide field" style="background-color:#A92C8B;">
        <br>
            <label style=" color:white;"><i class="paste icon"></i>Pegado</label>
        </div>
        
        <div class="three wide field" style="background-color:#FA9CE3">
            <label>Base<br></label>
            <input type="radio" name="pegadoBase" id="pegadoBase"  value="base">
        </div>
        <div class="three wide field" style="background-color:#FA9CE3">
            <label>Altura<br></label>
            <input type="radio"  name="pegadoAltura" id="pegadoAltura"  value="altura">
        </div>
        
        

        </div>
</div>

<div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">
        <div class="five wide field" style="background-color:#F48238;">
       
            <label style=" color:white;"><i class="paste icon"></i>Trasl. Pegado o cebolla</label>
        </div>

        <div class="three wide field" style="background-color:#FCC8A6;">
        <label ><i class="paste icon"></i>Medida</label>
        <input type="text" id="medidaTrasl" placeholder="Medida">

        </div>
        <div class="five wide field" style="background-color:#FCC8A6;">
        <label ><i class="paste icon"></i>Tipo</label>
        <select name="traslPegado" id="traslPegado" class="ui dropdown">
                <option value="7" set selected>Seleccione una opción</option>
                <option value="1">TRASL Pega Vertical</option>
                <option value="2">TRASL Pega Horizontal</option>
                <option value="3">TRASL Cebolla Horizontal</option>
                <option value="4">TRASL Cebolla Vertical</option>

            </select>
        </div>


        <div class="one wide field" style="background-color:#DADAD4;">
        
        <label style=" color:#DADAD4;"><i class="cut icon"></i>Corte</label>
        
    </div>

        <div class="two wide field" style="background-color:#68422B;">
        
            <label style=" color:white;"><i class="circle icon"></i> Ruedo</label>
            
        </div>
        <div class="three wide field" style="background-color:#BAA497">
            <label>Arriba</label>
            <input type="checkbox" id="ruedoAr" name="ruedoAr" value="arriba">
        </div>
        <div class="three wide field" style="background-color:#BAA497">
            <label>Abajo<br></label>
            <input type="checkbox" id="ruedoAb" name="ruedoAb"  value="abajo">
        </div>
        <div class="three wide field" style="background-color:#BAA497">
            <label>Izquierda y derecha<br></label>
            <input type="checkbox" id="ruedoIzD" name="ruedoIzD"  value="izquierda">
        </div>
        
        <div class="three wide field" style="background-color:#BAA497">
            <label>Alrrededor<br></label>
            <input type="checkbox" id="ruedoAlrre" name="ruedoAlrre"  value="alrrededor">
        </div>
        </div>
    </div>

<div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">

        
        
        

        <div class="three wide field" style="background-color:#AC2546;">
        
            <label style=" color:white;"><i class="circle icon"></i>Laminación</label>
            
        </div>

        <div class="three wide field" style="background-color:#FE96AF">
            <label>Brillo Vinylica</label>
            <input type="radio"   name="laminacion" value="Brillo Vinylica">
        </div>
        <div class="three wide field" style="background-color:#FE96AF">
            <label>Mate Vinylica<br></label>
            <input type="radio"  name="laminacion"  value="Mate Vinylica">
        </div>
        <div class="three wide field" style="background-color:#FE96AF">
            <label>UV Liquida<br></label>
            <input type="radio"  name="laminacion"  value="UV Liquida">
        </div>

        <div class="one wide field" style="background-color:#DADAD4;">
        
            <label style=" color:#DADAD4;"><i class="cut icon"></i>Corte</label>
            
        </div>

        <div class="three wide field" style="background-color:#1B5C15;">
            <label style=" color:white;"><i class="cut icon"></i>Corte</label>
        </div>
        
        <div class="three wide field" style="background-color:#92F389">
            <label>Base<br></label>
            <input type="radio"  name="corte"  value="base">
        </div>
        <div class="three wide field" style="background-color:#92F389">
            <label>Altura<br></label>
            <input type="radio"  name="corte"  value="altura">
        </div>
        


        
        </div>
</div>


    <div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">

        

        <div class="five wide field">
            <label><i class="pencil icon"></i>Descripciones Adicionales:</label>
            <textarea rows="3" id="descripciones" name="descripciones" placeholder="Descripciones"></textarea>
            
            </div>

            <div class="four wide field">
            <label><i class="dollar icon"></i>Tipo de venta:</label>
            <select name="tipoVenta" id="tipoVenta" class="ui  dropdown">
            <option value="Seleccione" set selected>Seleccione una opción</option>
            <option value="Venta Exenta">Venta Exenta</option>
            <option value="Venta No Sujeta">Venta No Sujeta</option>
            <option value="Venta Gravada">Venta Gravada</option>
            </select>
            
            </div>

            <div class="four wide field">
            <label><i class="dollar icon"></i>Total sugerido:</label>
            <input type="text" name="precioTo" id="precioTo" placeholder="Total Sugerido">
            <br><br>
              <a class="ui green button" id="calcIva"><i class="plus icon"></i> IVA</a>
            </div>

            <div class="four wide field">
            <label style=""><i class="dollar icon"></i>Precio a cobrar:</label>
            <input type="text" name="precio" id="precio" placeholder="Precio Final">
            
            </div>

            
        </div>
    </div>

    <div class="ui divider"></div><br>
    <div class="field">
        <div class="fields">
        <div class="four wide field">
            <label><i class="user icon"></i>Vendida por:</label>
            <select name="vendedor" id="vendedor" class="ui search dropdown">
            </select>
            </div>

            <div class="four wide field">
            <label><i class="user icon"></i>Responsable en  producción OT:</label>
            <select name="respProduccion" id="respProduccion" class="ui search dropdown">
            </select>
            </div>

            <div class="two wide field">
            <label style="color:#DADAD4"><i class="dollar icon"></i>Precio:</label>
            <a class=" ui right floated black labeled icon button" id="agregarOT"> <i class="plus icon"></i>Agregar OT</a>
            
            </div>

            <div class="six wide field">
            <label style="color:#DADAD4"><i class="dollar icon"></i>Precio:</label>
            <a class=" ui right floated red labeled icon button" id="verCompras"> <i class="cart arrow down icon"></i>Ver Compras</a>
            
            </div>
        </div>
    </div>
    </div>
</form>

<div class="ui fullscreen modal" id="modalCarrito">
<div class="header" style="color: white; background-color:#B60F1C;">
Listado de pedidos de la orden <?php echo "OTGF00".$id; ?>
</div>

<div class="content">
    <div class="field" id="list" style="" >
                            <div class="fields">

                            <div class="sixteen wide field" style="font-size:13px;">
                            <br>
                            
                    <form action="" class="ui form" id="frmLista" >
                            <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                    <thead>
                                        <tr>
                                        <th style="background-color: black; color:white;width:5%;">Cant</th>
                                            <th style="background-color: black; color:white;width:18%;"><i class="list icon"></i>Producto</th>
                                            
                                            <th style="background-color: black; color:white;width:10%;"><i class="arrows alternate icon"></i>Detalles Generales</th>
                                            <th style="background-color: black; color:white;"><i class="arrows alternate icon"></i>Def. Medida</th>
                                            <th style="background-color: black; color:white;"><i class="arrows alternate icon"></i>Imp + Desperdicio</th>
                                            <th style="background-color: black; color:white;width:20%;"><i class="pencil icon"></i>Descipciones</th>
                                            <th style="background-color: black; color:white;width:10%;"><i class="dollar icon"></i>Tipo Venta</th>
                                            <th style="background-color: black; color:white;"><i class="dollar icon"></i>Precio sin IVA</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Precio Final</th>
                                        <th style="background-color: black; color:white;"><i class="trash icon"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(lista, index) in listado">
                                        <td>
                                        <input v-model="lista.cantidadRe" name="cantidadRe" id="cantidadRe" type="text" readonly>
                                        </td>
                                        <td>  
                                        
                                        <textarea rows="4" v-model="lista.productoRe" name="nombreHer" id="nombreHer" readonly></textarea>
                                        <input v-model="lista.idProducto" name="idProducto" id="idProducto" type="hidden" readonly>
                                        <input v-model="lista.idColor" name="idColor" id="idColor" type="hidden" readonly>
                                        <input v-model="lista.idAcabado" name="idAcabado" id="idAcabado" type="hidden" readonly>
                                        </td>

                                        <td>  
                                        <textarea rows="4" v-model="lista.detallesPro" name="detallesPro" id="detallesPro" readonly></textarea>

                                        <input v-model="lista.alturaRe" name="alturaRe" id="alturaRe" type="hidden" readonly>
                                        <input v-model="lista.baseRe" name="baseRe" id="baseRe" type="hidden" readonly>
                                        <input v-model="lista.cuadrosImpr" name="cuadrosImpr" id="cuadrosImpr" type="hidden" readonly>
                                        </td>
                                        <td>  
                                        <textarea rows="3" v-model="lista.defMedidas" name="defMedidas" id="defMedidas" readonly></textarea>
                                        <input v-model="lista.anchoRe" name="anchoRe" id="anchoRe" type="hidden" readonly>
                                        <input v-model="lista.longitudRe" name="longitudRe" id="longitudRe" type="hidden" readonly>
                                        <input v-model="lista.anchoMatRe" name="anchoMatRe" id="anchoMatRe" type="hidden" readonly>
                                        </td>
                                        <td>  
                                        <textarea rows="3" v-model="lista.impDesper" name="impDesper" id="impDesper" readonly></textarea>

                                        <input v-model="lista.mtsDes" name="mtsDes" id="mtsDes" type="hidden" readonly>
                                        <input v-model="lista.despRe" name="despRe" id="despRe" type="hidden" readonly>
                                        </td>
                                    

                                        <td>  
                                        <textarea rows="6"  v-model="lista.descriRe" name="descriRe" id="descriRe" readonly></textarea>
                                        </td>
                                        <td>  
                                        <textarea rows="3" class="requerido" v-model="lista.tipoVentaRe" name="tipoVentaRe" id="tipoVentaRe"
                                        readonly></textarea>
                                        </td>
                                        <td>  
                                    <input class="requerido" v-model="lista.precioReSin" name="precioReSin" id="precioReSin" type="text" readonly>
                                    </td>
                                    <td>  
                                    <input class="requerido" v-model="lista.precioRe" name="precioRe" id="precioRe" type="text" readonly>
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
                            
                            
                            
                            </div>
    </div>

    </div>

    <div class="actions">
    <button class="ui black deny button">Cancelar</button>
    <a class="ui green  button" id="guardarOT">Guardar OT</a>
    </div>

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
                precioReSin:'',
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
                mtsDes:'',
                despRe:'',
                tipoVentaRe:'',
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
    $('#base').mask("###0.00", {reverse: true});
    $('#altura').mask("###0.00", {reverse: true});
    $('#anchoMaterial').mask("###0.00", {reverse: true});
    $('#longitud').mask("###0.00", {reverse: true});
    $('#ancho').mask("###0.00", {reverse: true});
    $('#arte').mask("###0.00", {reverse: true});
    $('#precio').mask("###0.00", {reverse: true});
    $('#precioU').mask("###0.00", {reverse: true});
    $('#precioDesp').mask("###0.00", {reverse: true});
    $('#medidaTrasl').mask("###0.00", {reverse: true});
    });

    $("#ancho").keyup(function(){
        var ancho = $(this).val();

        $("#longitud").val($("#base").val());
    });

    $("#altura").keyup(function(){
        var altura = $(this).val();

        $("#longitud").val(altura);
    });

    $("#verCompras").click(function(){
        $('#modalCarrito').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    });

    $("#desperdicio").click(function(){
        
        var ancho1 = $("#anchoMaterial").val();

        var ancho = $("#ancho").val();
        var copias = $("#copias").val();
        var longitud = $("#longitud").val();

        var precioDes = $("#precioDesp").val();
        var cantidad = $("#cantidad").val();
        var mts2 = $("#cuadrosImp").val();

        var desperdicio = ancho1-mts2;

        var imp = ancho * copias;

        var desperdicio = ancho1 - imp;

        var cantCopias = cantidad / copias;

        var redonCantCopias = Math.floor(cantCopias);

       

        var totalRedonCopias = "-"+redonCantCopias;

     //   var redonCantCopiasSuper = (totalRedonCopias * copias) + parseFloat(cantidad);

        var totalFinalCopias = "-"+(totalRedonCopias * copias) + parseFloat(cantidad);
        
        var totalMenos = "-" + parseFloat(totalFinalCopias);

        var totalFinal = 0;
        
        if(redonCantCopias == "0"){
            var totalFinal = ( ( ( (totalFinalCopias * ancho) + parseFloat(ancho1)) * longitud)*precioDes);
        }else{
            var totalFinal = ( desperdicio * longitud * precioDes * redonCantCopias);
        }
        
        var saldo = totalFinal / cantidad;
        
        

        $("#desperdicio").val(saldo.toFixed(2));

    });

    $("#copias").click(function(){
        var anchoMat = $("#anchoMaterial").val();
        var ancho = $("#ancho").val();

        var divi = anchoMat / ancho;

        var total = 0;
        if(ancho == "0"){
            total = 1;

        }else{
             total = Math.floor(divi); 
        }

        $("#copias").val(total);
        
    });

    
	$("#calcIva").click(function(){
    	var precio = $("#precioTo").val();
      
      var iva = precio * 0.13;
      
      var total = parseFloat(precio) + parseFloat(iva);
      
      $("#precio").val(total.toFixed(2));
    });

 
    $("#tipoTubo").change(function(){
        
    });
  
    $("#precioTo").click(function(){
        var precioPorMetro = $("#precioU").val();
        var cantidad = $("#cantidad").val();
        var precioDes = $("#desperdicio").val();
        var ojeteAr = $("#ojeteAr").val();
        var ojeteAb = $("#ojeteAb").val();
        var ojeteIz = $("#ojeteIz").val();
        var ojeteDe = $("#ojeteDe").val();
        var material = $("#tipoTubo").val();
        var totalTubo = "";
        var totalPegado="";
        var traslPegado = $("#traslPegado").val();
        var totalTraslPegado = "";
        var totalLaminacion="";
        var totalCorte="";

        if($("#arte").val() == ""){
            var arte = 0.00;
        }else{
            var arte = $("#arte").val();
        }
       

        var totalOjetes= parseFloat(ojeteAr) + parseFloat(ojeteAb) + parseFloat(ojeteIz) + parseFloat(ojeteDe);

        var cobroOjetes = (totalOjetes * 0.25) * cantidad;

        
        var totalC = parseFloat(precioPorMetro) + parseFloat(precioDes);

        var totalCobro = totalC * cantidad;

            if( $('#troquel').prop('checked') ) {
                var cobrar = parseFloat(totalCobro) + parseFloat(cobroOjetes) + 0.04 + parseFloat(arte);
            }else{
                var cobrar = parseFloat(totalCobro) + parseFloat(cobroOjetes) + parseFloat(arte);
            }

       
            

        if(material == 1){
            //varilla
          if($("#varillaAr").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 2.5;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 2.5;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked') && $("#varillaAr").prop('checked')){
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 2) * 2.5;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaIzD").prop('checked')){
            var altura = $("#altura").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 2.5;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAlrre").prop('checked')){
            var altura = $("#altura").val();
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 2.5;
              var mult1 =  (base * 2) * 2.5;


              var totalTubo = (parseFloat(mult)  + parseFloat(mult1) ) * cantidad;

              
          }



        }
        if(material == 2){
            //tuboMetal

            if($("#varillaAr").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 4;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 4;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked') && $("#varillaAr").prop('checked')){
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 2) * 4;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaIzD").prop('checked')){
            var altura = $("#altura").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 4;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAlrre").prop('checked')){
            var altura = $("#altura").val();
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 4;
              var mult1 =  (base * 2) * 4;


              var totalTubo = (parseFloat(mult)  + parseFloat(mult1) ) * cantidad;

              
          }
        }
        if(material == 3){
            //TuboPVC

            if($("#varillaAr").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 3;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 3;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked') && $("#varillaAr").prop('checked')){
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 2) * 3;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaIzD").prop('checked')){
            var altura = $("#altura").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 3;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAlrre").prop('checked')){
            var altura = $("#altura").val();
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 3;
              var mult1 =  (base * 2) * 3;


              var totalTubo = (parseFloat(mult)  + parseFloat(mult1) ) * cantidad;

              
          }
        }
        if(material == 4){
            //fundaPV

            if($("#varillaAr").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked') && $("#varillaAr").prop('checked')){
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 2) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaIzD").prop('checked')){
            var altura = $("#altura").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAlrre").prop('checked')){
            var altura = $("#altura").val();
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 1.25;
              var mult1 =  (base * 2) * 1.25;


              var totalTubo = (parseFloat(mult)  + parseFloat(mult1) ) * cantidad;

              
          }
        }
        if(material == 5){
            //fundaPT
            if($("#varillaAr").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked')){
              var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 1) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAb").prop('checked') && $("#varillaAr").prop('checked')){
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (base * 2) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaIzD").prop('checked')){
            var altura = $("#altura").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 1.25;
              var totalTubo = mult * cantidad;

              
          }

          if($("#varillaAlrre").prop('checked')){
            var altura = $("#altura").val();
            var base = $("#base").val();
              var cantidad = $("#cantidad").val();

              var mult =  (altura * 2) * 1.25;
              var mult1 =  (base * 2) * 1.25;


              var totalTubo = (parseFloat(mult)  + parseFloat(mult1) ) * cantidad;

              
          }
            
        }

        if(material == 7){
            var totalTubo =0;
        }

        if($("#pegadoBase").prop('checked')){
            var base = $("#base").val();
            var cantidad = $("#cantidad").val();

            var totalPegado = (base * 1.50) * cantidad;

        }
        

        else if($("#pegadoAltura").prop('checked')){
            var altura = $("#altura").val();
            var cantidad = $("#cantidad").val();

            var totalPegado = (altura * 1.50) * cantidad;

        }
        else{
            var totalPegado = 0;
        }


        if(traslPegado == 1){
            var medida = $("#medidaTrasl").val();
            var altura = $("#altura").val();
            var cantidad = $("#cantidad").val();

            var totalTraslPegado = altura * medida * cantidad * 1.75;
        }

        if(traslPegado == 2){
            var medida = $("#medidaTrasl").val();
            var base = $("#base").val();
            var cantidad = $("#cantidad").val();

            var totalTraslPegado = base * medida * cantidad * 1.75;
        }

        if(traslPegado == 3){
            var medida = $("#medidaTrasl").val();
            var base = $("#base").val();
            var cantidad = $("#cantidad").val();

            var totalTraslPegado = base * medida * cantidad * 2.25;
        }

        if(traslPegado == 4){
            var medida = $("#medidaTrasl").val();
            var altura = $("#altura").val();
            var cantidad = $("#cantidad").val();

            var totalTraslPegado = altura * medida * cantidad * 2.25;
        }

        if(traslPegado == 7){
            var totalTraslPegado =0;
        }


        if($("input[name='laminacion']:checked"). val() == "UV Liquida"){
            var precio = $("#precioU").val();
            var cantidad = $("#cantidad").val();
            
            var totalLaminacion = (precio * 0.30) * cantidad;
        }else{
            var totalLaminacion = 0;
        }

        if($("input[name='corte']:checked"). val() == "base"){
            var base = $("#base").val();
            var cantidad = $("#cantidad").val();

            var totalCorte = (base * 1) * cantidad;
        }
        else if($("input[name='corte']:checked"). val() == "altura"){
            var altura = $("#altura").val();
            var cantidad = $("#cantidad").val();

            var totalCorte = (altura * 1) * cantidad;
        }
        else{
            var totalCorte = 0;
        }
        
        var totalFinal = cobrar + totalTubo + totalPegado + totalTraslPegado + totalLaminacion + totalCorte;
        $("#precioTo").val(totalFinal.toFixed(2));
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

$("#pegadoAltura").change(function(){
    if($(this).prop("checked")){
        $("#pegadoBase").prop("checked",false);
    }
});

$("#pegadoBase").change(function(){
    if($(this).prop("checked")){
        $("#pegadoAltura").prop("checked",false);
    }
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
        var user = '<?php echo $usuarios?>';

        $.each(JSON.parse(user), function() {
            option = `<option value="${this.codigoUsuario}">${this.nombre} ${this.apellido}</option>`;

            $('#respProduccion').append(option);
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

    $(function() {
        

        var option = '';
        var vendedor = '<?php echo $vendedores?>';

        $.each(JSON.parse(vendedor), function() {
            option = `<option value="${this.idVendedor}">${this.nombre}</option>`;

            $('#vendedor').append(option);
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

    $("")
    

    $("#btnDetalle").click(function(){
        var idPro = $('#proFinalCmb option:selected').val();
        var idColor = $('#colorCmb option:selected').val();
        var idAcabado = $('#acabadoCmb option:selected').val();

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=precioUnitario",
			data:{
                idPro : idPro,
                idColor : idColor,
                idAcabado : idAcabado,
            },
			success:function(r){
                $('#precioU').val(r);
                $("#prec").show(1000);
                $("#precS").show(1000);
			}
        });
        
        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=existencia",
			data:{
                idPro : idPro,
                idColor : idColor,
                idAcabado : idAcabado,
            },
			success:function(r){
                $('#existencia').val(r);
                $("#ex").show(1000);
                
			}
		});

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=precioDes",
			data:{
                idPro : idPro,
                idColor : idColor,
                idAcabado : idAcabado,
            },
			success:function(r){
                $('#precioDesp').val(r);
                $("#precioDesDiv").show(1000);
                $("#datos").show(1000);
			}
		});
    });
</script>
<script type="text/javascript">
	function recargarLista1(){
		$.ajax({
			type:"POST",
			url:"?1=Funciones&2=unidadMedida",
			data:"idPro=" + $('#proFinalCmb option:selected').val(),
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
			data:"idPro=" + $('#proFinalCmb option:selected').val(),
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
			data:"idPro=" + $('#proFinalCmb option:selected').val(),
			success:function(r){
                $('#colorCmb').html(r);
                $("#verDetalle").show();
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

            $("#cuadrosImp").val(totalMetros.toFixed(2));
    });

    $("#agregarOT").click(function(){
        $("#list").show(1000);
            var producto ="Clasificación: "+ $("#proFinalCmb option:selected").text() + "\nColor: "+ $("#colorCmb option:selected").text()+ "\nAcabado: " + $("#acabadoCmb option:selected").text();
            var cantidad = $("#cantidad").val();

            if( $('#troquel').prop('checked') ) {
                var troquel = "Troquelado ,";
            }else{
                var troquel = "";
            }

            if( $('#arte').val()== 0 ) {
                var arte = "";
            }else{
                var arte = "Hacer Arte ,";
            }

            if($('#ojeteAr').val()== 0){
                var ojeteAr = "";
            }else{
                var ojeteAr = "Ojt Ar: "+ $("#ojeteAr").val();
            }

            if($('#ojeteAb').val()== 0){
                var ojeteAb = "";
            }else{
                var ojeteAb = ",Ojt Ab: "+ $("#ojeteAb").val();
            }

            if($('#ojeteIz').val()== 0){
                var ojeteIz = "";
            }else{
                var ojeteIz = ",Ojt Izq: "+ $("#ojeteIz").val();
            }

            if($('#ojeteDe').val()== 0){
                var ojeteD = "";
            }else{
                var ojeteD = ",Ojt Der: "+ $("#ojeteDe").val();
            }

            var varilla = $("#tipoTubo").val();

            if(varilla == 1){

                if($("#varillaAr").prop("checked") && $("#varillaAb").prop("checked")){
                    var tipoVara = "\nVarilla: Arriba y abajo ,";
                }

                else if($("#varillaAr").prop("checked")){
                    var tipoVara = "\nVarilla: Arriba ,";
                }

                else if($("#varillaAb").prop("checked")){
                    var tipoVara = "\nVarilla: Abajo ,";
                }

                

               else  if($("#varillaIzD").prop("checked") ){
                    var tipoVara = "\nVarilla: Izquierda y derecha ,";
                }

               else if($("#varillaAlrre").prop("checked") ){
                    var tipoVara = "\nVarilla: Alrrededor ,";
                }
                

               
            }
            if(varilla == 2){

             

                if($("#varillaAr").prop("checked") && $("#varillaAb").prop("checked")){
                    var tipoVara = "\nTubo metálico: Arriba y abajo ,";
                }

                else if($("#varillaAr").prop("checked")){
                    var tipoVara = "\nTubo metálico: Arriba ,";
                }

                else if($("#varillaAb").prop("checked")){
                    var tipoVara = "\nTubo metálico: Abajo ,";
                }

                

               else  if($("#varillaIzD").prop("checked") ){
                    var tipoVara = "\nTubo metálico: Izquierda y derecha ,";
                }

               else if($("#varillaAlrre").prop("checked") ){
                    var tipoVara = "\nTubo metálico: Alrrededor ,";
                }
            }
            if(varilla == 3){


                if($("#varillaAr").prop("checked") && $("#varillaAb").prop("checked")){
                    var tipoVara = "\nTubo PVC: Arriba y abajo ,";
                }

                else if($("#varillaAr").prop("checked")){
                    var tipoVara = "\nTubo PVC: Arriba ,";
                }

                else if($("#varillaAb").prop("checked")){
                    var tipoVara = "\nTubo PVC: Abajo ,";
                }

                

               else  if($("#varillaIzD").prop("checked") ){
                    var tipoVara = "\nTubo PVC: Izquierda y derecha ,";
                }

               else if($("#varillaAlrre").prop("checked") ){
                    var tipoVara = "\nTubo PVC: Alrrededor ,";
                }
            }
            if(varilla == 4){

                if($("#varillaAr").prop("checked") && $("#varillaAb").prop("checked")){
                    var tipoVara = "\nFunda P/ Varilla: Arriba y abajo ,";
                }

                else if($("#varillaAr").prop("checked")){
                    var tipoVara = "\nFunda P/ Varilla: Arriba ,";
                }

                else if($("#varillaAb").prop("checked")){
                    var tipoVara = "\nFunda P/ Varilla: Abajo ,";
                }

                

               else  if($("#varillaIzD").prop("checked") ){
                    var tipoVara = "\nFunda P/ Varilla: Izquierda y derecha ,";
                }

               else if($("#varillaAlrre").prop("checked") ){
                    var tipoVara = "\nFunda P/ Varilla: Alrrededor ,";
                }
            }
            if(varilla == 5){
                if($("#varillaAr").prop("checked") && $("#varillaAb").prop("checked")){
                    var tipoVara = "\nFunda P/ Tubo: Arriba y abajo ,";
                }

                else if($("#varillaAr").prop("checked")){
                    var tipoVara = "\nFunda P/ Tubo: Arriba ,";
                }

                else if($("#varillaAb").prop("checked")){
                    var tipoVara = "\nFunda P/ Tubo: Abajo ,";
                }

                

               else  if($("#varillaIzD").prop("checked") ){
                    var tipoVara = "\nFunda P/ Tubo: Izquierda y derecha ,";
                }

               else if($("#varillaAlrre").prop("checked") ){
                    var tipoVara = "\nFunda P/ Tubo: Alrrededor ,";
                }
            }
            if(varilla == 7){
                var tipoVara = "";
            }

          
            if($("#pegadoBase").prop("checked")){
             

            var tipoPegado = "Pegado: Base ,";

                }   
                else if($("#pegadoAltura").prop("checked")){                  
                var tipoPegado = "Pegado : Altura ,";
                } 
                else{
                  var  tipoPegado = "";
                }

                var transPegado = $("#traslPegado").val();

                if(transPegado == 1){
                     
                    var tipoTra = "\nTRASL Pega Vertical: " + $("#medidaTrasl").val()+",";
                }
                if(transPegado == 2){
                    var tipoTra = "\nTRASL Pega Horizontal: " + $("#medidaTrasl").val()+",";
                }
                if(transPegado == 3){
                    var tipoTra = "\nTRASL Cebolla Horizontal: " + $("#medidaTrasl").val()+",";
                }
                if(transPegado == 4){
                    var tipoTra = "\nTRASL Cebolla Vertical: " + $("#medidaTrasl").val() +",";
                }
                if(transPegado == 7){
                    var tipoTra = "";
                }

                if($("#ruedoAb").prop("checked") && $("#ruedoAr").prop("checked")){
                    var ruedo = "\nRuedo : Arriba y abajo ,";
                 }  
                 else if($("#ruedoAr").prop("checked")){
                    var ruedo = "\nRuedo : Arriba ,";
                 }   

                else if($("#ruedoAb").prop("checked")){
                    var ruedo = "\nRuedo : Abajo ,";
                 } 

                 else if($("#ruedoIzD").prop("checked")){
                    var ruedo = "\nRuedo : Izquierda y Derecha ,";
                 }
                 else if($("#ruedoAlrre").prop("checked")){
                    var ruedo = "\nRuedo : Alrrededor ,";
                 }else{
                    var ruedo = "";
                 }


                 if($("input[name='laminacion']:checked"). val() == "UV Liquida"){
                    var laminacion = "\nLaminación : UV Líquida,";
                 }
                 else if($("input[name='laminacion']:checked"). val() == "Brillo Vinylica"){
                    var laminacion = "\nLaminación : Brillo Vinylica,";
                 }
                 else if($("input[name='laminacion']:checked"). val() == "Mate Vinylica"){
                    var laminacion = "\nLaminación : Mate Vinylica,";
                }
                else{
                    var laminacion = "";
                }
                 
                if($("input[name='corte']:checked"). val() == "base"){
                    var corte = "\nCorte : Base";
                 }
                 else if($("input[name='corte']:checked"). val() == "altura"){
                    var corte = "\nCorte : Altura";
                }
                else{
                    var corte = "";
                }
            

            

var desc = $("#descripciones").val() + "\n"+ troquel+ " "+ arte + "\n "+ ojeteAr +" "+ ojeteAb +" "+ ojeteIz +" "+ ojeteD + " "+ tipoVara+ " "+ tipoPegado+" "+ tipoTra+" "+ ruedo+" "+ laminacion+" "+ corte;
            var precio = $("#precio").val();
            var precioSin = $("#precioTo").val();
            var color= $("#colorCmb option:selected").val();
            var idPro =$("#proFinalCmb option:selected").val();
            var acabado = $("#acabadoCmb option:selected").val();
            var detallesPro1 = "Altura: "+ $("#altura").val() + "\nBase: "+ $("#base").val()+ "\nMT2 impresión: " + $("#cuadrosImp").val();
            var defMed = "Ancho: "+ $("#ancho").val() + "\nLongitud: "+ $("#longitud").val()+ "\nAncho Material: " + $("#anchoMaterial").val();
            var altu = $("#altura").val();
            var bas = $("#base").val();
            var cuadrosIm = $("#cuadrosImp").val();
            var anch = $("#ancho").val();
            var long = $("#longitud").val();
            var anchoM = $("#anchoMaterial").val();
            var des = $("#desperdicio").val();
            var tipoV=$("#tipoVenta option:selected").val();

            var mtsDesp = parseFloat(anchoM) - parseFloat(cuadrosIm);
            var impD = "Desperdicio: $" + $("#desperdicio").val()+"\nMts2 de despercio: "+ mtsDesp;
           
            

           

        app.listado.push({
            precioReSin:precioSin,
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
            despRe:des,
            mtsDes:mtsDesp,
            tipoVentaRe:tipoV,
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
        $("input:radio[name=pegado]").prop("checked", false);
        $("input:radio[name=corte]").prop("checked", false);

                     swal({
                            title: 'Agregada',
                            type: 'success',
                            });
    });


</script>


