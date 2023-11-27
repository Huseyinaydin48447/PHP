<?php

include "ayar.php";

// $query="UPDATE kurslar SET baslik='Php derslerii' WHERE id=0";,
$query="UPDATE kurslar SET onay=0";

$sonuc=mysqli_query($baglanti,$query);

if($sonuc){
    echo "veri guncellendi";

}else {
    echo "guncelleme yapilmadi";
}


mysqli_close($baglanti);

?> 