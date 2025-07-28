<?php
class BankAccount{
    private $balance=10000;

    public function  deposit($amount) {
        $this->balance += $amount ;
    }
    public function  withd($amount) {
        $this->balance -= $amount ;
    }
    public function  getBalance() {
        echo "Your Balance : " . $this->balance ;
    }
}
$bank=new BankAccount();
$bank->deposit(500);
$bank->withd(200);
$bank->getBalance();