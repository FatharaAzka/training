<?php

	$arr = array();
	$ctr = 250-200;
	$first = 200;
	for ($i=0;$i<$ctr;$i++) {
		$first += 4;
		if($first < 250) {
			echo $first.",\n";
		} else
			break;
	}
?>


