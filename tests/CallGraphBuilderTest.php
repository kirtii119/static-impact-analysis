<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require_once("src/CallGraphBuilder.php");

final class CallGraphBuilderTest extends TestCase
{
    public function testRun(): void
    {
        $testFuncMap = 
        [
            "func1"=>["func1a", "func2"], 
            "func2" => ["func2a", "func1", "func2"], 
            "func3" => ["func3a"] 
        ]; 

        $callGraphBuilder = new CallGraphBuilder();
        $callGraphBuilder->setup($testFuncMap);
        $callGraphResult = $callGraphBuilder->run("func1", CallGraphBuilder::LINEAR);
        
        $this->assertSame(['func1','func1a', 'func2', 'func2a'], $callGraphResult);
    }

    public function testRunIntersectionType(): void
    {
        //logically intersection should be with an interface - but what function will be called will depend on the class passed implementing that interface
        $testFuncMap = 
        [
            "class1::func1"=>["(class2 & class3)::func2a"], 
            "class2::func2a" => ["func2b"], 
            "class3::func3" => ["func3a"] 
        ]; 

        $callGraphBuilder = new CallGraphBuilder();
        $callGraphBuilder->setup($testFuncMap);
        $callGraphResult = $callGraphBuilder->run("class1::func1", CallGraphBuilder::LINEAR);
        
        $this->assertSame(['class1::func1','class2:func2a', 'func2b'], $callGraphResult);
    }

    public function testRunUnionType(): void
    {
        $testFuncMap = 
        [
            "class1::func1"=>["(class2 | class3 | class4 | null)::func234"], 
            "class2::func234" => ["func2a"], 
            "class3::func234" => ["func3a"],
            "class4::func234" => ["func4a"],
        ]; 

        $callGraphBuilder = new CallGraphBuilder();
        $callGraphBuilder->setup($testFuncMap);
        $callGraphResult = $callGraphBuilder->run("class1::func1", CallGraphBuilder::LINEAR);
        
        $this->assertSame(['class1::func1','class2::func234', 'func2a', 'class3::func234', 'func3a', 'class4::func234', 'func4a' ], $callGraphResult);
    }

    //o/p still needs to be checked yet
    public function testRunUnionIntersectionType(): void
    {
        $testFuncMap = 
        [
            "class1::func1"=>["((class2 & class3) | (class2  & class4))::func23"], 
            "class2::func23" => ["func2a"], 
            "class3::func23" => ["func3a"],
            "class4::func4" => ["func4a"],
            "class5::func5" => ["func5a"]

        ]; 

        $callGraphBuilder = new CallGraphBuilder();
        $callGraphBuilder->setup($testFuncMap);
        $callGraphResult = $callGraphBuilder->run("class1::func1", CallGraphBuilder::LINEAR);
        
        $this->assertSame(['class1::func1','class2::func23', 'func2a', 'class3::func23', 'func3a'], $callGraphResult);
    }

    //not full proof
//     //under what case would you really use di.xml mapping?
//     public function testRunInterfaceMap(): void
//     {
//         $testFuncMap = 
//         [
//             "class1::func1"=>["func1a","OrderInterface::func1"], 
//             "OrderClass::func1" => ["StockInterface::func1"], 
//             "StockClass::func1" => ["func2ab"]

//         ]; 
//         //check di.xml for this mapping
//         $callGraphBuilder = new CallGraphBuilder();
//         $callGraphBuilder->setup($testFuncMap);
//         $callGraphResult = $callGraphBuilder->run("class1::func1", CallGraphBuilder::LINEAR);
        
//         $this->assertSame(['class1::func1','func1a', 'OrderClass::func1', 'StockClass::func1', 'func2ab'], $callGraphResult);
//     }
}



//check normal
//check not stuck in recursion due to recursion in the test case
//check if 1 function is included in the result only once
//check intersection & Union Type example