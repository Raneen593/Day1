<?php
abstract class Employee{
    protected $hours;

    function __construct($hours){
        $this->hours=$hours;
    }
    abstract public function calculateSalary();
}
class HourlyEmployee extends Employee{
    public function calculateSalary(){
        echo "The Total Salery Is : " . $this->hours *500;
    }
}
$salery=new HourlyEmployee(10);
$salery->calculateSalary();