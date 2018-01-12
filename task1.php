<?php
		$color = array('white','green','red','blue','black');

		echo "The memory of that scene for me is like a frame of film forever frozen at that moment: <br>";
		for ($ctr=0;$ctr<count($color);$ctr++) {
			if ($color[$ctr] == 'red') {
				echo "the <strong>".$color[$ctr]. "</strong> carpet, ";
			} elseif ($color[$ctr] == 'green') {
				echo "the <strong>".$color[$ctr]. "</strong> lawn, ";
			} elseif ($color[$ctr] == 'white') {
				echo "the <strong>".$color[$ctr]. "</strong> house, ";
			}
		}

		echo "the leaden sky. The new president and his first lady. - Richard M. Nixon";
?>