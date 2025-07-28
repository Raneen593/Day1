<?php
class Book {
    public $title;
    public function read(){
        echo "I read {$this->title} now ";
    }
}
$t1=new Book();
$t1->title= "Ard Elsrab";
$t1->read();
?>