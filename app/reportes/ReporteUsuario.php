<?php

class Reporte
{

    public static $con;


    public function __construct()
    {
        require_once './vendor/autoload.php';
    }

    public function reporteUsuario($codigoUsuario, $resultado, $resultado1)
    {
        $validar = $resultado1->fetch_assoc();
        $validar = $validar['fecha'];
        if ($validar == "") {
            $tabla = '<h1>El usuario no ha realizado ning&uacute;n env&iacute;o</h1>';
            $html = $tabla;


            $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            
            $pdf->charset_in = 'UTF-8';
            $pdf->WriteHTML($html);
            $pdf->Output();
        } else {

            $tabla = '';

            $tabla .= ' <style>
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

            $usuario = $resultado1->fetch_assoc();

            $usuario = $usuario["nomUsuario"];

            $tabla .= "
            <div class='header'>
                <h1>Reporte de env&iacute;os del usuario: <font color='#85BC22'>" . $usuario . "</font></h1>
            </div>    

            <table class='tabla'>
            <tr>
            <th>C&oacute;digo</th>
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

            while ($fila = $resultado->fetch_assoc()) {
                $tabla .= "<tr>
                        <td>" . $fila['correlativoDetalle'] . "</td>
                        <td>" . $fila['fecha'] . "</td>
                        <td>" . $fila['hora'] . "</td>
                        <td>" . $fila['descTipoTramite'] . "</td>
                        <td>" . $fila['nombreCliente'] . "</td>
                        <td>" . $fila['descArea'] . "</td>
                        <td>" . $fila['descTipoDocumento'] . "</td>
                        <td>" . $fila['numDoc'] . "</td>
                        <td>" . $fila['monto'] . "</td>";
                switch ($fila['descStatus']) {
                    case 'Pendiente':
                        $tabla .= "<td bgcolor='#F6AD43'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Completo':
                        $tabla .= "<td bgcolor='lightgreen'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Incompleto':
                        $tabla .= "<td bgcolor='#F67943'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Recibido':
                        $tabla .= "<td bgcolor='lightblue'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Pendiente de Revision':
                        $tabla .= "<td style='background-color: rgba(149, 165, 166, 0.3);'>" . $fila['descStatus'] . "</td>";
                        break;
                }
                $tabla .= "<td>" . $fila['observacion'] . "</td>
                     </tr>";
            }

            $tabla .= "</table>";

            $html = $tabla;


            $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
//            
            $pdf->charset_in = 'UTF-8';
            $pdf->WriteHTML($html);
            $pdf->Output();
        }

    }


    public function reporteUsuarioDiario($codigoUsuario, $resultado, $resultado1)
    {
        $validar = $resultado1->fetch_assoc();
        $validar = $validar['fecha'];
        if ($validar == "") {
            $tabla = '<h1>El usuario no ha realizado ning&uacute;n envio este día</h1>';
            $html = $tabla;


            $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            
            $pdf->charset_in = 'UTF-8';
            $pdf->WriteHTML($html);
            $pdf->Output();
        } else {

            $tabla = '';

            $tabla .= ' <style>
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

            $usuario = $resultado1->fetch_assoc();

            $usuario = $usuario["nomUsuario"];

            $tabla .= "
            <div class='header'>
                <h1>Reporte diario de envíos del usuario: <font color='#85BC22'>" . $usuario . "</font></h1>
            </div>    

            <table class='tabla'>
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Trámite</th>
                <th>Cliente</th>
                <th>Área</th>
                <th>Tipo de documento</th>
                <th>N° Documento</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Observación</th>
            </tr>

            ";

            while ($fila = $resultado->fetch_assoc()) {
                $tabla .= "<tr>
                         <td>" . $fila['correlativoDetalle'] . "</td>
                        <td>" . $fila['fecha'] . "</td>
                        <td>" . $fila['hora'] . "</td>
                        <td>" . $fila['descTipoTramite'] . "</td>
                        <td>" . $fila['nombreCliente'] . "</td>
                        <td>" . $fila['descArea'] . "</td>
                        <td>" . $fila['descTipoDocumento'] . "</td>
                        <td>" . $fila['numDoc'] . "</td>
                        <td>" . $fila['monto'] . "</td>";
                switch ($fila['descStatus']) {
                    case 'Pendiente':
                        $tabla .= "<td bgcolor='#F6AD43'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Completo':
                        $tabla .= "<td bgcolor='lightgreen'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Incompleto':
                        $tabla .= "<td bgcolor='#F67943'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Recibido':
                        $tabla .= "<td bgcolor='lightblue'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Pendiente de Revision':
                        $tabla .= "<td style='background-color: rgba(149, 165, 166, 0.3);'>" . $fila['descStatus'] . "</td>";
                        break;
                }
                $tabla .= "<td>" . $fila['observacion'] . "</td>
                     </tr>";
            }

            $tabla .= "</table>";

            $html = $tabla;


            $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            
            $pdf->charset_in = 'UTF-8';
            $pdf->WriteHTML($html);
            $pdf->Output();
        }

    }


