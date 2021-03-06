<div id="app">

<modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=ProductosController&2=registrarP" titulo="Registrar producto"
        :campos="campos_registro" tamanio='tiny' ></modal-registrar>

    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=ProductosController&2=editar" titulo="Editar producto"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=ProductosController&2=eliminar" titulo="Eliminar producto"
        sub_titulo="¿Está seguro de querer eliminar este producto?" :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>


        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <a href="?1=ProductosController&2=granFormato" class="ui gray button" id="gr" style="color:black; font-weight:bold;width:22%;">Gran Formato</a>
                    <a href="?1=ProductosController&2=impresion" class="ui black button" id="imp" style="font-weight:bold;width:25%;">Impresión Digital</a>
                    <a href="?1=ProductosController&2=promocionales" class="ui red button" id="pro" style="font-weight:bold;width:32%;">Promocionales</a>
                    <br><br>
                <font color="#B40431" size="6px">
                <i class="calendar check outline icon"></i> <i class="truck icon"></i>
                    Productos promocionales </font><font color="black" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
            <button class="ui left floated orange  icon button" id="btnColores"  style="font-weight:bold;width:20%;">
  
                    Paleta de Colores
                </button>

                <button class="ui left floated green  icon button" id="btnAcabados"  style="font-weight:bold;width:20%;">
                    
                    Lista de Acabados
                </button>

                <button class="ui left floated purple  icon button" id="btnMedidas"  style="font-weight:bold;width:20%;">
                    
                    Unidades de Medida
                </button>

                <button class="ui right floated red  icon button" @click="modalRegistrar">
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
        <div class="row">
            <div class="sixteen wide column">
                <table id="dtPromocionales" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #B40431; color:white;">N°</th>
                            <th style="background-color: #B40431; color:white;">Nombre del producto</th>
                            <th style="background-color: #B40431; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<div class="ui fullscreen modal" id="detallesProductos" style="scroll:overflow;">
<div class="header" style="background-color:black; color:white;">
Detalles del producto: <a id="nombreP"  style="background-color:black; color:#EDEA0A;"></a>
</div>
<div class="scrolling content">
    <form class="ui form" style="font-size:16px;">
            <input type="hidden" id="IDtipoProducto" name="IDtipoProducto">


            <div class="field" id="tablaProductos">
            <div class="fields">
            
                
                <div class="sixteen wide field">
                    
                    <table class="ui selectable very compact celled table">
                    <thead>
                       <tr>
                           <th style="background-color:#C60D0D; color:white;"><label><i class="list icon"></i>Producto Final</label></th>
                           
                        </tr>
                        </thead>
                        <tbody style="background-color:#E4E4E7;">
                        <tr>
                            <td id="proFin"></td>
                        
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
                <div style="background-color:#EBEDEB;display:none;" id="verDe">
                <div class="field">
            <div class="fields">
                <div class="sixteen wide field" id="title" style="display:none; font-weight: bold; font-size:18px; color: black;">
            <center>Detalles del producto: <a id="titleDe" style="font-weight: bold; font-size:18px; color: red;"></a>
            &nbsp;&nbsp;
            <a id="editarNom" class="ui green button">Editar Nombre</a>
            </center>
            <input type="hidden" id="idProductoF">
            </div>
            </div></div>
            <div class="field">
            <div class="fields">
                <div class="sixteen wide field">
                <div id="color"></div>
                </div>
            </div>
            </div>
            <div class="field">
            <a class="ui icon black small button" id="btnNuevoColor" style="margin-left:5%;"><i class="plus icon"></i></a>
            <div class="fields" id="nuevoDetallePro" style="display:none;">

            <div class="eight wide field" >
                
                
              
            <label style="font-size:17px; font-weight:bold;" ><i class="podcast icon"></i> Nuevo acabado:</label>
            <select id="nuAcabadoPro" name="nuAcabadoPro" class="ui search dropdown"></select>
            <br><br>
            
          
                </div>

                <div class="eight wide field">
               
            
            <label style="font-size:17px; font-weight:bold;" ><i class="pencil icon"></i> Nuevo Color:</label>
            <select id="nuColorPro" name="nuColorPro" class="ui search dropdown"></select>
            <br><br>
            

                </div>
<br>
                
