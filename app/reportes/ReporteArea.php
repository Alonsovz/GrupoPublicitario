<?php

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function reporteArea($codigoArea, $resultado,$resultado1) {
        $validar = $resultado1->fetch_assoc();
        $validar = $validar['fecha'];
        if($validar=="")
        {
            $tabla = '<h1>A&uacute;n no se ha realizado ningún envio en esta Área</h1>';
            $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
        }else{

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

        $area = $resultado1->fetch_assoc();

        $area = $area["descArea"];

        $tabla.= "
            <div class='header'>
                <h1>Historial de envíos del área: <font color='#85BC22'>".$area."</font></h1>
            </div>    

            <table class='tabla'>
            <tr>
                <th>C&oacute;digo</th>
                <th>Usuario</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Tr&aacute;mite</th>
                <th>Cliente</th>
                <th>Tipo de documento</th>
                <th>N<sup>o</sup> Documento</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Observaci&oacute;n</th>
            </tr>

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['correlativoDetalle']."</td>
                        <td>".$fila['nomUsuario']."</td>
                        <td>".$fila['fecha']."</td>
                        <td>".$fila['hora']."</td>
                        <td>".$fila['descTipoTramite']."</td>
                        <td>".$fila['nombreCliente']."</td>
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

                   case 'Pendiente de Revision':
                           $tabla.="<td style='background-color: rgba(149, 165, 166, 0.3);'>".$fila['descStatus']."</td>";
                                break;
                        }
                        $tabla.="<td>".$fila['observacion']."</td>
                     </tr>";
        }

        $tabla .= "</table>";

        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
        }

    }


    public function reporteAreaDiario($codigoArea, $resultado,$resultado1) {
        $validar = $resultado1->fetch_assoc();
        $validar = $validar['fecha'];
        if($validar=="")
        {
            $tabla = '<h1>No hay ningun registro que mostrar para este día</h1>';
            $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
        }else{

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

        $area = $resultado1->fetch_assoc();

        $area = $area["descArea"];
        $tabla.= "
            <div class='header'>
                <h1>Reporte diario de envíos del área: <font color='#85BC22'>".$area."</font></h1>
            </div>    

            <table class='tabla'>
            <tr>
                <th>C&oacute;digo</th>
                <th>Usuario</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Tr&aacute;mite</th>
                <th>Cliente</th>
                <th>Tipo de documento</th>
                <th>N<sup>o</sup> Documento</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Observaci&oacute;n</th>
            </tr>

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['correlativoDetalle']."</td>
                        <td>".$fila['nomUsuario']."</td>
                        <td>".$fila['fecha']."</td>
                        <td>".$fila['hora']."</td>
                        <td>".$fila['descTipoTramite']."</td>
                        <td>".$fila['nombreCliente']."</td>
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

                   case 'Pendiente de Revision':
                           $tabla.="<td style='background-color: rgba(149, 165, 166, 0.3);'>".$fila['descStatus']."</td>";
                                break;
                        }
                        $tabla.="<td>".$fila['observacion']."</td>
                     </tr>";
        }

        $tabla .= "</table>";

        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
        }

    }


    public function reporteAreaPorFechas($fecha,$fecha2, $resultado,$resultado1) {

        $validar = $resultado1->fetch_assoc();
        $validar = $validar['fecha'];
        if($validar=="")
        {
            $tabla = '<h1>El rango de fechas seleccionado no contiene ningún registro</h1>';
            $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
        }else{
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

        $area = $resultado1->fetch_assoc();
        $area = $area["descArea"];

        $tabla.= "
            <div class='header'>
                <h1>Reporte de envíos del área: <font color='#85BC22'>".$area."</font></h1>
                <h3> Entre las fechas: <font color='blue'>".$fecha."</font> y <font color='blue'>".$fecha2."</font>.</h3>
            </div>    

            <table class='tabla'>
            <tr>
                <th>C&oacute;digo</th>
                <th>Usuario</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Tr&aacute;mite</th>
                <th>Cliente</th>
                <th>Tipo de documento</th>
                <th>N<sup>o</sup> Documento</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Observaci&oacute;n</th>
            </tr>

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['correlativoDetalle']."</td>
                        <td>".$fila['nomUsuario']."</td>
                        <td>".$fila['fecha']."</td>
                        <td>".$fila['hora']."</td>
                        <td>".$fila['descTipoTramite']."</td>
                        <td>".$fila['nombreCliente']."</td>
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

                   case 'Pendiente de Revision':
                           $tabla.="<td style='background-color: rgba(149, 165, 166, 0.3);'>".$fila['descStatus']."</td>";
                                break;
                        }
                        $tabla.="<td>".$fila['observacion']."</td>
                     </tr>";
        }

        $tabla .= "</table>";

        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    }

    }

}