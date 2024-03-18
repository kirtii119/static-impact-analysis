<?php


// class TestClassParent{
//     public function classMethod(){
//         return "hey";
//     }
// }

// interface TestInterface {
//     public function classMethod();
// }
// class Tester {
//     public function execute(TestInterface $obj)
//     {

//         $var = $obj->classMethod();
//         return $var;
//     }

// }
// class TestClass extends TestClassParent implements TestInterface {
//     public function classMethod(){
//         return $this->classMethod2();
//     }

//     public function classMethod2(){
//         return "hey2";
//     }
// }
// $obj = new TestClass();
// $TesterObj = new Tester();
// echo $TesterObj->execute($obj);


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

    public function execute()
    {
        return self::testMethod();
    }

    function testMethod()
    {
        $tester = new Tester();
        return $tester->testInterfaceMethod($this->specialInterface);
    }

}

class SpecialClass implements SpecialInterface{
    public function classMethod(){
        return "hey";
    }
}

interface SpecialInterface{
    public function classMethod(){}
}