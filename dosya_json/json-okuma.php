<?php


    $myfile=fopen("course.json","r");
    $size=filesize("course.json");

    $jsonString=fread($myfile,$size);

    echo $jsonString;
    echo "<br>";
    echo gettype($jsonString);
    echo "<br>";

    $jsonArray=json_decode($jsonString,true);
    echo $jsonArray["title"];
    echo "<br>";


?>