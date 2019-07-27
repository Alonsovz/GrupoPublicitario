<?php

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function imprimirFacturaP($resultado,$resultado1,$resultado2) {
        $resultado2 = $resultado2->fetch_assoc();
        $resultado2 = $resultado2['precio'];
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
                    </style>';


                    $tabla.= "
                    
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='border: 1px solid white; font-size:28px;'>
                <font color='#172961'>OT Promocional pendiente de aprobación del cliente</font> .
               
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
               <td style='text-align: center;'>".$fila['correlativo']." </td>
               <td style='text-align: center;'>".$fila['fechaOT']." </td>
               <td style='text-align: center;'>".$fila['nombre']."</td>
               <td style='text-align: center;'>".$fila['nombreC']." </td>
               <td style='text-align: center;'>".$fila['fechaEntrega']." </td>
               </tr>
               </table>
               <br>";
        }

        $tabla.= "<hr>
               
                <h3>Detalles del producto</h3>
                <hr>
               <br><br>
               <table>
               <tr>
               <th style='background-color:black;color:white;'>Producto</th>
                <th style='background-color:black;color:white;'>Cantidad</th>
                <th style='background-color:black;color:white;'>Tipo</th>
                <th style='background-color:black;color:white;'>Descripcion</th>
				
				<th style='background-color:black;color:white;'>Precio Final</th>
               </tr>
               ";
        while($fila = $resultado1->fetch_assoc()) {      
            $tabla.= "
                <tr>
                <td style='border:1px solid black;'>
                Producto: ".$fila['productoFinal']." <br>
                Color: ".$fila['color']." <br>
                Acabado: ".$fila['acabado']." 
                </td>
                <td style='border:1px solid black;text-align: center;'>".$fila['cantidad']." </td>
                <td style='border:1px solid black;text-align: center;'>".$fila['tipo']." </td>
               <td style='border:1px solid black;'>".$fila['descripciones']." </td>
               <td style='border:1px solid black;text-align: center;'> $ ".$fila['precio']." </td>

               </tr>
               
               </tr> ";
            
            
            
            }
    
            $tabla .="</table>";

            $tabla .="
        
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <b>Total</b> = $".$resultado2;

        $tabla .= "<hr>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <b>Nota:</b> Precios no incluyen IVA
        ";

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