<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<br>";
    class Vehicle {
        private $NumOfTires;
        protected $brand;

        protected function getTires($value){
            $this->NumOfTires = $value;
        }
    }
    class Car extends Vehicle {
        static $numOfCars = 0;
        function __construct($argument){
            $this->brand = $argument;
            $this->NumOfTires = 4;

            self::$numOfCars++;
        }
    }
    class Truck extends Vehicle {
        static $numOfTrucks = 0;

        function __construct($argument){
            $this->brand = $argument;
            $this->NumOfTires = 6;

            self::$numOfTrucks++;
        }
    
        function overrideNumOfTires($value){
            parent::getTires($value);
        }
    }
    echo "Creating a new car object<br>";
    $car1 = new Car('BMW');
    echo "<pre>";print_r($car1);echo "</pre>";
    
    echo "Creating a new truck object<br>";
    $truck1 = new Truck('Volvo');
    echo "<pre>";print_r($truck1);echo "</pre>";
    
    echo "Modifying the number of Tires in truck<br>";
    $truck1->overrideNumOfTires(8);
    echo "<pre>";print_r($truck1);echo "</pre>";
    ?>
</body>
</html>