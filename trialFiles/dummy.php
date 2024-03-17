<?php

require './Cal.php/Cal';

class Foo {

    // public function Foo_child(){
    //     echo "Foo child printing";
    // }

    public function execute(){
        // Foo::Foo_child();
        $c = new Cal();
        return $c->hey();
        // return $c->add(3,4);
        
    }

}

class Calc {
    public function add($x,$y):int
    {
        // HELLO2();
        return $x+$y;
    }

    public function sub($x,$y):int{
        $this->add(2,3);
        return $x-$y;
    }
}

// Hello();

function Hello(){
    echo "hi";
    hello2();
    
    $obj = new Calc();
    echo $obj->sub(1,2);
    echo ("\n");
    echo $obj->add(1,2);
    $a = new Foo();
    $t = $a->execute();
    return 0;

}

function HELLO2(){
    $i = 1;
    while($i<5){
        $ar = 2;
        echo "Hey";
        $i++;
    }
    echo $ar;
    echo "inside Hello2";
}


$nj = Hello();
$a = new Foo();
// $t = $a->execute();

echo $t;

//hashmap - vars, hashmap - func return type
//sometimes func return type can require computation, can depend on func call
// 