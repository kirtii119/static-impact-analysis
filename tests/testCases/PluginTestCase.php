<?php
 
 //This is the test case which is actually indexed. 
 //After plugin is added, program should know that this will be affected by considering di.xml
class PTestClass {

    public function execute(){
        return self :: PTestMethod(); 
    }

   
    public function PTestMethod(){
        return "this is testmethod";
    }
}


