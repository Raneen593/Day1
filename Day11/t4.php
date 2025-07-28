<?php
class Vehicle{
    public $model;
    public $make;
    public function info(){
        echo "Car Model : " . $this->model . " , Make in : " .$this->make;
    }
}
class Car extends Vehicle {
    public $fuelType;
    public function newinfo(){
        return $this->info(). " , The Fueltype Is : ".$this->fuelType;
    }
}
$car=new Car();
$car->model="BMW";
$car->make="In China";
$car->fuelType="Benzene";
echo $car->newinfo();