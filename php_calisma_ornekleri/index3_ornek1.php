<?php
//kendisine göndeilen bir sayının tam bölenlerini bir diziyle döndüren fonksiyonu yazmak.
function tambolenleriBol($sayi){

$tamBolenler=array();
    for($i=2;$i<$sayi;$i++){
   
        if($sayi%$i==0){
            array_push($tamBolenler,$i);
        }   
    }
return $tamBolenler;
}

print_r (tambolenleriBol(50));
?>