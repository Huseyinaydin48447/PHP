<?php
include "ayar.php";

$query = "INSERT INTO kurslar(baslik,altbaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay)
    VALUES('WEB kursu','ileri seviye WEB dersleri','1.jpg','10/10/2023',10,10,1)";

$sonuc = mysqli_query($baglanti, $query);

if ($sonuc) {
    echo "kayit eklendi";
} else {
    echo "kayit eklenmedi";
}


//sql sorgulamasi yapilir burda
mysqli_close($baglanti);

?>