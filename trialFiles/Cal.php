<?php
class Cal {

    /** @var int */

    protected $var;



    /** @return array */
    function hey(string $myvar) 
    {
        $this->var = $myvar;
        return "Hello";
    }
}