<br>

                <div class="eight wide field" >
                
               
            <label style="font-size:17px; font-weight:bold;" ><i class="arrows alternate icon"></i> Nueva Medida:</label>
            <select id="nuMedidaPro" name="nuMedidaPro" class="ui search dropdown"></select>
            
                </div>
                <div class="eight wide field">
                <label style="font-size:17px; font-weight:bold;" ><i class="dollar icon"></i>Precio Sugerido:</label>
                <input type="text" name="precioSug" id="precioSug" placeholder="Precio Sugerido">
                </div>   

                </div>
                
                </div>
                
                <a class="ui green button" id="guardarColorPro" style="margin-left:50%;display:none"><i class="save icon"></i>Guardar</a>
                <br><br>
                <a class="ui right floated blue button" id="btnCloseD" style="margin:right:20px;">Cerrar</a>
                </div>
                
            <div class="field">
            <div class="fields">
                <div class="three wide field" id="botonNuevo">
                            <div class="ui divider"></div>
                            <a id="btnNuevoD" class="ui green button"><i class="plus icon"></i> Nuevo producto</a>
                            <div class="ui divider"></div>
                    </div>
                    </div>
                </div>

                
                
                
            
        
        <div class="field">
            <div class="fields">

            <div class="sixteen wide field" id="nuevoDetalle" style="display:none;">
            <span style="float:right;">
                <a  @click="guardarTodo" class="ui blue circular icon button"><i class="save icon"></i> Guardar</a>
            </span>        <br><br>
                <form action="" class="ui form" id="frmNuevoDetalle" >
                        <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #20AD10; color:white;"><i class="building icon"></i>Producto Final</th>
                                        
                                        <th style="background-color: #20AD10; color:white;"><i class="podcast icon"></i>Detalles</th>
                                       
                                      
                                </thead>
                                <tbody style="background-color:#F0F2EF;">
                                    <tr v-for="(detalle, index) in detalles">
                                    <td>  
                                    <input class="requerido" v-model="detalle.productoFinal" name="productoFinal" id="productoFinal" type="text"
                                     placeholder="Producto Final">
                                    </td>
                                   
                                    <td style="">  
                                            
                                    <span style="float:right;">
                                    <a @click="agregarDetalleAC" class="ui black circular icon button"><i class="plus icon"></i></a>
                                    </span>        <br><br>
                                    <form action="" class="ui form" id="frmNuevoDetalleAcabado" >
                                    <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                                <thead>
                                                <th style="background-color: black; color:white; text-align:center;"><i class="podcast icon"></i>Acabado</th>
                                                <th style="background-color: black; color:white; text-align:center;"><i class="podcast icon"></i>Color</th>
                                                <th style="background-color: black; color:white; text-align:center;"><i class="podcast icon"></i>Medida</th>
                                                <th style="background-color: black; color:white; text-align:center;"><i class="dollar icon"></i>Precio Sugerido</th>
                                                    <th style="background-color: black; color:white;text-align:center;"><i class="trash icon"></i></th>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(detalleAC, index) in detallesAcabado">
                                                    
                                                
                                                    <td>  
                                                    <select v-model="detalleAC.acabado" class="ui  dropdown" id="acabado" name="acabado">
                                                <option v-for="option in acabadosOps" :value="option.idAcabado">{{option.acabado}}</option>
                                            </select>
                                                    </td>

                                                    <td>  
                                              
                                        <select v-model="detalleAC.colorN" class="ui dropdown" id="colorN" name="colorN">
                                            <option v-for="option in colorOps" :value="option.idColor">{{option.color}}</option>
                                        </select>
                                        
                                                </td>

                                                <td>  
                                                <select v-model="detalleAC.unidad" class="ui  dropdown" id="unidad" name="unidad">
                                            <option v-for="option in medidasOps" :value="option.idMedida">{{option.medida}}</option>
                                        </select>
                                                </td> 

                                                   

                                                    <td>  
                                                <input type="text" v-model="detalleAC.precioSugerido"  id="precioSugerido" 
                                                name="precioSugerido" placeholder="Precio Sugerido">
                                            
                                                </td> 

                                                    <td>
                                                    <center>
                                       
                                                <a  @click="eliminarDetalleAC(index)" class="ui black mini circular icon button"><i
                                                    class="times icon"></i></a>
                                                    </center>
                                                </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </form>

                                    </td>

                                    
                                    
                                    
                                    
                              
                    </form>
                    
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <a class="ui right floated purple button" id="btnCloseNew" style="margin:right:20px;">Cerrar</a>
                </div>
                
            </div>
            
        </div>
    </form>
</div>
<div class="actions">
<button class="ui black deny button">Cancelar</button>
</div>
</div>


