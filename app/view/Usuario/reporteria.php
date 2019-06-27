<style>
    body {
        overflow: hidden;
    }
</style>

<script>
$(function() {
    overflowRestore();
});
</script>   

<div id="app">
<br><br>
<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="file icon"></i>
                    Reportes<font color="#DFD102" size="20px">.</font>
                </div>
        </div>

        
</div>
<br><br>
<div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">
<input type="hidden"  id="mes" name="mes" >
   <input type="hidden"  id="anio" name="anio">

<button  style="width: 32%; text-align:center;" class="ui yellow inverted segment" id="btnReporteC">
        Consolidado de mes
        <div class="ui divider"></div>
        <i class="money bill alternate  icon"></i>
        <i class="file outline icon"></i>
    </button>

    <button  style="width: 32%; text-align:center;" class="ui red inverted segment" id="btnGenerarReporteIng">
        Reporte de Ingresos
        <div class="ui divider"></div>
        <i class="money bill alternate  icon"></i>
        <i class="file outline icon"></i>
    </button>

    

    <button style="width:32%; text-align:center;"  class="ui blue inverted segment" id="btnGenerarReporteEg">
    Reporte de Egresos
        <div class="ui divider"></div>
        <i class="money bill alternate  icon"></i>
        <i class="file outline icon"></i>
    </button>

</div>
<br><br>
<div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">
    <button style="width: 32%; text-align:center;"  class="ui orange inverted segment" id="btnMora">
    Personas en Mora
        <div class="ui divider"></div>
        <i class="dollar icon"></i>
        <i class="trash icon"></i>
    </button>

    <button style="width: 32%; text-align:center;"  class="ui gray inverted segment" id="btnCuentas">
   Cuentas de Banco
        <div class="ui divider"></div>
        <i class="building icon"></i>
        <i class="dollar  icon"></i>
    </button>

   

    <button style="width: 32%; text-align:center;"  class="ui olive inverted segment" id="btnOtros">
    Otros Reportes
        <div class="ui divider"></div>
        <i class="file outline icon"></i>
    </button>
   
    
</div>






</div>

<div class="ui tiny modal" id="modalReportesEgresos" style="width:40%;">
<div class="header">
   <i class="clipboard outline icon"></i> Reportes Egresos<font color="#DFD102" size="20px">.</font>
</div><br>
<div class="content" class="ui equal width form">
<div class="row">
      <center><label style="font-weight: bold; font-size: 15px; ">Reporte diario de Egresos</label></center><br>
      </div>
      <div class="content" class="ui equal width form">
        <form class="ui form">
        <div class="field">
          <div class="fields">

        <a href="?1=EgresosController&2=llamaReporte" target="_blank" style="width:30%; margin:auto;" id="btnReportes" class="ui red button">
                         
                         <i class="eye icon"></i>Ver reporte
                        </a>
        </div>
        </div>
        </form>

        </div>

</div>
<br>
<div class="ui divider"></div>
    <div class="content" class="ui equal width form">
    <form class="ui form" id="frmFechas">
                        <div class="field">

                            <div class="fields">
                            <div class="one wide field"></div>
                                <div class="seven wide field">

                                    <label>
                                    <i class="calendar icon"></i>Fecha inicial:</label>
                                    <input type="date" name="fecha1" id="fecha1">
                                </div>

                                <div class="seven wide field">
                                    <label>
                                    <i class="calendar icon"></i>Fecha final:</label>
                                    <input type="date" name="fecha2" id="fecha2">
                                </div>

                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                            <div class="six wide field"></div>
                                <div class="seven wide field">
                                <button class="ui green right button" id="btnGenerarReportePorFechas">
                                Generar reporte
                                </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        
    </form>                    
    </div>
    <div class="actions">
    <button class="ui black deny button" id="">
        Cancelar
    </button>
</div>
</div>


<div class="ui tiny modal" id="modalReportesIng" style="width:40%;">
    <div class="header">
    <i class="clipboard outline icon"></i> Reportes Ingresos<font color="#DFD102" size="20px">.</font>
    </div><br>
    <div class="content" class="ui equal width form">
            <div class="row">
        <center><label style="font-weight: bold; font-size: 15px; ">Reporte diario de Ingresos</label></center><br>
        </div>
        <div class="content" class="ui equal width form">
            <form class="ui form">
            <div class="field">
            <div class="fields">

            <a href="?1=IngresosController&2=llamaReporte" target="_blank" style="width:30%; margin:auto;" id="btnReportes" class="ui red button">
                            
                            <i class="eye icon"></i>Ver reporte
                            </a>
            </div>
            </div>
            </form>

            </div>
            
        <div class="ui divider"></div>
        <div class="row">
            <label style="font-weight: bold; font-size: 15px;">Por Fechas</label>
        </div>
    <div class="content" class="ui equal width form">
                <form class="ui form">
                    <div class="field">
                    <div class="fields">
                        <div class="eight wide field"><br>
                                <label><i class="calendar icon"></i>Fecha inicial:</label>
                                <input type="date" name="fecha1I" id="fecha1I" >
                        </div>

                        <div class="eight wide field"><br>
                            <label> <i class="calendar icon"></i>Fecha final: </label>
                            <input type="date" name="fecha2I" id="fecha2I">
                        </div>    

                        </div>
                        </div>
                        
                        <div class="field">
                            <div class="fields">
                                <a class="ui blue  button" id="btnGenerarReportePorFechasI" style="width:30%; margin:auto;">
                                <i class="file icon"></i>Generar
                                </a>

                            </div>
                        </div>

                </form>
    </div>
    </div>
        <br>
    <div class="actions">
        
        <button class="ui black deny button" id="">
            Cancelar
        </button>
    </div>
 </div>







