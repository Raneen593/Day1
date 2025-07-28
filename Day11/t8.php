<?php
class Animal{
    public function makeSound(){
        return "";
    }
}
class Dog extends Animal {
    public function makeSound(){
        return "WOOF";
    }
}
$animal=new Dog();
echo $animal->makeSound();

?>