<div class="ui tiny modal" id="modalColores">
<div class="header" style="font-size:19px; text-align:center; background-color:#FACA8C;font-weight:bold;">
<i class="pencil icon"></i> Colores disponibles en Productos de Promocionales
</div>
<div class="scrolling content" style="background-color:#EBEAE8;">
<form class="ui form">
<div class="field">
    <div class="fields">
        <div class="eight wide field">
            <div id="detallesColores">
            </div>
        </div>
        <div class="eight wide field">
            <a class="ui orange button" id="btnNuevoC"><i class="plus icon"></i> Nuevo Color</a>
            <div id="newColor" style="display:none;">
            <br>
            <label style="font-size:17px; font-weight:bold;"><i class="pencil icon"></i> Nuevo Color:</label>
            <input type="text" id="nuColor" name="nuColor" placeholder="Nombre del color">
            <br><br>
            <a class="ui red button" id="guardarColor"><i class="save icon"></i>Guardar</a>
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


<div class="ui tiny modal" id="modalAcabados">
<div class="header" style="font-size:18px; text-align:center; background-color:#89DE5F;font-weight:bold;">
<i class="podcast icon"></i> Lista de acabados disponibles en Productos Promocionales
</div>
<div class="scrolling content" style="background-color:#EBEAE8;">
<form class="ui form">
<div class="field">
    <div class="fields">
        <div class="eight wide field">
            <div id="detallesAcabados">
            </div>
        </div>
        <div class="eight wide field">
            <a class="ui green button" id="btnNuevoA"><i class="plus icon"></i> Nuevo Acabado</a>
            <div id="newAcabado" style="display:none;">
            <br>
            <label style="font-size:17px; font-weight:bold;"><i class="podcast icon"></i> Nuevo Acabado:</label>
            <input type="text" id="nuAcabado" name="nuAcabado" placeholder="Nombre del acabado">
            <br><br>
            <a class="ui red button" id="guardarAcabado"><i class="save icon"></i>Guardar</a>
            </div>

        </div>
    </div>
</div>
</form>
</div>

<div class="actions">
<button class="ui black deny button" id="btnListoA">Listo</button>
</div>

</div>


<div class="ui tiny modal" id="modalMedidas">
<div class="header" style="font-size:19px; text-align:center; background-color:#D6A7F4;font-weight:bold;">
<i class="arrows alternate icon"></i> Medidas disponibles en Productos Promocionales
</div>
<div class="scrolling content" style="background-color:#EBEAE8;">
<form class="ui form">
<div class="field">
    <div class="fields">
        <div class="eight wide field">
            <div id="detallesMedidas">
            </div>
        </div>
        <div class="eight wide field">
            <a class="ui purple button" id="btnNuevoM"><i class="plus icon"></i> Nuevo Medida</a>
            <div id="newMedidas" style="display:none;">
            <br>
            <label style="font-size:17px; font-weight:bold;"><i class="arrows alternate icon"></i> Nueva Medida:</label>
            <input type="text" id="nuMedida" name="nuMedida" placeholder="Nombre de la medida">
            <br><br>
            <a class="ui red button" id="guardarMedida"><i class="save icon"></i>Guardar</a>
            </div>

        </div>
    </div>
</div>
</form>
</div>

<div class="actions">
<button class="ui black deny button" id="btnListoM">Listo</button>
</div>

</div>

<div class="ui tiny modal" id="editarNamePro">
    <div class="header" style="background-color:black; color:white;">
    Nombre actual del producto: <a id="nameActual" style="color:red"></a>
    </div>
    <div class="content">
    <input type="hidden" id="idModi" name="idModi">
    <input type="hidden" id="idCla" name="idCla">
        <form class="ui form">
        <label><i class="pencil icon"></i>Nuevo nombre:</label>
        <input type="text" id="newName" name="newName" placeholder="Nuevo nombre">
        </form>
    </div>
    <div class="actions">
        <button class="ui black  button" id="btnCN">Cancelar</button>
        <button class="ui red button" id="btnEditarN">Guardar</button>
    </div>
</div>


<div class="ui tiny modal" id="editarPrecioPro">
    <div class="header" style="background-color:black; color:white;">
    Precio unitario actual del producto <a id="nameActualP" style="color:white"></a> :  <a id="precioAc" style="color:red"></a>
    </div>
    <div class="content">
    <input type="hidden" id="idModiP" name="idModiP">
    <input type="hidden" id="idClaP" name="idClaP">
        <form class="ui form">
        <label><i class="pencil icon"></i>Nuevo Precio:</label>
        <input type="text" id="newPrecio" name="newPrecio" placeholder="Nuevo precio $$">
        </form>
    </div>
    <div class="actions">
        <button class="ui black  button" id="btnCP">Cancelar</button>
        <button class="ui red button" id="btnEditarP">Guardar</button>
    </div>
</div>

</div>

