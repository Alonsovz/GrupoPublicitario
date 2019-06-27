<?php
            $fechaMaxima = date('Y-m-d');
            $fechaMax = strtotime ( '-0 day' , strtotime ( $fechaMaxima ) ) ;
            $fechaMax = date ( 'Y-m-d' , $fechaMax );

            $fechaMinima = date('Y-m-d');
            $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
            $fechaMin = date ( 'Y-m-d' , $fechaMin );
?>

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
<br>

<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <a href="?1=ClientesController&2=gestion"  style="width: 24%;" class="tiles-tiles ui red inverted segment">
        <h3>Clientes</h3>
        <div class="ui divider"></div>
        <i class="dollar icon"></i><i class="user icon"></i>
    </a>

    <a href="?1=ProveedoresController&2=gestion" style="width: 24%;"  class="tiles-tiles ui black inverted segment">
        <h3>Proveedores</h3>
        <div class="ui divider"></div>
        <i class="truck icon"></i><i class="user icon"></i>
    </a>

    <a href="?1=UsuarioController&2=gestion" style="width: 24%;"  class="tiles-tiles ui grey inverted segment">
        <h3>Usuarios</h3>
        <div class="ui divider"></div>
        <i class="lock icon"></i><i class="user icon"></i>
    </a>

   <a style="width: 24%;" href="?1=ProductosController&2=granFormato" class="tiles-tiles ui red inverted segment">
        <h3>Gestión de productos</h3>
        <div class="ui divider"></div>
        <i class="shipping cart icon"></i>
    </a>
</div>


<div class="row tiles" id="contenedor-tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <a href="?1=InventarioController&2=granFormato"  style="width: 24%;" class="tiles-tiles ui grey inverted segment">
        <h3>Inventario</h3>
        <div class="ui divider"></div>
        <i class="calendar check icon"></i><i class="list icon"></i>
    </a>

    <a href="?1=OTController&2=granFormato" style="width: 24%;"  class="tiles-tiles ui red inverted segment">
        <h3>Nueva OT</h3>
        <div class="ui divider"></div>
        <i class="plus icon"></i><i class="list icon"></i>
    </a>

    <a href="?1=ProduccionController&2=granFormato" style="width: 24%;"  class="tiles-tiles ui black inverted segment">
        <h3>OT en Producción</h3>
        <div class="ui divider"></div>
        <i class="cogs icon"></i><i class="list icon"></i>
    </a>

   <a style="width: 24%;" href="?1=FacturacionController&2=granFormato" class="tiles-tiles ui grey inverted segment">
        <h3>OT por facturar</h3>
        <div class="ui divider"></div>
        <i class="print icon"></i><i class="list icon"></i>
    </a>
</div>

