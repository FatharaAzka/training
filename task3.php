<?php

function findMiddleCharacter($str) {
	$length_string = strlen($str);
	$middle_position = round($length_string/2);
	$a = $length_string % 2;
	$length=round($length_string/2);

	echo "Angkanya adalah $str <br> Panjang stringnya adalah $length_string <br>  <br>";

	if ($length_string % 2 == 0) {
		echo "Panjang string: GENAP <br> Kemungkinan karakter tengah terletak di posisi ke $middle_position dan ".($middle_position + 1)." <br> Karakter tengah adalah: ".substr($str, $length-1 ,2)."<br><br>";
	} elseif ($length_string % 2 == 1) {
		echo "Panjang string: GANJIL <br> Kemungkinan karakter tengah terletak di posisi ke $middle_position <br> Karakter tengah adalah: ".substr($str, $length-1 ,1)."<br><br>";
	} else {
		echo "error";
	}
}

findMiddleCharacter(3500);

?>