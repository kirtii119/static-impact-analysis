<?php
/*
use PHPStan\Type\ObjectType;


class MyClass
{
    public function message()
    {
        echo "hello";
    }

}


function getObjectTypeInstance(string $className = 'MyClass'): ObjectType
{
    if (empty($className)) {
        return new ObjectType(); // Creates an empty object type
    }

    // Ensure valid class name
    if (!class_exists($className)) {
        throw new Exception(sprintf('Invalid class name: %s', $className));
    }

    return new ObjectType($className); // Creates object type for the given class
} */


class Employee {
    private $name;
    private $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function raiseSalary($percentage) {
        $raiseAmount = $this->salary * ($percentage / 100);
        $this->salary += $raiseAmount;
    }
}
class xyz{
    function dontcallme(){
        $employee = new Employee("John Doe", 50000);
        $employee->raiseSalary(10);

    }
}

