<?php
	$original = array(
	"Sophia"=>"31",
	"Jacob"=>"41",
	"William"=>"39",
	"Ramesh"=>"40"
	);

	//a)------------------
	echo "<strong>a) ascending order sort by value</strong><br>";
	asort($original);

	$i=0;
	foreach ($original as $key => $value) {
		echo $key." is ".$value."<br>";
	}

	// b)------------------
	echo "<strong>a) ascending order sort by key</strong><br>";
	ksort($original);

	$i=0;
	foreach ($original as $key => $value) {
		echo $key." is ".$value."<br>";
	}

	// c)------------------
	echo "<strong>a) descending order sort by value</strong><br>";
	arsort($original);

	$i=0;
	foreach ($original as $key => $value) {
		echo $key." is ".$value."<br>";
	}

	// d)------------------
	echo "<strong>a) descending order sort by key</strong><br>";
	krsort($original);

	$i=0;
	foreach ($original as $key => $value) {
		echo $key." is ".$value."<br>";
	}
?>


