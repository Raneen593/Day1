<?php
header('Content-Type: application/json');
class Student{
    public $name;
    public $age;
    public $email;
    private $isActive = false;

    public function __construct($name, $email, $age) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function activate() {
        $this->isActive = true;
    }
    
    public function getStatus(){
        return $this->isActive ? "Success" : "Faild";
    }

    public function toJson() {
        return json_encode([
            'status' => $this->getStatus(),
            'welcome' => "Welcome, " . $this->name,
            'email' => $this->email,
            'age' => $this->age
        ]);
    }
}
$sut=new Student("Raneen","raneen@gmail.com",20);
$sut->activate();
echo $sut->toJson();