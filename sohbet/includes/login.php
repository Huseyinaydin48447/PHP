<?php

$info=(Object)[];

$data=false;

$data['email']=$DATA_OBJ->email;

if(empty($DATA_OBJ->email)){
    $Error="lütfen geçerli eposta adresini giriniz ";
}
if(empty($DATA_OBJ->password)){
    $Error="Lütfen geçerli bir şifre giriniz ";

}

if($Error==""){
    $query="select * from users where email=:email limit 1";
    $result=$DB->read($query,$data);

    if(is_array($result)){
        $result=$result[0];
        if($result->password==$DATA_OBJ->password){
            $_SESSION['userid']=$result->userid;
            $info->message="Başarıyla giriş yaptınız.";
            $info->data_type="info";
            echo json_encode($info);
        }else{
            $info->message="Yanlış şifre";
            $info->data_type="error";
            echo json_encode($info);
        }

    }else{
        $info->message="Yanlış email";
        $info->data_type="error";
        echo json_encode($info);

    }

}else{
    $info->message=$Error;
    $info->data_type="error";
    echo json_encode($info);
}






?>