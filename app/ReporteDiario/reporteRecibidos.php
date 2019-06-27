<?php

 require_once './vendor/autoload.php';

 function datos()
 {

    $con = new mysqli("localhost","root","","deloitte_mensajeria");
    $con1 = new mysqli("localhost","root","","deloitte_mensajeria");

    $sql="call reporteMensajeros()";
    $sql1="call reporteMensajeros()";
$res = $con ->query($sql);
$res1 = $con1->query($sql1);

    $validar = $res1->fetch_assoc();
        $validar = $validar['fecha'];
        if($validar=="")
        {
            $tabla = '<h1>Aún no se ha realizado ningún registro</h1>';
            $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
        }

$tabla="";

$tabla .= '<style>
                td { 
                    text-align: center;
                }
                table {
                    width: 100%;
                }
                .header {
                    font-family: sans-serif;
                    width: 100%;
                    display: flex;
                    justify-content: flex-end;
                }
                .tabla, th, td{
                    border: 1px solid black;
                    border-collapse: collapse;
                    font-family: sans-serif;
                }
            </style>';
                
                $fecha = $res1->fetch_assoc();
$tabla.= "
            <div class='header'>
                <h1>Env&iacute;os Deloitte<font color='#85BC22' size='100px'>.</font></h1>
                <p>Fecha: <b>".date("d/m/Y")."</b></p>
            </div>    

            <table class='tabla'>
            <tr>
                <th>C&oacute;digo</th>
                <th>Usuario</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Tr&aacute;mite</th>
                <th>Cliente</th>
                <th>&Aacute;rea</th>
                <th>Tipo de documento</th>
                <th>N<sup>o</sup> Documento</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Observaci&oacute;n</th>
            </tr>

            ";
            while($fila =$res->fetch_assoc()){
$tabla.="<tr>
                <td>".$fila['correlativoDetalle']."</td>
                <td>".$fila['nomUsuario']."</td>
                <td>".$fila['hora']."</td>
                <td>".$fila['fecha']."</td>
                <td>".$fila['descTipoTramite']."</td>
                <td>".$fila['nombreCliente']."</td>
                <td>".$fila['descArea']."</td>
                <td>".$fila['descTipoDocumento']."</td>
                <td>".$fila['numDoc']."</td>
                <td>".$fila['monto']."</td>";
                switch ($fila['descStatus']) {
                 case 'Pendiente':
                         $tabla.="<td bgcolor='#F6AD43'>".$fila['descStatus']."</td>";
                         break;
                    
                 case 'Completo':
                         $tabla.="<td bgcolor='lightgreen'>".$fila['descStatus']."</td>";
                            break;

                 case 'Incompleto':
                         $tabla.="<td bgcolor='#F67943'>".$fila['descStatus']."</td>";
                             break;

                 case 'Recibido':
                        $tabla.="<td bgcolor='lightblue'>".$fila['descStatus']."</td>";
                             break;             
                
                case 'Regresado a Finanzas':
                        $tabla.="<td style='background-color: rgba(149, 165, 166, 0.3);'>".$fila['descStatus']."</td>";
                             break;            
                }
                $tabla.="<td>".$fila['observacion']."</td>
        </tr>";
}
$tabla .= "</table>";
return $tabla;

}
 
$html = datos();
$pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$html= mb_convert_encoding($html, 'UTF-8', 'ISO-8859-1');
$pdf->charset_in='UTF-8';
$pdf->WriteHTML($html);
$pdf->Output();
 

?>