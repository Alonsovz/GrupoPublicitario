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
		$sql="select a.idColor, a.color  from colores a
		inner join productosDetalle pc on pc.idColor = a.idColor
		inner join productoFinal p on p.idProductoFinal = pc.idProductoFinal
		 where p.idProductoFinal='".$idPro."' order by idColor asc";

		$result=mysqli_query($conexion,$sql);

		$cadena="";
		while ($ver=mysqli_fetch_row($result)) {
			$cadena=$cadena.'<tr><td style="border:1px solid black;width:100%;">
			-'.utf8_encode($ver[1]).'</td>
			<td style="border:1px solid black;width:100%;">
			 <a id='.$ver[0].' class="ui icon red small button" onclick="eliminarColor(this)">
			 <i class="trash icon"></i></a>
			 
			 </td></tr>';
		}

		echo  $cadena;
	}

	}

	

	public function verDetallesAcabados(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idC'];
	

	if($_POST['idC']){
		$sql="select a.idAcabado, a.acabado  from acabados a
		inner join productosDetalle pc on pc.idAcabado = a.idAcabado
		inner join productoFinal p on p.idProductoFinal = pc.idProductoFinal
		 where pc.idProductoFinal='".$idPro."' order by idAcabado asc";

		$result=mysqli_query($conexion,$sql);

		$cadena="";
		while ($ver=mysqli_fetch_row($result)) {
			$cadena=$cadena.'<tr><td style="border:1px solid black;width:100%;">
			-'.utf8_encode($ver[1]).'</td>
			<td style="border:1px solid black;width:100%;">
			 <a id='.$ver[0].' class="ui icon red small button" onclick="eliminarAcabado(this)">
			 <i class="trash icon"></i></a>
			 
			 </td></tr>';
		}

		echo  $cadena;
	}

	}

	public function verDetallesMedidas(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idC'];
	

	if($_POST['idC']){
		$sql="select a.idMedida, a.medida  from medidas a
		inner join productosDetalle pc on pc.idMedida = a.idMedida
		inner join productoFinal p on p.idProductoFinal = pc.idProductoFinal
		 where pc.idProductoFinal='".$idPro."' order by idMedida asc";

		$result=mysqli_query($conexion,$sql);

		$cadena="";
		while ($ver=mysqli_fetch_row($result)) {
			$cadena=$cadena.'<tr><td style="border:1px solid black;width:100%;">
			-'.utf8_encode($ver[1]).'</td>
			<td style="border:1px solid black;width:100%;">
			 <a id='.$ver[0].' class="ui icon red small button" onclick="eliminarMedida(this)">
			 <i class="trash icon"></i></a>
			 
			 </td></tr>';
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
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver[12]).'<br>
					<b>Color:</b> '.utf8_encode($ver[13]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver[14]).'<br>
				</td>
				<td>
				'.utf8_encode($ver[5]). ' ' .utf8_encode($ver[15]).'
				</td>

				<td>
				'.utf8_encode($ver[6]). '
				</td>

				<td>
				'.utf8_encode($ver[7]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver[16]). '
				</td>
				<td>
				$ '.utf8_encode($ver[17]). '
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
			$sql="select d.*,p.productoFinal,c.color,a.acabado,m.medida,format(d.precioUnitario,2) as precio,
			format(d.total,2) as precioTotal from detalleRequisicion d
			inner join productoFinal p on p.idProductoFinal = d.idProductoFinal
			inner join colores c on c.idColor = d.color
			inner join acabados a on a.idAcabado = d.acabado
			inner join productosDetalle pm on pm.idProductoFinal = d.idProductoFinal
			inner join medidas m on m.idMedida = pm.idMedida
			where d.idRequisicion='".$idC."' and d.estado=1 group by d.idDetalle";
	
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
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver[12]).'<br>
					<b>Color:</b> '.utf8_encode($ver[13]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver[14]).'<br>
				</td>
				<td>
				'.utf8_encode($ver[5]). ' ' .utf8_encode($ver[15]).'
				</td>

				<td>
				'.utf8_encode($ver[6]). '
				</td>

				<td>
				'.utf8_encode($ver[7]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver[16]). '
				</td>
				<td>
				$ '.utf8_encode($ver[17]). '
				</td>
				<td>
				<a class="ui green small icon button" idD='.utf8_encode($ver[0]). '
				idPr='.utf8_encode($ver[2]). ' color='.utf8_encode($ver[3]). ' acabado='.utf8_encode($ver[4]). '
				pro="'.utf8_encode($ver[12]). '" co="'.utf8_encode($ver[13]). '" ac="'.utf8_encode($ver[14]). '"
				me="'.utf8_encode($ver[15]). '"
				cantidad ="'.utf8_encode($ver[5]). '" precio ="'.utf8_encode($ver[8]). '" onclick="recibir(this)"
				><i class="pencil icon"></i></a>
				</td>
				</tr>';
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
				
			</tr>
			";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver[10]).'<br>
					<b>Color:</b> '.utf8_encode($ver[11]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver[12]).'<br>
				</td>
				<td>
				'.utf8_encode($ver[5]). ' ' .utf8_encode($ver[12]).'
				</td>

				<td>
				'.utf8_encode($ver[6]). '
				</td>

				<td>
				'.utf8_encode($ver[7]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver[13]). '
				</td>
				</tr>';
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
				
			</tr>
			";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr>
				<td><b>Producto:</b> '.utf8_encode($ver[10]).'<br>
					<b>Color:</b> '.utf8_encode($ver[11]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver[12]).'<br>
				</td>
				<td>
				'.utf8_encode($ver[5]). ' ' .utf8_encode($ver[12]).'
				</td>

				<td>
				'.utf8_encode($ver[6]). '
				</td>

				<td>
				'.utf8_encode($ver[7]). '
				</td>
				
				<td>
				$ '.utf8_encode($ver[13]). '
				</td>
				</tr>';
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
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr>
				<td>
					<b>Producto:</b> '.utf8_encode($ver[18]).'<br>
					<b>Color:</b> '.utf8_encode($ver[19]).'<br>
					<b>Acabado:</b> '.utf8_encode($ver[20]).'<br>
				</td>
				<td>
				'.utf8_encode($ver[5]). ' ' .utf8_encode($ver[21]).'
				</td>

				<td>
				    <b>Altura:</b> '.utf8_encode($ver[6]).'<br>
					<b>Base:</b> '.utf8_encode($ver[7]).'<br>
					<b>Mts 2 Imp:</b> '.utf8_encode($ver[8]).'<br>
					<b>Ubicación:</b> '.utf8_encode($ver[9]).'<br>
				</td>

				<td>
				    <b>Ancho:</b> '.utf8_encode($ver[10]).'<br>
					<b>Longitud:</b> '.utf8_encode($ver[11]).'<br>
					<b>Ancho Material:</b> '.utf8_encode($ver[12]).'<br>
					
				</td>

				<td>
				<b>Copias:</b> '.utf8_encode($ver[13]).'<br>
				<b>MTS2:</b> '.utf8_encode($ver[14]).'<br>
				<b>Desperdicio:</b> '.utf8_encode($ver[15]).'<br>
				</td>
				<td>
				$ '.utf8_encode($ver[16]). '
				</td>
				<td>
				$ '.utf8_encode($ver[22]). '
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
			$sql="select idGasto,nombre from gastosOficina where idEliminado=1";
	
			$result=mysqli_query($conexion,$sql);
	
			$cadena="
			<table class='ui selectable very compact celled table' style='width:80%;text-align:center;'>
			<tr>
				<th style='font-size:15px;background-color:#110991;color:white;' height='40'>Nombre de Gasto</th>
				<th style='font-size:20px;background-color:#110991;color:white;'><i class='cogs icon'></i></th>
			</tr>
			";
			while ($ver=mysqli_fetch_row($result)) {
				$cadena=$cadena.'<tr><td>'.utf8_encode($ver[1]).'</td>
				<td><a id='.$ver[0].' nombre="'.utf8_encode($ver[1]).'" class="ui icon red small button" onclick="eliminarGasto(this)">
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


	public function verDetallesInventario(){
        $conexion= new mysqli('localhost','root','','grupoPublicitario');
		$idPro=$_POST['idC'];
	

		if($_POST['idC']){
		$sql="select i.*,c.*,a.*,m.*, format(i.precioUnitario,2), format(i.cantidadExistencia,2) from inventario i
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
		
		
	
		</tr>
		";		
			while ($ver=mysqli_fetch_row($result)) {
				$cadena.='<tr>
				
				<td>'.utf8_encode($ver[10]).'</td>
				<td>'.utf8_encode($ver[6]).'</td>
				<td>'.utf8_encode($ver[14]).'</td>';
				if(utf8_encode($ver[3]) == "0"){

					$cadena.='<td><center>
					<a class="ui red small icon button" id='.utf8_encode($ver[0]).' idColor= '.utf8_encode($ver[1]).'
					idAcabado= "'.utf8_encode($ver[2]).'"  acabado= "'.utf8_encode($ver[10]).'" medida= "'.utf8_encode($ver[14]).'"
					color= "'.utf8_encode($ver[6]).'" onclick="agregarExistencia(this)"
					><i class="edit icon"></i></a></center>
					</td>';
					
				}else{
					$cadena.='<td style="text-align:center;">'.utf8_encode($ver[3]).'
					&nbsp;&nbsp;&nbsp;
					<a class="ui red small icon button" id='.utf8_encode($ver[0]).' idColor= '.utf8_encode($ver[1]).'
					idAcabado= "'.utf8_encode($ver[2]).'"  acabado= "'.utf8_encode($ver[10]).'" medida= "'.utf8_encode($ver[14]).'"
					color= "'.utf8_encode($ver[6]).'" onclick="agregarExistencia(this)"
					><i class="edit icon"></i></a>
					</td>';
				}
				

				if(utf8_encode($ver[4]) == "0"){

					$cadena.='<td><center>
					<a class="ui green small icon button" id='.utf8_encode($ver[0]).' idColor= '.utf8_encode($ver[1]).'
					idAcabado= "'.utf8_encode($ver[2]).'"  acabado= "'.utf8_encode($ver[10]).'"  medida= "'.utf8_encode($ver[14]).'"
					color= "'.utf8_encode($ver[6]).'" onclick="agregarPrecio(this)"
					><i class="edit icon"></i></a></center>
					</td>';
					
				}else{
					$cadena.='<td style="text-align:center;"> $ '.utf8_encode($ver[17]).'
					&nbsp;&nbsp;&nbsp;
					<a class="ui green small icon button" id='.utf8_encode($ver[0]).' idColor= '.utf8_encode($ver[1]).'
					idAcabado= "'.utf8_encode($ver[2]).'"  acabado= "'.utf8_encode($ver[10]).'" medida= "'.utf8_encode($ver[14]).'" 
					color= "'.utf8_encode($ver[6]).'" onclick="agregarPrecio(this)"
					><i class="edit icon"></i></a>
					</td>';
				}
				
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

	$sql="SELECT format(precioUnitario,2) from inventario
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


	
}