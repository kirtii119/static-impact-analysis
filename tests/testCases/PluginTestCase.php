<?php
 
class TestClass {

    public function execute(){
        return self :: testMethod(); 
    }

   
    public function testMethod(){
        return "this is testmethod";
    }
}


