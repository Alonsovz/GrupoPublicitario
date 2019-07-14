<?php

class Funciones extends ControladorBase {

    public function proveedor(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $tipoSum=$_POST['tipoSum'];

	$sql="SELECT idProducto,
			 nombre
		from clasificacionProductos 
		where idClasificacion='$tipoSum' and idEliminado=1";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label> <i class='calendar check outline icon'></i>Clasificacion (productos disponibles)</label> 
			<select id='clasificacion' name='clasificacion' class='ui dropdown'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	}

	public function proveedorGastos(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $tipoSum=$_POST['tipoSum'];

	$sql="SELECT idGasto,
			 nombre
		from gastosOficina 
		where  idEliminado=1";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label> <i class='dollar icon'></i>Gastos: </label> 
			<select id='clasificacion' name='clasificacion' class='ui dropdown'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	}
	
	


    public function proveedorEdit(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $tipoSum=$_POST['tipoSumE'];

	$sql="SELECT idProducto,
			 nombre
		from clasificacionProductos 
		where idClasificacion='$tipoSum' and idEliminado=1";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena;
	}
	
	public function clienteDirec(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idCliente=$_POST['id'];

	$sql="SELECT direccion
		from clientes 
		where idCliente='$idCliente' and idEliminado=1";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.utf8_encode($ver[0]).'';
	}

