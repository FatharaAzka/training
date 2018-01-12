<?php

	$color = array(4 => 'white', 6 => 'green', 11=> 'red');
	ksort($color);

	foreach ($color  as $key => $value) {
		# code...
		echo "<strong>".$key."</strong> => ".$value.",\n";
	}
	echo "<br>";

	$max = max(array_keys($color));
	echo "Largest key: ".$max."\n=>\n".$color[$max];


?>


