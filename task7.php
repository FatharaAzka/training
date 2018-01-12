<?php 

function findCharacter($a , $b) {
	$x=0;
	foreach(range($a,$b) as $letter) 
	{  
	   $x = $x+1;
	   if($x % 20 == 0) {
	   	 echo $letter."\n<br>";
	   } else 
	   		echo $letter."\n";
	}
}

//bisa pake print_chars
echo "<strong>Find Character between 2 character</strong><br>Note: 20 character per line<br><br>";
findCharacter('(','z');
?>