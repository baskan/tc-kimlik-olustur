<?php
/**
 * TC Kimlik Oluşturucu
 * 
 * Testlerinizde kullanmanız için mock TC Kimlik numarası oluşturma fonkisyonu.
 * Algoritmaya uygun 11 haneli string üretir.
 * 
 * @author Ilkin Başkan <ilkin@ilkin.org>
 * @return string
 */
function tcKimlikOlustur() {
    
    $random_pool1 = str_split(rand(10000, 99999));
    $random_pool2 = str_split(rand(1000, 9999));

    $k1_sum = array_sum($random_pool1);
    $k2_sum = array_sum($random_pool2);
    
    $tckn = array_reduce(array_keys($random_pool2), function ($carry, $numKey) use ($random_pool1, $random_pool2) {
        return $carry . $random_pool1[$numKey] . $random_pool2[$numKey];
    }, "");
    
    $digit_10 = ($k1_sum * 7 - $k2_sum) % 10;
    $digit_11 = ($k1_sum + $k2_sum + $digit_10) % 10;

    return $tckn . substr(implode("",$random_pool1), -1) . $digit_10 . $digit_11;
}
