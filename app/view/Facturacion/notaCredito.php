<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            
            <font color="black" size="5px">
            <i class="list icon"></i> <i class="dollar icon"></i>
            Nueva nota de Crédito</font><font color="black" size="20px">.</font>
            </div>
        </div>
</div>

<div class="content" style="text-align:center; border: 1px solid black; background-color: #F3F3F1;">
    <br>
    <form class="ui form" style="font-size:16px;margin-left:20px;margin-right:20px; ">
        <div class="field">
            <div class="fields">
                <div class="four wide field">
                    <label>Cliente</label>
                    <select name="cliente" id="cliente" class="ui search dropdown">
                    <option value="seleccione" set selected>Seleccione una opción</option>
                    </select>
                </div>
                <div class="four wide field">
                <label><i class="calendar icon"></i>Fecha:</label>
                    <input type="date" name="fecha" id="fecha">   
                </div>
                <div class="four wide field">
                <label><i class="list icon"></i>N°:</label>
                    <input type="text" name="nuCorre" id="nuCorre"> 
                </div>
                <div class="four wide field">
                <label><i class="address card icon"></i>Dirección:</label>
                    <textarea rows="2" name="direccion" id="direccion" readonly></textarea>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="field">
            <div class="fields">
                <div class="four wide field">
                    <label>Depertamento:</label>
                    <input type="text" name="departamento" id="departamento" readonly>
                    </select>
                </div>
                
                <div class="four wide field">
                <label><i class="adress card icon"></i>NIT:</label>
                    <input type="text" name="nit" id="nit"> 
                </div>
                <div class="six wide field">
                <label><i class="address card icon"></i>Giro:</label>
                <textarea rows="2" name="giro" id="giro" readonly></textarea>
                </div>
                <div class="four wide field">
                <label><i class="folder icon"></i>N° registro:</label>
                    <input type="text" name="registro" id="registro">   
                </div>

                <div class="four wide field">
                <label><i class="dollar icon"></i>Venta a cuenta de:</label>
                    <input type="text" name="venta" id="venta">   
                </div>
            </div>
        </div>

        <div class="ui divider"></div>
        <div class="field">
            <div class="fields">
                <div class="four wide field">
                    <label>Cond. de la operación anterior:</label>
                    <input type="text" name="condAn" id="condAn">
                    </select>
                </div>
                
                <div class="four wide field">
                <label><i class="adress card icon"></i>N° de nota de remisión anterior:</label>
                    <input type="text" name="notaAnterior" id="notaAnterior"> 
                </div>
                <div class="four wide field">
                <label><i class="address card icon"></i>Fecha de nota de remisión anterior:</label>
                <input type="date" name="fechaNotaAn" id="fechaNotaAn">
                </div>
                
            </div>
        </div><br>
            <div class="ui divider"></div>
        <div class="field" id="list" style="margin-left:10px;margin-right:10px;" >
                        <div class="fields">

                        <div class="sixteen wide field" style="font-size:16px;">
                        <br>
                        <span style="float:right;">
                                    <a @click="agregarDetalle" class="ui green circular icon button"><i class="plus icon"></i></a>
                                    </span>        <br><br><br>
                <form action="" class="ui form" id="frmLista" >
                        <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                        <th style="background-color: black; color:white;width:10%;"><i class="list icon"></i>Cantidad</th>
                                        <th style="background-color: black; color:white;width:30%;"><i class="podcast icon"></i>Descripción</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Precio Unitario</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Ventas no Sujetas</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Ventas exentas</th>
                                        <th style="background-color: black; color:white;"><i class="dollar icon"></i>Ventas Gravadas</th>
                                        
                                        <th style="background-color: black; color:white;"><i class="trash icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(lista, index) in listado">
                                    <td>  
                                    <input v-model="lista.cantidadRe" name="cantidadRe" id="cantidadRe" type="text" placeholder="Cantidad">
                                   
                                    </td>
                                   
                                    <td>  
                                    <textarea rows="3" v-model="lista.descripcionRe" name="descripcionRe" id="descripcionRe"
                                     placeholder="Descripción"></textarea>
                                    </td>

                                    <td>  
                                     <input v-model="lista.precioUnitarioRe" name="precioUnitarioRe" id="precioUnitarioRe"
                                     placeholder="Precio Unitario" type="text" >

                                    </td>
                                    <td>  
                                    <input v-model="lista.ventasNoSujetas" name="ventasNoSujetas" id="ventasNoSujetas" type="text"
                                    placeholder="Ventas no sujetas">
                                 
                                    </td>
                                    <td>  
                                    <input v-model="lista.ventasExentas" name="ventasExentas" id="ventasExentas" type="text" 
                                    placeholder="Ventas Exentas">

                                    </td>
                                   
                                    <td>  
                                    <input class="requerido" v-model="lista.ventasGravadas" name="ventasGravadas" id="ventasGravadas" type="text"
                                    placeholder="Ventas Gravadas">
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
                        <br>
                        <a class="ui blue right floated button">Guardar</a>
                        </div>
                        
                         </div>
</div>
    </form>
</div>
</div>

<script>
    
var app = new Vue({
        el: "#app",
        data: {
            listado: [{
                cantidadRe: '',
                descripcionRe: '',
                precioUnitarioRe: '',
                ventasNoSujetas: '',
                ventasExentas: '',
                ventasGravadas: '',
            }]
           
        },
        methods: {
            
            eliminarDetalle(index) {
                this.listado.splice(index, 1);
                
            },
            agregarDetalle() {
                this.listado.push({
               
                cantidadRe: '',
                descripcionRe: '',
                precioUnitarioRe: '',
                ventasNoSujetas: '',
                ventasExentas: '',
                ventasGravadas: '',
                });

               
            
            },
                guardarAcabado(){

                if (this.listado.length) {

                $('#frmLista').addClass('loading');
                $.ajax({
                    type: 'POST',
                    data: {
                        detalles: JSON.stringify(this.listado)
                    },
                    url: '?1=FacturacionController&2=guardarNotaCredito',
                    success: function (r) {
                        $('#frmLista').removeClass('loading');
                        if (r == 1) {
                            
                                    app.listado = [{
                                       
                                        cantidadRe: '',
                                        descripcionRe: '',
                                        precioUnitarioRe: '',
                                        ventasNoSujetas: '',
                                        ventasExentas: '',
                                        ventasGravadas: '',
                                    } ]
                                        
                        }
                        
                    }
                });
                }

                },
               
                
        
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

    $("#cliente").change(function(){
        var id = $(this).val();

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=clienteDirec",
			data:"id=" + $('#cliente option:selected').val(),
			success:function(r){
				$('#direccion').val(r);
			}
        });

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=clienteDepar",
			data:"id=" + $('#cliente option:selected').val(),
			success:function(r){
				$('#departamento').val(r);
			}
        });
        
        
        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=clienteNit",
			data:"id=" + $('#cliente option:selected').val(),
			success:function(r){
				$('#nit').val(r);
			}
        });

        $.ajax({
			type:"POST",
			url:"?1=Funciones&2=clienteGiro",
			data:"id=" + $('#cliente option:selected').val(),
			success:function(r){
				$('#giro').val(r);
			}
        });
        

    });
</script>