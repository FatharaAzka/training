<?php
	$a=11;
	$b=20;
    $numbers = range($a, $b);
    shuffle($numbers);
    $slice = array_slice($numbers, 0, 10);
    
    echo "Sample Range:\n\n($a, $b)<br>";
    echo "Sample Output:\n\n";
    foreach ($slice as $value) {
    	# code...
    	echo "$value\n\n"; 
    }

?>