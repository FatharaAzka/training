<?php

	$color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');

	foreach ($color as $key => $value) {
		# code...
		print_r($key." => ".strtolower($value).",\n");
	}
	echo "<br>";

	foreach ($color as $key => $value) {
		# code...
		print_r($key." => ".strtoupper($value).",\n");
	}

	echo "<br><br>";
	echo "Cara ke-2:<br>";

	print_r(array_map('strtolower', $color));
	echo "<br>";
	print_r(array_map('strtoupper', $color));
?>


