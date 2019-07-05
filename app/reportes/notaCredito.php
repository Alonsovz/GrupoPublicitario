<?php

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function notaCredito($resultado,$resultado1) {
        
        $tabla = '';

        $tabla .= ' <style>
                        td { 
                            text-align: left;
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
                        .tabla, th{
                            border: 1px solid white;
                            border-collapse: collapse;
                            font-family: sans-serif;
                            font-weight:bold; 
                            color:black;
                        }
                        
                        @page { sheet-size: A4-L; }

@page bigger { sheet-size: 420mm 370mm; }




                    </style>';



        while($fila = $resultado->fetch_assoc()) {
            $tabla.= "
               <table>
               <tr>
               <th></th>
               <th></th>
               </tr>
               <tr>
               
               
               <td style='text-align: left;'>
               <br><br><br><br><br>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               ".$fila['nombre']." 
               <br>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               ".$fila['direccion']." 
               <br>
               <br>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               ".$fila['departamento']."
               <br>
               
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               ".$fila['nNota']."
               
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               ".$fila['nNotaAn']."

               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               ".$fila['fechaNotaAn']."
               </td>

               <td style='text-align:center;width:20%;font-size:12px;'>
               <br><br><br>
               <br><br><br><br>
               ".$fila['fecha']."
               <br>
               ".$fila['nRegistro']."
               <br>
               ".$fila['giro']."
               <br>
               ".$fila['nit']."
               <br>
               ".$fila['ventaCuenta']."
               </td>
               
               
               </tr>
               </table>
               <br>";
        }

        $tabla.= "
        <table>
        <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </tr>
        ";

        while($fila = $resultado1->fetch_assoc()) {
           
            $tabla.= "
            
            <tr> 
               
               <td style='text-align: left;width:5%;'>
               <br>
               
               ".$fila['cantidad']." 
               
               </td>
               <td style='width:55%;'>
               <br>
               ".$fila['descripcion']." 
              
               </td>
               <td>
               <br>
               ".$fila['precioUni']."
               
               </td>
               <td>
               <br>
           
               ".$fila['ventasNo']."
              
               </td>
               <td>
               <br>
               ".$fila['ventasEx']."
               
               </td>
               <td>
               <br>
               
               ".$fila['ventasGra']."
               
               </td>
               
               
               </tr>
               ";
        }

        $tabla.= "
        </table>";
        

       
       
        $html = $tabla;
        
        


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();

    }
}

?>