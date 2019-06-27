<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    


    public function rptCuentas($remesas,$cargos,  $resultado,$resultado1,$cantidad,$retencion,$pagado,$mes,$anio,$total,$cuenta)
    {   

        $cuentas = $cuenta->fetch_assoc();
        $cuentas = $cuentas['chequera'];


        $nombreMes ="";
        if($mes == "01"){
            $nombreMes = "Enero";
        }
        if($mes == "02"){
            $nombreMes = "Febrero";
        }
        if($mes == "03"){
            $nombreMes = "Marzo";
        }
        if($mes == "04"){
            $nombreMes = "Abril";
        }
        if($mes == "05"){
            $nombreMes = "Mayo";
        }
        if($mes == "06"){
            $nombreMes = "Junio";
        }
        if($mes == "07"){
            $nombreMes = "Julio";
        }
        if($mes == "08"){
            $nombreMes = "Agosto";
        }
        if($mes == "09"){
            $nombreMes = "Septiembre";
        }
        if($mes == "10"){
            $nombreMes = "Octubre";
        }
        if($mes == "11"){
            $nombreMes = "Noviembre";
        }
        if($mes == "12"){
            $nombreMes = "Diciembre";
        }
       

        

        

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

        

        $tabla.= "
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='border: 1px solid white; font-size:28px;'>
                <font color='#172961'>Reporte de la cuenta: <font color='#BA9B1E'>".$cuentas."</font> del mes </font> <font color='#BA9B1E'>".$nombreMes." ".$anio." </font> .
               
            </th>
            <th style='border: 1px solid white;'>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            <hr>
            </div>    
                        <h2><font color='#BA9B1E'>Egresos del mes</font> </h2>
            <table class='tabla'>
            <tr>
                <th bgcolor='#F3F781'>Ch No</th>
                <th bgcolor='#F3F781'>Concepto Egreso</th>
                <th bgcolor='#F3F781'>Cantidad</th>
                <th bgcolor='#F3F781'>Retención</th>
                <th bgcolor='#F3F781'>Pagado</th>
                
                <th bgcolor='#F3F781'>Fecha</th>
            </tr>

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['chNo']."</td>
                        <td>".$fila['conceptoEgreso']."</td>
                        <td>$ ".$fila['cantidad']."</td>
                        <td>$ ".$fila['retencion']."</td>
                        <td>$ ".$fila['pagado']."</td>";
                        

                        $tabla .= "<td>".$fila['fechaEgreso']."</td>
                     </tr>";
        }

        $tabla .= "</table>";
        while($fila = $cantidad->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total de cantidad:</font> $".$fila['cantidad']."</b>";
    
            }
        while($fila = $retencion->fetch_assoc()) {
        $tabla .= "<b><br><font color='#172961'>Total de retención:</font> $".$fila['retencion']."</b>";
        
         }
     while($fila = $pagado->fetch_assoc()) {
        $tabla .= "<b><br><font color='#172961'>Total pagado:</font> $".$fila['pagado']."</b></p><hr>";
            
         }

       

        $tabla .= " 
        <h3>Remesas</h3>
        <table class='tabla'>
        <tr>
            <th  bgcolor='#A9F5A9'>Concepto</th>
                <th  bgcolor='#A9F5A9'>Monto</th>
                <th  bgcolor='#A9F5A9'>Fecha</th>
                
            </tr>";
        while($fila = $remesas->fetch_assoc()) {
         $tabla.="
         <tr>
         
            <td>".$fila['concepto']. "</td>
             <td>$".$fila['monto']."</td>
             <td>".$fila['fecha']."</td>
            
            
             </tr>  
         ";
        }
        $tabla .= "</table><br><hr>";


        $tabla .= " 
        <h3>Cargos Bancarios</h3>
        <table class='tabla'>
        <tr>
            <th  bgcolor='#F5D0A9'>Concepto</th>
                <th  bgcolor='#F5D0A9'>Monto</th>
                <th  bgcolor='#F5D0A9'>Fecha</th>
                
            </tr>";
        while($fila = $cargos->fetch_assoc()) {
         $tabla.="
         <tr>
         
            <td>".$fila['concepto']. "</td>
             <td>$".$fila['monto']."</td>
             <td>".$fila['fecha']."</td>
            
            
             </tr>  
         ";
        }
        $tabla .= "</table><br><hr>";

        
        while($fila = $total->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total en la cuenta:</font> $".$fila['monto']."</b>";
    
            }
        
        
           
          
            
           
           $tabla .= "<br><br><br><br><table>
                    <tr>
                    <th style='border: 1px solid black;border-left:0; border-bottom:0;border-top:0;'>F._______________________________<br>
                    <br>Nom:___________________________<br>
                    Presidente ADEREL</th>
                    <th style='border: 1px solid black;border-left:0; border-bottom:0;border-top:0;'>F._______________________________<br>
                    <br>Nom:___________________________<br>
                    Tesorero ADEREL</th>
                    <th style='border: 1px solid black;border-right:0; border-bottom:0;border-top:0;border-left:0;'>F.______________________________<br>
                    <br>Nom:___________________________<br>
                    Elaborado Por</th>
                    </tr>
                    
                </table>";
        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();

    }
    

}