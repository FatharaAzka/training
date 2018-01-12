<?php
	interface person {
		public function getName();
		public function setPlace($start,$end);
		public function getStart();
		public function getEnd();
		public function display();
	}

	interface apps {
		public function setApps($app);
		public function getApps();
	}

	abstract class toDriver {
		var $number,$text;
		abstract public function chat($text);
	}

	class chooseApps extends toDriver implements apps {
		var $choosen, $text;
		public function setApps($app) {
			$this->choosen = $app;
		}
		public function getApps() {
			return "You choose $this->choosen";
		}

		public function chat($t) {
			$this->text = $t;
			return $this->text;
		}
	}

	class order extends chooseApps implements person {
		var $name,$start,$end,$apps;

		public function __construct ($n) {
			$this->name = $n;
			echo "Ordering online transportation....<br>";
		}

		public function __destruct () {
			echo "Order is done<br>";
		}

		public function getName() {
			return $this->name;
		}

		public function setPlace($s,$e) {
			$this->start = $s;
			$this->end = $e;
		}

		public function getStart() {
			return $this->age;
		}

		public function getEnd() {
			return $this->end;
		}

		public function display() {
			return "Name:\n$this->name<br>From:\n$this->start<br>To:\n$this->end";
		}

	}

	$tes = new order("Fathara");
	$tes->setApps("Grab");
	echo $tes->getApps()."<br>";

	$tes->setPlace("Gang H. Arsyad","Geeksfarm");
	echo $tes->display()."<br>";

	echo "You can contact the driver by chatting<br>";
	echo "Chat:\n".$tes->chat("Saya di depan alfa bawah ya pak!")."<br>";

?>