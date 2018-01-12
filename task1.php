<?php

function calculateSquare($panjang , $lebar) {
	$luas = $panjang * $lebar;
	return $luas;
}

echo "Hitung persegi panjang dengan panjang 5cm dan lebar 4cm adalah : </br>";
$p = 5;
$l = 4;
echo "Luas persegi panjang adalah $p x $l  = ".calculateSquare($p , $l)." cm<sup>2</sup>";

?>
