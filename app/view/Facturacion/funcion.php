<?php
   $numeros = array("-", "un", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "Nueve");
   $numerosX = array("-", "un", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "Nueve");
   $numeros100 = array("-", "ciento", "doscientos", "trecientos", "cuatrocientos", "quinientos", "seicientos", "setecientos", "ochocientos", "novecientos");
   $numeros11 = array("-", "once", "doce", "trece", "catorce", "quince", "dieciseis", "diecisiete", "dieciocho", "diecinueve");
   $numeros10 = array("-", "-", "-", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa");
   
   function tresnumeros($n, $last) {
   global $numeros100, $numeros10, $numeros11, $numeros, $numerosX;
   if ($n == 100) return "cien ";
   if ($n == 0) return "cero ";
   $r = "";
   $cen = floor($n / 100);
   $dec = floor(($n % 100) / 10);
   $uni = $n % 10;
   if ($cen > 0) $r .= $numeros100[$cen] . " " ;
   
   switch ($dec) {
   case 0: $special = 0; break;
   case 1: $special = 10; break;
   case 2: $special = 20; break;
   default: $r .= $numeros10[$dec] . " "; $special = 30; break;
   }
   if ($uni == 0) {
   if ($special==30);
   else if ($special==20) $r .= "veinte" ;
   else if ($special==10) $r .= "diez" ;
   else if ($special==0);
   } else {
   if ($special == 30 && !$last) $r .= "y " . $numerosX[$n%10] . " ";
   else if ($special == 30) $r .= " y " . $numeros[$n%10] . " ";
   else if ($special == 20) {
   if ($uni == 3) $r .= "veintitres" ;
   else if (!$last) $r .= "veinti" . $numerosX[$n%10] . " ";
   else $r .= "veinti" . $numeros[$n%10] . " ";
   } else if ($special == 10) $r .= $numeros11[$n%10] . " ";
   else if ($special == 0 && !$last) $r .= $numerosX[$n%10] . " ";
   else if ($special == 0) $r .= $numeros[$n%10] ." ";
   }
   return $r;
   }
   
   function seisnumeros($n, $last) {
   if ($n == 0) return "cero" ;
   $miles = floor($n / 1000);
   $units = $n % 1000;
   $r = "";
   if ($miles == 1) $r .= "mil " ;
   else if ($miles > 1) $r .= tresnumeros($miles, false) . "mil " ;
   if ($units > 0) $r .= tresnumeros($units, $last);
   return $r;
   }
   
   function docenumeros($n) {
   if ($n == 0) return "cero" ;
   $millo = floor($n / 1000000);
   $units = $n % 1000000;
   $r = "";
   if ($millo == 1) $r .= "un millon" ;
   else if ($millo > 1) $r .= seisnumeros($millo, false) . "millones" ;
   if ($units > 0) $r .= seisnumeros($units, true);
   return $r;
   }
   
   function convertirNumero($num){
   
   $numerito = $num;
   $entero = intval($numerito);
   $decimales = (($numerito) - ($entero)) * 100;
   
   return round($decimales);
   }
   
   function NumeroLetra($num){
       if( convertirNumero($num)==0){
        return $rpta = docenumeros($num).' DOLARES';
       }
       else if(convertirNumero($num)==01){

        return $rpta = docenumeros($num).' con 01/100 DOLARES.';
       }
       else if(convertirNumero($num)==02){

        return $rpta = docenumeros($num).' con 02/100 DOLARES.';
       }
       else if(convertirNumero($num)==03){

        return $rpta = docenumeros($num).' con 03/100 DOLARES.';
       }
       else if(convertirNumero($num)==04){

        return $rpta = docenumeros($num).' con 04/100 DOLARES.';
       }
       else if(convertirNumero($num)==05){

        return $rpta = docenumeros($num).' con 05/100 DOLARES.';
       }
       else if(convertirNumero($num)==06){

        return $rpta = docenumeros($num).' con 06/100 DOLARES.';
       }
       else if(convertirNumero($num)==07){

        return $rpta = docenumeros($num).' con 07/100 DOLARES.';
       }
       else if(convertirNumero($num) == 8){

        return $rpta = docenumeros($num).' con 08/100 DOLARES..';
       }
       else if(convertirNumero($num)== 9){

        return $rpta = docenumeros($num).' con 09/100 DOLARES.';
       }
       else if(convertirNumero($num)==10){

        return $rpta = docenumeros($num).' con 10/100 DOLARES.';
       }
       else if(convertirNumero($num)==11){

        return $rpta = docenumeros($num).' con 11/100 DOLARES.';
       }
       else if(convertirNumero($num)==12){

        return $rpta = docenumeros($num).' con 12/100 DOLARES.';
       }
       else if(convertirNumero($num)==13){

        return $rpta = docenumeros($num).' con 13/100 DOLARES.';
       }
       else if(convertirNumero($num)==14){

        return $rpta = docenumeros($num).' con 14/100 DOLARES.';
       }
       else if(convertirNumero($num)==15){

        return $rpta = docenumeros($num).' con 15/100 DOLARES.';
       }
       else if(convertirNumero($num)==16){

        return $rpta = docenumeros($num).' con 16/100 DOLARES.';
       }
       else if(convertirNumero($num)==17){

        return $rpta = docenumeros($num).' con 17/100 DOLARES.';
       }
       else if(convertirNumero($num)==18){

        return $rpta = docenumeros($num).' con 18/100 DOLARES.';
       }
       else if(convertirNumero($num)==19){

        return $rpta = docenumeros($num).' con 19/100 DOLARES.';
       }
       else if(convertirNumero($num)==20){

        return $rpta = docenumeros($num).' con 20/100 DOLARES.';
       }
       else if(convertirNumero($num)==21){

        return $rpta = docenumeros($num).' con 21/100 DOLARES.';
       }
       else if(convertirNumero($num)==22){

        return $rpta = docenumeros($num).' con 22/100 DOLARES.';
       }
       else if(convertirNumero($num)==23){

        return $rpta = docenumeros($num).' con 23/100 DOLARES.';
       }
       else if(convertirNumero($num)==24){

        return $rpta = docenumeros($num).' con 24/100 DOLARES.';
       }
       else if(convertirNumero($num)==25){

        return $rpta = docenumeros($num).' con 25/100 DOLARES.';
       }
       else if(convertirNumero($num)==26){

        return $rpta = docenumeros($num).' con 26/100 DOLARES.';
       }
       else if(convertirNumero($num)==27){

        return $rpta = docenumeros($num).' con 27/100 DOLARES.';
       }
       else if(convertirNumero($num)==28){

        return $rpta = docenumeros($num).' con 28/100 DOLARES.';
       }
       else if(convertirNumero($num)==29){

        return $rpta = docenumeros($num).' con 29/100 DOLARES.';
       }
       else if(convertirNumero($num)==30){

        return $rpta = docenumeros($num).' con 30/100 DOLARES.';
       }
       else if(convertirNumero($num)==31){

        return $rpta = docenumeros($num).' con 31/100 DOLARES.';
       }
       else if(convertirNumero($num)==32){

        return $rpta = docenumeros($num).' con 32/100 DOLARES.';
       }
       else if(convertirNumero($num)==33){

        return $rpta = docenumeros($num).' con 33/100 DOLARES.';
       }
       else if(convertirNumero($num)==34){

        return $rpta = docenumeros($num).' con 34/100 DOLARES.';
       }
       else if(convertirNumero($num)==35){

        return $rpta = docenumeros($num).' con 35/100 DOLARES.';
       }
       else if(convertirNumero($num)==36){

        return $rpta = docenumeros($num).' con 36/100 DOLARES.';
       }
       else if(convertirNumero($num)==37){

        return $rpta = docenumeros($num).' con 37/100 DOLARES.';
       }
       else if(convertirNumero($num)==38){

        return $rpta = docenumeros($num).' con 38/100 DOLARES.';
       }
       else if(convertirNumero($num)==39){

        return $rpta = docenumeros($num).' con 39/100 DOLARES.';
       }
       else if(convertirNumero($num)==40){

        return $rpta = docenumeros($num).' con 40/100 DOLARES.';
       }
       else if(convertirNumero($num)==41){

        return $rpta = docenumeros($num).' con 41/100 DOLARES.';
       }
       else if(convertirNumero($num)==42){

        return $rpta = docenumeros($num).' con 42/100 DOLARES.';
       }
       else if(convertirNumero($num)==43){

        return $rpta = docenumeros($num).' con 43/100 DOLARES.';
       }
       else if(convertirNumero($num)==44){

        return $rpta = docenumeros($num).' con 44/100 DOLARES.';
       }
       else if(convertirNumero($num)==45){

        return $rpta = docenumeros($num).' con 45/100 DOLARES.';
       }
       else if(convertirNumero($num)==46){

        return $rpta = docenumeros($num).' con 46/100 DOLARES.';
       }
       else if(convertirNumero($num)==47){

        return $rpta = docenumeros($num).' con 47/100 DOLARES.';
       }
       else if(convertirNumero($num)==48){

        return $rpta = docenumeros($num).' con 48/100 DOLARES.';
       }
       else if(convertirNumero($num)==49){

        return $rpta = docenumeros($num).' con 49/100 DOLARES.';
       }
       else if(convertirNumero($num)==50){

        return $rpta = docenumeros($num).' con 50/100 DOLARES.';
       }
       else if(convertirNumero($num)==51){

        return $rpta = docenumeros($num).' con 51/100 DOLARES.';
       }
       else if(convertirNumero($num)==52){

        return $rpta = docenumeros($num).' con 52/100 DOLARES.';
       }
       else if(convertirNumero($num)==53){

        return $rpta = docenumeros($num).' con 53/100 DOLARES.';
       }
       else if(convertirNumero($num)==54){

        return $rpta = docenumeros($num).' con 54/100 DOLARES.';
       }
       else if(convertirNumero($num)==55){

        return $rpta = docenumeros($num).' con 55/100 DOLARES.';
       }
       else if(convertirNumero($num)==56){

        return $rpta = docenumeros($num).' con 56/100 DOLARES.';
       }
       else if(convertirNumero($num)==57){

        return $rpta = docenumeros($num).' con 57/100 DOLARES.';
       }
       else if(convertirNumero($num)==58){

        return $rpta = docenumeros($num).' con 58/100 DOLARES.';
       }
       else if(convertirNumero($num)==59){

        return $rpta = docenumeros($num).' con 59/100 DOLARES.';
       }
       else if(convertirNumero($num)==60){

        return $rpta = docenumeros($num).' con 60/100 DOLARES.';
       }
       else if(convertirNumero($num)==61){

        return $rpta = docenumeros($num).' con 61/100 DOLARES.';
       }
       else if(convertirNumero($num)==62){

        return $rpta = docenumeros($num).' con 62/100 DOLARES.';
       }
       else if(convertirNumero($num)==63){

        return $rpta = docenumeros($num).' con 63/100 DOLARES.';
       }
       else if(convertirNumero($num)==64){

        return $rpta = docenumeros($num).' con 64/100 DOLARES.';
       }
       else if(convertirNumero($num)==65){

        return $rpta = docenumeros($num).' con 65/100 DOLARES.';
       }
       else if(convertirNumero($num)==66){

        return $rpta = docenumeros($num).' con 66/100 DOLARES.';
       }
       else if(convertirNumero($num)==67){

        return $rpta = docenumeros($num).' con 67/100 DOLARES.';
       }
       else if(convertirNumero($num)==68){

        return $rpta = docenumeros($num).' con 68/100 DOLARES.';
       }
       else if(convertirNumero($num)==69){

        return $rpta = docenumeros($num).' con 69/100 DOLARES.';
       }
       else if(convertirNumero($num)==70){

        return $rpta = docenumeros($num).' con 70/100 DOLARES.';
       }
       else if(convertirNumero($num)==71){

        return $rpta = docenumeros($num).' con 71/100 DOLARES.';
       }
       else if(convertirNumero($num)==72){

        return $rpta = docenumeros($num).' con 72/100 DOLARES.';
       }
       else if(convertirNumero($num)==73){

        return $rpta = docenumeros($num).' con 73/100 DOLARES.';
       }
       else if(convertirNumero($num)==74){

        return $rpta = docenumeros($num).' con 74/100 DOLARES.';
       }
       else if(convertirNumero($num)==75){

        return $rpta = docenumeros($num).' con 75/100 DOLARES.';
       }
       else if(convertirNumero($num)==76){

        return $rpta = docenumeros($num).' con 76/100 DOLARES.';
       }
       else if(convertirNumero($num)==77){

        return $rpta = docenumeros($num).' con 77/100 DOLARES.';
       }
       else if(convertirNumero($num)==78){

        return $rpta = docenumeros($num).' con 78/100 DOLARES.';
       }
       else if(convertirNumero($num)==79){

        return $rpta = docenumeros($num).' con 79/100 DOLARES.';
       }
       else if(convertirNumero($num)==80){

        return $rpta = docenumeros($num).' con 80/100 DOLARES.';
       }
       else if(convertirNumero($num)==81){

        return $rpta = docenumeros($num).' con 81/100 DOLARES.';
       }
       else if(convertirNumero($num)==82){

        return $rpta = docenumeros($num).' con 82/100 DOLARES.';
       }
       else if(convertirNumero($num)==83){

        return $rpta = docenumeros($num).' con 83/100 DOLARES.';
       }
       else if(convertirNumero($num)==84){

        return $rpta = docenumeros($num).' con 84/100 DOLARES.';
       }
       else if(convertirNumero($num)==85){

        return $rpta = docenumeros($num).' con 85/100 DOLARES.';
       }
       else if(convertirNumero($num)==86){

        return $rpta = docenumeros($num).' con 86/100 DOLARES.';
       }
       else if(convertirNumero($num)==87){

        return $rpta = docenumeros($num).' con 99/100 DOLARES.';
       }
       else if(convertirNumero($num)==88){

        return $rpta = docenumeros($num).' con 88/100 DOLARES.';
       }
       else if(convertirNumero($num)==89){

        return $rpta = docenumeros($num).' con 89/100 DOLARES.';
       }

       else if(convertirNumero($num)==90){

        return $rpta = docenumeros($num).' con 90/100 DOLARES.';
       }
       else if(convertirNumero($num)==91){

        return $rpta = docenumeros($num).' con 91/100 DOLARES.';
       }
       else if(convertirNumero($num)==92){

        return $rpta = docenumeros($num).' con 92/100 DOLARES.';
       }
       else if(convertirNumero($num)==93){

        return $rpta = docenumeros($num).' con 93/100 DOLARES.';
       }
       else if(convertirNumero($num)==94){

        return $rpta = docenumeros($num).' con 94/100 DOLARES.';
       }
       else if(convertirNumero($num)==95){

        return $rpta = docenumeros($num).' con 95/100 DOLARES.';
       }
       else if(convertirNumero($num)==96){

        return $rpta = docenumeros($num).' con 96/100 DOLARES.';
       }
       else if(convertirNumero($num)==97){

        return $rpta = docenumeros($num).' con 97/100 DOLARES.';
       }
       else if(convertirNumero($num)==98){

        return $rpta = docenumeros($num).'con 98/100 DOLARES.';
       }
       else if(convertirNumero($num)==99){

        return $rpta = docenumeros($num).'  con 99/100 DOLARES.';
       }
       
   
   }
   
    
  
   
   function redondeado ($numero, $decimales) { 
   $factor = pow(10, $decimales); 
   return (round($numero*$factor)/$factor); }
   
    ?>