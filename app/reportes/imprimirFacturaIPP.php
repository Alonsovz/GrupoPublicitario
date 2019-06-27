<?php

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function imprimirFactura($resultado) {

        
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
                        .tabla, th{
                            border: 1px solid white;
                            border-collapse: collapse;
                            font-family: sans-serif;
                            font-weight:bold; 
                            color:black;
                        }
                    </style>';


                    $tabla.= "
                    
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='border: 1px solid white; font-size:28px;'>
                <font color='#172961'>OT pendiente de aprobación del cliente</font> .
               
            </th>
            <th style='border: 1px solid white;'>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            <hr>
            </div>    
             

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.= "
               <table>
               <tr>
               <th>N° de Orden</th>
               <th>Fecha de OT</th>
               <th>Responsable</th>
               <th>Cliente</th>
               <th>Fecha de Entrega</th>
               </tr>
               <tr>
               <td>".$fila['correlativo']." </td>
               <td>".$fila['fechaOT']." </td>
               <td>".$fila['nombre']."</td>
               <td>".$fila['nombreC']." </td>
               <td>".$fila['fechaEntrega']." </td>
               </tr>
               </table>
               <br>
               <hr>
                <h3>Detalles del producto</h3>
                <hr>
               <br><br>
               <table>
               <tr>
               <th style='border:1px solid black;'>Clasificación de producto</th>
               <th style='border:1px solid black;'>Producto final</th>
               <th style='border:1px solid black;'>Color</th>
               <th style='border:1px solid black;'>Acabado</th>
               <th style='border:1px solid black;'>Cantidad</th>
               <th style='border:1px solid black;'>Tipo</th>
               </tr>
               <tr>
               
               <td style='border:1px solid black;'>".$fila['producto']." </td>
               <td style='border:1px solid black;'>".$fila['productoFinal']." </td>
               <td style='border:1px solid black;'>".$fila['color']." </td>
               <td style='border:1px solid black;'>".$fila['acabado']." </td>
               <td style='border:1px solid black;'>".$fila['cantidad']." </td>
               <td style='border:1px solid black;'>".$fila['tipo']." </td>
               </tr></table>

               <br><br>
               <table>
               <tr>
               <th style='text-align:left;'>Descripciones:</th>
               <th style='text-align:left;color:white;'>Precio</th>
               </tr>
               <tr>
               <td style='width:50%;text-align:left;'>".$fila['descripciones']." </td>
               <td style='text-align:right;font-size:20px;font-weight:bold;'>Precio = $ ".$fila['precio']." </td>
               </tr></table>
               ";
            
            
            
        }

        $tabla .= "<hr><br><br><br><br><table>
                    <tr>
                    <th style='border-left:0; border-bottom:0;border-top:0;'>F._______________________________<br>
                    Firma de aprobación de Cliente</th></tr></table>";

       
       
        $html = $tabla;
        
        


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();

    }

}

?>