    public function reporteUsuarioPorFechas($fecha1Usuario, $fecha2Usuario, $resultado, $resultado1)
    {
        $validar = $resultado1->fetch_assoc();
        $validar = $validar['fecha'];
        if ($validar == "") {
            $tabla = '<h1>El rango de fechas seleccionado no contiene ningún registro</h1>';
            $html = $tabla;


            $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            
            $pdf->charset_in = 'UTF-8';
            $pdf->WriteHTML($html);
            $pdf->Output();
        } else {

            $tabla = '';

            $tabla .= ' <style>
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

            $usuario = $resultado1->fetch_assoc();

            $usuario = $usuario["nomUsuario"];

            $tabla .= "
            <div class='header'>
                <h1>Reporte de env&iacute;os del usuario: <font color='#85BC22'>" . $usuario . "</font></h1>
                <h3> Entre las fechas: <font color='blue'>" . $fecha1Usuario . "</font> y <font color='blue'>" . $fecha2Usuario . "</font>.</h3>
            </div>    

            <table class='tabla'>
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Trámite</th>
                <th>Cliente</th>
                <th>Área</th>
                <th>Tipo de documento</th>
                <th>N° Documento</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Observación</th>
            </tr>

            ";

            while ($fila = $resultado->fetch_assoc()) {
                $tabla .= "<tr>
                        <td>" . $fila['correlativoDetalle'] . "</td>
                        <td>" . $fila['fecha'] . "</td>
                        <td>" . $fila['hora'] . "</td>
                        <td>" . $fila['descTipoTramite'] . "</td>
                        <td>" . $fila['nombreCliente'] . "</td>
                        <td>" . $fila['descArea'] . "</td>
                        <td>" . $fila['descTipoDocumento'] . "</td>
                        <td>" . $fila['numDoc'] . "</td>
                        <td>" . $fila['monto'] . "</td>";
                switch ($fila['descStatus']) {
                    case 'Pendiente':
                        $tabla .= "<td bgcolor='#F6AD43'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Completo':
                        $tabla .= "<td bgcolor='lightgreen'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Incompleto':
                        $tabla .= "<td bgcolor='#F67943'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Recibido':
                        $tabla .= "<td bgcolor='lightblue'>" . $fila['descStatus'] . "</td>";
                        break;

                    case 'Pendiente de Revision':
                        $tabla .= "<td style='background-color: rgba(149, 165, 166, 0.3);'>" . $fila['descStatus'] . "</td>";
                        break;
                }
                $tabla .= "<td>" . $fila['observacion'] . "</td>
                     </tr>";
            }

            $tabla .= "</table>";

            $html = $tabla;


            $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            
            $pdf->charset_in = 'UTF-8';
            $pdf->WriteHTML($html);
            $pdf->Output();

        }
    }

}