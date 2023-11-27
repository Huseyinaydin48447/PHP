<?php

    include "ayar.php";
    $query="DELETE FROM kurslar WHERE id=5";

    $sonuc=mysqli_query($baglanti,$query);
    if($sonuc){
        echo "veri silindi.";
    }else{
        echo "veri silinemedi!!";

    }




    mysqli_close($baglanti);


?>