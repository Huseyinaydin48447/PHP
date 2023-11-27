<?php

if (isset($_POST["btnFileUpload"]) && $_POST["btnFileUpload"] == "upload") {

    $dosya_adedi = count($_FILES["fileToUpload"]["name"]);
    $maxFileSize = (1024 * 1024) * 1;
    $fileTypes = array("image/png", "image/jpg", "image/jpeg");
    $uploadOk = true;

    if ($dosya_adedi > 3) {
        $uploadOk = false;
        echo "MAX 2 dosya yükleyebilirsiniz...";
    }

    if ($uploadOk) {

        for ($i = 0; $i < $dosya_adedi; $i++) {
            $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"][$i];
            $fileName = $_FILES["fileToUpload"]["name"][$i];
            $fileSize = $_FILES["fileToUpload"]["size"][$i];
            $fileType = $_FILES["fileToUpload"]["type"][$i];


            if(in_array($fileSize,$fileTypes)){
                if($fileSize > $maxFileSize) {
                    echo "MAX  dosya boyutu 1 mb olmalıdır ..."."<br>";

                }else{
                    $dosyaAdi_Arr = explode(".", $filename);
                    $dosyaAdi_uzantisiz = $dosyaAdi[0];
                    $dosyaAdi_uzantisi = $dosyaAdi[1];
                    
                    $yeni_dosyaAdi=$fileName."-".rand(0, 999999).".".$dosyaAdi_uzantisi;
                    $dest_path = "images/" . $fileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        echo $fileName . "dosya yüklendi" . "<br>";
        
                    } else {
                        echo $fileName . "dosya yükleme hatası" . "<br>";
                    }
                }

            }else{
                echo "dosya uzantısı kabul etmiyor."."<br>";
                echo " kabul edilen dosya tipleri:".implode(".",$fileTypes)."<br>";
            }

        
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="username">
        <input type="file" name="fileToUpload[]" multiple="multiple">
        <input type="submit" value="upload" name="btnFileUpload">
    </form>

</body>

</html>