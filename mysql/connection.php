<?php
    // const host="localhost";
    // const username="root";
    // const password= "";
    // const database= "coursedb";

    // $baglanti=mysqli_connect(host,username,password,database);

    // if(mysqli_connect_errno()>0){
    //     die("hata:".mysqli_connect_errno());
    // }

    const host="localhost";
    const username="root";
    const password= "";
    const database= "coursedb";

    $baglanti=mysqli_connect(host,username,password,database);

    if(mysqli_connect_errno()>0){
        die("hata:".mysqli_connect_errno());
    }



  
    echo "mysql baglantisi olusturuldu"."<br>";
    //sql sorgulamasi yapilir burda
    mysqli_close($baglanti);
    echo "mysql baglantisi kapatildi. ";




?>