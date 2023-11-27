<?php
// refarans ve value değer ile yas hesaplama yapma
function yas_hesaplama(&$tarihler)
{
    for ($i = 0; $i < count($tarihler); $i++) {
        $tarihler[$i] = 2023 - $tarihler[$i];
    }
    return $tarihler;
}

$liste = array(1956, 1985, 2015);
echo "<pre>";
print_r(yas_hesaplama($liste)) . "<br>";

print_r($liste);

echo "</pre>";



?>