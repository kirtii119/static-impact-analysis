<?php
// class Foo {
//     /**
//      * @param Foo[]|Collection $object
//      */
//     public function doSomethingUseful($object)
//     {
//         if ($object instanceof Foo) {
//             // now we can be sure that $object is just Foo in this branch
//         } elseif ($object instanceof Bar) {
//             // dtto for Bar
//         }
//     }
// }

// class Testme {
//     public function __construct() {
//         $result = (new Foo())->doSomethingUseful([new Foo()]);
//     }
// }



class noFoo{
    function __construct(){
        echo "here";
    }
}

class Testme {
    public function __construct() {
       echo "doSomethingUseful";
    }

    public function defined(){
        return "hey";
    }
}
class FooWho {
    /**
     * @param Testme
     */
    public function doSomethingUseful(Testme $obj)
    {
        if (!$obj instanceof noFoo) {
            return;
        } 

        $var = $obj -> defined();;
        $next = $obj;
        echo "got it";
        
    }
}


