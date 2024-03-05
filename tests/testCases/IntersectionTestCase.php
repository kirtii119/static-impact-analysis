<?php 
class noFoo{
    public function iamdefined(){
        return "hey";
    }
}

interface Testme {
    public function notdefined() { 
    }  
}
class FooWho {

    public function doSomethingUseful(Testme $obj)
    {
        if (!($obj instanceof noFoo)) {
            return;
        } 
        $var = $obj -> iamdefined();
        return null;
    }
}

//expected o/p : FooWho::doSomethingUseful => (noFoo & Testme)::iamdefined