<div class="ui modal" id="rptMora" style="width:40%;">
    <div class="header">
    <i class="trash icon"></i> Reportes de personas con cuotas atrasadas<font color="#DFD102" size="20px">.</font>
    </div><br>
    <div class="content" class="ui equal width form">
    <form class="ui form">
        <div class="field">
            <div class="fields">      
            <div class="two wide field"></div> 
                <div class="six wide field">
                    <label><i class="dollar icon"></i>Selecciona el área: </label>
                    <select class="ui  dropdown" id="morosos">
                        <option value="1" selected="selected">Gimnasio</option>
                        <option value="2">Escuela de Fútbol</option>
                        <option value="3">Escuela de Natacion</option>
                    </select>
                </div>
                <div class="six wide field">
                    <label><br></label>
                    <a id="verMorosos" class="ui blue button">
                    Ver Reporte
                    </a>
                </div>
            </div>
        </div> 
    </form>
    </div>
    <div class="actions">
    <button class="ui black deny button" id="">
            Cancelar
        </button>
    </div>
</div>



<div class="ui modal" id="rptCuentas" style="width:40%;">
    <div class="header">
    <i class="dollar icon"></i>Reporte por cuentas bancarias<font color="#DFD102" size="20px">.</font>
    </div><br>
    <div class="content" class="ui equal width form">
    <form class="ui form">
        <div class="field">
            <div class="fields">      
            
                <div class="fourteen wide field">
                    <label><i class="dollar icon"></i>Selecciona la cuenta: </label>
                    <select class="ui  dropdown" id="cuentas">
    
                    </select>
                </div>
                <div class="two wide field">
                    <label><br></label>
                    <a id="verRptCuentas" class="ui blue button">
                    <i class="file icon"></i>
                    </a>
                </div>
            </div>
        </div> 
    </form>
    </div>
    <div class="actions">
    <button class="ui black deny button" id="">
            Cancelar
        </button>
    </div>
</div>



<div class="ui modal" id="rptOtros" style="width:40%;">
    <div class="header">
    <i class="file outline icon"></i>Otros reportes<font color="#DFD102" size="20px">.</font>
    </div><br>
    <div class="content" class="ui equal width form">
    <form class="ui form">
        <div class="field">
            <div class="fields">      
            <div class="two wide field"></div> 
                <div class="eight wide field">
                    <label><i class="dollar icon"></i>Selecciona el área: </label>
                    <select class="ui  dropdown" id="otrosRpts">
                        <option value="1" selected="selected">Gimnasio</option>
                        <option value="2">Escuela de Natación</option>
                        <option value="3">Jugadores en Fondo Común</option>
                        

                    </select>
                </div>
                <div class="six wide field">
                    <label><br></label>
                    <a id="otrosRpt" class="ui blue button">
                    Ver Reporte
                    </a>
                </div>
            </div>
        </div> 
    </form>
    </div>
    <div class="actions">
    <button class="ui black deny button" id="">
            Cancelar
        </button>
    </div>
</div>


<div class="ui tiny modal" id="efectivoModal">
    <div class="header">
    <i class="file icon"></i>Reporte Consolidado
    </div>

    <div class="content" >
        <form class="ui form">
            <div class="field">
                <div class="fields">
                        <div class="five wide field">
                            <label><i class="dollar icon"></i>Dinero en efectivo:</label>
                        </div>
                        <div class="eleven wide field">
                            <input type="text" name="txtEfectivo" id="txtEfectivo">
                        </div>
                </div>
            </div>
        </form>
    </div>

    <div class="actions">
        <button class="ui red deny button">
        Cancelar
        </button>
        <button class="ui blue button" id="verReporteC">
        Reporte
        </button>
    </div>
</div>

<script>
$(document).ready(function(){
    var d = new Date();
var month = new Array();
month[0] = "01";
month[1] = "02";
month[2] = "03";
month[3] = "04";
month[4] = "05";
month[5] = "06";
month[6] = "07";
month[7] = "08";
month[8] = "09";
month[9] = "10";
month[10] = "11";
month[11] = "12";
var n = month[d.getMonth()];
var anio = d.getFullYear();

 $("#mes").val(n);
 $("#anio").val(anio);

 


 $("#txtEfectivo").mask("###0.00", {reverse: true});



});


