<?php

	$original = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73";

	$split_ori = explode(' ', $original);
	$tot_temp = 0; //total array
	$i=0;

//----------------------menampilkan array--------------

	echo "Recorded temperatures:<br>";
	foreach($split_ori as $value)
	{
		echo $value."\n";
	}

	echo "<br>";
//----------------------rata-rata--------------

	$temp_array_length = count($split_ori);
	foreach($split_ori as $temp)
	{
		$i++;
		$tot_temp += (int)$temp;
	}

	$avg = $tot_temp/$i;
	echo "Average Temperature is:\n".round($avg,1)."<br>";

//------------------------LOWEST-----------------------

	echo "List of five lowest temperatures:\n";
	sort($split_ori);
	for ($ctr=0;$ctr<5;$ctr++) {

		echo $split_ori[$ctr]."\n";
	}

	echo "<br>";

//----------------------HIGHEST-----------------------

	echo "List of five highest temperatures:\n";
	//menemukan nilai yg terbesar dari besar ke bawah
	rsort($split_ori);
	$arr2 = array();

	for ($i=0; $i<5; $i++)
	{
		$arr2[] = $split_ori[$i]; //masukkan ke array baru
	}

	//mensortir dari bawah ke besar dari array baru
	sort($arr2);
	foreach($arr2 as $highest)
	{
		echo $highest."\n";
	}

	//a)------------------
	// $average = array_sum($original)/count($original);
	// echo $average;
	
?>


