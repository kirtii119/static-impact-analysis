<?php
class Foo {
    /**
     * @param Foo[]|Collection $object
     */
    public function doSomethingUseful($object)
    {
        if ($object instanceof Foo) {
            // now we can be sure that $object is just Foo in this branch
        } elseif ($object instanceof Bar) {
            // dtto for Bar
        }
    }
}

class Testme {
    public function __construct() {
        $result = (new Foo())->doSomethingUseful([new Foo()]);
    }
}