$(document).on("click", "#btnReporteC", function () {

    $('#efectivoModal').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
      
});

$(document).on("click", "#verReporteC", function () {
    var mes = $('#mes').val();
        var anio = $('#anio').val();
        var efectivo = $('#txtEfectivo').val();
        window.open('?1=UsuarioController&2=reporteConsolidado&mes='+mes+'&anio='+anio+'&efectivo='+efectivo,'_blank');
        return false;
});


$(document).on("click", "#btnGenerarReporteEg", function () {
    $('#modalReportesEgresos').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});

$(document).on("click", "#btnTorneoRpt", function () {
    $('#rptTorneo').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});

$(document).on("click", "#btnCategoriasRpt", function () {
    $('#rptCategorias').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});

$(document).on("click", "#btnGenerarReporteIng", function () {
    $('#modalReportesIng').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});

$("#cerrarReporte").click(function(){
  $("#modalReportes").modal('hide');
  $("#fecha1").val('');
  $("#fecha2").val('');
});

$(document).on("click", "#btnGenerarReportePorFechasI", function () {
        var fecha = $('#fecha1I').val();
        var fecha2 = $('#fecha2I').val();
window.open('?1=IngresosController&2=reportePorFechas&fecha='+fecha+'&fecha2='+fecha2,'_blank');
return false;
});


$(document).on("click", "#btnGenerarReportePorFechas", function () {
        var fecha = $('#fecha1').val();
        var fecha2 = $('#fecha2').val();
window.open('?1=EgresosController&2=reportePorFechas&fecha='+fecha+'&fecha2='+fecha2,'_blank');
return false;
});


$(document).on("click", "#verPorCat", function () {
        var cate = $('#categoria').val();
window.open('?1=IngresosController&2=rptCategorias&cate='+cate);
return false;
});


$(document).on("click", "#verRptCuentas", function () {

    var mes = $('#mes').val();
        var anio = $('#anio').val();
        var cuentas = $('#cuentas').val();
window.open('?1=EgresosController&2=rptCuentas&cuentas='+cuentas+'&mes='+mes+'&anio='+anio,'_blank');
return false;
});


$(document).on("click", "#verPorTorneos", function () {
        var torneos = $('#torneos').val();
window.open('?1=IngresosController&2=rptTorneos&torneos='+torneos);
return false;
});


$(document).on("click", "#btnMora", function () {
    $('#rptMora').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});

$(document).on("click", "#btnCuentas", function () {
    $('#rptCuentas').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});


$(document).on("click", "#btnEscuelaFut", function () {
    $('#rptEscuelaFut').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});


$(document).on("click", "#btnOtros", function () {
    $('#rptOtros').modal('setting', 'autofocus', true).modal('setting', 'closable', false).modal('show');
});


$(document).on("click", "#otrosRpt", function () {
    var op= $('#otrosRpts').val();

    if(op == 1){
        window.open('?1=GimnasioController&2=usuariosGim');
        return false;
    }

    if(op == 2){
        window.open('?1=NatacionController&2=usuariosNat');
        return false;
    }
    if(op == 3){
        window.open('?1=JugadoresController&2=fondoComunRpt');
        return false;
    }
});


$(document).on("click", "#verEscuelaFut", function () {
    var op= $('#nivel').val();

    if(op == 1){
        window.open('?1=EscFutbolController&2=escuelaFutUsers&id='+1);
        return false;
    }

    if(op == 2){
        window.open('?1=EscFutbolController&2=escuelaFutUsers&id='+2);
        return false;
    }
    if(op == 3){
        window.open('?1=EscFutbolController&2=escuelaFutUsers&id='+3);
        return false;
    }
    if(op == 4){
        window.open('?1=EscFutbolController&2=escuelaFutUsers&id='+4);
        return false;
    }
    if(op == 5){
        window.open('?1=EscFutbolController&2=escuelaFutUsers&id='+5);
        return false;
    }
    if(op == 6){
        window.open('?1=EscFutbolController&2=escuelaFutUsers&id='+6);
        return false;
    }
});


$(document).on("click", "#verMorosos", function () {
    var op= $('#morosos').val();

    if(op == 1){
        window.open('?1=GimnasioController&2=morososGimnasio');
        return false;
    }

    if(op == 2){
        window.open('?1=EscFutbolController&2=morososEscFutbol');
        return false;
    }
    if(op == 3){
        window.open('?1=NatacionController&2=morososNatacion');
        return false;
    }
    
});



        

        


        $(function() {
    var ops = '';
            var cuentas = '<?php echo $chequerasCMB?>';

            $.each(JSON.parse(cuentas), function() {
                ops = `<option value="${this.idChequera}">Categoria: ${this.chequera} -- N° Cuenta: ${this.numeroCuenta}</option>`;

                $('#cuentas').append(ops);
            });

        });
</script>