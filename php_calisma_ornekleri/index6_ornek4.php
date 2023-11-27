<?php


function giris(){
    $parametreSayisi=func_num_args();
    if($parametreSayisi==0){
        echo "Parametre yok !";
    }else{
        $parametreSayisi=func_get_args();
        foreach($parametreSayisi as $parametre){
            echo $parametre."<br>";
        }
    }
}

giris("hüseyin :","gelecek","hedef","kariyer");
?>