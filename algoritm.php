<?php
// Задача №1

$s = "*";
$ar = array(12, 0, 32, 54, 52, 4, 2);
$len = count($ar);

for($i = 0; $i < $len; $i++){
	if(strpos($ar[$i], "2") !== false){
		$len++;
		for($j = $len - 1; $j > $i; $j--){
			$ar[$j] = $ar[$j - 1];
		}
	$i++;
	$ar[$i] = $s;
	}
}
foreach($ar as $value){
	echo $value . "<br>";
}