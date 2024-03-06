<?php

class TestClass{
  
    public function testme($var) {
        return $var;
    }
}
class Tester{
    function doSomethingUseful(){
        $var = new TestClass();
        $var->testme(10);

    }
}

