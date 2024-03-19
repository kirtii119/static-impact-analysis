<?php
 
 //This is the test case which is actually indexed. After plugin is added, program should know that this will be affected
class TestClass {

    public function execute(){
        return self :: testMethod(); 
    }

   
    public function testMethod(){
        return "this is testmethod";
    }
}


