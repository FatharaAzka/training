<?php

function findWord($str) {
	$word = str_word_count($str);
	return $word;
}

$string = "The quick brown fox jumps over the lazy dog.";
echo "Stringnya adalah $string <br>";
echo "Terdapat <strong>".findWord($string)." kata</strong> di dalam string <strong>".$string."</strong>";

?>