<script src="./res/tablas/tablaPromocionales.js">
</script><script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>
    $(document).ready(function(){
    $("#pro").removeClass("ui red button");
    $("#pro").addClass("ui red basic button");
    $('#newPrecio').mask("###0.00", {reverse: true});
    $('#precioSug').mask("###0.00", {reverse: true});
    });

    var detalles=(ele)=>{
       var id= $(ele).attr("id");
       var nombre =$(ele).attr("nombre");
       $("#IDtipoProducto").val(id);
       $("#nombreP").text(nombre);
       $("#botonNuevo").show();
    $("#tablaProductos").show();

       $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesProFinal",
            data:{
                id:id
            },
        success:function(r){
				$('#proFin').html(r);
			}
        });
       $('#detallesProductos').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
       $("#nuevoDetalle").hide();
       $("#colorDiv").hide();
       $("#acabadoDiv").hide();
       $("#medidadDiv").hide();
       $("#title").hide();
       $("#verDe").hide();
       
       
}

var app = new Vue({
        el: "#app",
        data: {
            detalles: [{
                productoFinal: '',
                color: '',
                acabado: '',
                unidad: '',
                precioSugerido:'',
               
            }],
            detallesPrecio: [{
                
                precioUnitario: '',
               
            }],

            detallesAcabado: [{
                acabado: '10',
                unidad: '7',
                colorN : '11' ,
               
            }],
           
            colorOps: <?php echo $colores?>,
            acabadosOps: <?php echo $acabados?>,
            medidasOps: <?php echo $medidas?>,
            campos_registro: [
                {
                    label: 'Nombre del producto:',
                    name: 'nombre',
                    type: 'text'
                }
                
                    
                
            ],
            campos_editar: [
                {
                    label: 'Nombre del producto:',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    name: 'idDetalle',
                    type: 'hidden'
                }

            ],
            campos_eliminar: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            eliminarDetalle(index) {
                this.detalles.splice(index, 1);
            },
            agregarDetalle() {
                this.detalles.push({
                productoFinal: '',
                color: '',
                acabado: '',
                unidad: '',
                precioSugerido:'',
                });
            
            },
            eliminarDetalleAC(index) {
                this.detallesAcabado.splice(index, 1);
                
            },
            agregarDetalleAC() {
                this.detallesAcabado.push({
               
                    acabado: '10',
                    unidad: '7',
                    colorN : '11' ,
                });

               
            
            },
            refrescarTabla() {
                tablaGranFormato.ajax.reload();
            },
            modalRegistrar() {
                $('#modalRegistrar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=ProductosController&2=cargarDatos&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditar input[name="nombre"]').val(dat.nombre);
                        //$('#frmEditar select[name="medida"]').dropdown('set selected', dat.unidadMedida);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            mounted() {
            $('.ui.dropdown').dropdown();
            $('.ui.dropdown.selection').css('max-width', '100%');
            $('.ui.dropdown.selection').css('min-width', '100%');
            $('.ui.dropdown.selection').css('width', '100%');
        },
        updated() {
            $('.ui.dropdown').dropdown();
            $('.ui.dropdown.selection').css('max-width', '100%');
            $('.ui.dropdown.selection').css('min-width', '100%');
            $('.ui.dropdown.selection').css('width', '100%');
            
        },
        guardarTodo(){
            var pro = $("#nombreP").text();
            alertify.confirm("¿Desea el nuevo producto final en la clasificacion "+pro +"?",
            function(){

            var nombreP = $("#IDtipoProducto").val();

            if (app.detalles.length) {

                $('#frmNuevoDetalle').addClass('loading');
                $.ajax({
                    type: 'POST',
                    data: {
                        detallesPro: JSON.stringify(app.detalles),
                        nombreP : nombreP,
                    },
                    url: '?1=ProductosController&2=guardarNuevoProducto',
                    success: function (r) {
                        $('#frmNuevoDetalle').removeClass('loading');
                        if (r == 1) {
                            swal({
                             title: 'Producto registrado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                    app.detalles = [{
                                        productoFinal: '',
                                        color: '',
                                        acabado: '',
                                        unidad: '',
                                        precioSugerido:'',
                                    }];
                                    
                                    app.guardarAcabado();
                                
                               app.guardarInventario();
                                    $('#proFin').html('');
                                    $.ajax({
                                    type:"POST",
                                    url:"?1=Funciones&2=verDetallesProFinal",
                                    data:{
                                        id:nombreP
                                    },
                                success:function(r){
                                        $('#proFin').html(r);
                                        $("#nuevoDetalle").hide(1000);
                                        $("#tablaProductos").show(1000);
                                        $("#botonNuevo").show(1000);
                                    }
                                });
                                }
                            });           
                        }
                        
                    }
                });
                }
            },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            }); 
                },
                
                guardarAcabado(){

                if (this.detallesAcabado.length) {

                $('#frmNuevoDetalleAcabado').addClass('loading');
                $.ajax({
                    type: 'POST',
                    data: {
                        detallesPro: JSON.stringify(this.detallesAcabado)
                    },
                    url: '?1=ProductosController&2=guardarAcabado',
                    success: function (r) {
                        $('#frmNuevoDetalleAcabado').removeClass('loading');
                        if (r == 1) {
                            
                                    app.detallesAcabado = [{
                                       
                                        acabado: '10',
                                        unidad: '7',
                                        colorN : '11' ,
                                    } ]
                                        
                        }
                        
                    }
                });
                }

                },
               
                guardarInventario(){

                if (this.detallesAcabado.length) {

                $('#frmNuevoDetalleAcabado').addClass('loading');
                $.ajax({
                    type: 'POST',
                    data: {
                        detallesPro: JSON.stringify(this.detallesAcabado)
                    },
                    url: '?1=ProductosController&2=guardarInventario',
                    success: function (r) {
                        $('#frmNuevoDetalleAcabado').removeClass('loading');
                        if (r == 1) {
                            
                                    app.detallesAcabado = [{
                                    
                                        acabado: '10',
                                        unidad: '7',
                                        colorN : '11' ,
                                    } ]
                                        
                        }
                        
                    }
                });
                }

                },
        
        }
    });
