<?php 
header("Content-Type:application/json");
header("Access-control-Allow-Origin:*");

if($_SERVER["SERVER_NAME"]=='127.0.0.1'){
$data=["massege"=>"error please change domain","connection"=>false];
echo json_encode($data);}else{
$data=["student"=>[[
    "name"=>"raneen",
    "age"=>20,
    "email"=>"raneenelalfy@ex.com",
],[
    "name"=>"nour",
    "age"=>25,
    "email"=>"nour@ex.com"

]],
"connection"=>true];
echo json_encode($data);

}