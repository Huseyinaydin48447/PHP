<?php

if (isset($_POST["btnFileUpload"]) && $_POST["btnFileUpload"] == "upload") {
    echo "<pre>";
    print_r($_FILES["fileToUpload"]);
    print_r($_POST);
    echo "</pre>";


    $dest_path = "./uploadedFiles/";
    $filename = $_FILES["fileToUpload"]["name"];
    $fileSourcePath = $_FILES["fileToUpload"]["tmp_name"];

    $fileDestPath = $dest_path . $filename;

    if (move_uploaded_file($fileSourcePath, $fileDestPath)) {
        echo " Dosya yüklendi .";
    } else {
        echo "hata";
    }
}


?>