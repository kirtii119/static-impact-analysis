<?php 
class TestClass{
    public function classMethod(){
        return "hey";
    }
}

interface TestInterface {
    public function interfaceMethod();
}
class Tester {

    public function doSomethingUseful(TestClass $obj)
    {
        if (!($obj instanceof TestInterface)) {
            return;
        } 
        $var = $obj->classMethod();
        return null;
    }
}

//expected o/p : Tester::doSomethingUseful => (TestClass & TestInterface)::classMethod
