<?php
class Foo {
    /**
     * @param TestMe|TestMeToo $object
     */
    public function doSomethingUseful($object)
    {
       $object->tryme();
    }
}

class TestMe {
    public function tryMe() {
        return "TestMeTryMe";           
    }       
}

class TestMeToo {
    public function tryMe(){
        return "TestMeTooTryMe";
    }
}

// expected o/p : Foo::doSomethingUseful => (TestMe | TestMeToo)::tryme
