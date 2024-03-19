<?php

//This test case shows that a class is instantiated directly and passed into a function that expects it's interface
//Though we didn't really find this exact thing in magento, but look more about other ways of making objects and passing to interface types, other than referring to di.xml (see if they even exist)

class TestClassParent{
    public function classMethod(){
        return "hey";
    }
}

interface TestClassInterface {
    public function classMethod();
}
class Tester {
    public function handleExecute(TestClassInterface $obj)
    {
        $var = $obj->classMethod();
        return $var;
    }

    public function execute()
    {
        $obj = new TesttClass();
        return self::handleExecute($obj);
    }
}
class TesttClass extends TestClassParent implements TestClassInterface {
    public function classMethod(){
        return $this->classMethod2();
    }

    public function classMethod2(){
        return "hey2";
    }
}


