<?php
	$a=0;$b=0; //counter di dalam for
	$arr = array('ayah','ibu','ayah','nenek','kakek','ayah','ayah');

	echo "Sample array : (";
	foreach ($arr as $value) {
		echo "$value,\n\n";
	}
	echo ")<br>";

	print_r("Times all value appears in an array:\n<br>");

	//jika ingin menghitung semuanya
	$count = array_count_values($arr);
	foreach ($count as $key => $val) {
		echo "$key => $val<br>";
	}
	echo "<br><br>";

	//jika ingin menghitung salah satu
	print_r("Times a specific value appears in an array:\n<br>");
	$string = 'ibu';
	findSpecific($string, $count);

	function findSpecific($str, $array) {
		print_r(ucfirst($str).":\n".$array[$str]);
	}
	
?>


