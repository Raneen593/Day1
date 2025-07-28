<?php
class employee{
    public $name;
    protected $salery;
    private $bonus;
    public function em(){
        echo $this->name;
        echo $this->salery;
        echo $this->bonus;
    }
}
$emp=new employee();
$emp->name="Ali";
$emp->salery=5000;
$emp->bonus="50%";
$emp->em();