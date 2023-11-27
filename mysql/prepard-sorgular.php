<?php

include "ayar.php";
$id = 9;
$baslik = "Oyun Geliştirme...";
$altbaslik = "İleri seviye oyun geliştirme dersleri";
$resim = "2.jpg";
$yayinTarihi = "8/8/2023";
$yorumSayisi = 1;
$begeniSayisi = 5;
$onay = 1;


$query = "INSERT INTO kurslar(id, baslik, altbaslik, resim, yayinTarihi, yorumSayisi, begeniSayisi, onay)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($baglanti, $query);
mysqli_stmt_bind_param($stmt, 'isssiiii', $id, $baslik, $altbaslik, $resim, $yayinTarihi, $yorumSayisi, $begeniSayisi, $onay);
if (mysqli_stmt_execute($stmt)) {
    echo "Veri eklendi.";
} else {
    echo "Veri eklenemedi.";
}
mysqli_stmt_close($stmt);


mysqli_close($baglanti);

?>