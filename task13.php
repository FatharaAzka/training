<?php
	$a=0;$b=0; //counter di dalam for
	$arr = array(0,4,6,8,10);

	function filterArray($value){
    return ($value != 0);
	}

	$filteredArray = array_filter($arr, 'filterArray');
	$min = min($filteredArray);	
	echo "Sample array : (";

	foreach ($arr as $value) {
		echo "$value,\n\n";
	}
	echo ")<br>Note: \"lowest integer not 0\"<br>";
	echo "The lowest integer in array is $min";
?>


