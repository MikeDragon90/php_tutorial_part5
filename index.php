<?php 

function debug($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>

<?php #require_once 'nav.php'; ?>

<?php #include_once 'form.php'; ?>

<?php #require_once 'footer.php';  ?>

<?php 

abstract class VehicleProperties {
	public $property1 = 'Start'; 
	abstract public function start();
	abstract public function stop();
};

class Vehicle extends VehicleProperties {
	const COLOR = 'Yellow';
	#public can be accessed from everywhere.
	public string $brand;
	#protected can be accessed within the class
	protected string $model;
	#private can be accessed within the class
	private int $year;

	#public, private, protected

	public function __construct($brand, $model, $year) {
		$this->setBrand($brand);
		$this->setModel($model);
		$this->setYear($year);
	}

	public function __destruct() {
		// echo 'Done';
	}

	public function start() {
		echo 'Start';
	}

	public function stop() {
		echo 'Stop';
	}
	public function setBrand($brand) {
		return $this->brand = $brand;
	}

	public function getBrand() {
		return $this->brand;
	}

	public function setModel($model) {
		return $this->model = $model;
	}

	public function getModel() {
		return $this->model;
	}

	public function setYear($year) {
		return $this->year = $year;
	}

	protected function getYear() {
		return $this->year;
	}
}

class Car extends Vehicle {
	public function isJeep() {
		echo 'False';
	}
}

interface VehicleDrive {
	public function drive();
}

trait VehicleColor {
	public function color() {
		echo 'Green';
	}
}

trait VehicleTopSpeed {
	public function topSpeed() {
		echo '150KM';
	}
}

class MotorCycle extends Vehicle implements VehicleDrive {
	use VehicleColor;
	use VehicleTopSpeed;

	public static $hasWheels = 'Yes';

	public function drive() {
		echo 'Drive';
	}
}

$car = new Car('Honda', 'Civic', 2008);
echo $car->isJeep();
// $motorCycle = new MotorCycle('Yamaha', 'R1', 2005);
// $motorCycle->topSpeed();
echo '<br />';

echo MotorCycle::$hasWheels;
#debug($motorCycle);



