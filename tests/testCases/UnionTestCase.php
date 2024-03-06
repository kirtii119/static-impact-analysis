<?php
class Tester {
    /**
     * @param TestClassOne |TestClassTwo $object
     */
    public function doSomethingUseful($object)
    {
       $object->testme();
    }
}

class TestClassOne {
    public function testMe() {
        return "TestMeTestMe";           
    }       
}

class TestClassTwo {
    public function testMe(){
        return "TestClassTwoTestMe";
    }
}

// expected o/p : Tester::doSomethingUseful => (TestClassOne| TestClassTwo)::testme
