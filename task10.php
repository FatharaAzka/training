<?php

	$a=0;$b=0; //counter di dalam for
	$arr = array("abcd","abc","de","hjjj","g","wer");
	$temp = $max = $min = 0; //varibel yg dipakai

	//menampilkan isi dalam array
	echo "Sample arrays: (";
	foreach ($arr as $value) {
		echo $value.",\n";
	}
	echo ")<br>";

	//mendapatkan panjang dari tiap element dan mencari nilai maxnya
	for ($i=0;$i<count($arr);$i++) {
		if ($i == 0) {
			$max = strlen($arr[0]); //mencari panjang element pada element ke-0
		} elseif ($i > 0) {
			$a +=1; //counter
			$temp = strlen($arr[$a]); //arr[$a] tidak arr[$i] sebagai pembanding, mulai dari element 1
			if ($temp > $max) //jika nilai pembanding > dari nilai max/
			{
				$max = $temp; //$temp dimasukkan ke $max
			}
		}
	}

	//mendapatkan panjang dari tiap element dan mencari nilai min
	for ($i=0;$i<count($arr);$i++) {
		if ($i == 0) {
			$min = strlen($arr[0]); //mencari panjang element pada element ke-0
		} elseif ($i > 0) {
			$b +=1; //counter
			$temp = strlen($arr[$b]); //arr[$b] tidak arr[$i] sebagai pembanding, mulai dari element 1
			if ($temp < $min) //jika nilai pembanding < dari nilai min/
			{
				$min = $temp; //$temp dimasukkan ke 
			}
		}
	}
	echo "The shortest array length is $min. The longest array length is $max.";


?>


