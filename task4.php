
<?php
	$color = array(
		4=>"white", 
		6=>"green", 
		11=> "red", 
	);
	foreach ($color as $key => $value) {
		echo $key."\n=>\n".$value."<br>";
	}
	echo "Write a PHP script to get the first element of the above array. <br>Result:\n".reset($color);
?>


