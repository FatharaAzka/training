
<?php
$original = array(1, 2, 3, 4, 5);
echo "Original array is:\n";
foreach ($original as $val) {
	echo $val."\n\n";
}

echo "<br>";
array_splice($original, 3 ,0, array("$"));
echo "After inserting '$' the array is:\n";
foreach ($original as $value) {
	echo $value."\n\n";
}
?>


