<head>
<style>
	table,td {
		border:1px solid;
		text-align: center;
	}
</style>
</head>
<?php
	$amounts = 1000; //(P)
	$rates = 10; //suku bunga/thn --> (r)
	$years = 5; //(t)

	function calculateFutureValue($amount,$rate,$year) {
		$y=0;
		?>
		<table>
			<th>Years</th>
			<th>Future Value</th>
		<?php
		for ($x=0;$x<$year;$x++) {

			$value = 1+($rate/100)/12;
			$afterpow = pow($value,12*($x+1));
			$future_value = number_format($amount*$afterpow,2,",",""); 
			?>
			<tr>
				<td width="50px"><?php echo $y++ ?></td>
				<td width="80px"><?php echo $future_value ?></td>
			</tr>
			<?php
		}
		?> </table> <?php
	}

	echo "Write a function to compute the future investment value at a given interest rate for a specified number of years. <br>";
	echo "Amount: ".$amounts."<br>";
	echo "Rate of interest: ".$rates."<br>";
	echo "Years: ".$years."<br><br>";

	echo "<strong>Future Value in each year: </strong><br>";
	calculateFutureValue($amounts,$rates,$years);

	/* --------------------------------cbain pake ampersand & -------------------------------*/
?>

