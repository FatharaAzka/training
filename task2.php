<?php

$string = "120831";
$split_string = (str_split($string,2));

echo "Before:\n$string<br>";
foreach ($split_string as $value) {
	echo "$value ";
}

?>