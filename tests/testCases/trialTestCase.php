<?php
// class Trial{

    /**
     * 
     *
     */
    // function mixedType($type){
    //     $type = "hey";
    //     $type5 = 1;

    // }

    // function neverType(){
    //       /** @var $type0 int */
    //     $type0 = 1;
    //     $type2 = 0;
    //     if($type2){
    //         $type3 = "hello";
    //     }
    //     if($type2){
    //         $type4 = $type2;
    //     }
        
    // }
    
// }

class A{

    /** @return object */
    function foo(){
        return new B;
    }
}

class B{
    function noFoo(){
        return null;
    }

}

class C{
    function fooWho(){
        $objA = new  A();

        /** @var B $objB  */
        $objB = $objA->foo();
        echo $objB->noFoo();
        $a =false;
        echo $a->foo2();
    }
}

$b = new C;
echo $b->fooWho();