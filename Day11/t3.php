<?php
class courses{
    private $title;
    private $instractor;

    function __construct($title,$instractor){
        $this->title=$title;
        $this->instractor=$instractor;
    }
    public function describe(){
        echo "This Course IS " . $this->title . " And Instractor Is " . $this->instractor ;
    } 
}
$cours=new courses("Math","Ali");
$cours->describe();
?>