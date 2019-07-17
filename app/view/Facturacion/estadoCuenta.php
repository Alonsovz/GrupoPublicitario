<div id="app">
<div class="ui grid">
        <div class="row">
            <div class="titulo">
            
            <font color="black" size="5px">
            <i class="users icon"></i> <i class="dollar icon"></i>
            Estados de cuenta de clientes </font><font color="black" size="20px">.</font>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <div class="ui divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <table id="dtClientes" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #B40431; color:white;">N°</th>
                            <th style="background-color: #B40431; color:white;">Nombre</th>
                            <th style="background-color: #B40431; color:white;">NRC</th>
                            <th style="background-color: #B40431; color:white;">Departamento</th>
                            <th style="background-color: #B40431; color:white;">Giro</th>
                            <th style="background-color: #B40431; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

</div>


</div>
<script src="./res/tablas/tablaClientesEstadoCuenta.js"></script>
<script>
var verEstado=(ele) =>{
var idCliente = $(ele).attr("id");
var nombre = $(ele).attr("nombre");
var nrc = $(ele).attr("nrc");
var nit = $(ele).attr("nit");
var direccion = $(ele).attr("direccion");
var telefono = $(ele).attr("telefono");
var contacto = $(ele).attr("contacto");
var correo = $(ele).attr("correo");

var fecha =$(ele).attr("fecha");

$.ajax({
        type: 'POST',
        url: './app/view/Facturacion/estadoCuentaExcel.php',
        data: {
            idCliente : idCliente,
        },
        success: function(r) {
            window.location.href="./app/view/Facturacion/estadoCuentaExcel.php?idCliente="+idCliente+"&nombre="+nombre+"&nrc="+nrc
            +"&nit="+nit+"&direccion="+direccion+"&telefono="+telefono+"&contacto="+contacto+"&correo="+correo+"&fecha="+fecha;
            } 
        
    });

}
</script>