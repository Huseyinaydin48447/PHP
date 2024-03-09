<?php
$info = (Object)[];


$data = [];
$data['userid'] = $_SESSION['userid'];

$data['username'] = $DATA_OBJ->username;
if (empty($DATA_OBJ->username)) {
    $Error .= "Please enter a valid username .<br>";
} else {
    if (strlen($DATA_OBJ->username) < 3) {
        $Error .= "kullanıcı adı en az 3 karakter uzunluğunda olmalıdır. <br>";
    }
    if (!preg_match("/^[a-z A-Z]*$/", $DATA_OBJ->username)) {
        $Error .= "Please enter a valid username .<br>";
    }
}


$data['email'] = $DATA_OBJ->email;
if (empty($DATA_OBJ->email)) {
    $Error .= "lütfen geçerli eposta adresini giriniz .<br>";
} else {

    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $DATA_OBJ->email)) {
        $Error .= "lütfen geçerli eposta adresini giriniz .<br>";
    }
}

$data['gender'] =  isset($DATA_OBJ->gender) ?$DATA_OBJ->gender : null ;
if (empty($DATA_OBJ->gender)) {
    $Error .= "Lütfen bir cinsiyet seçin .<br>";
} else {

    if ($DATA_OBJ->gender != "Male" && $DATA_OBJ->gender != "Female") {
        $Error .= "Lütfen geçerli bir cinsiyet seçin.<br>";
    }
}


$data['password'] = $DATA_OBJ->password;
$password = $DATA_OBJ->password2;

if (empty($DATA_OBJ->password)) {
    $Error .= "Lütfen geçerli bir şifre giriniz .<br>";
} else {
    if ($DATA_OBJ->password != $DATA_OBJ->password2) {
        $Error .= "şifre uyuşmalı. <br>";
    }
    if (strlen($DATA_OBJ->password) < 8) {
        $Error .= "şifre en az 8 karakter uzunluğunda olmalıdır. <br>";
    }
}



if ($Error == "") {
    $query = "update  users  set username=:username,gender=:gender,email=:email,password=:password where userid=:userid limit 1  ";

    $result = $DB->write($query, $data);

    if ($result) {
        $info->message = "Verileriniz kaydedildi";
        $info->data_type = "save_settings";
        echo json_encode($info);
    } else {
        $info->message = "Bir hata nedeniyle verileriniz KAYDEDİLMEMİŞTİR";
        $info->data_type = "save_settings error";
        echo json_encode($info);
    }
} else {

    $info->message = $Error;
    $info->data_type = "save_settings error";
    echo json_encode($info);
}

