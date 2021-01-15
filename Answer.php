<?php

//#1

$array1 = [1,2,3,4,5,6,8,9,10];

$array2 = range(1,max($array1));

$result = array_diff($array2,$array1);

print_r(array_values($result));

//#2

$x = [1,5,6,1,0,1];
$y = 6;

//#3
$arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
$pecah = array_chunk($arr, ceil(count($arr) / 3));

foreach ($pecah as $key => $value) {
    for($i=0;$i<count($value);$i++){
        if ($i < count($value)-2) {
            $arr1[] = $value[$i];
        } else{
            $arr2[] = $value[$i];
        }
    } 
}
$pecah1 = array_chunk($arr1, ceil(count($arr1) / 3));
$pecah2 = array_chunk($arr2, ceil(count($arr2) / 3));
$arr = [$pecah1,$pecah2];
echo "<br>";
print_r($arr);
echo "<br>";

//#4
$jarak = 500;
$tank = 180;
$harga = [1000,2000,5000,1000,6000,4000,1000];
$spbu = [100,140,150,200,330,360,400];
$total = 0;
$key2=0;
$sisa_tank= 180;
$jarak_tempuh = 0;
$jarak_spbu = 100;

foreach($spbu as $key=>$value){
    if($key != 0){
        $key2 = $key - 1;
        $jarak_spbu = $spbu[$key] - $spbu[$key2];
    }
    $jarak_tempuh += $spbu[$key];
    $sisa_jarak = $jarak - $jarak_tempuh;
    $sisa_tank -= $jarak_spbu;
    if($harga[$key] == min($harga) && $sisa_tank > 0 ){
        $isi_tank = $tank - $sisa_tank;
        $total += ($isi_tank * $harga[$key]);
        $sisa_tank += $isi_tank;
    }
    if($sisa_tank<0){
        $sisa_tank += $jarak_spbu;
        $isi_tank = $tank - $sisa_tank;
        $total += ($isi_tank*$harga[$key2]);
        $sisa_tank += $isi_tank;
    }
}
echo "<br>";
print_r($total);

?>