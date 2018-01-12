<?php

	$color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');

	print_r(array_map('strtolower', $color));
	echo "<br>";
	print_r(array_map('strtoupper', $color));
?>