	echo  $cadena;
	}
	
	public function clienteDepar(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idCliente=$_POST['id'];

	$sql="SELECT departamento
		from clientes 
		where idCliente='$idCliente' and idEliminado=1";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.utf8_encode($ver[0]).'';
	}

	echo  $cadena;
	}
	
	public function clienteNit(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idCliente=$_POST['id'];

	$sql="SELECT nit
		from clientes 
		where idCliente='$idCliente' and idEliminado=1";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.utf8_encode($ver[0]).'';
	}

	echo  $cadena;
	}
	
	public function clienteGiro(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idCliente=$_POST['id'];

	$sql="SELECT giro
		from clientes 
		where idCliente='$idCliente' and idEliminado=1";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.utf8_encode($ver[0]).'';
	}

	echo  $cadena;
    }


    public function productoFinalGr(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idPro=$_POST['idPro'];

	$sql="SELECT idProductoFinal,
			 productoFinal
		from productoFinal 
		where idProducto='$idPro' or idProducto=0 group by productoFinal order by idProductoFinal asc";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena;
	}
	

	public function unidadMedida(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idPro=$_POST['idPro'];

	$sql="SELECT m.medida from medidas m
	inner join productosDetalle p on p.idMedida = m.idMedida
			inner join productoFinal  f on f.idProductoFinal = p.idProductoFinal 
			where f.idProductoFinal='$idPro' group by m.medida";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.$ver[0].'';
	}

	echo  $cadena;
	}
	

	public function acabado(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idPro=$_POST['idPro'];

	$sql="SELECT m.idAcabado, m.acabado from acabados m
	inner join productosDetalle p on p.idAcabado = m.idAcabado
			inner join productoFinal  f on f.idProductoFinal = p.idProductoFinal 
			where f.idProductoFinal='$idPro' group by acabado";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena;
	}


	public function color(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
        $idPro=$_POST['idPro'];

	$sql="SELECT m.idColor, m.color from colores m
	inner join productosDetalle p on p.idColor = m.idColor
			inner join productoFinal  f on f.idProductoFinal = p.idProductoFinal 
			where f.idProductoFinal='$idPro' group by color";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena;
	}

	public function verDetallesProFinal(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['id'];
		

	if($_POST['id']){
		$sql="SELECT idProductoFinal,
			 productoFinal
		from productoFinal 
		where idProducto='$idPro' group by productoFinal order by idProductoFinal asc";

		$result=mysqli_query($conexion,$sql);

		$cadena="";
		while ($ver=mysqli_fetch_row($result)) {
			$cadena=$cadena.'<a class="ui black button" idP="'.utf8_encode($ver[0]).'" id="'.utf8_encode($ver[1]).'" onclick = detallePro(this)>'.utf8_encode($ver[1]).'</a>&nbsp;&nbsp;&nbsp;';
		}

		echo  $cadena;
	}

	}


	

	public function verDetallesColor(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idC'];
	

	if($_POST['idC']){
		$sql="
		select p.*, c.color,a.acabado,m.medida,format(i.precioSugerido,2) as precioSugerido  from productosDetalle p
				inner join colores c on c.idColor = p.idColor
				inner join acabados a on a.idAcabado = p.idAcabado
				inner join medidas m on m.idMedida = p.idMedida
				inner join inventario i on i.idProducto= p.idProductoFinal
				and i.idColor=p.idColor and i.idAcabado = p.idAcabado
				inner join productoFinal pF on pF.idProductoFinal = p.idProductoFinal
		 where pF.idProductoFinal='".$idPro."' group by p.idProductoFinal,p.idAcabado,p.idColor order by precioSugerido asc";

		$result=mysqli_query($conexion,$sql);

		$cadena="
		<table class='ui table bordered' style='width:100%;text-align:center'>
		<tr>
		<th style='color:white;background-color:black;' height='40px;'>Acabado</th>
		<th style='color:white;background-color:black;' height='40px;'>Color</th>
		<th style='color:white;background-color:black;' height='40px;'>Medida</th>
		<th style='color:white;background-color:black;' height='40px;'>Precio Sugerido</th>
		</tr>
		";
		while ($ver=mysqli_fetch_assoc($result)) {
			$cadena=$cadena.'<tr>
			<td style="border:1px solid black;">
			'.utf8_encode($ver["acabado"]).'
			</td>
			
			<td style="border:1px solid black;">
			'.utf8_encode($ver["color"]).'
			</td>

			<td style="border:1px solid black;">
			'.utf8_encode($ver["medida"]).'
			</td>
			<td style="border:1px solid black;">
			$'.utf8_encode($ver["precioSugerido"]).'
			</td>
			
			 
			 
			 </tr>';
		}

		echo  $cadena;
	}

	}

	

	

	public function colores(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idCla'];

		if($_POST['idCla']){
			$sql="select idColor,color from colores where idClasificacion='".$idC."' and idEliminado=1 group by color order by idColor asc";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:80%;text-align:center;'>
			<tr>
				<th style='font-size:20px;background-color:#FACA8C;'>Color</th>
				<th style='font-size:20px;background-color:#FACA8C;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr><td>'.utf8_encode($ver[1]).'</td>
				<td><a id='.$ver[0].' color="'.utf8_encode($ver[1]).'" class="ui icon orange small button" onclick="eliminarColorPaleta(this)">
				<i class="trash icon"></i></a></td></tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}


	public function acabados(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idCla'];

		if($_POST['idCla']){
			$sql="select idAcabado,acabado from acabados where idClasificacion='".$idC."' and idEliminado=1 group by acabado order by idAcabado asc";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:80%;text-align:center;'>
			<tr>
				<th style='font-size:20px;background-color:#89DE5F;'>Acabado</th>
				<th style='font-size:20px;background-color:#89DE5F;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr><td>'.utf8_encode($ver[1]).'</td>
				<td><a id='.$ver[0].' acabado="'.utf8_encode($ver[1]).'" class="ui icon green small button" onclick="eliminarAcabadoPaleta(this)">
				<i class="trash icon"></i></a></td></tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}


	public function medidas(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idCla'];

		if($_POST['idCla']){
			$sql="select idMedida,medida from medidas where idClasificacion='".$idC."' and idEliminado=1 group by medida order by idMedida asc";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:80%;text-align:center;'>
			<tr>
				<th style='font-size:20px;background-color:#D6A7F4;'>Medida</th>
				<th style='font-size:20px;background-color:#D6A7F4;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr><td>'.utf8_encode($ver[1]).'</td>
				<td><a id='.$ver[0].' medida="'.utf8_encode($ver[1]).'" class="ui icon purple small button" onclick="eliminarMedidaPaleta(this)">
				<i class="trash icon"></i></a></td></tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}


	public function proveedorCondicion(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idPro'];

		if($_POST['idPro']){
			$sql="select condicionCredito from proveedores where idProveedor='".$idC."' and idEliminado=1";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.utf8_encode($ver[0]);
			}
			

			echo  $cadena;
		}

	}


	public function proveedorProductos(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idPro'];

		if($_POST['idPro']){
			$sql="select c.idProducto,c.nombre from clasificacionProductos c
			inner join proveedores p on p.idClasificacion = c.idProducto
			where p.idProveedor ='".$idC."' and p.idEliminado=1";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'
				<option value="Seleccione" set selected>Seleccione una opción</option>
				<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
			}
			

			echo  $cadena;
		}

	}


	public function verDetallesRequisicion(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['id'];

		if($_POST['id']){
			$sql="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precioUnitario,2) as precio,
			format(d.total,2) as precioTotal from detalleRequisicion d
			inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
			inner join colores c on c.idColor = d.color
			inner join acabados a on a.idAcabado = d.acabado
			inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
			inner join medidas m on m.idMedida = pm.idMedida
			where d.idRequisicion='".$idC."' group by d.idDetalle ";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:100%;text-align:left;'>
			<tr>
				<th style='background-color:#B40431;color:white;' height='50'>Producto</th>
				<th style='background-color:#B40431;color:white;'>Cantidad</th>
				<th style='background-color:#B40431;color:white;'>Medidas</th>
				<th style='background-color:#B40431;color:white;'>Descripcion</th>
				<th style='background-color:#B40431;color:white;'>Precio</th>
				<th style='background-color:#B40431;color:white;'>Precio Total</th>
				
			</tr>
			";
			while ($ver=mysqli_fetch_assoc($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver["productoFinal"]).'<br>
					<b>Color:</b> '.utf8_encode($ver["color"]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver["acabado"]).'<br>
				</td>
				<td>
				'.utf8_encode($ver["cantidad"]). ' ' .utf8_encode($ver["medida"]).'
				</td>

				<td>
				'.utf8_encode($ver["medidas"]). '
				</td>

				<td>
				'.utf8_encode($ver["descripcion"]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver["precio"]). '
				</td>
				<td>
				$ '.utf8_encode($ver["precioTotal"]). '
				</td>
				</tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}


	public function verDetallesRequisicionAp(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['id'];

		if($_POST['id']){
			$sql="select d.*,p.productoFinal,c.color as colorR,a.acabado as acabadoR,m.medida,format(d.precioUnitario,2) as precio,
			format(d.total,2) as precioTotal,  (d.precioUnitario/i.cantidadExistencia + d.cantidad) as precioIn from detalleRequisicion d
			inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
			inner join colores c on c.idColor = d.color
			inner join acabados a on a.idAcabado = d.acabado
			inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
			inner join medidas m on m.idMedida = pm.idMedida
            inner join inventario i on i.idProducto = p.idProductoFinal
			where d.idRequisicion='".$idC."' group by d.idDetalle";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:100%;text-align:left;'>
			<tr>
				<th style='background-color:#B40431;color:white;' height='50'>Producto</th>
				<th style='background-color:#B40431;color:white;'>Cantidad</th>
				<th style='background-color:#B40431;color:white;'>Medidas</th>
				<th style='background-color:#B40431;color:white;'>Descripcion</th>
				<th style='background-color:#B40431;color:white;'>Precio Unitario</th>
				<th style='background-color:#B40431;color:white;'>Precio Total</th>
				
				<th style='background-color:#B40431;color:white; width:5%;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_assoc($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver["productoFinal"]).'<br>
					<b>Color:</b> '.utf8_encode($ver["colorR"]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver["acabadoR"]).'<br>
				</td>
				<td>
				'.utf8_encode($ver["cantidad"]). ' ' .utf8_encode($ver["medida"]).'
				</td>

				<td>
				'.utf8_encode($ver["medidas"]). '
				</td>

				<td>
				'.utf8_encode($ver["descripcion"]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver["precio"]). '
				</td>
				<td>
				$ '.utf8_encode($ver["precioTotal"]). '
				</td>
				
				';
				if(utf8_encode($ver["estado"])==1){
					$cadena=$cadena.'<td>
					<a class="ui green small icon button" idD='.utf8_encode($ver["idDetalle"]). '
					idPr='.utf8_encode($ver["idProductoFinal"]). ' color='.utf8_encode($ver["color"]). ' acabado='.utf8_encode($ver["acabado"]). '
					pro="'.utf8_encode($ver["productoFinal"]). '" co="'.utf8_encode($ver["colorR"]). '" ac="'.utf8_encode($ver["acabadoR"]). '"
					me="'.utf8_encode($ver["medida"]). '"
					cantidad ="'.utf8_encode($ver["cantidad"]). '" precio ="'.utf8_encode($ver["precioIn"]). '" onclick="recibir(this)"
					><i class="pencil icon"></i></a>
					</td>';
				}else{
					$cadena=$cadena.'<td><a class="ui blue small icon button"><i class="check icon"></i></a></td>';
				}
				
				$cadena=$cadena.'</tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}




	public function verDetallesOTIP(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['id'];

		if($_POST['id']){
			$sql="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio from detalleOrdenIP d
			inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
			inner join colores c on c.idColor = d.idColor
			inner join acabados a on a.idAcabado = d.idAcabado
			inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
			inner join medidas m on m.idMedida = pm.idMedida
			where d.idOrden='".$idC."' group by d.idDetalle";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:100%;text-align:left;'>
			<tr>
				<th style='background-color:#B40431;color:white;' height='50'>Producto</th>
				<th style='background-color:#B40431;color:white;'>Cantidad</th>
				<th style='background-color:#B40431;color:white;'>Tipo</th>
				<th style='background-color:#B40431;color:white;'>Descripcion</th>
				<th style='background-color:#B40431;color:white;'>Precio</th>
				<th style='background-color:#B40431;color:white;width:5%;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_assoc($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver["productoFinal"]).'<br>
					<b>Color:</b> '.utf8_encode($ver["color"]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver["acabado"]).'<br>
				</td>
				<td>
				'.utf8_encode($ver["cantidad"]). ' ' .utf8_encode($ver["medida"]).'
				</td>

				<td>
				'.utf8_encode($ver["tipo"]). '
				</td>

				<td>
				'.utf8_encode($ver["descripciones"]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver["precio"]). '
				</td>';
				
				if(utf8_encode($ver["estado"]==1)){
					$cadena=$cadena.'<td><a class="ui blue small icon button" idOrden ="'.utf8_encode($ver["idOrden"]).'"
					idDetalle ="'.utf8_encode($ver["idDetalle"]).'"
					 idAcabado ="'.utf8_encode($ver["idAcabado"]).'" idColor="'.utf8_encode($ver["idColor"]).'"
					idProducto="'.utf8_encode($ver["idProductoFinal"]).'" cantidad="'.utf8_encode($ver["cantidad"]).'" onclick="recibirPro(this)">
					<i class="check icon"></i></a></td>';
				}else{
					$cadena=$cadena.'<td></td>';
				}
				
				$cadena=$cadena.'</tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}



	public function verDetallesOTP(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['id'];

		if($_POST['id']){
			$sql="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio from detalleOrdenP d
			inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
			inner join colores c on c.idColor = d.idColor
			inner join acabados a on a.idAcabado = d.idAcabado
			inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
			inner join medidas m on m.idMedida = pm.idMedida
			where d.idOrden='".$idC."' group by d.idDetalle";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:100%;text-align:left;'>
			<tr>
				<th style='background-color:#B40431;color:white;' height='50'>Producto</th>
				<th style='background-color:#B40431;color:white;'>Cantidad</th>
				<th style='background-color:#B40431;color:white;'>Tipo</th>
				<th style='background-color:#B40431;color:white;'>Descripcion</th>
				<th style='background-color:#B40431;color:white;'>Precio</th>
				<th style='background-color:#B40431;color:white;width:5%;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_assoc($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver["productoFinal"]).'<br>
					<b>Color:</b> '.utf8_encode($ver["color"]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver["acabado"]).'<br>
				</td>
				<td>
				'.utf8_encode($ver["cantidad"]). ' ' .utf8_encode($ver["medida"]).'
				</td>

				<td>
				'.utf8_encode($ver["tipo"]). '
				</td>

				<td>
				'.utf8_encode($ver["descripciones"]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver["precio"]). '
				</td>';
				
				if(utf8_encode($ver["estado"]==1)){
					$cadena=$cadena.'<td><a class="ui blue small icon button" idOrden ="'.utf8_encode($ver["idOrden"]).'"
					idDetalle ="'.utf8_encode($ver["idDetalle"]).'"
					 idAcabado ="'.utf8_encode($ver["idAcabado"]).'" idColor="'.utf8_encode($ver["idColor"]).'"
					idProducto="'.utf8_encode($ver["idProductoFinal"]).'" cantidad="'.utf8_encode($ver["cantidad"]).'" 
					onclick="recibirPro(this)">
					<i class="check icon"></i></a></td>';
				}else{
					$cadena=$cadena.'<td></td>';
				}
				
				$cadena=$cadena.'</tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}



	public function verDetallesOTGR(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['id'];

		if($_POST['id']){
			$sql="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precio,2) as precio from detalleOrdenGR d
			inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
			inner join colores c on c.idColor = d.idColor
			inner join acabados a on a.idAcabado = d.idAcabado
			inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
			inner join medidas m on m.idMedida = pm.idMedida
			where d.idOrden='".$idC."' group by d.idDetalle";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:100%;text-align:left;'>
			<tr>
				<th style='background-color:#B40431;color:white;' height='50'>Producto</th>
				<th style='background-color:#B40431;color:white;'>Cantidad</th>
				<th style='background-color:#B40431;color:white;'>Detalles Generales</th>
				<th style='background-color:#B40431;color:white;'>Def Medidas</th>
				<th style='background-color:#B40431;color:white;'>Imp + Desperdicio</th>
				<th style='background-color:#B40431;color:white;'>Descripcion</th>
				<th style='background-color:#B40431;color:white;'>Precio</th>
				
			</tr>
			";
			while ($ver=mysqli_fetch_assoc($result)) {
				$cadena=$cadena.'<tr>
				<td>
					<b>Producto:</b> '.utf8_encode($ver["productoFinal"]).'<br>
					<b>Color:</b> '.utf8_encode($ver["color"]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver["acabado"]).'<br>
				</td>
				<td>
				'.utf8_encode($ver["cantidad"]). ' ' .utf8_encode($ver["medida"]).'
				</td>

				<td>
				    <b>Altura:</b> '.utf8_encode($ver["altura"]).'<br>
					<b>Base:</b> '.utf8_encode($ver["base"]).'<br>
					<b>Mts 2 Imp:</b> '.utf8_encode($ver["cuadrosImp"]).'<br>
					
				</td>

				<td>
				    <b>Ancho:</b> '.utf8_encode($ver["ancho"]).'<br>
					<b>Longitud:</b> '.utf8_encode($ver["longitud"]).'<br>
					<b>Ancho Material:</b> '.utf8_encode($ver["anchoMat"]).'<br>
					
				</td>

				<td>
				<b>MTS2:</b> '.utf8_encode($ver["mts2"]).'<br>
				<b>Desperdicio:</b>$ '.utf8_encode($ver["desperdicio"]).'<br>
				</td>
				<td>
				 '.utf8_encode($ver["descripciones"]). '
				</td>
				<td>
				$ '.utf8_encode($ver["precio"]). '
				</td>
				
				</tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}


	public function gastosOficina(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idCla'];

		if($_POST['idCla']){
			$sql="select g.idGasto,g.nombre
			from gastosOficina g
			where g.idEliminado=1";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:80%;text-align:center;'>
			<tr>
				<th style='font-size:15px;background-color:#110991;color:white;' height='40'>Nombre de Gasto</th>
				<th style='font-size:20px;background-color:#110991;color:white;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_assoc($result)) {
				$cadena=$cadena.'<tr><td>'.utf8_encode($ver["nombre"]).'</td>
				<td><a id='.$ver["idGasto"].' nombre="'.utf8_encode($ver["nombre"]).'" class="ui icon red small button" onclick="eliminarGasto(this)">
				<i class="trash icon"></i></a></td></tr>';
			}
			$cadena=$cadena."
			
			</table>";

			echo  $cadena;
		}

	}


	public function verDetallesProFinalInventario(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['id'];
		

	if($_POST['id']){
		$sql="SELECT idProductoFinal,
			 productoFinal
		from productoFinal 
		where idProducto='$idPro'  group by productoFinal order by idProductoFinal asc";

		$result=mysqli_query($conexion,$sql);


		

		$cadena="";
		while ($ver=mysqli_fetch_row($result)) {
			$cadena=$cadena.'<a class="ui black button" idP="'.utf8_encode($ver[0]).'" id="'.utf8_encode($ver[1]).'"
			 onclick = detallePro(this)>'.utf8_encode($ver[1]).'</a>&nbsp;&nbsp;&nbsp;';
		}

		echo  $cadena;
	}

	}


	public function verDetallesInventarioGR(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idC'];
	

		if($_POST['idC']){
		$sql="select i.*,c.*,a.*,m.*, format(i.precioUnitario,2) as precioU, format(i.cantidadExistencia,2) as cantidadEx,
		format(i.precioDesperdicio,2) as precioD,format(i.precioSugerido,2) as precioSug
		 from inventario i
		inner join productosDetalle pc on pc.idProductoFinal = i.idProducto
		inner join colores c on c.idColor = i.idColor
		inner join acabados a on a.idAcabado = i.idAcabado
		inner join medidas m on m.idMedida = pc.idMedida
		inner join productoFinal p on p.idProductoFinal = pc.idProductoFinal
		where p.idProductoFinal =".$idPro." group by i.idProducto,i.idColor,i.idAcabado order by precioSug asc";

		$result=mysqli_query($conexion,$sql);

		

		

		$cadena="

		<table style='width:100%;' class='ui celled table'>
		<tr>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Acabado</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Color</th>
		
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Unidad de Medida</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Existencia</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Precio Unitario</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Precio por desperdicio</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Precio establecido</th>
	
		</tr>
		";		
			while ($ver=mysqli_fetch_assoc($result)) {
				$cadena.='<tr>
				
				<td>'.utf8_encode($ver["acabado"]).'</td>
				<td>'.utf8_encode($ver["color"]).'</td>
				<td>'.utf8_encode($ver["medida"]).'</td>';
				if(utf8_encode($ver["cantidadExistencia"]) == "0"){

					$cadena.='<td><center>
					<a class="ui red small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
					idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'" medida= "'.utf8_encode($ver["medida"]).'"
					color= "'.utf8_encode($ver["color"]).'" onclick="agregarExistencia(this)"
					><i class="edit icon"></i></a></center>
					</td>';
					
				}else{
					$cadena.='<td style="text-align:center;">'.utf8_encode($ver["cantidadExistencia"]).'
					&nbsp;&nbsp;&nbsp;
					<a class="ui red small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
					idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'" medida= "'.utf8_encode($ver["medida"]).'"
					color= "'.utf8_encode($ver["color"]).'" onclick="agregarExistencia(this)"
					><i class="edit icon"></i></a></center>
					</td>';
				}
				

				if(utf8_encode($ver["precioU"]) == "0"){

					$cadena.='<td><center>
					<a class="ui green small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
					idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida= "'.utf8_encode($ver["medida"]).'"
					color= "'.utf8_encode($ver["color"]).'" onclick="agregarPrecio(this)"
					><i class="edit icon"></i></a></center>
					</td>';
					
				}else{
					$cadena.='<td style="text-align:center;"> $ '.utf8_encode($ver["precioU"]).'
					&nbsp;&nbsp;&nbsp;
					<a class="ui green small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
					idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida= "'.utf8_encode($ver["medida"]).'"
					color= "'.utf8_encode($ver["color"]).'" onclick="agregarPrecio(this)"
					><i class="edit icon"></i></a
					</td>';
				}

				if(utf8_encode($ver["precioD"]) == "0"){

					$cadena.='<td><center>
					<a class="ui purple small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
					idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida="'.utf8_encode($ver["medida"]).'"
					color="'.utf8_encode($ver["color"]).'" onclick="agregarPrecioDesper(this)"
					><i class="edit icon"></i></a></center>
					</td>';
					
				}else{
					$cadena.='<td style="text-align:center;"> $ '.utf8_encode($ver["precioD"]).'
					&nbsp;&nbsp;&nbsp;
					<a class="ui purple small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
					idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida="'.utf8_encode($ver["medida"]).'"
					color="'.utf8_encode($ver["color"]).'" onclick="agregarPrecioDesper(this)"
					><i class="edit icon"></i></a>
					</td>';
				}
				$cadena.='<td>$ '.utf8_encode($ver["precioSug"]).'
				
				&nbsp;&nbsp;&nbsp;
					<a class="ui blue small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
					idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida="'.utf8_encode($ver["medida"]).'"
					color="'.utf8_encode($ver["color"]).'" onclick="modificarPrecioSug(this)"
					><i class="edit icon"></i></a>
				</td>';
				$cadena.='
				</tr>';
			}

			$cadena.='</table>';
			

		echo  $cadena;
	}
	

	}

	public function verDetallesInventario(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idC'];
	

		if($_POST['idC']){
		$sql="select i.*,c.*,a.*,m.*, format(i.precioUnitario,2) as precioU, format(i.cantidadExistencia,2) as cantidadEx,
		format(i.precioDesperdicio,2) as precioD,format(i.precioSugerido,2) as precioSug
		 from inventario i
		inner join productosDetalle pc on pc.idProductoFinal = i.idProducto
		inner join colores c on c.idColor = i.idColor
		inner join acabados a on a.idAcabado = i.idAcabado
		inner join medidas m on m.idMedida = pc.idMedida
		inner join productoFinal p on p.idProductoFinal = pc.idProductoFinal
		where p.idProductoFinal =".$idPro." group by i.idProducto,i.idColor,i.idAcabado";

		$result=mysqli_query($conexion,$sql);

		

		

		$cadena="

		<table style='width:100%;' class='ui celled table'>
		<tr>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Acabado</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Color</th>
		
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Unidad de Medida</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Existencia</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Precio Unitario</th>
		<th style='background-color:#110991;font-weight:bold; color:white; text-align:center;' height='40'>Precio Sugerido</th>
		
	
		</tr>
		";		
		while ($ver=mysqli_fetch_assoc($result)) {
			$cadena.='<tr>
			
			<td>'.utf8_encode($ver["acabado"]).'</td>
			<td>'.utf8_encode($ver["color"]).'</td>
			<td>'.utf8_encode($ver["medida"]).'</td>';
			if(utf8_encode($ver["cantidadExistencia"]) == "0"){

				$cadena.='<td><center>
				<a class="ui red small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
				idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'" medida= "'.utf8_encode($ver["medida"]).'"
				color= "'.utf8_encode($ver["color"]).'" onclick="agregarExistencia(this)"
				><i class="edit icon"></i></a></center>
				</td>';
				
			}else{
				$cadena.='<td style="text-align:center;">'.utf8_encode($ver["cantidadExistencia"]).'
				&nbsp;&nbsp;&nbsp;
				<a class="ui red small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
				idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'" medida= "'.utf8_encode($ver["medida"]).'"
				color= "'.utf8_encode($ver["color"]).'" onclick="agregarExistencia(this)"
				><i class="edit icon"></i></a></center>
				</td>';
			}
			

			if(utf8_encode($ver["precioU"]) == "0"){

				$cadena.='<td><center>
				<a class="ui green small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
				idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida= "'.utf8_encode($ver["medida"]).'"
				color= "'.utf8_encode($ver["color"]).'" onclick="agregarPrecio(this)"
				><i class="edit icon"></i></a></center>
				</td>';
				
			}else{
				$cadena.='<td style="text-align:center;"> $ '.utf8_encode($ver["precioU"]).'
				&nbsp;&nbsp;&nbsp;
				<a class="ui green small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
				idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida= "'.utf8_encode($ver["medida"]).'"
				color= "'.utf8_encode($ver["color"]).'" onclick="agregarPrecio(this)"
				><i class="edit icon"></i></a>
				</td>';
			}

			
			$cadena.='<td style="text-align:center;">$ '.utf8_encode($ver["precioSug"]).'
			&nbsp;&nbsp;&nbsp;
				<a class="ui blue small icon button" id='.utf8_encode($ver["idProducto"]).' idColor= '.utf8_encode($ver["idColor"]).'
				idAcabado= "'.utf8_encode($ver["idAcabado"]).'"  acabado= "'.utf8_encode($ver["acabado"]).'"  medida= "'.utf8_encode($ver["medida"]).'"
				color= "'.utf8_encode($ver["color"]).'" onclick="modificarPrecioSug(this)"
				><i class="edit icon"></i></a>
			</td>';
			$cadena.='
			</tr>';
		}

		$cadena.='</table>';
		

	echo  $cadena;
}


	

	}

	public function precioUnitario(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idPro'];
		$idColor=$_POST['idColor'];
		$idAcabado=$_POST['idAcabado'];

	$sql="SELECT format(precioSugerido,2) from inventario
			where idProducto='$idPro' and idColor = '$idColor' and idAcabado = '$idAcabado'";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.$ver[0].'';
	}

	echo  $cadena;
	}

	public function precioDes(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idPro'];
		$idColor=$_POST['idColor'];
		$idAcabado=$_POST['idAcabado'];

	$sql="SELECT format(precioDesperdicio,2) from inventario
			where idProducto='$idPro' and idColor = '$idColor' and idAcabado = '$idAcabado'";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.$ver[0].'';
	}

	echo  $cadena;
	}


	public function existencia(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idPro'];
		$idColor=$_POST['idColor'];
		$idAcabado=$_POST['idAcabado'];

	$sql="SELECT cantidadExistencia from inventario
			where idProducto='$idPro' and idColor = '$idColor' and idAcabado = '$idAcabado'";

	$result=mysqli_query($conexion,$sql);

	$cadena="";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.''.$ver[0].'';
	}

	echo  $cadena;
	}



	public function proveedorCondicionGasto(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idPro'];

		if($_POST['idPro']){
			$sql="select condicionCredito from proveedoresGastos where idGasto='".$idC."' and idEliminado=1";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.utf8_encode($ver[0]);
			}
			

			echo  $cadena;
		}

	}


	public function proveedorNombreGasto(){
		$conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idC=$_POST['idPro'];

		if($_POST['idPro']){
			$sql="select nombre from proveedoresGastos where idGasto='".$idC."' and idEliminado=1";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.utf8_encode($ver[0]);
			}
			

			echo  $cadena;
		}

	}



	
}