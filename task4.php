<?php

function findVowels($str) {
	$vowels = preg_match_all('/[aeiou]/i',$str,$matches);
	return $vowels;
}

$string = "Drink Water";
echo "Stringnya adalah $string <br>";
$vowels = array('a','i','u','e','o','A','I','U','E','O');
$a=0;
$str = explode(" ", $string);
for($i=0;$i<strlen($string);$i++) {
	 if(in_array($string[$i], $vowels))
    {
        $a++;
    }
}

echo "Cara 1:<br>Terdapat <strong>".$a." vowels</strong> di dalam string <strong>".$string."</strong><br>";

echo "Cara 2:<br>Terdapat <strong>".findVowels($string)." vowels</strong> di dalam string <strong>".$string."</strong>";
;

?>