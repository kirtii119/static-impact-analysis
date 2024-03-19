<?php

//refer di.xml and dependency injections to understand this test case.
 
interface SpecialInterface{
    public function classMethod(){}
}

class Tester
{
    function testInterfaceMethod(SpecialInterface $specialInterface)
    {
        return;
    }
}

class TestClass
{

    private SpecialInterface $specialInterface;

    function __construct(SpecialInterface $specialInterface)
    {
        $this->specialInterface = $specialInterface;
    }

    function testMethod()
    {
        $tester = new Tester();
        return $tester->testInterfaceMethod($this->specialInterface);
    }

    public function execute()
    {
        return self::testMethod();
    }

}

class SpecialClass implements SpecialInterface{
    public function classMethod(){
        return "hey";
    }
}

