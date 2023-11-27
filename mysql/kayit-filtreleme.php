<?php

include "ayar.php";

$query = "SELECT * FROM kurslar WHERE id >=1";

$sonuc = mysqli_query($baglanti, $query);

if (mysqli_num_rows($sonuc) > 0) {

    while ($satir = mysqli_fetch_assoc($sonuc)) {
        echo $satir["id"] . " " . $satir["baslik"];
        echo "<br>";
    }
} else {
    echo "Kayit yok";
}

mysqli_close($baglanti);

?>