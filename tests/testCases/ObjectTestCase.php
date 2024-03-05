<?php

class Employee {
    private $name;
    private $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function raiseSalary($percentage) {
        $raiseAmount = $this->salary * ($percentage / 100);
        $this->salary += $raiseAmount;
    }
}
class Foo{
    function Testme(){
        $employee = new Employee("John Doe", 50000);
        $employee->raiseSalary(10);

    }
}