</script>
<script>
        $(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
        });
        $(document).on("click", ".btnEditar", function () {
            $('#modalEditar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalle').val($(this).attr("id"));
            app.cargarDatos();
        });

$("#btnNuevoD").click(function(){
 $("#nuevoDetalle").show(1000);
 $("#verDe").hide(1000);
 $("#botonNuevo").hide(1000);
 $("#tablaProductos").hide(1000);
});


$("#btnNuevaMedida").click(function(){
 $("#nuevaMedidaPro").show(1000);
 $("#tablaProductos").hide(1000);
});

$("#btnNuevoAcabado").click(function(){
 $("#nuevoAcabadoPro").show(1000);
 $("#tablaProductos").hide(1000);
});

$("#btnNuevoColor").click(function(){
 $("#nuevoDetallePro").show(1000);
 $("#guardarColorPro").show(1000);
});

var borrarProducto=(ele)=>{
    var idProducto = $(ele).attr("idProducto");
        var idAcabado = $(ele).attr("idAcabado");
        var idColor=$(ele).attr("idColor");

    alertify.confirm("¿Desea eliminar el detalle del producto "+$("#titleDe").text()+" ?",
            function(){

                $.ajax({
                    type: 'POST',
                    data: {
    
                        idProducto : idProducto,
                        idColor:idColor,
                        idAcabado:idAcabado,
                    },
                    url: '?1=ProductosController&2=eliminarProducto',
                    success: function (r) {
                       
                        if (r == 11) {
                            swal({
                             title: 'Eliminado',
                            text: 'Guardada con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                   
                                    $('#color').html('');
                                    $.ajax({
                                        type:"POST",
                                        url:"?1=Funciones&2=verDetallesColor",
                                        data:{
                                            idC:idProducto
                                        },
                                    success:function(r){
                                            $('#color').html(r);
                                        }
                                    });
                                
                                    $("#title").show(1000);
                                    $("#verDe").show(1000);
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

$("#editarNom").click(function(){
    var id= $("#idProductoF").val();
    var name = $("#titleDe").text();
    var idC = $("#IDtipoProducto").val();
    $("#idModi").val(id);
    $("#idCla").val(idC);
    $("#nameActual").text(name);
    $('#editarNamePro').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});




$("#btnCN").click(function(){
    var idC = $("#idCla").val();
        $("#IDtipoProducto").val(idC);
        $("#botonNuevo").hide();
        $("#tablaProductos").hide();
        $('#proFin').html('');
        $.ajax({
                type:"POST",
                url:"?1=Funciones&2=verDetallesProFinal",
                data:{
                id:idC
                },
            success:function(r){
            $('#proFin').html(r);
            }
        });
        $('#detallesProductos').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
        $("#nuevoDetalle").hide();
        $("#colorDiv").show();
        $("#acabadoDiv").show();
        $("#medidadDiv").show();
        $("#title").show();
        $("#verDe").show();
});


$("#btnEditarN").click(function(){
var idProducto = $("#idModi").val();
var newN = $("#newName").val();
var idC = $("#idCla").val();

            $.ajax({
                    type: 'POST',
                    data: {
    
                        idProducto : idProducto,
                        newN: newN,
                    },
                    url: '?1=ProductosController&2=nuevoNombre',
                    success: function (r) {
                        $('#editarNamePro').modal('hide');
                        if (r == 1) {
                            swal({
                             title: 'Nombre actualizado',
                            text: 'Guardada con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if(result.value){
                                    $("#IDtipoProducto").val(idC);
                                    $("#botonNuevo").show();
                                    $("#tablaProductos").show();
                                    $('#proFin').html('');
                                    $.ajax({
                                            type:"POST",
                                            url:"?1=Funciones&2=verDetallesProFinal",
                                            data:{
                                                id:idC
                                            },
                                        success:function(r){
                                                $('#proFin').html(r);
                                            }
                                        });
                                    $('#detallesProductos').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                                    $("#nuevoDetalle").hide();
                                    $("#colorDiv").hide();
                                    $("#acabadoDiv").hide();
                                    $("#medidadDiv").hide();
                                    $("#title").hide();
                                    $("#verDe").hide();
                                }
                               
                            });           
                        }
                        
                    }
                });
});



var detallePro=(ele)=>{
    
    $("#nuevoDetalle").hide(1000);
    $("#nuevoDetallePro").hide(1000);
 $("#guardarColorPro").hide(1000);
       $("#botonNuevo").hide(1000);

    var idBtnN = $(ele).attr("id");
    var idBtn = $(ele).attr("idP");
    $("#titleDe").text(idBtnN);
    $("#idProductoF").val($(ele).attr("idP"));

    
    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=verDetallesColor",
            data:{
                idC:idBtn
            },
        success:function(r){
				$('#color').html(r);
			}
        });

        
        $("#title").show(1000);
        $("#verDe").show(1000);
        
        
        

}


$("#btnColores").click(function(){
    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=colores",
            data:{
                idCla:3
            },
        success:function(r){
				$('#detallesColores').html(r);
			}
        });
    $('#modalColores').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

$("#btnAcabados").click(function(){
    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=acabados",
            data:{
                idCla:3
            },
        success:function(r){
				$('#detallesAcabados').html(r);
			}
        });
    $('#modalAcabados').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

$("#btnMedidas").click(function(){
    $.ajax({
			type:"POST",
			url:"?1=Funciones&2=medidas",
            data:{
                idCla:3
            },
        success:function(r){
				$('#detallesMedidas').html(r);
			}
        });
    $('#modalMedidas').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

$("#btnCloseD").click(function(){
    $("#colorDiv").hide(1000);
        $("#acabadoDiv").hide(1000);
        $("#medidadDiv").hide(1000);
        $("#title").hide(1000);
        $("#verDe").hide(1000);
        $("#botonNuevo").show(1000);
        $("#tablaProductos").show(1000);
        $("#nuevaMedidaPro").hide(1000);
    $("#nuevoColorPro").hide(1000);
    $("#nuevoAcabadoPro").hide(1000);
});

$("#btnCloseNew").click(function(){
    $("#nuevoDetalle").hide(1000);
    $("#verDe").hide(1000);
    $("#botonNuevo").show(1000);
    $("#tablaProductos").show(1000);
    
});

$("#btnListoC").click(function(){
    location.reload();
});

$("#btnListoA").click(function(){
    location.reload();
});

$("#btnListoM").click(function(){
    location.reload();
});

$("#btnNuevoC").click(function(){
    $("#newColor").show(1000);
});
$("#btnNuevoA").click(function(){
    $("#newAcabado").show(1000);
});

$("#btnNuevoM").click(function(){
    $("#newMedidas").show(1000);
});

$("#guardarColor").click(function(){
    var color= $("#nuColor").val();

                 $.ajax({
                    type: 'POST',
                    data: {
    
                        color : color,
                        idClas:3,
                    },
                    url: '?1=ProductosController&2=guardarColorNew',
                    success: function (r) {
                       
                        if (r == 1) {
                            swal({
                             title: 'Color registrado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                   
                                    $('#detallesColores').html('');
                                    $.ajax({
                                    type:"POST",
                                    url:"?1=Funciones&2=colores",
                                    data:{
                                        idCla:3
                                    },
                                success:function(r){
                                        $('#detallesColores').html(r);
                                        $("#newColor").hide(1000);
                                        $("#nuColor").val('');
                                    }
                                });
                                }
                            });           
                        }
                        
                    }
                });
});



$("#guardarAcabado").click(function(){
    var acabado= $("#nuAcabado").val();

                 $.ajax({
                    type: 'POST',
                    data: {
    
                        acabado : acabado,
                        idClas:3,
                    },
                    url: '?1=ProductosController&2=guardarAcabadoNew',
                    success: function (r) {
                       
                        if (r == 1) {
                            swal({
                             title: 'Acabado registrado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                   
                                    $('#detallesAcabados').html('');
                                    $.ajax({
                                    type:"POST",
                                    url:"?1=Funciones&2=acabados",
                                    data:{
                                        idCla:3
                                    },
                                success:function(r){
                                        $('#detallesAcabados').html(r);
                                        $("#newAcabado").hide(1000);
                                        $("#nuAcabado").val('');
                                    }
                                });
                                }
                            });           
                        }
                        
                    }
                });
});



$("#guardarMedida").click(function(){
    var medida= $("#nuMedida").val();

                 $.ajax({
                    type: 'POST',
                    data: {
    
                        medida : medida,
                        idClas:3,
                    },
                    url: '?1=ProductosController&2=guardarMedidaNew',
                    success: function (r) {
                       
                        if (r == 1) {
                            swal({
                             title: 'Medida registrada',
                            text: 'Guardada con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                                   
                                    $('#detallesMedidas').html('');
                                    $.ajax({
                                    type:"POST",
                                    url:"?1=Funciones&2=medidas",
                                    data:{
                                        idCla:3
                                    },
                                success:function(r){
                                        $('#detallesMedidas').html(r);
                                        $("#newMedida").hide(1000);
                                        $("#nuMedida").val('');
                                    }
                                });
                                }
                            });           
                        }
                        
                    }
                });
});
var eliminarAcabado=(ele)=>{
       var idProducto = $("#idProductoF").val();
        var idAcabado = $(ele).attr("id");
        var nombrePro=$("#titleDe").text();
        alertify.confirm("¿Desea eliminar el acabado del producto "+$("#titleDe").text()+" ?",
            function(){
                $.ajax({
               
               type: 'POST',
               url: '?1=ProductosController&2=eliminarAcabado',
               data: {
                   idProducto:idProducto,
                   idAcabado:idAcabado,
               },
               success: function(r) {
                   if(r == 1) {
                    
                       swal({
                           title: 'Acabado eliminado del producto '+$("#titleDe").text(),
                           type: 'success',
                           showConfirmButton: true,
                           }).then((result) => {
                            $('#acabados').html('');
                               if (result.value) {
                                $.ajax({
                                type:"POST",
                                url:"?1=Funciones&2=verDetallesAcabados",
                                data:{
                                    idC:nombrePro,
                                },
                                
                            success:function(r){
                                
                                    $('#acabados').html(r);
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
    var eliminarMedida=(ele)=>{
        var idProducto = $("#idProductoF").val();
        var idMedida = $(ele).attr("id");
        var nombrePro=$("#titleDe").text();
        alertify.confirm("¿Desea eliminar la medida del producto "+$("#titleDe").text()+" ?",
            function(){
                $.ajax({
               
                type: 'POST',
                url: '?1=ProductosController&2=eliminarMedida',
                data: {
                   idProducto:idProducto,
                   idMedida:idMedida,
               },
                success: function(r) {
                    if(r == 1) {
                        
                        swal({
                            title: 'Medida eliminada del producto '+$("#titleDe").text(),
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                $('#medidas').html('');
                                if (result.value) {
                            
                                    $.ajax({
                                    type:"POST",
                                    url:"?1=Funciones&2=verDetallesMedidas",
                                    data:{
                                        idC:nombrePro
                                    },
                                success:function(r){
                                        $('#medidas').html(r);
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

    var eliminarColor=(ele)=>{
        var idProducto = $("#idProductoF").val();
        var idColor = $(ele).attr("id");
        var nombrePro=$("#titleDe").text();
        alertify.confirm("¿Desea eliminar el color del producto "+$("#titleDe").text()+" ?",
            function(){

                $.ajax({
               
               type: 'POST',
               url: '?1=ProductosController&2=eliminarColor',
               data: {
                   idProducto:idProducto,
                   idColor:idColor,
               },
               success: function(r) {
                   if(r == 1) {
                    
                       swal({
                           title: 'Color eliminado del producto '+$("#titleDe").text(),
                           type: 'success',
                           showConfirmButton: true,
                           }).then((result) => {
                               if (result.value) {
                                $('#color').html('');
                                $.ajax({
                                type:"POST",
                                url:"?1=Funciones&2=verDetallesColor",
                                data:{
                                    idC:nombrePro
                                },
                            success:function(r){
                                    $('#color').html(r);
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



    var eliminarMedidaPaleta=(ele)=>{
        var idMedida = $(ele).attr("id");
        var medida=$(ele).attr("medida");
        alertify.confirm("¿Desea eliminar la medida "+medida+" de la lista de medidas?",
            function(){

                $.ajax({
               
               type: 'POST',
               url: '?1=ProductosController&2=eliminarMedidaPaleta',
               data: {
                idMedida:idMedida
               },
               success: function(r) {
                   if(r == 1) {
                    $('#modalMedidas').modal('hide');
                       swal({
                           title: 'Medida eliminada',
                           type: 'success',
                           showConfirmButton: true,
                           }).then((result) => {
                               if (result.value) {
                                $('#detallesMedidas').html('');
                                $.ajax({
                                type:"POST",
                                url:"?1=Funciones&2=medidas",
                                data:{
                                    idCla:3
                                },
                            success:function(r){
                                    $('#detallesMedidas').html(r);
                                    $('#modalMedidas').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
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



    var eliminarAcabadoPaleta=(ele)=>{
        var idAcabado = $(ele).attr("id");
        var acabado=$(ele).attr("acabado");
        alertify.confirm("¿Desea eliminar el acabado "+acabado+" de la lista de acabados?",
            function(){

                $.ajax({
               
               type: 'POST',
               url: '?1=ProductosController&2=eliminarAcabadoPaleta',
               data: {
                idAcabado:idAcabado
               },
               success: function(r) {
                   if(r == 1) {
                    $('#modalAcabados').modal('hide');
                       swal({
                           title: 'Acabado eliminado de la lista',
                           type: 'success',
                           showConfirmButton: true,
                           }).then((result) => {
                               if (result.value) {
                                $('#detallesAcabados').html('');
                                $.ajax({
                                type:"POST",
                                url:"?1=Funciones&2=acabados",
                                data:{
                                    idCla:3
                                },
                            success:function(r){
                                    $('#detallesAcabados').html(r);
                                    $('#modalAcabados').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
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


    var eliminarColorPaleta=(ele)=>{
        var idColor = $(ele).attr("id");
        var color=$(ele).attr("color");
        alertify.confirm("¿Desea eliminar el color "+color+" de la lista de colores?",
            function(){

                $.ajax({
               
               type: 'POST',
               url: '?1=ProductosController&2=eliminarColorPaleta',
               data: {
                idColor:idColor
               },
               success: function(r) {
                   if(r == 1) {
                    $('#modalColores').modal('hide');
                       swal({
                           title: 'Color eliminado de la lista',
                           type: 'success',
                           showConfirmButton: true,
                           }).then((result) => {
                               if (result.value) {
                                $('#detallesColores').html('');
                                $.ajax({
                                type:"POST",
                                url:"?1=Funciones&2=colores",
                                data:{
                                    idCla:3
                                },
                            success:function(r){
                                    $('#detallesColores').html(r);
                                    $('#modalColores').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
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


    $(function() {
        

        var option = '';
        var medida = '<?php echo $medidas?>';

        $.each(JSON.parse(medida), function() {
            option = `<option value="${this.idMedida}">${this.medida}</option>`;

            $('#nuMedidaPro').append(option);
        });
    });

    $(function() {
        

        var option = '';
        var acabado = '<?php echo $acabados?>';

        $.each(JSON.parse(acabado), function() {
            option = `<option value="${this.idAcabado}">${this.acabado}</option>`;

            $('#nuAcabadoPro').append(option);
        });
    });

    $(function() {
        

        var option = '';
        var color = '<?php echo $colores?>';

        $.each(JSON.parse(color), function() {
            option = `<option value="${this.idColor}">${this.color}</option>`;

            $('#nuColorPro').append(option);
        });
    });

    $("#guardarColorPro").click(function(){
        var idProducto = $("#idProductoF").val();
        var idColor = $("#nuColorPro").val();
        var nombrePro = $("#titleDe").text();
        var idAcabado = $("#nuAcabadoPro").val();
        var idMedida = $("#nuMedidaPro").val();
        var precio = $("#precioSug").val();

        $.ajax({
               
               type: 'POST',
               url: '?1=ProductosController&2=agregarNuevoDetallePro',
               data: {
                  idProducto:idProducto,
                  idColor:idColor,
                  idMedida:idMedida,
                  idAcabado:idAcabado,
                  precio:precio,
              },
               success: function(r) {
                   if(r == 11) {
                    $("#nuevoColorPro").hide();
                       swal({
                           title: 'Detalle agregado al producto '+$("#titleDe").text(),
                           type: 'success',
                           showConfirmButton: true,
                           }).then((result) => {
                               $('#color').html('');
                               
                               if (result.value) {
                           
                                   $.ajax({
                                   type:"POST",
                                   url:"?1=Funciones&2=verDetallesColor",
                                   data:{
                                       idC:idProducto
                                   },
                               success:function(r){
                                       $('#color').html(r);
                                       $("#nuevoDetallePro").hide(1000);
                                        $("#guardarColorPro").hide(1000);
                                        $("#precioSug").val('');
                                   }
                               });

                              
                           }
                       }); 
                       
                   } 
               }
           
       });
    });



   </script>























