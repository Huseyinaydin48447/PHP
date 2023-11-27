<?php 

    include "ayar.php";

    $query="SELECT id,baslik from kurslar";
    $sonuc=mysqli_query($baglanti,$query);

    while($row=mysqli_fetch_array($sonuc)){
        echo $row[0]." ".$row[1];
        echo "<br>";
    }


    mysqli_close($baglanti);

?>