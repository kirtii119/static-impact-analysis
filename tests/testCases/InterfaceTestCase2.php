<?php

namespace Test2;

class TestClassParent{
    public function classMethod(){
        return "hey";
    }
}

interface TestInterface {
    public function classMethod();
}
class Tester {
    public function execute(TestInterface $obj)
    {
        
        $var = $obj->classMethod();
        return $var;
    }
    
}
class TestClass extends TestClassParent implements TestInterface {
    public function classMethod(){
        return $this->classMethod2();
    }

    public function classMethod2(){
        return "hey2";
    }
}
$obj = new TestClass();
$TesterObj = new Tester();
echo $TesterObj->execute($obj);
